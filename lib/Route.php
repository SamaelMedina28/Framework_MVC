<?php

namespace Lib;

class Route
{
    private static $routes = [];

    public static function get($url, $callback)
    {
        $url = trim($url, '/');
        self::$routes['GET'][$url] = $callback;
    }

    public static function post($url, $callback)
    {
        $url = trim($url, '/');
        self::$routes['POST'][$url] = $callback;
    }

    public static function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        $url = trim($url, '/');
        
        if(strpos($url, '?')){
           $url = substr($url, 0, strpos($url, '?'));
        }


        foreach (self::$routes[$method] as $route => $callback) {
            if (strpos($route, ':') !== false) {
                $route = preg_replace('#:[a-zA-Z0-9]+#', '([a-zA-Z0-9]+)', $route);
            }
            if (preg_match("#^$route$#", $url, $matches)) {
                $params = array_slice($matches, 1);
                if(is_callable($callback)){
                    $response = $callback(...$params);
                }
                if(is_array($callback)){
                    $controller = new $callback[0];
                    $response = $controller->{$callback[1]}(...$params);
                }
                if (is_array($response) || is_object($response)) {
                    header('Content-Type: application/json');
                    echo json_encode($response);
                } else {
                    echo $response;
                }
                return;
            }
        }

        http_response_code(404);
        echo '404 Not Found';
    }
}

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

        foreach (self::$routes[$method] as $route => $callback) {
            if ($url == $route) {
                $callback();
                return;
            }
        }

        http_response_code(404);
        echo '404 Not Found';
    }
}

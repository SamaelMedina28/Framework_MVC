<?php

namespace Lib;

/**
 * Clase Route
 * 
 * Implementación de un enrutador simple para manejar peticiones HTTP en una aplicación PHP.
 * Soporta métodos GET y POST, parámetros dinámicos en las rutas, y manejadores tanto callables como arrays [Clase, 'método'].
 */
class Route
{
    /**
     * @var array Almacena todas las rutas registradas agrupadas por método HTTP
     */
    private static $routes = [];

    /**
     * Registra una ruta de tipo GET
     *
     * @param string $url Patrón de URL a coincidir (puede incluir parámetros como /usuario/:id)
     * @param callable|array $callback Función de retorno o array [ClaseControlador, 'metodo']
     * @return void
     */
    public static function get($url, $callback)
    {
        $url = trim($url, '/');
        self::$routes['GET'][$url] = $callback;
    }

    /**
     * Registra una ruta de tipo POST
     *
     * @param string $url Patrón de URL a coincidir (puede incluir parámetros como /usuario/crear)
     * @param callable|array $callback Función de retorno o array [ClaseControlador, 'metodo']
     * @return void
     */
    public static function post($url, $callback)
    {
        $url = trim($url, '/');
        self::$routes['POST'][$url] = $callback;
    }

    /**
     * Despacha la petición entrante al manejador de ruta correspondiente
     * 
     * Este método:
     * 1. Obtiene el método HTTP y la URI de la petición actual
     * 2. Limpia la URI eliminando parámetros de consulta
     * 3. Busca coincidencias de la URI con las rutas registradas
     * 4. Maneja parámetros dinámicos en las rutas
     * 5. Ejecuta el callback o método del controlador correspondiente
     * 6. Envía la respuesta en JSON para arrays/objetos, o texto plano en otro caso
     * 7. Retorna 404 si no encuentra coincidencia
     * 
     * @return void
     * @throws \Exception Si el callback de la ruta no es válido
     */
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

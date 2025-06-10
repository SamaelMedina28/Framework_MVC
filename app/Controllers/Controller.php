<?php

namespace App\Controllers;

class Controller
{
    public function view($route, $data = [])
    {
        extract($data);
        $route = str_replace('.', '/', $route);
        if (file_exists('../resources/views/' . $route . '.php')) {
            ob_start();
            include '../resources/views/' . $route . '.php';
            $content = ob_get_clean();
            return $content;
        } else {
            http_response_code(404);
            return 'Esta vista no existe';
        }
    }
}
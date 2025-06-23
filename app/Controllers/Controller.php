<?php

namespace App\Controllers;

/**
 * Clase base para los controladores de la aplicación
 * 
 * Proporciona funcionalidades comunes como renderizado de vistas y redirecciones.
 */
class Controller
{
    /**
     * Renderiza una vista y devuelve su contenido como cadena
     * 
     * @param string $route Ruta de la vista (usando puntos como separadores de directorio)
     * @param array $data Datos que estarán disponibles en la vista
     * @return string Contenido renderizado de la vista o mensaje de error
     * 
     * @example
     *   En un controlador:
     *   return self::view('users.profile', ['user' => $user]);
     *   Buscará en: resources/views/users/profile.php
     */
    public static function view($route, $data = [])
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
    /**
     * Redirige a la ruta especificada
     * 
     * @param string $route URL o ruta a la que redirigir
     * @return void
     * 
     * @example
     *   self::redirect('/dashboard');
     *   self::redirect('https://ejemplo.com');
     */
    public static function redirect($route)
    {
        header('Location: ' . $route);
    }
}
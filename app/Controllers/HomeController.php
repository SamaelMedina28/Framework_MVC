<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $title = [
            'Controlador' => 'HomeController',
            'Metodo' => 'index'
        ];
        
        return $this->view('home', $title);
    }
}

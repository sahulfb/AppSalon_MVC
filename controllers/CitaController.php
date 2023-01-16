<?php

namespace Controllers;

use Model\Cita;
use Model\Servicio;
use MVC\Router;

class CitaController {
    public static function index( Router $router ) {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        isAuth();
        $servicios = Servicio::all();

        $router->render('cita/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id'],
            'servicios' =>$servicios
        ]);
    }
}
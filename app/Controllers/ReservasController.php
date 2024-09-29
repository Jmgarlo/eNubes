<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ReservasController extends Controller
{
    public function index()
    {
        // Acción predeterminada para el controlador de reservas
        echo "Bienvenido al controlador de reservas";
    }

    public function nueva()
    {
        // Acción para gestionar una nueva reserva
        echo "Formulario para nueva reserva";
    }

    public function confirmar()
    {
        // Acción para confirmar una reserva
        echo "Confirmación de reserva";
    }
}
?>
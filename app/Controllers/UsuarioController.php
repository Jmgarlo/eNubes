<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class UsuarioController extends Controller
{
    public function perfil()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login'); // Redirigir si no está autenticado
        }

        return view('perfil'); // Cargar la vista de perfil
    }
}
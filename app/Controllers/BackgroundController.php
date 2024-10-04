<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservaModel;
use CodeIgniter\HTTP\ResponseInterface;

class BackgroundController extends BaseController
{
    public function index()
    {

        $reservaModel = new ReservaModel();
        $reservasParaActualizar = $reservaModel->getReservasParaActualizar();
        foreach ($reservasParaActualizar as &$reserva) {
            $nuevoEstado = $reserva['id_estado'] + 1;
            $reservaModel->actualizarEstadoReserva($reserva['id'], $nuevoEstado);
        }
        $reservasFinalizadas = $reservaModel->getReservasFinalizadas();
        foreach ($reservasFinalizadas as &$reserva) {
            $reservaModel->actualizarEstadoReserva($reserva['id'], 6);
        }
    }
}

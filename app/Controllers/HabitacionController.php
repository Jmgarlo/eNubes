<?php

namespace App\Controllers;

use App\Models\HabitacionModel;
use App\Models\FotoHabitacionModel;

class HabitacionController extends BaseController
{
    public function filtrarHabitaciones()
    {
        $habitacionModel = new HabitacionModel();
        $habitaciones = $habitacionModel->findAll();

        return $this->response->setJSON($habitaciones);
    }

    public function getHabitaciones()
    {
        $habitacionModel = new HabitacionModel();

        $habitacionesPorTipo = [
            'individuales' => $habitacionModel->where('tipo', 'individual')->findAll(3),
            'dobles' => $habitacionModel->where('tipo', 'doble')->findAll(3),
            'suites' => $habitacionModel->where('tipo', 'suite')->findAll(3),
            'lujo' => $habitacionModel->where('tipo', 'lujo')->findAll(1),
        ];


        foreach ($habitacionesPorTipo as $tipo => &$habitaciones) {
            foreach ($habitaciones as &$habitacion) {
                $idHabitacion = $habitacion['id'];
                $urlFoto = "img/{$habitacion['tipo']}/{$idHabitacion}/1.png";
                $habitacion['url_foto'] = $urlFoto;
            }
        }

        return $this->response->setJSON($habitacionesPorTipo);
    }
}

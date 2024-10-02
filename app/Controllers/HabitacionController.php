<?php

namespace App\Controllers;

use App\Models\HabitacionModel;

class HabitacionController extends BaseController
{

    public function index() {

        return view('reservas/filtroHabitaciones');
    }

    public function filtrarHabitaciones()

    {
        $habitacionModel = new HabitacionModel();
        $habitaciones = '';
        $db      = \Config\Database::connect();
        $builder = $db->table('habitaciones');
        $fecha_inicio = $this->request->getGet('fecha_inicio');
        $fecha_fin = $this->request->getGet('fecha_fin');
        $capacidad = $this->request->getGet('capacidad');
        $camas = $this->request->getGet('camas');
        $baños = $this->request->getGet('baños');
        $disponibilidad = $this->request->getGet('disponibilidad');
        $precio = $this->request->getGet('precio');
        $sort = $this->request->getGet('sort');
        if ($fecha_inicio && $fecha_fin) {
            if ($capacidad) {
                $builder->where('capacidad >=', $capacidad);
            }
    
            if ($camas) {
                $builder->where('camas >=', $camas);
            }
    
            if ($baños) {
                $builder->where('baños >=', $baños);
            }
    
            if ($precio) {
                $builder->where('precio <=', $precio);
            }
            if($disponibilidad) {
                if($disponibilidad == 'on') {
                    $disponibilidad = 1;
                } else {
                    $disponibilidad = 0; 
                }
                $builder->where('disponibilidad', $disponibilidad);
            }
            $query = $builder->get();
            $habitaciones = $query->getResult();
        } else {
            $habitaciones = $habitacionModel->findAll();
        }

        return $this->response->setJSON(['habitaciones' => $habitaciones]);
    }

    public function getHabitacionesIndex()
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

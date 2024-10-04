<?php

namespace App\Controllers;

use App\Models\HabitacionModel;
use App\Models\ReservaModel;

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
        $tipo = $this->request->getGet('tipo');
        
        if ($fecha_inicio && $fecha_fin) {
            if ($capacidad) {
                $builder->where('habitaciones.capacidad >=', $capacidad);
            }
    
            if ($camas) {
                $builder->where('habitaciones.camas >=', $camas);
            }
    
            if ($baños) {
                $builder->where('habitaciones.baños >=', $baños);
            }
    
            if ($precio) {
                $builder->where('habitaciones.precio <=', $precio);
            }
            if ($tipo) {
                if($tipo== 1){
                    $tipo = 'individual';
                }else if ($tipo == 2){
                    $tipo = 'doble';
                }else if ($tipo == 3){
                    $tipo = 'suite';
                }else if ($tipo == 4){
                    $tipo = 'lujo';
                }else {
                    $tipo = 'individual';
                }
                    
                $builder->where('habitaciones.tipo', $tipo);
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

            $habitaciones_filtradas = [];

            foreach ($habitaciones as $habitacion) {
                $reservas = $db->table('reservas')
                                ->where('id_habitacion', $habitacion->id)
                                ->get()
                                ->getResult();
        

                if (empty($reservas)) {
                    $habitaciones_filtradas[] = $habitacion;
                    continue;
                }
        
                $disponible = true;
                foreach ($reservas as $reserva) {
                    if (!($fecha_inicio < $reserva->fecha_inicio && $fecha_fin < $reserva->fecha_inicio) ||
                    !($fecha_inicio > $reserva->fecha_fin && $fecha_fin > $reserva->fecha_fin)) {
                        $disponible = false;
                        break;
                    }
                }
        
                if ($disponible) {
                    $habitaciones_filtradas[] = $habitacion;
                }
            }
        
            $habitaciones = $habitaciones_filtradas;
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


        foreach ($habitacionesPorTipo as &$habitaciones) {
            foreach ($habitaciones as &$habitacion) {
                $idHabitacion = $habitacion['id'];
                $urlFoto = "img/{$habitacion['tipo']}/{$idHabitacion}/1.png";
                $habitacion['url_foto'] = $urlFoto;
            }
        }

        return $this->response->setJSON($habitacionesPorTipo);
    }

    
}

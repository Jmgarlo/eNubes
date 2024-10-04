<?php

namespace App\Models;

use CodeIgniter\Model;

class HabitacionModel extends Model
{
    protected $table = 'habitaciones';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'codigo',
        'nombre',
        'descripcion',
        'camas',
        'baños',
        'tipo',
        'precio',
        'imagen',
        'disponibilidad'
    ];

    public function getPrecioHabitacion($id) {
        $habitacion = $this->find($id);
        return $habitacion['precio'];
    }

    public function getNombreHabitacion($id) {
        $habitacion = $this->find($id);
        return $habitacion['nombre'];
    }

    public function getHabitacion($id) {
        $habitacion = $this->find($id);
        return $habitacion;
    }

}
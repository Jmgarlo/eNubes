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
        'tipo',
        'precio',
        'imagen',
        'disponibilidad'
    ];
}
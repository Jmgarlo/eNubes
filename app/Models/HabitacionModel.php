<?php

namespace App\Models;

use CodeIgniter\Model;

class HabitacionModel extends Model
{
    protected $table = 'habitaciones';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'nombre',
        'descripcion',
        'precio',
        'tipo',
        'disponibilidad'
    ];
}
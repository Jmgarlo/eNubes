<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoHabitacionModel extends Model
{
    protected $table = 'foto_habitaciones';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'id_habitacion',
        'url_foto',
    ];
}
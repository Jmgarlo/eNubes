<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservaModel extends Model
{
    protected $table = 'reservas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_usuario', 'fecha_inicio', 'fecha_fin','id_habitacion','localizador'];
}

?>
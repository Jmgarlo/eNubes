<?php

namespace App\Models;

use CodeIgniter\Model;

class ValoracionModel extends Model
{
    protected $table = 'valoraciones';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_habitacion', 'comentarios', 'valoracion','id_usuario'];
}

?>
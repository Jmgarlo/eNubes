<?php

namespace App\Models;

use CodeIgniter\Model;

class EstadoModel extends Model
{
    protected $table = 'estados_reserva';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_estado','descripcion','clase'];

    public function getEstadoById($estadoId)
    {
        return $this->asArray()->where(['id' => $estadoId])->first();
    }
}

?>
<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','apellido', 'pais','telefono', 'email', 'password'];

    public function getUserById($userId)
    {
        return $this->asArray()->where(['id' => $userId])->first();
    }

    


}

?>
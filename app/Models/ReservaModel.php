<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservaModel extends Model
{
    protected $table = 'reservas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_usuario', 'fecha_inicio', 'fecha_fin', 'id_habitacion', 'localizador', 'id_transaccion', 'tarjeta4digitos', 'id_estado'];

    public function getReservesById($userId)
    {
        return $this->asArray()->where(['id_usuario' => $userId])->findAll();
    }

    public function getReserveById($reservaId)
    {
        return $this->asArray()->where(['id' => $reservaId])->first();
    }
    public function getReserveByLocalizador($reservaLocalizador)
    {
        return $this->asArray()->where(['localizador' => $reservaLocalizador])->first();
    }

    public function getReservasParaActualizar()
    {
        return $this->whereIn('id_estado', [2, 3, 4])
            ->findAll();
    }

    public function getReservasFinalizadas()
    {
        $today = date('Y-m-d');
        return $this->where('fecha_fin', $today)
            ->where('id_estado', 5)
            ->findAll();
    }

    public function actualizarEstadoReserva($id, $nuevoEstado)
    {
        $data = [
            'id_estado' => $nuevoEstado
        ];
        return $this->update($id, $data);
    }
}

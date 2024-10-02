<?php

namespace App\Controllers;

use App\Models\ReservaModel;

class ReservasController extends BaseController
{
    public function index()
    {

        return view('reservas/confirmacion');
    }

    public function resumen()
    {
        $session = session();
        $id_usuario = $session->get('user_id');
        $id_habitacion = $this->request->getPost('id_habitacion');
        $fecha_inicio = $this->request->getPost('fecha_inicio');
        $fecha_fin = $this->request->getPost('fecha_fin');

        $codigoReserva = strtoupper(bin2hex(random_bytes(8 / 2)));

        $data = [
            'id_usuario' => $id_usuario,
            'id_habitacion' => $id_habitacion,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'localizador' => $codigoReserva,
        ];

        return $this->response->setJSON(['codigoReserva' => $codigoReserva]);
        return view('reservas/confirmacion', $data);
    }

    public function confirmar() 
    {
        $reserva = new ReservaModel();
        $session = session();
        $id_usuario = $session->get('user_id');
        $id_habitacion = $this->request->getPost('id_habitacion');
        $fecha_inicio = $this->request->getPost('fecha_inicio');
        $fecha_fin = $this->request->getPost('fecha_fin');
        $codigoReserva = strtoupper(bin2hex(random_bytes(8 / 2)));
        $data = [
            'id_usuario' => $id_usuario,
            'id_habitacion' => $id_habitacion,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'localizador' => $codigoReserva,
        ];

        $reserva->save($data);

        // Retornar la respuesta
        return $this->response->setJSON(['codigoReserva' => $codigoReserva]);
    }

    public function delete()
    {

        echo "Confirmación de reserva";
    }
}
?>
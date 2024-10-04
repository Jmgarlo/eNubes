<?php

namespace App\Controllers;

use App\Models\ReservaModel;
use App\Models\HabitacionModel;
use App\Models\UsuarioModel;
use App\Models\EstadoModel;
use CodeIgniter\I18n\Time;

class ReservasController extends BaseController
{
    public function __construct()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->send();
        }
    }

    public function resumen()
    {
        $session = session();
        $id_habitacion = $this->request->getGet('id_habitacion');
        $fecha_inicio = $this->request->getGet('fecha_inicio');
        $fecha_fin = $this->request->getGet('fecha_fin');


        $codigoReserva = strtoupper(bin2hex(random_bytes(8 / 2)));

        $session->set('id_habitacion', $id_habitacion);
        $session->set('fecha_inicio', $fecha_inicio);
        $session->set('fecha_fin', $fecha_fin);
        $session->set('localizador', $codigoReserva);

        $responseJSON= ['success' => false, 'message' => 'Reserva no válida'];

        if($id_habitacion && $fecha_inicio && $fecha_fin && $codigoReserva) {
            $responseJSON= ['success' => true, 'message' => 'Reserva aceptada'];
        }

        return $this->response->setJSON($responseJSON);
    }

    public function confirmar() 
    {
        $session = session();

        $id_usuario = $session->get('user_id');
        $id_habitacion = session()->get('id_habitacion');
        $fecha_inicio = session()->get('fecha_inicio');
        $fecha_fin = session()->get('fecha_fin');

        $inicio = new Time($fecha_inicio);
        $fin = new Time($fecha_fin);
        $diferenciaDias = $inicio->diff($fin)->days;
        $habitacion = new HabitacionModel();
        $precioDia = $habitacion->getPrecioHabitacion($id_habitacion);
        $nombreHabitacion = $habitacion->getNombreHabitacion($id_habitacion);
        $precioTotal = $diferenciaDias * $precioDia;

        $data = [
            'id_usuario' => $id_usuario,
            'id_habitacion' => $id_habitacion,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'localizador' => $session->get('localizador'),
            'precioDia' => $precioDia,
            'precioTotal' => $precioTotal,
            'nombre' => $nombreHabitacion,
            'dias' => $diferenciaDias,
        ];

        return view('reservas/confirmacion', $data);
    }

    public function detalles()
    {
        $idReserva = $this->request->getGet('id_reserva');

        $session = session();
        $session->set('id_reserva', $idReserva);

        $responseJSON= ['success' => false, 'message' => 'No se ha podido obtener la reserva'];

        if($idReserva ) {
            $responseJSON= ['success' => true, 'message' => 'Reserva obtenida'];
        }

        return $this->response->setJSON($responseJSON);

    }

    public function actualizar()
    {

        $session = session();
        $id_reserva = $session->get('id_reserva');
        $reservaModel = new ReservaModel();
        $reserva = $reservaModel->getReserveById($id_reserva);

        $estadoModel = new EstadoModel();
        $estado = $estadoModel->getEstadoById($reserva['id_estado']);

        $habitacionModel = new HabitacionModel();
        $habitacion = $habitacionModel->getHabitacion($reserva['id_habitacion']);

        $inicio = new Time($reserva['fecha_inicio']);
        $fin = new Time($reserva['fecha_fin']);
        $diferenciaDias = $inicio->diff($fin)->days;
        $precioDia = $habitacion['precio'];
        $precioTotal = $diferenciaDias * $precioDia;


        $data = [
            'id_reserva' => $reserva['id'],
            'id_usuario' => $reserva['id_usuario'],
            'id_habitacion' => $reserva['id_habitacion'],
            'fecha_inicio' => $reserva['fecha_inicio'],
            'fecha_fin' => $reserva['fecha_fin'],
            'localizador' => $reserva['localizador'],
            'precioDia' => $precioDia,
            'precioTotal' => $precioTotal,
            'nombre' => $habitacion['nombre'],
            'dias' => $diferenciaDias,
            'nombre_estado' => $estado['nombre_estado'],
            'id_estado' => $reserva['id_estado'],
            'descripcion' => $estado['descripcion'],
            'clase' => $estado['clase'],
        ];

        return view('reservas/actualizacion', $data);
    }

    public function pagar() 
    {
        $session = session();
        $id_usuario = $session->get('user_id');
        $cardNumber = substr($this->request->getPost('cardNumber'), 12);
        $id_estado = substr($this->request->getPost('id_estado'), 12);

        $reservaModel = new ReservaModel();
        $action = $this->request->getPost('action');
        $data = [];
        if($action && $action == 'actualizar') {
            $localizador = $this->request->getPost('localizador');
            $reserva = $reservaModel->getReserveByLocalizador($localizador);
            $data = [
                'id_estado' => 3,
                'tarjeta4digitos' => 'XXXX-XXXX-XXXX-'.$cardNumber,
            ];
            $reservaModel->update($reserva['id'], $data);
        } else {
            $transactionId = strtoupper(bin2hex(random_bytes(30)));
            $data = [
                'id_usuario' => $id_usuario,
                'id_habitacion' => $session->get('id_habitacion'),
                'fecha_inicio' => $session->get('fecha_inicio'),
                'fecha_fin' => $session->get('fecha_fin'),
                'localizador' => $session->get('localizador'),
                'id_transaccion' => $transactionId,
                'tarjeta4digitos' => 'XXXX-XXXX-XXXX-'.$cardNumber,
                'id_estado' => $id_estado,
            ];
            $reservaModel->save($data);
        }

        $userModel = new UsuarioModel();
        $userId = session()->get('user_id');
        $user = $userModel->getUserById($userId);

        return view('userprofile/perfil', ['user' => $user]);
    }

}
?>
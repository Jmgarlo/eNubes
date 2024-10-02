<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Services\EmailService;

class PerfilController extends BaseController
{
    public function index()
    {

        $userModel = new UsuarioModel();
        $userId = session()->get('user_id');
        $user = $userModel->getUserById($userId);

        return view('userprofile/perfil', ['user' => $user]);
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
    
            $validation->setRules([
                'nombre' => 'required',
                'apellido' => 'required',
                'pais' => 'required',
                'telefono' => 'required',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[12]|regex_match[/[A-Z]/]|regex_match[/[a-z]/]|regex_match[/[0-9]/]|regex_match[/[\W_]/]',
            ]);
    
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => $validation->getErrors()
                ]);
            }
            $userModel = new UsuarioModel();
            $id = session()->get('user_id');
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $pais = $this->request->getPost('pais');
            $telefono = $this->request->getPost('telefono');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $nombreCompleto = $nombre . ' ' . $apellido;
    
            $data = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'pais' => $pais,
                'telefono' => $telefono,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];
    
            $userModel->update($id, $data);

            $emailService = new EmailService();

            $emailService->updateAccountEmail($email, $nombreCompleto);

            $responseJSON = [
                'success' => true,
                'message' => '¡Perfil actualizado correctamente!',
                'redirect' => '/perfil'
            ];
    
            $session = session();
            $session->set([
                'email' => $email,
                'nombre' => $nombre,
            ]);
    
            return $this->response->setJSON($responseJSON);
            
            return $this->response->setJSON($responseJSON);
        }
    
        return $this->response->setJSON(['success' => false, 'message' => 'Error en la solicitud']);
    }


    public function delete() {
        if ($this->request->isAJAX()) {
            $userModel = new UsuarioModel();
            $id = session()->get('user_id');


            $user = $userModel->find($id);
            
            if ($user) {
                $userModel->delete($id);
    
                $emailService = new EmailService();
                $emailService->deleteAccountEmail($user['email'], $user['nombre']);
    
                session()->destroy();
    
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Cuenta eliminada con éxito.'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No se pudo encontrar el usuario.'
                ]);
            }
        }
    
        return $this->response->setJSON(['success' => false, 'message' => 'Error en la solicitud.']);
    }
}

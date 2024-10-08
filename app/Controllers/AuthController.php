<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
use App\Services\EmailService;

class AuthController extends BaseController
{

    public function register()
    {
        return view('auth/register');
    }


    public function processRegister()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
    
            $validation->setRules([
                'nombre' => 'required',
                'apellido' => 'required',
                'pais' => 'required',
                'telefono' => 'required',
                'email' => 'required|valid_email',
            ]);
    
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => $validation->getErrors()
                ]);
            }
            $userModel = new UsuarioModel();
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $pais = $this->request->getPost('pais');
            $telefono = $this->request->getPost('telefono');
            $email = $this->request->getPost('email');

            $nombreCompleto = $nombre . ' ' . $apellido;
    
            $data = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'pais' => $pais,
                'telefono' => $telefono,
                'email' => $email,
            ];
    
            $userModel->save($data);

            $emailService = new EmailService();

            $emailSend = $emailService->sendWelcomeEmail($email, $nombreCompleto);

            $responseJSON = [
                'success' => true,
                'message' => '¡Enhorabuena, te has registrado y se envió el correo de bienvenida!',
                'redirect' => '/' 
            ];
    
            if (!$emailSend) {
                $responseJSON = [
                    'success' => false,
                    'message' => '¡Enhorabuena, te has registrado pero no se envió el correo de bienvenida!'
                ];
            }
            
            if($responseJSON['success']) {
                $user = $userModel->where('email', $email)->first();
                $session = session();
                $session->set([
                    'user_id' => $user['id'],
                    'email' => $user['email'],
                    'nombre' => $user['nombre'],
                    'logged_in' => true,
                ]);
            }
            
            return $this->response->setJSON($responseJSON);
        }
    
        return $this->response->setJSON(['success' => false, 'message' => 'Error en la solicitud']);
    }


    public function login()
    {
        return view('/auth/login');
    }


    public function processLogin()
    {
        if ($this->request->isAJAX()) {
            $session = session();
            $validation = \Config\Services::validation();
    
            $validation->setRules([
                'email' => 'required|valid_email',
                'password' => 'required',
            ]);
    
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => $validation->getErrors()
                ]);
            }
    
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
    
            $userModel = new UsuarioModel();
            $user = $userModel->where('email', $email)->first();

            $responseJSON = [
                'success' => false,
                'message' => '',
            ];
    
            if ($user) {

                if (password_verify($password, $user['password'])) {

                    $session->set([
                        'user_id' => $user['id'],
                        'user_name' => $user['nombre'],
                        'logged_in' => true,
                    ]);
                    $responseJSON['success'] = true;
                    $responseJSON['message'] = 'Inicio de sesión exitoso';
                    $responseJSON['redirect'] = '/';
                } else {
                    $responseJSON['message'] = 'Credenciales incorrectas. Por favor, revisa tu correo y contraseña.';
                }
            } else {
                $responseJSON['message'] = 'El correo electrónico no está registrado.';

            }

            return $this->response->setJSON($responseJSON);
        }
    
        return $this->response->setJSON(['success' => false, 'message' => 'Solicitud no válida']);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/')->with('success', 'Has cerrado sesión.');
    }
    
}

?>
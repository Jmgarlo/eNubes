<?php

namespace App\Controllers;
use App\Models\UsuarioModel; // El modelo de usuarios
use CodeIgniter\Controller;

class AuthController extends Controller
{
    // Muestra el formulario de registro
    public function register()
    {
        return view('register');
    }

    // Procesa el registro
    public function processRegister()
    {
        $validation = \Config\Services::validation();

        // Validar los datos
        $validation->setRules([
            'nombre' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[usuarios.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Guardar el usuario
        $usuarioModel = new UsuarioModel();
        $usuarioModel->save([
            'nombre' => $this->request->getPost('nombre'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'),  PASSWORD_ARGON2I)
        ]);

        return redirect()->to('/login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }

    // Muestra el formulario de inicio de sesión
    public function login()
    {
        return view('login');
    }

    // Procesa el inicio de sesión
    public function processLogin()
    {
        $usuarioModel = new UsuarioModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $usuario = $usuarioModel->where('email', $email)->first();
        // Verifica si el usuario existe y la contraseña es correcta
        if ($usuario && password_verify($password, $usuario['password'])) {
            // Iniciar sesión (guardar en la sesión)
            session()->set([
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'email' => $usuario['email'],
                'password' => $usuario['password'],
                'logged_in' => true,
            ]);

            return redirect()->to('/')->with('success', 'Sesión iniciada con éxito.');
        } else {

            return redirect()->back()->withInput()->with('error', 'Correo o contraseña incorrectos.');
        }
    }

    // Cerrar sesión
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Has cerrado sesión.');
    }
    
}

?>
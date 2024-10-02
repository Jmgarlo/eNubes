<?php

namespace App\Services;

use CodeIgniter\Email\Email;
use Config\App;

class EmailService
{

    public function sendReserveEmail($toEmail, $name)
    {
        $email = new Email();
        $email->setFrom(getenv('SMTP_USER'), 'Tu Nombre o Empresa');
        $email->setTo($toEmail);
        $email->setSubject('Bienvenido a Nuestro Servicio');
        $email->setMessage("Hola $name,\n\n¡Gracias por registrarte en nuestro servicio! Estamos encantados de tenerte con nosotros.");

        if (!$email->send()) {
            // Manejo de errores
            log_message('error', 'No se pudo enviar el correo a ' . $toEmail . ': ' . $email->printDebugger());
        }
    }

    public function sendCancelEmail($toEmail, $name)
    {
        $email = service('email');

        $email->setFrom('your@example.com', 'Your Name');
        $email->setTo($toEmail);
        $email->setCC('another@another-example.com');
        $email->setBCC('them@their-example.com');

        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');

        $email->send();

        
        $email->setFrom(getenv('SMTP_USER'), 'Tu Nombre o Empresa');
        $email->setTo($toEmail);
        $email->setSubject('Bienvenido a Nuestro Servicio');
        $email->setMessage("Hola $name,\n\n¡Gracias por registrarte en nuestro servicio! Estamos encantados de tenerte con nosotros.");

        if (!$email->send()) {
            // Manejo de errores
            log_message('error', 'No se pudo enviar el correo a ' . $toEmail . ': ' . $email->printDebugger());
        }
    }

    public function sendWelcomeEmail($toEmail, $toName) {

        $config = new App();

        $baseURL = $config->baseURL;
        $profileUrl = $baseURL . 'perfil';

        $email = service('email');
        $email->setMailType('html');
        $email->setFrom('juanma.servicios@gmail.com', 'Hotel eNubes');
        $email->setTo($toEmail);
        $email->setSubject('Bienvenido a Hotel eNubes');
        $email->setMessage('
    <html>
    <head>
        <title>Bienvenido a Nuestro Servicio</title>
        <style>
            .button {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <h1>Hola ' . $toName . ',</h1>
        <p>¡Gracias por registrarte en nuestro servicio! Estamos encantados de tenerte con nosotros.</p>
        <p>Completa ahora tu perfil para poder pedir tu primera reserva!</p>
        <a href="'.$profileUrl.'" class="button">Completar perfil</a>
    </body>
    </html>
');

        $email->send();

        if (!$email->send()) {
            // Manejar el error aquí
            return $email->printDebugger(['headers']);
        }

        return true;
    }
}
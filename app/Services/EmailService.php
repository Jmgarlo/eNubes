<?php

namespace App\Services;

use CodeIgniter\Email\Email;
use Config\App;

class EmailService
{

    public function sendWelcomeEmail($toEmail, $toName)
    {

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
                <p>Para completar tu registro, por favor edita tu perfil y establece una contraseña</p>
                <a href="' . $profileUrl . '" class="button">Completar perfil</a>
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

    public function updateAccountEmail($toEmail, $toName)
    {
        $config = new App();

        $email = service('email');
        $email->setMailType('html');
        $email->setFrom('juanma.servicios@gmail.com', 'Hotel eNubes');
        $email->setTo($toEmail);
        $email->setSubject('Perfil actualizado');
        $email->setMessage('
            <html>
            <head>
                <title>Has actualizado tu perfil</title>
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
                <p>Se han actualizado los datos de tu perfil con éxito.</p>

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

    public function deleteAccountEmail($toEmail, $toName)
    {
        $config = new App();

        $email = service('email');
        $email->setMailType('html');
        $email->setFrom('juanma.servicios@gmail.com', 'Hotel eNubes');
        $email->setTo($toEmail);
        $email->setSubject('Cuenta eliminada');
        $email->setMessage('
            <html>
            <head>
                <title>Has eliminado tu cuenta</title>
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
                <p>Se ha eliminado tu cuenta con éxito.</p>

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

    public function confirmReserveEmail($toEmail, $toName)
    {

        $config = new App();

        $baseURL = $config->baseURL;
        $profileUrl = $baseURL . 'perfil';

        $email = service('email');
        $email->setMailType('html');
        $email->setFrom('juanma.servicios@gmail.com', 'Hotel eNubes');
        $email->setTo($toEmail);
        $email->setSubject('Reserva realizada');
        $email->setMessage('
            <html>
            <head>
                <title>Confirmación de reserva</title>
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
                <p>Para completar tu registro, por favor edita tu perfil y establece una contraseña</p>
                <a href="' . $profileUrl . '" class="button">Completar perfil</a>
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

    public function updateReserveEmail($toEmail, $toName)
    {

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
                <p>Para completar tu registro, por favor edita tu perfil y establece una contraseña</p>
                <a href="' . $profileUrl . '" class="button">Completar perfil</a>
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

    public function cancelReserveEmail($toEmail, $toName)
    {

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
                <p>Para completar tu registro, por favor edita tu perfil y establece una contraseña</p>
                <a href="' . $profileUrl . '" class="button">Completar perfil</a>
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

    public function reminderReserveEmail($toEmail, $toName)
    {

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
                <p>Para completar tu registro, por favor edita tu perfil y establece una contraseña</p>
                <a href="' . $profileUrl . '" class="button">Completar perfil</a>
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

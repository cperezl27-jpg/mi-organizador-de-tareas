<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function registro()
    {
        return view('header')
             . view('registro')
             . view('footer');
    }

    public function procesarRegistro()
    {
        $usuarioModel = new UsuarioModel();

        $password = $this->request->getPost('password');
        $repeatPassword = $this->request->getPost('repeat_password');

        if ($password !== $repeatPassword) {
            return redirect()->back()->with('error', 'Las contraseñas no coinciden.');
        }

        $usuarioModel->insert([
            'nombre'   => $this->request->getPost('nombre'),
            'correo'   => $this->request->getPost('correo'),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'activo'   => 1,
            'es_admin' => 0
        ]);

        return redirect()->to(site_url('login'))->with('success', 'Registro exitoso. Por favor inicia sesión.');
    }

    public function login()
    {
        return view('header')
             . view('login')
             . view('footer');
    }

    public function procesarLogin()
    {
        $session = session();
        $usuarioModel = new UsuarioModel();

        $correo = $this->request->getPost('correo');
        $password = $this->request->getPost('password');
        $remember = $this->request->getPost('remember');

        $usuario = $usuarioModel->where('correo', $correo)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            if (!$usuario['activo']) {
                return redirect()->back()->with('error', 'Tu cuenta está desactivada.');
            }

            if ($remember) {
                $session->markAsTempdata(['isLoggedIn'], 1209600);
            }

            $sessionData = [
                'id_usuario' => $usuario['id'],
                'nombre'     => $usuario['nombre'],
                'correo'     => $usuario['correo'],
                'es_admin'   => $usuario['es_admin'],
                'isLoggedIn' => true,
            ];

            $session->set($sessionData);
            return redirect()->to(site_url('/'))->with('success', 'Bienvenido de nuevo, ' . $usuario['nombre']);
        }

        return redirect()->back()->with('error', 'Correo o contraseña incorrectos.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('/'))->with('success', 'Sesión cerrada correctamente.');
    }

    public function forgotPassword()
    {
        return view('header')
             . view('forgot_password')
             . view('footer');
    }

    public function procesarForgotPassword()
    {
        $usuarioModel = new UsuarioModel();
        $correo = $this->request->getPost('correo');

        $usuario = $usuarioModel->where('correo', $correo)->first();

        return redirect()->to(site_url('login'))->with('success', lang('Textos.password_reset_success'));
    }
}

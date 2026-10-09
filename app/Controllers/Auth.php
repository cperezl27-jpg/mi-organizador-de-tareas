<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function registro(): string
    {
        return view('header')
             . view('registro')
             . view('footer');
    }

    public function procesarRegistro()
    {
        $usuarioModel = new UsuarioModel();

        $datos = [
            'nombre'   => $this->request->getPost('nombre'),
            'correo'   => $this->request->getPost('correo'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'activo'   => 1,
            'es_admin' => 0
        ];

        $usuarioModel->insert($datos);

        return redirect()->to(site_url('login'));
    }

    public function login(): string
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

        $usuario = $usuarioModel->where('correo', $correo)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            $session->set([
                'id_usuario' => $usuario['id'],
                'nombre'     => $usuario['nombre'],
                'isLoggedIn' => true
            ]);
            return redirect()->to(site_url('/'));
        }

        return redirect()->back()->with('error', 'Credenciales incorrectas');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}

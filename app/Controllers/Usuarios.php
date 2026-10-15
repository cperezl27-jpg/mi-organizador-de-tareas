<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
    private function verificarAdmin()
    {
        if (!session()->get('es_admin')) {
            return redirect()->to(site_url('/'))->send();
        }
    }

    public function index()
    {
        $this->verificarAdmin();

        $usuarioModel = new UsuarioModel();
        $orden = $this->request->getGet('orden') === 'older' ? 'ASC' : 'DESC';
        
        $data['usuarios'] = $usuarioModel->orderBy('creado_en', $orden)->findAll();

        return view('header')
             . view('usuarios/index', $data)
             . view('footer');
    }

    public function nuevo(): string
    {
        $this->verificarAdmin();

        return view('header')
             . view('usuarios/nuevo')
             . view('footer');
    }

    public function guardar()
    {
        $this->verificarAdmin();

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

        return redirect()->to(site_url('usuarios'))->with('success', 'Usuario creado correctamente.');
    }

    public function detalle($id)
    {
        $this->verificarAdmin();

        $usuarioModel = new UsuarioModel();
        $data['usuario'] = $usuarioModel->find($id);

        if (!$data['usuario']) {
            return redirect()->to(site_url('usuarios'));
        }

        return view('header')
             . view('usuarios/detalle', $data)
             . view('footer');
    }

    public function editar($id)
    {
        $this->verificarAdmin();

        $usuarioModel = new UsuarioModel();
        $data['usuario'] = $usuarioModel->find($id);

        if (!$data['usuario']) {
            return redirect()->to(site_url('usuarios'));
        }

        return view('header')
             . view('usuarios/editar', $data)
             . view('footer');
    }

    public function actualizar($id)
    {
        $this->verificarAdmin();

        $usuarioModel = new UsuarioModel();
        
        $datos = [
            'nombre'   => $this->request->getPost('nombre'),
            'correo'   => $this->request->getPost('correo'),
            'activo'   => $this->request->getPost('activo') ? 1 : 0,
            'es_admin' => $this->request->getPost('es_admin') ? 1 : 0
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $repeatPassword = $this->request->getPost('repeat_password');
            if ($password !== $repeatPassword) {
                return redirect()->back()->with('error', 'Las contraseñas no coinciden.');
            }
            $datos['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $usuarioModel->update($id, $datos);

        return redirect()->to(site_url('usuarios/' . $id))->with('success', 'Usuario actualizado correctamente.');
    }

    public function eliminar($id)
    {
        $this->verificarAdmin();

        $usuarioModel = new UsuarioModel();
        
        // Evitar que el admin se borre a sí mismo
        if ($id == session()->get('id_usuario')) {
            return redirect()->to(site_url('usuarios'))->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        $usuarioModel->delete($id);

        return redirect()->to(site_url('usuarios'))->with('success', 'Usuario eliminado correctamente.');
    }
}

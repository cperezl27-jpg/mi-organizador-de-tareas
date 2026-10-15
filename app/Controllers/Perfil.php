<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Perfil extends BaseController
{
    public function index(): string
    {
        $usuarioModel = new UsuarioModel();
        $data['usuario'] = $usuarioModel->find(session()->get('id_usuario'));

        return view('header')
             . view('perfil/index', $data)
             . view('footer');
    }

    public function confirmarPassword(): string
    {
        return view('header')
             . view('perfil/confirmar_password')
             . view('footer');
    }

    public function procesarConfirmacionPassword()
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find(session()->get('id_usuario'));
        $passwordInput = $this->request->getPost('password');

        if (password_verify($passwordInput, $usuario['password'])) {
            session()->setFlashdata('perfil_autorizado', true);
            return redirect()->to(site_url('perfil/editar'));
        }

        return redirect()->back()->with('error', 'Contraseña incorrecta.');
    }

    public function editar()
    {
        if (!session()->getFlashdata('perfil_autorizado')) {
            return redirect()->to(site_url('perfil/confirmar-password'));
        }

        session()->keepFlashdata('perfil_autorizado');

        $usuarioModel = new UsuarioModel();
        $data['usuario'] = $usuarioModel->find(session()->get('id_usuario'));

        return view('header')
             . view('perfil/editar', $data)
             . view('footer');
    }

    public function actualizar()
    {
        $usuarioModel = new UsuarioModel();
        $idUsuario = session()->get('id_usuario');

        $nombre = $this->request->getPost('nombre');
        $correo = $this->request->getPost('correo');

        $usuarioModel->update($idUsuario, [
            'nombre' => $nombre,
            'correo' => $correo
        ]);

        session()->set('nombre', $nombre);

        return redirect()->to(site_url('perfil'))->with('success', 'Perfil actualizado correctamente.');
    }

    public function cambiarPassword(): string
    {
        return view('header')
             . view('perfil/cambiar_password')
             . view('footer');
    }

    public function actualizarPassword()
    {
        $usuarioModel = new UsuarioModel();
        $idUsuario = session()->get('id_usuario');
        $usuario = $usuarioModel->find($idUsuario);

        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $repeatPassword = $this->request->getPost('repeat_password');

        if (!password_verify($currentPassword, $usuario['password'])) {
            return redirect()->back()->with('error', 'La contraseña actual no es correcta.');
        }

        if ($newPassword !== $repeatPassword) {
            return redirect()->back()->with('error', 'Las nuevas contraseñas no coinciden.');
        }

        $usuarioModel->update($idUsuario, [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ]);

        return redirect()->to(site_url('perfil'))->with('success', 'Contraseña actualizada correctamente.');
    }

    public function cambiarImagen(): string
    {
        return view('header')
             . view('perfil/cambiar_imagen')
             . view('footer');
    }

    public function actualizarImagen()
    {
        $imagen = $this->request->getFile('foto');

        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move(FCPATH . 'uploads/perfil', $nuevoNombre);

            $usuarioModel = new UsuarioModel();
            $usuarioModel->update(session()->get('id_usuario'), ['foto' => $nuevoNombre]);

            return redirect()->to(site_url('perfil'))->with('success', 'Imagen de perfil actualizada.');
        }

        return redirect()->back()->with('error', 'Error al subir la imagen.');
    }

    public function confirmarEliminarImagen(): string
    {
        return view('header')
             . view('perfil/eliminar_imagen')
             . view('footer');
    }

    public function eliminarImagen()
    {
        $usuarioModel = new UsuarioModel();
        $idUsuario = session()->get('id_usuario');
        $usuario = $usuarioModel->find($idUsuario);

        if ($usuario['foto'] && file_exists(FCPATH . 'uploads/perfil/' . $usuario['foto'])) {
            unlink(FCPATH . 'uploads/perfil/' . $usuario['foto']);
        }

        $usuarioModel->update($idUsuario, ['foto' => null]);

        return redirect()->to(site_url('perfil'))->with('success', 'Imagen de perfil eliminada.');
    }
}

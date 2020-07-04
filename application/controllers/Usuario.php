<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }

    public function usuario()
    {
        $data['Usuarios'] = $this->User_model->obtenerUsuarios();
        $this->loadView('Usuario', '/form/usuarios/usuario', $data);
    }
    public function ingresarUsuario()
    {
        $this->form_validation->set_rules('username', 'Nombre de usuario', 'trim|required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Contrasena de usuario', 'trim|required');
        $this->form_validation->set_rules('privilegios', 'Privilegios de usuario', 'trim|required');
        $this->form_validation->set_rules('nombre', 'Nombre de usuario', 'trim|required');
        $this->form_validation->set_rules('apellidos', 'Apellidos de usuario', 'trim|required');
        $this->form_validation->set_rules('CI', 'Numero de documento de identidad', 'trim|required');

        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $privilegios = $this->input->post('privilegios');
            $nombre = $this->input->post('nombre');
            $apellidos = $this->input->post('apellidos');
            $CI = $this->input->post('CI');

            $datos = array(
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'privilegios' => $privilegios,
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'CI' => $CI,
            );
            $respuesta = $this->User_model->registration_insert($datos);
            if ($respuesta > 0) {
                $respuesta = array(
                    'respuesta' => 'Exitoso',
                    'datos' => array(
                        'ID_user' => $respuesta,
                        'username' => $username,
                        'privilegios' => $privilegios,
                        'nombre' => $nombre,
                        'apellidos' => $apellidos,
                        'CI' => $CI,
                    ),
                );
            } else {
                $respuesta = array(
                    'tipo'      => 'Formulario',
                    'respuesta' => 'Error al ingresar los datos a la base de datos!',
                );
            }
        } else {
            $error = form_error('username');
            $respuesta = array(
                'tipo'      => 'Formulario',
                'respuesta' => 'Error de validacion' . ' ' . $error,
            );
        }
        echo json_encode($respuesta);
    }
}

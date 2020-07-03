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
        $this->loadView('Usuario','/form/usuarios/usuario',$data);
    }
}
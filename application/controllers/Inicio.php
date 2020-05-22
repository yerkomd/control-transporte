<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends BaseController
{
	function __construct()
	{
		parent::__construct();
	}


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function login()
	{
		$this->load->view('login');
	}

	public function index()
	{
		$datos['balance_camiones'] = $this->Reportes_model->Balance_camiones_gestion_actual();
		$datos['comision'] = $this->Reportes_model->ingreso_comisiones_gestion_actual();
		$datos['CuentasPorPagar'] = $this->Reportes_model->CuentasPorPagar();
		$datos['CuentasPorCobrar'] = $this->Reportes_model->CuentasPorCobrar();
		$datos['Balance'] = (float) $datos['CuentasPorCobrar'] - (float) $datos['CuentasPorPagar'];
		$this->loadView('inicio', 'inicio', $datos);
	}
}

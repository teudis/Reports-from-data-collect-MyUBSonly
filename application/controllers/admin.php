<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function index()
	{
		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {
			$fecha = unix_to_human(now());
			$dia = explode(" ",$fecha);
			$eliminados_hoy = $this->muser->remove_today($dia[0]);
			$copiados_hoy = $this->muser->copy_today($dia[0]);
			$modificados_hoy = $this->muser->modified_today($dia[0]);
            $data['eliminados_hoy']= $eliminados_hoy;
            $data['copiados_hoy']= $copiados_hoy;
            $data['modificados_hoy']= $modificados_hoy;
			$this->load->view("admindashboard",$data);
		}
		else
			redirect('/welcome/', 'refresh');
	}

    public function top()
    {
		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {
			$datos = $this->musb->get_top_file();
			$data['title'] = "TOP EXTENSIONES";
			$data['resultados'] = $datos;

			$this->load->view('top_file', $data);
		}
		else
			redirect('/welcome/', 'refresh');
    }

	public  function buscador()
	{
		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {
			$this->load->view('buscador');
		}
		else
			redirect('/welcome/', 'refresh');

	}

	public function insertadas()
	{
		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {
			$datos = $this->musb->flash_inserted();
			$data['title'] = "Flash Insertadas";
			$data['resultados'] = $datos;

			$this->load->view('all_flash', $data);
		}
		else
		{
			redirect('/welcome/', 'refresh');

		}

	}


	public function buscar()
	{

		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {
			$usuario = $this->input->post('usuario');
			$accion = $this->input->post('accion');
			$tipo = $this->input->post('tipo');
			$pc = $this->input->post('pc');

			if ($usuario != "" && $accion == "nada" && $pc == "" && $tipo == "nada") {
				$resultado = $this->muser->get_by_user($usuario);
				$data['title'] = "Buscar Usuario";
				$data['resultados'] = $resultado;

				$this->load->view('search_all', $data);
			} else
				if ($usuario != "" && $pc != "" && $accion == "nada" && $tipo == "nada") {
					echo $accion;

					$resultado = $this->muser->get_user_pc($usuario, $pc);
					$data['title'] = "Buscar PC & Usuario";
					$data['resultados'] = $resultado;

					$this->load->view('search_all', $data);


				} elseif ($usuario != "" && $pc != "" && $accion != "nada" && $tipo == "nada") {

					$resultado = $this->muser->get_user_pc_action($usuario, $pc, $accion);
					$data['title'] = "Buscar PC & Usuario & Accion";
					$data['resultados'] = $resultado;
					$this->load->view('search_all', $data);


				} elseif ($usuario != "" && $pc != "" && $accion != "nada" && $tipo != "nada") {
					$resultado = $this->muser->get_user_pc_action_tipo($usuario, $pc, $accion, $tipo);
					$data['title'] = "Buscar PC & Usuario & Accion & Tipo";
					$data['resultados'] = $resultado;
					$this->load->view('search_all', $data);
				} elseif ($usuario != "" && $tipo != "nada") {
					$resultado = $this->muser->get_user_tipo($usuario, $tipo);
					$data['title'] = "Buscar  Usuario & Tipo";
					$data['resultados'] = $resultado;
					$this->load->view('search_all', $data);
				} elseif ($usuario != "" && $accion != "nada") {

					$resultado = $this->muser->get_user_accion($usuario, $accion);
					$data['title'] = "Buscar  Usuario & Accion";
					$data['resultados'] = $resultado;
					$this->load->view('search_all', $data);
					echo "usuario  y accion";

				} elseif ($pc != "" && $usuario == "" && $accion == "nada" && $tipo == "nada") {
					$resultado = $this->musb->get_by_pc($pc);
					$data['title'] = "Buscar PC";
					$data['resultados'] = $resultado;

					$this->load->view('search_all', $data);


				} elseif ($pc != "" && $accion != "nada" && $usuario == "" && $tipo == "nada") {

					$resultado = $this->musb->get_by_pc_action($pc, $accion);
					$data['title'] = "Buscar PC & Accion";
					$data['resultados'] = $resultado;

					$this->load->view('search_all', $data);


				} elseif ($pc != "" && $tipo != "nada" && $accion == "nada" && $usuario == "") {
					$resultado = $this->musb->get_by_pc_tipo($pc, $tipo);
					$data['title'] = "Buscar PC & Tipo";
					$data['resultados'] = $resultado;
					$this->load->view('search_all', $data);
				} elseif ($pc != "" && $accion != "nada" && $tipo != "nada" && $usuario == "") {
					$resultado = $this->musb->get_by_pc_tipo_accion($pc, $tipo, $accion);
					$data['title'] = "Buscar PC & Tipo & Accion";
					$data['resultados'] = $resultado;
					$this->load->view('search_all', $data);


				} elseif ($accion != "nada" && $usuario == "" && $pc == "" && $tipo == "nada") {

					$resultado = $this->musb->get_by_accion($accion);
					$data['title'] = "Buscar  Accion";
					$data['resultados'] = $resultado;
					$this->load->view('search_all', $data);


				} elseif ($accion != "nada" && $tipo != "nada" && $usuario == "" && $pc == "") {
					$resultado = $this->musb->get_by_accion_tipo($accion, $tipo);
					$data['title'] = "Buscar  Accion";
					$data['resultados'] = $resultado;
					$this->load->view('search_all', $data);


				} elseif ($tipo != "nada" && $usuario == "" && $pc == "" && $accion == "nada") {
					$resultado = $this->musb->get_by_tipo($tipo);
					$data['title'] = "Buscar  Tipo";
					$data['resultados'] = $resultado;
					$this->load->view('search_all', $data);
				} else {

					$resultado = $this->musb->get_all();
					$data['title'] = "Mostrar 100 Top";
					$data['resultados'] = $resultado;
					$this->load->view('search_all', $data);
				}

		}
		else
			redirect('/welcome/', 'refresh');

	}

    public function listado()
    {
		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {
			$datos = $this->musb->get_all();
			$data['title'] = "TOP EXTENSIONES";
			$data['resultados'] = $datos;
			$this->load->view('all_action', $data);
		}
		else
			redirect('/welcome/', 'refresh');

    }
	public function segurity()
	{
		$user = $this->input->post('user');
		$password = $this->input->post('password');
		if($user && $password) {
			$resultado = $this->muser->get_user($user);
			if ($resultado->num_rows() > 0) {

				$esta = $this->muser->check_password($user, $password);
				if ($esta->num_rows() > 0) {
                      $rol = 0;
					  $login = "";
					foreach ($esta->result() as $row)
				   {
					   $rol = $row->admin;
					   $login = $row->login;
				   }
					$this->session->set_userdata('admin',$rol);
					$this->session->set_userdata('login',$login);
					redirect('/admin/', 'refresh');
				}
			} else
				redirect('/welcome/', 'refresh');
		}

		redirect('/welcome/', 'refresh');
	}

	public function insert()
	{

		$this->muser->insert_user();

	}

	public  function usuarios()
	{
		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {

			$resultados = $this->muser->get_all_user();
			$data['title'] = "Listado de Usuarios";
			$data['resultados'] = $resultados;
			$this->load->view('all_user', $data);

		}else
			redirect('/welcome/', 'refresh');


	}


	public function  search_user($user)
	{

		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {

            $cantidad_copiados = $this->muser->cant_copy_user($user);
			$listado_copiados = $this->muser->list_copy_user($user);
			$cantidad_eliminados = $this->muser->cant_remove_user($user);
			$listado_eliminados = $this->muser->list_remove_user($user);
			$cantidad_modificados = $this->muser->cant_modify_user($user);
			$listado_modificados = $this->muser->list_modify_user($user);
			$listado_extension = $this->muser-> list_user_ext($user);
			$listado_pc = $this->muser->list_user_pc($user);
			$data['listado_extension'] = $listado_extension;
			$data['listado_copiados'] = $listado_copiados;
			$data['listado_eliminados'] = $listado_eliminados;
			$data['listado_modificados'] = $listado_modificados;
			$data['pcs'] = $listado_pc;
			$data['title'] = "Reporte de usuario";
			$data['usuario'] = $user;
			$data['copia'] = $cantidad_copiados;
			$data['remove'] = $cantidad_eliminados;
			$data['modificado'] =$cantidad_modificados;

			$this->load->view("report_user",$data);

		}
		else
			redirect('/welcome/', 'refresh');

		}

	public function mas_copia()
	{
		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {
			$data['title'] = "Usuarios copias";
			$resultado = $this->muser->most_copy_user();
			$data['resultados']= $resultado;
			$this->load->view("top_copy",$data);
		}
		else
			redirect('/welcome/', 'refresh');


	}


	public function pc_copia()
	{
		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {
			$data['title'] = "Computadoras copias";
			$resultado = $this->muser->most_copy_pc();
			$data['resultados']= $resultado;
			$this->load->view("pc_copy",$data);
		}
		else
			redirect('/welcome/', 'refresh');


	}

	public function pc_insertadas()
	{
		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {
			$data['title'] = "Computadoras top inserciones";
			$resultado = $this->musb->most_insert_pc();
			$data['resultados']= $resultado;
			$this->load->view("pc_insert",$data);
		}
		else
			redirect('/welcome/', 'refresh');

	}


	public function change_password()
	{
		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {

			$data['title'] = "Cambiar Contrase&ntilde;a";
			$this->load->view('cambiar_password', $data);
		}
		else
			redirect('/welcome/', 'refresh');


	}

	public function busca_fecha()
	{
		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {

			$data['title'] = "Reporte fecha";
			$this->load->view('reporte_fecha', $data);
		}
		else
			redirect('/welcome/', 'refresh');
	}

	public function reporte()
	{
		$session_admin = $this->session->userdata('admin');
		if($session_admin>0) {

			$data['title'] = "Reporte Final";
			$fecha_inicio = $this->input->post('fecha_inicio');
			$fecha_final = $this->input->post('fecha_fin');
			$usb_insert = $this->musb->usb_date($fecha_inicio,$fecha_final);
			$usb_action = $this->musb->usb_action($fecha_inicio,$fecha_final);
			$usb_pc = $this->musb->usb_pc($fecha_inicio,$fecha_final);
			$data['inicio']= $fecha_inicio;
			$data['fin']= $fecha_final;
			$data['usb_insert']=$usb_insert;
			$data['usb_action']=$usb_action;
			$data['usb_pc']=$usb_pc;
			$this->load->view('reporte_final', $data);
		}
		else
			redirect('/welcome/', 'refresh');

	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		 redirect('/welcome/', 'refresh');
	 	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class employee extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('user_status_repair') != 2) {
		// 	redirect('login/logout', 'refresh');
		// }

		$this->load->model('function_model');
		$this->load->model('function_model_employee');
	}


		// ########
	public function index()
	{
		$id = $_SESSION['id'];

		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');

		// $data['query'] = $this->function_model->list_all();
		$num_status['num_status'] = $this->function_model->num_status_id($id, $start_date ,$end_date);

		$view_data = array(
			'id' => $id,
			'num_status' => $num_status['num_status']
		);

		$this->load->view('template/repair_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('repair_system/employee/employee_index', $view_data);
	}


	// ########
	public function list_repair()
	{
		$id = $_SESSION['id'];

		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');
		$status = $this->input->get('status');


		$data['query'] = $this->function_model->rp_list_case($id, $status , $start_date, $end_date);	
		$num_status['num_status'] = $this->function_model->num_status_id($id, $start_date, $end_date);	

		$data_total = array(
			'id' => $id,
			'data' => $data,
			'num_status' => $num_status['num_status']
		
		);

		$this->load->view('template/repair_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('repair_system/employee/list_repair', $data_total);

	}
	

	public function repair()
	{
		$cus_type['cus_type'] = $this->function_model->list_type();

		$address['address'] = $this->function_model->list_address();

		// echo "<pre>";
		// print_r($cus_type);
		// echo "</pre>";
		// exit;

		$data_all = array(
			'cus_type' => $cus_type,
			'address' => $address
		);


		$this->load->view('template/repair_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('repair_system/repair', $data_all);

	}

		// ########
		public function manage_data($rp_id, $id)
		{
	
			$data = array();
			$query['query'] = $this->function_model->list_edit($rp_id);
			$status['status'] = $this->function_model->status_type();
	
			
			$cus_type['cus_type'] = $this->function_model->list_type();
	
			$address['address'] = $this->function_model->list_address();
	
			$data = array(
				'query' => $query,
				'status' => $status,
				'cus_type' => $cus_type,
				'address' => $address
			);
	
			// 		echo '<pre>';
			// print_r($cus_type);
			// echo '</pre>';
	
			$this->load->view('template/footer');
			$this->load->view('template/repair_system/header_employee');
			$this->load->view('repair_system/employee/manage_data', $data);	
		}



	        // ########
	public function profile()
	{

		$status_user = $_SESSION['user_status_repair'];

		$id = $_SESSION['id'];

		$data['query'] = $this->function_model->read($id);

		$user_status['user_status'] = $this->function_model->user_status_id($id, $status_user);

		$data_total = array(
			'data' => $data,
			'user_status' => $user_status

		);

		$this->load->view('template/repair_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('repair_system/employee/Profile', $data_total);

		
	}


	        // ########
			public function profile_edit($id = 0)
			{
		
				$data['query'] = $this->function_model->read($id);
		
		
				$this->load->view('template/repair_system/header_employee');
				$this->load->view('template/footer');
				$this->load->view('repair_system/employee/Profile_edit', $data);
		
		
			}



 // ########

	public function edit_password()
	{
		$this->load->view('template/repair_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('repair_system/employee/edit_password');

	}




}

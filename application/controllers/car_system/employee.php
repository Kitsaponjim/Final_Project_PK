<?php
defined('BASEPATH') or exit('No direct script access allowed');

class employee extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user_status_car') != 2) {
			redirect('login/logout', 'refresh');
		}
		$this->load->model('function_model');
		$this->load->model('function_car_model_admin');
		$this->load->model('function_car_reserve');
		$this->load->model('function_car_model_employee');

	}


	public function index()
	{

		$this->function_car_reserve->update(); //เช็ครายการรถที่ที่เสร็จเรียบร้อยและอัพเดท
		$this->function_car_reserve->update_status_car(); //เช็ครายการรถที่ไม่พร้อมและอัพเดต

		$id = $_SESSION['id'];
		$check = $this->function_car_reserve->check_test_3($id); 

		// echo "<br>";
		// echo $_COOKIE['i_1'];
		if(!empty($check) AND $check != '0'){
		if (!isset($_COOKIE['i_1'])) {
			setcookie('i_1', 0, time() + 180); // 60 วินาที
		}
		$i = $_COOKIE['i_1'];
		// echo "<br>";
		// echo "i :";
		// echo $i;
		if ($i == 0) {
			$this->session->set_flashdata('check', TRUE);
			$i++;
			setcookie('i_1', $i, time() + 180); 
			redirect('car_system/employee/list_history_id', 'refresh');
		}
	}

		$user_role = $_SESSION['user_role'];
		$car_status = $this->input->get('car_status');
		$data['data'] = $this->function_car_model_admin->list_all_car_status($car_status);

		$data_all = array(
			'data' => $data,
			'user_role' => $user_role
		);
		// print_r($data_all);

		$this->load->view('template/car_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('car_system/employee/employee_index', $data_all);

	}

	// ########
		public function list_car()
		{
	
			if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
				$start_date = $this->input->post('start_date');
				$end_date = $this->input->post('end_date');
			} else {
				$start_date = null;
				$end_date = null;
			}
	
			$sit = $this->input->post('sit');
	
	
			$data['data'] = $this->function_car_reserve->list_Empty_car($start_date, $end_date ,$sit);
	
			$data_all = array(
				'data' => $data
			);
	
			$this->load->view('template/car_system/header_employee');
			$this->load->view('template/footer');
			$this->load->view('car_system/employee/list_car', $data_all);
	
		}
	

			// ########
	public function list_history_id()
	{

		$id_user = $_SESSION['id'];
		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');
		
		$this->function_car_reserve->update(); //เช็ครายการรถที่ที่เสร็จเรียบร้อยและอัพเดท
		$this->function_car_reserve->update_status_car(); //เช็ครายการรถที่ไม่พร้อมและอัพเดต
	
		$data['data'] = $this->function_car_reserve->list_history_id($id_user ,$start_date, $end_date);

		$data_all = array(
			'data' => $data,
			
		);

		$this->load->view('template/car_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('car_system/employee/list_history_id', $data_all);
	}



	// ########
	public function edit_request($case_id)
	{
		$data_case['data_case'] = $this->function_car_reserve->edit_request($case_id);
	
		$data = array(
			'data_case' =>$data_case,
		);
		$this->load->view('template/car_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('car_system/employee/edit_request',$data);


	}


	 // ########
	 public function profile()
	 {
 
		 $status_user = $_SESSION['user_status_repair'];
 
		 $id = $_SESSION['id'];
 
		 $data['query'] = $this->function_model->read($id);
 
		 $user_status['user_status'] = $this->function_car_reserve->user_status_id($id, $status_user);
 
		 $data_total = array(
			 'data' => $data,
			 'user_status' => $user_status
 
		 );
		 $this->load->view('template/car_system/header_employee');
		 $this->load->view('template/footer');
		 $this->load->view('car_system/employee/Profile', $data_total);
 
		 
	 }
 
			 // ########
			 public function profile_edit($id = 0)
			 {
		 
 
				 $data['query'] = $this->function_model->read($id);
		 
				 $this->load->view('template/car_system/header_employee');
				 $this->load->view('template/footer');
				 $this->load->view('car_system/employee/Profile_edit', $data);
		 
		 
			 }
 
				   // ########
 
	 public function edit_password()
	 {
 
		$this->load->view('template/car_system/header_employee');
		$this->load->view('template/footer');
		 $this->load->view('car_system/employee/edit_password');
 
	 }


}

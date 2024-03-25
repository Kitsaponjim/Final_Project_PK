<?php
defined('BASEPATH') or exit('No direct script access allowed');

class employee extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('user_status_repair') != 1) {
		// 	redirect('login/logout', 'refresh');
		// }
		$this->load->model('function_model');
		$this->load->model('function_room_admin');
		$this->load->model('function_room');
	}




	public function index(){

		if (isset($_POST['date']) && isset($_POST['start_time']) && isset($_POST['end_time'])) {
			$date = $this->input->post('date');
			$start_time = $this->input->post('start_time');
			$end_time = $this->input->post('end_time');
		} else {
			$date = null;
			$start_time = null;
			$end_time = null;
		}
		
		$data['data'] = $this->function_room->list_Empty_room($date, $start_time, $end_time);

		$data_all = array(
			'data' => $data
		);


		$this->load->view('template/room_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('room_system/employee/admin_reserve_room', $data_all);

	}
	

	public function employee_index()
	{

		if (isset($_POST['date']) && isset($_POST['start_time']) && isset($_POST['end_time'])) {
			$date = $this->input->post('date');
			$start_time = $this->input->post('start_time');
			$end_time = $this->input->post('end_time');
		} else {
			$date = null;
			$start_time = null;
			$end_time = null;
		}

		$data['data'] = $this->function_room->list_Empty_room($date, $start_time, $end_time);

		$data_all = array(
			'data' => $data
		);



		$this->load->view('template/room_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('room_system/employee/employee_index', $data_all);
	}


	public function admin_reserve_room()
	{
		if (isset($_POST['date']) && isset($_POST['start_time']) && isset($_POST['end_time'])) {
			$date = $this->input->post('date');
			$start_time = $this->input->post('start_time');
			$end_time = $this->input->post('end_time');
		} else {
			$date = null;
			$start_time = null;
			$end_time = null;
		}
		
		$data['data'] = $this->function_room->list_Empty_room($date, $start_time, $end_time);

		$data_all = array(
			'data' => $data
		);


		$this->load->view('template/room_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('room_system/employee/admin_reserve_room', $data_all);

	}


	public function list_requesterRoom(){

		$status = $this->input->get('status');
		$date = $this->input->get('date');
		$date_end = $this->input->get('date_end');
		$room = $this->input->get('room');

		$id = $_SESSION['id'];
		$this->function_room_admin->update();

	
		$list_room['list_room'] = $this->function_room_admin->list_requesterRoom($id ,$date ,$date_end,$room ,$status);

		$data = array(
			'list_room' => $list_room
		);

		$this->load->view('template/room_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('room_system/employee/list_requesterRoom' ,$data);


	}

	public function Edit_requestRoom($booking_id){

		$data_room['data_room'] = $this->function_room_admin->edit_requestRoom($booking_id);
	
		$data = array(
			'data_room' => $data_room

		);

		$this->load->view('template/room_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('room_system/employee/edit_requestRoom' , $data_room);


	}



	public function profile()
	{

		$status_user = $_SESSION['user_status_room'];
		$id = $_SESSION['id'];

		$data['query'] = $this->function_model->read($id);

		$user_status['user_status'] = $this->function_room_admin->user_status_id($id ,$status_user);

		$data_total = array(
			'data' => $data,
			'user_status' => $user_status

		);


		$this->load->view('template/room_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('room_system/employee/Profile', $data_total);

		
	}

	public function edit_profile($id = 0)
	{
		$data['query'] = $this->function_model->read($id);

		$this->load->view('template/room_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('room_system/employee/edit_profile', $data);


	}
	public function edit_password()
	{

		$this->load->view('template/room_system/header_employee');
		$this->load->view('template/footer');
		$this->load->view('room_system/employee/edit_password');
	}


	

}

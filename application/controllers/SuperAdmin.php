<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuperAdmin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('user_status_repair') != -1) {
		// 	redirect('login/logout', 'refresh');
		// }
		$this->load->model('function_model');
		$this->load->model('function_SuperAdmin');
		$this->load->model('function_car_reserve');
		$this->load->model('function_room_admin');
	}

	public function index()
	{

		$this->load->view('template/superAdmin');
		$this->load->view('template/footer');
		$this->load->view('SuperAdmin/page_superAdmin');
	}


	public function list_user()
	{
		$role = $this->input->get('role');
		$status = $this->input->get('status');

		$query['query'] = $this->function_SuperAdmin->list_user_all($role, $status);
		$user_role['user_role'] = $this->function_SuperAdmin->role();

		// เรียกใช้ฟังก์ชัน showUsers() เพื่อดึงข้อมูลผู้ใช้งานทั้งหมด
		$dataUsers = $this->function_SuperAdmin->showUsers();
		foreach ($dataUsers->result_array() as $row) {
			$data[] = array(
				'id' => $row['id'],
				'user' => $row['user_login'],
			);
		}
		$userData['userData'] = json_encode($data);

		$data = array(
			'query' => $query,
			'user_role' => $user_role,
			'userData' => $userData,
		);
		$this->load->view('template/superAdmin');
		$this->load->view('template/footer');
		$this->load->view('SuperAdmin/list_user', $data);
	}

	// public function list_user()
	// {

	// 	$role = $this->input->get('role');
	// 	$status = $this->input->get('status');


	// 	$query['query'] = $this->function_SuperAdmin->list_user_all($role ,$status);
	// 	$user_role['user_role'] = $this->function_SuperAdmin->role();


	// 	$data = array(
	// 		'query' => $query,
	// 		'user_role' => $user_role
	// 	);
	// 	$this->load->view('template/superAdmin');
	// 	$this->load->view('template/footer');
	// 	$this->load->view('SuperAdmin/list_user', $data);

	// }

	public function list_role()
	{

		$user_role['user_role'] = $this->function_SuperAdmin->role();


		$data = array(
			'user_role' => $user_role
		);
		$this->load->view('template/superAdmin');
		$this->load->view('template/footer');
		$this->load->view('SuperAdmin/list_role', $data);
	}

	public function manage_data($id)
	{

		$data = array(
			'id' => $id
		);
		$this->load->view('template/superAdmin');
		$this->load->view('template/footer');
		$this->load->view('SuperAdmin/manage_data', $data);
	}


	public function edit_manage_data($id)
	{

		$query['query'] = $this->function_SuperAdmin->list_user_id($id);


		$data = array(
			'query' => $query,
			'id' => $id
		);


		$this->load->view('template/superAdmin');
		$this->load->view('template/footer');
		$this->load->view('SuperAdmin/edit_manage_data', $data);
	}



	public function Add_user()
	{

		$time_add = date('Y-m-d H:i:s');
		$user_login = $this->input->post('user_login');
		$user_password_1 = $this->input->post('user_password_1');
		$user_password_2 = $this->input->post('user_password_2');
		$hashed_password = sha1($user_password_1);
		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$user_tel = $this->input->post('user_tel');
		$user_role = $this->input->post('user_role');
		$user_status_info = $this->input->post('user_status_info');
		$user_status_repair = $this->input->post('user_status_repair');
		$user_status_car = $this->input->post('user_status_car');
		$user_status_room = $this->input->post('user_status_room');
		$user_status_emeeting = $this->input->post('user_status_emeeting');



		$data = array(
			'user_login' => $user_login,
			'user_password' => $hashed_password,
			'user_name' => $user_name,
			'user_email' => $user_email,
			'user_tel' => $user_tel,
			'user_role' => $user_role,
			'user_status_info' => $user_status_info,
			'user_status_repair' => $user_status_repair,
			'user_status_car' => $user_status_car,
			'user_status_room' => $user_status_room,
			'user_status_emeeting' => $user_status_emeeting,
			'user_add_date' => $time_add,
			'activation_date' => $time_add
		);

		$this->db->insert('user_info', $data);
		$this->session->set_flashdata('save_success', TRUE);
	}


	public function admin_update_password()
	{

		$time_add = date('Y-m-d H:i:s');

		$id = $this->input->post('id');
		$password_1 = $this->input->post('password_1');
		$hashed_password = sha1($password_1);

		$data = array(
			'user_password' => $hashed_password,
			'last_edit_password' => $time_add
		);

		$this->db->where('id', $id);
		$this->db->update('user_info', $data);

		$this->session->set_flashdata('save_edit', TRUE);
	}




	public function update_user()
	{

		$data = array();

		$time_add = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		$user_password_1 = $this->input->post('user_password_1');
		$user_password_2 = $this->input->post('user_password_2');
		$hashed_password = sha1($user_password_1);

		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$user_tel = $this->input->post('user_tel');
		$user_role = $this->input->post('user_role');
		$user_status_info = $this->input->post('user_status_info');
		$user_status_repair = $this->input->post('user_status_repair');
		$user_status_car = $this->input->post('user_status_car');
		$user_status_room = $this->input->post('user_status_room');
		$user_status_emeeting = $this->input->post('user_status_emeeting');

		$user_login = $_SESSION['user_login'];
		$time_edit = date('Y-m-d H:i:s');

		if (!empty($id)) {
			if (!empty($user_name)) {
				$data['user_name'] = $user_name;
			}
			if (!empty($user_email)) {
				$data['user_email'] = $user_email;
			}
			if (!empty($user_password_2)) {
				$data['user_password'] = $hashed_password;
				$data['last_edit_password'] = $time_edit;
			}
			if (!empty($user_tel)) {
				$data['user_tel'] = $user_tel;
			}
			if (!empty($user_status_info) && $user_status_info != '#') {
				$data['user_status_info'] = $user_status_info;
				$data['activation_date'] = $time_edit;
			}
			if (!empty($user_role) && $user_role != '#') {
				$data['user_role'] = $user_role;
			}

			if (!empty($user_status_repair) && $user_status_repair != '#') {
				$data['user_status_repair'] = $user_status_repair;
			}

			if (!empty($user_status_car) && $user_status_car != '#') {
				$data['user_status_car'] = $user_status_car;
			}

			if (!empty($user_status_room) && $user_status_room != '#') {
				$data['user_status_room'] = $user_status_room;
			}

			if (!empty($user_status_emeeting) && $user_status_emeeting != '#') {
				$data['user_status_emeeting'] = $user_status_emeeting;
			}


			if (!empty($data)) {
				$data['last_edit_data'] = $time_edit;
				$data['name_edit'] = $user_login;
				$this->db->where('id', $id);
				$this->db->update('user_info', $data);

				$this->session->set_flashdata('save_edit', TRUE);
			} else {
				$this->session->set_flashdata('wrong_alert', TRUE);
			}
		} else {
			$this->session->set_flashdata('wrong_alert', TRUE);
		}
	}

	public function add_role()
	{

		$role_name = $this->input->post('role_name');

		$data = array(
			'role_name' => $role_name

		);
		$this->db->insert('user_role', $data);

		$this->session->set_flashdata('save_success', TRUE);
	}




	public function update_role()
	{

		$data = array();

		$id_role = $this->input->post('id_role');
		$role_name = $this->input->post('role_name');

		if (!empty($id_role)) {
			if (!empty($role_name)) {
				$data['role_name'] = $role_name;
			}

			if (!empty($data)) {
				$this->db->where('id_role', $id_role);
				$this->db->update('user_role', $data);

				$this->session->set_flashdata('save_edit', TRUE);
			} else {
				$this->session->set_flashdata('wrong_alert', TRUE);
			}
		} else {
			$this->session->set_flashdata('wrong_alert', TRUE);
		}
	}


	public function del_role($id_role)
	{


		$this->db->delete('user_role', array('id_role' => $id_role));

		$this->session->set_flashdata('del_success', TRUE);

		redirect('SuperAdmin/list_role', 'refresh');
	}




	public function repair_list_all()
	{

		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');
		$status = $this->input->get('status');


		$data['query'] = $this->function_model->rp_list_all($status, $start_date, $end_date);
		$num_status['num_status'] = $this->function_model->num_status_all($start_date, $end_date);

		$data_total = array(
			'data' => $data,
			'num_status' => $num_status['num_status']
		);

		$this->load->view('template/superAdmin');
		$this->load->view('template/footer');
		$this->load->view('SuperAdmin/repair/list_all', $data_total);
	}

	public function repair_manage_data($rp_id = 0)
	{

		$data['query'] = $this->function_model->list_edit($rp_id);
		$data_status['status'] = $this->function_model->status_type();

		$this->load->view('template/superAdmin');
		$this->load->view('template/footer');

		$this->load->view('SuperAdmin/repair/manage_data_', array_merge($data, $data_status));
	}





	public function car_list_all()
	{

		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');

		$this->function_car_reserve->update(); //เช็ครายการรถที่ที่เสร็จเรียบร้อยและอัพเดท
		$this->function_car_reserve->update_status_car(); //เช็ครายการรถที่ไม่พร้อมและอัพเดต


		$data['data'] = $this->function_car_reserve->list_history_total($start_date, $end_date);

		$data_all = array(
			'data' => $data,

		);

		$this->load->view('template/superAdmin');
		$this->load->view('template/footer');
		$this->load->view('SuperAdmin/car/list_all', $data_all);
	}



	public function edit_request($case_id)
	{
		$data_case['data_case'] = $this->function_car_reserve->edit_request($case_id);

		$data = array(
			'data_case' => $data_case,
		);

		$this->load->view('template/superAdmin');
		$this->load->view('template/footer');
		$this->load->view('SuperAdmin/car/manage_data', $data);
	}



	public function room_list_all()
	{

		$status = $this->input->get('status');
		$date = $this->input->get('date');
		$date_end = $this->input->get('date_end');
		$room = $this->input->get('room');

		$this->function_room_admin->update();

		$list_room['list_room'] = $this->function_room_admin->list_requesterRoom_total($date, $date_end, $room, $status);

		$data = array(
			'list_room' => $list_room
		);

		$this->load->view('template/superAdmin');
		$this->load->view('template/footer');
		$this->load->view('SuperAdmin/room/list_all', $data);
	}



	public function room_manage_data($booking_id)
	{
		$data_room['data_room'] = $this->function_room_admin->edit_requestRoom($booking_id);

		$data = array(
			'data_room' => $data_room

		);

		$this->load->view('template/superAdmin');
		$this->load->view('template/footer');
		$this->load->view('SuperAdmin/room/manage_data_', $data_room);
	}

	public function Edit_requestRoom_total($booking_id)
	{

		$data_room['data_room'] = $this->function_room_admin->edit_requestRoom($booking_id);

		$data = array(
			'data_room' => $data_room

		);

		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/edit_requestRoom_total', $data_room);
	}

	public function User()
	{
		$dataUsers = $this->function_SuperAdmin->showUsers();
		foreach ($dataUsers->result_array() as $row) {
			$data[] = array(
				'id' => $row['id'],
				'user' => $row['user_login'],
			);
		}
		echo json_encode($data);
	}


	public function forgot_password()
	{

		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');

		$user_forgotpassword['user_forgotpassword'] = $this->function_SuperAdmin->forgot_password();
		// print_r($user_fofgotpassword);

		$data = array(
			'user_forgotpassword' => $user_forgotpassword
		);


		$this->load->view('template/superAdmin');
		$this->load->view('template/footer');
		$this->load->view('SuperAdmin/forgot_password', $data);
	}



}

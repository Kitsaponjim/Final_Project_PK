<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('function_model');
		$this->load->model('function_car_reserve');
	}

//#######
	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/footer');
		$this->load->view('home/login_view', array('error' => ' '));

	}


//#######
	public function ck_login_choice()
	{
		if ($this->input->post('user_login') == '') {
			redirect('login', 'refresh');

		} else {
			$result = $this->function_model->check_login(
				$this->input->post('user_login'),
				sha1($this->input->post('user_password'))
			);

			if (!empty($result)) {
				$arrsess = array(
					'id' => $result->id,
					'user_name' => $result->user_name,
					'user_login' => $result->user_login,
					'user_password' => $result->user_password,
					'user_email' => $result->user_email,
					'user_status_repair' => $result->user_status_repair,
					'user_status_car' => $result->user_status_car,
					'user_status_room' => $result->user_status_room,
					'user_status_emeeting' => $result->user_status_emeeting,
					'user_status_info' => $result->user_status_info,
					'user_role' => $result->user_role
				);

				$this->session->set_userdata($arrsess);
				redirect('login/page_choice', 'refresh');


			} else {
				$this->session->set_flashdata('login_error', TRUE);
				$this->session->unset_userdata(array('id', 'user_status', 'user_name'));
				redirect('login', 'refresh');
			}
		}
	}
	
	public function page_choice()
	{
		$id = $_SESSION['id'];
		$user_login = $_SESSION['user_login'];
		$user_status_info = $_SESSION['user_status_info'];
	
		// ตรวจสอบการตั้งค่าข้อความแจ้งเตือน
		$warning_message = $this->session->flashdata('warning_message');
	

		if($user_status_info == 1){
			if ($id == -1) {
				redirect('SuperAdmin', 'refresh');
			} else {
				$data['warning_message'] = $warning_message;
				$this->load->view('page_choice', $data);
			}

		}else{

			$this->session->set_flashdata('suspended_success', TRUE);
			$this->session->unset_userdata(array('id', 'user_status', 'user_name'));
			redirect('login', 'refresh');

		}
	
	}


	//#######
	public function ck_choice_repair() { //เช็ค status ระบบแจ้งซ่อม
		$user_status_repair = $_SESSION['user_status_repair'];
		
		if ($user_status_repair == 1) { //admin
			redirect('repair_system/Admin', 'refresh');

		} elseif ($user_status_repair == 2) { //พนักงาน
			redirect('repair_system/employee', 'refresh');

		} elseif ($user_status_repair == 3) { //ช่าง
			redirect('repair_system/repairman', 'refresh');

		} elseif ($user_status_repair == 4) { //ระงับใช้งาน
			$this->session->set_flashdata('warning_message', 'ไม่มีสิทธิ์เข้าใช้งานระบบแจ้งซ่อม');
			redirect('login/page_choice', 'refresh');

		} else {
			$this->session->set_flashdata('login_error', TRUE);
			$this->session->unset_userdata(array('id', 'user_status', 'user_name'));
			// ลบข้อมูล session ของตัวแปรที่ชื่อ "id", "user_level", และ "user_name" ออกจาก session ทั้งหมด เมื่อเกิดความผิดพลาดในการเข้าสู่ระบบ ทำให้การล็อกเอาท์ผู้ใช้จากระบบเกิดขึ้น
			redirect('login', 'refresh');

		}

	}

	//#######
	public function ck_choice_car()
	{ //เช็ค status ระบบแจ้งซ่อม

		$user_status_car = $_SESSION['user_status_car'];

		if ($user_status_car == 1) { //admin
			redirect('car_system/Admin', 'refresh');

		} elseif ($user_status_car == 2) { //พนักงาน
			redirect('car_system/employee', 'refresh');

		}elseif ($user_status_car == 3) { //ระงับใช้งาน
			$this->session->set_flashdata('warning_message', 'ไม่มีสิทธิ์เข้าใช้งานระบบจองรถ');
			redirect('login/page_choice', 'refresh');


		} else {
			$this->session->set_flashdata('login_error', TRUE);
			$this->session->unset_userdata(array('id', 'user_status', 'user_name'));
			// ลบข้อมูล session ของตัวแปรที่ชื่อ "id", "user_level", และ "user_name" ออกจาก session ทั้งหมด เมื่อเกิดความผิดพลาดในการเข้าสู่ระบบ ทำให้การล็อกเอาท์ผู้ใช้จากระบบเกิดขึ้น
			redirect('login', 'refresh');

		}

	}

	//#######
	public function ck_choice_room()
	{ //เช็ค status ระบบแจ้งซ่อม

		$user_status_room = $_SESSION['user_status_room'];

		if ($user_status_room == 1) { //admin
			redirect('room_system/Admin', 'refresh');

		} elseif ($user_status_room == 2) { //พนักงาน

			redirect('room_system/employee', 'refresh');

		}elseif ($user_status_room == 3) { //ระงับใช้งาน
			$this->session->set_flashdata('warning_message', 'ไม่มีสิทธิ์เข้าใช้งานระบบจองห้องประชุม');
			redirect('login/page_choice', 'refresh');

		} else {
			$this->session->set_flashdata('login_error', TRUE);
			$this->session->unset_userdata(array('id', 'user_status', 'user_name'));
			// ลบข้อมูล session ของตัวแปรที่ชื่อ "id", "user_level", และ "user_name" ออกจาก session ทั้งหมด เมื่อเกิดความผิดพลาดในการเข้าสู่ระบบ ทำให้การล็อกเอาท์ผู้ใช้จากระบบเกิดขึ้น
			redirect('login', 'refresh');

		}

	}


	//#######
	public function ck_choice_meeting()
	{ //เช็ค status ระบบแจ้งซ่อม

		$user_status_meeting = $_SESSION['user_status_emeeting'];

		if ($user_status_meeting == 1) { //admin
			redirect('meeting_system/Admin', 'refresh');

		} elseif ($user_status_meeting == 2) { //พนักงาน

			redirect('meeting_system/employee', 'refresh');

		}elseif ($user_status_meeting == 3) { //ระงับใช้งาน
			$this->session->set_flashdata('warning_message', 'ไม่มีสิทธิ์เข้าใช้งานระบบเอกสารการ');
			redirect('login/page_choice', 'refresh');

		} else {
			$this->session->set_flashdata('login_error', TRUE);
			$this->session->unset_userdata(array('id', 'user_status', 'user_name'));
			// ลบข้อมูล session ของตัวแปรที่ชื่อ "id", "user_level", และ "user_name" ออกจาก session ทั้งหมด เมื่อเกิดความผิดพลาดในการเข้าสู่ระบบ ทำให้การล็อกเอาท์ผู้ใช้จากระบบเกิดขึ้น
			redirect('login', 'refresh');

		}

	}


	//#######
	public function logout()
	{
		$this->session->set_flashdata('logout_success', TRUE);
		$this->session->unset_userdata(array('id', 'user_level', 'user_name'));
		redirect('', 'refresh');
	}



	public function forgot_password()
	{


		$this->load->view('template/fogot_passwode');
		$this->load->view('template/footer');
		$this->load->view('forgot_password');

	}

	public function forgotPassword_from()
	{
		
		$username = $this->input->post('username');
		$fullname = $this->input->post('fullname');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$department = $this->input->post('department');
		$date = date('Y-m-d H:i:s');

		$data = array(
			'username' => $username,
			'fullname' => $fullname,
			'phone' => $phone,
			'email' => $email,
			'department' => $department,
			'date' => $date,
		);

		$this->db->insert('user_fogotpassword', $data);

		$this->session->set_flashdata('forgot_password', TRUE);



		$this->load->view('template/fogot_passwode');
		$this->load->view('template/footer');
		$this->load->view('forgot_password');


	}


}

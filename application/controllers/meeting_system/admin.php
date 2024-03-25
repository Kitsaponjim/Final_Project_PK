<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('user_status_car') != 1) {
		// 	redirect('login/logout', 'refresh');
		// }
		$this->load->model('function_model');
		$this->load->model('function_meeting');
		$this->load->model('function_car_model_admin');

	}

	
	// ########
	public function index()
	{

		$meeting_topic['meeting_topic'] = $this->function_meeting->meeting_topic();

		$user_role_edit['user_role_edit'] = $this->function_car_model_admin->_role();


		$data = array(
			'meeting_topic' => $meeting_topic,
			'user_role_edit' => $user_role_edit
		);

		$this->load->view('template/meeting_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('meeting_system/admin/index' ,$data);

	}


	public function Topic_details(){

		$meeting_id = $this->input->get('meeting_id');
		$title_name = $this->input->get('title_name');
		$meeting_topic['meeting_topic'] = $this->function_meeting->meeting_topic_id($meeting_id);

		$file['file'] = $this->function_meeting->file_meeting($meeting_id);

		$data = array(
			'meeting_topic' => $meeting_topic,
			'file' => $file,
			'title_name' => $title_name,
			'meeting_id' => $meeting_id
		);
		$this->load->view('template/meeting_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('meeting_system/admin/Topic_details' ,$data);

	}





}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class meeting extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('user_status_car') != 1) {
		// 	redirect('login/logout', 'refresh');
		// }

		$this->load->model('function_model');
		$this->load->model('function_car_model_admin');
		$this->load->model('function_car_reserve');

	}
	public function Add_meeting()
	{
		$created_by = $_SESSION['id'];

		$title_name = $this->input->post('title_name');
		$title_detail = $this->input->post('title_detail');
		$permissions_name = $this->input->post('permissions_name');
		$date = date('Y-m-d H:i:s');

		$data = array(
			'title_name' => $title_name,
			'title_detail' => $title_detail,
			'created_by' => $created_by,
			'permissions_name' => $permissions_name,
			'created_date' => $date
		);

		
		if(!empty($data)){

			$this->db->insert('meeting_topic' , $data);
			$this->session->set_flashdata('save_success' , TRUE);
		}

	}
	

	public function Add_file()
	{		$meeting_id = $this->input->post('meeting_id');
		$file_name = $_FILES['file_upload']['name']; // ชื่อของไฟล์
		$file_type = $_FILES['file_upload']['type']; // ประเภทของไฟล์
		$file_size = $_FILES['file_upload']['size']; // ขนาดของไฟล์


		$data = array(
			'meeting_id' => $meeting_id,
			'file_name' => $file_name,
			'file_type' => $file_type,
			'file_size' => $file_size
		);
		
		if(!empty($data)){
			$this->db->insert('meeting_files', $data);
			$this->session->set_flashdata('save_success', TRUE);
		}
		

	}





}

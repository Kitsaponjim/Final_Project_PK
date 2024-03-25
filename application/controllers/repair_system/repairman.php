<?php
defined('BASEPATH') or exit('No direct script access allowed');

class repairman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('user_status_repair') != 3) {
			redirect('login/logout', 'refresh');
		}

		$this->load->model('function_model');
		$this->load->model('function_model_employee');
		$this->load->model('function_model_repairman');
	}

	public function index()
	{


		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');

		// $data['query'] = $this->function_model->list_all();
		$num_status['num_status'] = $this->function_model->num_status_all($start_date ,$end_date);

		$view_data = array(
			'num_status' => $num_status['num_status']
		);

		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('template/footer');
		$this->load->view('repair_system/repairman/repairman_index', $view_data);


	}


		// ########
		public function list_all()
		{
	
			$start_date = $this->input->get('start_date');
			$end_date = $this->input->get('end_date');
			$status = $this->input->get('status');
	
			$data['query'] = $this->function_model->rp_list_all($status , $start_date, $end_date);	
			$num_status['num_status'] = $this->function_model->num_status_all($start_date, $end_date);	
	
			
			$data_total = array(
				'data' => $data,
				'num_status' => $num_status['num_status']
			);
	
	
			$this->load->view('template/repair_system/header_repairman');
			$this->load->view('template/footer');
			$this->load->view('repair_system/repairman/list_all', $data_total);
	
		}



        // ########
	public function list_type()
	{

		$data['query'] = $this->function_model->admin_list_type();
		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('template/footer');
		$this->load->view('repair_system/repairman/list_type', $data);

	}

	  // ########
	public function add_type()
	{
		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('template/footer');
		$this->load->view('repair_system/repairman/add_type');
	
	}


		     // ########
			 public function edit_type($id_type = 0)
			 {
		 
				 $data = array(
					 'id_type' => $id_type
				 );
		 
				 $this->load->view('template/repair_system/header_repairman');
				 $this->load->view('template/footer');
				 $this->load->view('repair_system/repairman/edit_type', $data);
		 
			 }


			 	// ########
	public function del_type($id_type = 0)
	{

		$this->function_model->del_type($id_type);

		$this->session->set_flashdata('del_success', TRUE);
		redirect('repair_system/repairman/list_type', 'refresh');


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
			
					$this->load->view('template/repair_system/header_repairman');
					$this->load->view('template/footer');
					$this->load->view('repair_system/repairman/Profile', $data_total);
			
					
				}
			
			
						// ########
						public function profile_edit($id = 0)
						{
					
							$data['query'] = $this->function_model->read($id);
					
					
							$this->load->view('template/repair_system/header_repairman');
							$this->load->view('template/footer');
							$this->load->view('repair_system/repairman/Profile_edit', $data);
					
					
						}
			
			
			
			 // ########
			
				public function edit_password()
				{
					$this->load->view('template/repair_system/header_repairman');
					$this->load->view('template/footer');
					$this->load->view('repair_system/repairman/edit_password');
			
				}







	public function token_list()
	{
		$data['data'] = $this->function_model->token_list();
		$data_total = array(
			'data' => $data
		);
		
		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('template/footer');
		$this->load->view('repair_system/repairman/Token', $data_total);
	
	}


	
	public function update_Token()
	{
		$inputValue = $this->input->post('inputValue');
		$codeToken = $this->input->post('Code_token');
	
		$cusImageFilename = null;
		$imageMimeType = null;
		$imageData = null;
	
		if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
			$cusImageFilename = $_FILES['file_upload']['name'];
			$imageMimeType = $_FILES['file_upload']['type'];
			$imageData = file_get_contents($_FILES['file_upload']['tmp_name']);
		}
	
		if (!empty($inputValue) && !empty($codeToken)) {
			$data['code_token'] = $codeToken;
	
			// Add image information to $data array
			$data['image_filename'] = $cusImageFilename;
			$data['image_mime_type'] = $imageMimeType;
			$data['image_data'] = $imageData;
	
			$this->db->where('id_token', $inputValue);
			$this->db->update('rp_token', $data);
	
			echo "บันทึกข้อมูลสำเร็จ";
		} else {
			echo "ไม่มีข้อมูลที่จะอัพเดต";
		}
	}
	

	public function manage_data($rp_id = 0)
	{

		$data['query'] = $this->function_model->list_edit($rp_id);
		$data_status['status'] = $this->function_model->status_type();
		
		$this->load->view('template/footer');
		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('repair_system/repairman/manage_data', array_merge($data, $data_status));
	}


}

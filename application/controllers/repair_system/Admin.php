<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('user_status_repair') != 1) {
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

		$num_status['num_status'] = $this->function_model->num_status_id($id, $start_date ,$end_date);

		$view_data = array(
			'id' => $id,
			'num_status' => $num_status['num_status']
		);

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_index', $view_data);

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

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/list_all', $data_total);

	}




	        // ########

	public function admin_list_user()
	{
		$status = $this->input->get('status');
		$role = $this->input->get('role');
		
		$data['query'] = $this->function_model->list_user($status , $role);

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_list_user', $data);


	}


        // ########
	public function admin_list_type()
	{

		$data['query'] = $this->function_model->admin_list_type();

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_list_type', $data);

	}


	public function admin_list_address()
	{

		$data['query'] = $this->function_model->list_address();
		

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_list_address', $data);

	}

  // ########
	public function admin_add_type()
	{

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_add_type');


	}
	public function admin_add_address()
	{

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_add_address');


	}

  // ########
	public function add_type()
	{
		$data = array();
		$rp_type = $this->input->post('rp_type');

		$data = array(
			'rp_name_type' => $rp_type,

		);

		$this->db->insert('rp_type', $data);

		echo "บันทึกข้อมูลสำเร็จ";

	}
	public function add_address()
	{
		$data = array();
		$name_address = $this->input->post('rp_type');

		$data = array(
			'name_address' => $name_address,

		);

		$this->db->insert('rp_address', $data);

		echo "บันทึกข้อมูลสำเร็จ";

	}

     // ########
	public function admin_edit_user($id_user = 0)
	{

		$status_user['status_user'] = $this->function_model->status_user();
		$role_user['role_user'] = $this->function_model->role_user();

		$data = array(
			'id_user' => $id_user,
			'status_user' => $status_user,
			'role_user' => $role_user
		);

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_edit_user', $data);


	}
     // ########
	public function admin_update_user()
	{

		$data = array();
		$id_user = $this->input->post('id_user');
		$edit_cus_name = $this->input->post('edit_cus_name'); 
		$edit_cus_email = $this->input->post('edit_cus_email');
		$edit_cus_tel = $this->input->post('edit_cus_tel');
		$status = $this->input->post('status');
		$role = $this->input->post('role');

		$user_login = $_SESSION['user_login'];
		$time_edit = date('Y-m-d H:i:s');

		if (!empty($id_user)) {
			if (!empty($edit_cus_name)) {
				$data['user_name'] = $edit_cus_name;
			}
			if (!empty($edit_cus_email)) {
				$data['user_email'] = $edit_cus_email;
			}
			if (!empty($edit_cus_tel)) {
				$data['user_tel'] = $edit_cus_tel;
			}
			if (!empty($status) && $status != '#' ) {
				$data['user_status_repair'] = $status;
				$data['user_edit_date'] = $time_edit;
			}
			if (!empty($role) && $role != '#') {
				$data['user_role'] = $role;
			}
			

			if (!empty($data)) {
				$data['last_edit_data'] = $time_edit;
				$data['name_edit'] = $user_login;
				$this->db->where('id', $id_user);
				$this->db->update('user_info', $data);

				$this->session->set_flashdata('save_edit', TRUE);
			} else {
				$this->session->set_flashdata('wrong_alert', TRUE);
			}
		} else {
			$this->session->set_flashdata('wrong_alert', TRUE);
		}

	}

	     // ########
	public function admin_edit_type($id_type = 0)
	{

		$data = array(
			'id_type' => $id_type
		);

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_edit_type', $data);

	}

	public function admin_edit_address($id_address = 0)
	{

		$data = array(
			'id_address' => $id_address
		);

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_edit_address', $data);

	}

	  // ########
	  public function admin_update_type()
	  {
  
		  $data = array();
		  $id_type = $this->input->post('id_type');
		  $edit_name_type = $this->input->post('edit_name_type');
  
		  if (!empty($id_type)) {
			  if (!empty($edit_name_type)) {
				  $data['rp_name_type'] = $edit_name_type;
			  }
  
			  if (!empty($data)) {
				  $this->db->where('id_type', $id_type);
				  $this->db->update('rp_type', $data);
  
				  echo "บันทึกข้อมูลสำเร็จ";
			  } else {
				  echo "ไม่มีข้อมูลที่จะอัพเดต";
			  }
		  } else {
			  echo "ไม่สามารถบันทึกข้อมูลได้เนื่องจากไม่มีข้อมูลในตาราง";
  
		  }
	  }
	  public function admin_update_address()
	  {
  
		  $data = array();
		  $id_address = $this->input->post('id_address');
		  $edit_name_address = $this->input->post('edit_name_type');
  
		  if (!empty($id_address)) {
			  if (!empty($edit_name_address)) {
				  $data['name_address'] = $edit_name_address;
			  }
  
			  if (!empty($data)) {
				  $this->db->where('id_address', $id_address);
				  $this->db->update('rp_address', $data);
  
				  echo "บันทึกข้อมูลสำเร็จ";
			  } else {
				  echo "ไม่มีข้อมูลที่จะอัพเดต";
			  }
		  } else {
			  echo "ไม่สามารถบันทึกข้อมูลได้เนื่องจากไม่มีข้อมูลในตาราง";
  
		  }
	  }


	  // ########

	public function admin_edit_password()
	{
		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_edit_password');

	}

	   // ########
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

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/Profile', $data_total);

		
	}

        // ########
	public function profile_edit($id = 0)
	{

		$data['query'] = $this->function_model->read($id);


		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/Profile_edit', $data);


	}

      // ########
	public function token_list()
	{
		$data['data'] = $this->function_model->token_list();
		$data_total = array(
			'data' => $data
		);
		
		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/Token', $data_total);
	
	}

	      // ########
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
	
	
	public function list_repair()
	{
		$id = $_SESSION['id'];

		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');
		$status = $this->input->get('status');
		
		if (empty($start_date)) {
			$start_date =  date('Y-m-d', strtotime('-3 month'));
		}
	
		if (empty($end_date)) {
			$end_date =  date('Y-m-d');
		}



		$data['query'] = $this->function_model->rp_list_case($id, $status , $start_date, $end_date);	
		$num_status['num_status'] = $this->function_model->num_status_id($id, $start_date, $end_date);	

		$data_total = array(
			'id' => $id,
			'data' => $data,
			'start_date' => $start_date,
			'end_date' => $end_date,
			'num_status' => $num_status['num_status']
		
		);

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/list_repair', $data_total);

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
		$this->load->view('template/repair_system/header_admin');
		$this->load->view('repair_system/admin/manage_data', $data);	
	}


	// ########
	public function manage_update_data()
	{
		$data = array();
		$rp_case_id = $this->input->post('rp_case_id'); 
		$rp_case_usertel = $this->input->post('rp_case_usertel');
		$rp_case_useremail = $this->input->post('rp_case_useremail');
		$cus_type = $this->input->post('cus_type');
		$rp_case_name = $this->input->post('rp_case_name');
		$rp_case_detail = $this->input->post('rp_case_detail');
		$address = $this->input->post('address');
		$rp_case_address_detail = $this->input->post('rp_case_address_detail');

		$time_edit = date('Y-m-d H:i:s');

		if (!empty($rp_case_id)) {
			if (!empty($rp_case_usertel)) {
				$data['rp_case_usertel'] = $rp_case_usertel;
			}
			if (!empty($rp_case_useremail)) {
				$data['rp_case_useremail'] = $rp_case_useremail;
			}
			if (!empty($cus_type) && $cus_type != '#') {
				$data['rp_case_type'] = $cus_type;
			}
			if (!empty($rp_case_name)) {
				$data['rp_case_name'] = $rp_case_name;
			}
			if (!empty($rp_case_detail)) {
				$data['rp_case_detail'] = $rp_case_detail;
			}
			if (!empty($address) && $address != '--เลือก--') {
				$data['rp_case_address'] = $address;
			}
			if (!empty($rp_case_address_detail)) {
				$data['rp_case_address_detail'] = $rp_case_address_detail;
			}

			if (!empty($data)) {
				$this->db->where('rp_case_id', $rp_case_id);
				$this->db->update('rp_case', $data);

				echo "บันทึกข้อมูลสำเร็จ";
			} else {
				echo "ไม่มีข้อมูลที่จะอัพเดต";
			}
		} else {
			echo "ไม่สามารถบันทึกข้อมูลได้เนื่องจากไม่มีค่า id_user";
		}

	}
	// ########
	public function admin_del_type($id_type = 0)
	{

		$this->function_model->del_type($id_type);

		$this->session->set_flashdata('del_success', TRUE);
		redirect('repair_system/admin/admin_list_type', 'refresh');


	}

	public function admin_del_address($id_address = 0)
	{

		$this->function_model->del_address($id_address);

		$this->session->set_flashdata('del_success', TRUE);
		redirect('repair_system/admin/admin_list_address', 'refresh');


	}



	public function page_choice()
	{

		$this->load->view('page_choice');

	}


	public function admin_del_user($id = 0)
	{
		$this->function_model->del_user($id);

		$this->session->set_flashdata('del_success', TRUE);
		redirect('repair_system/admin/admin_list_user', 'refresh');


	}


	public function del_repair() {

		$rp_id = $this->input->post('rp_id'); 

			$sql = "SELECT code_token FROM rp_token";
			$query_token = $this->db->query($sql);
			$result_token = $query_token->row();
	
			$code_token = $result_token->code_token;

			$sql_data = "SELECT * FROM rp_case
			LEFT JOIN rp_type ON rp_case_type = id_type
			WHERE rp_case_id = $rp_id";
			$query_data = $this->db->query($sql_data)->row();
			
			$cus_name = $query_data->rp_case_username;
			$cus_tel = $query_data->rp_case_usertel;
			$cus_type = $query_data->rp_name_type;
			$cus_equipment = $query_data->rp_case_name;
			$cus_details = $query_data->rp_case_detail;
			$address = $query_data->rp_case_address;
			$repair_equipment = $query_data->rp_case_address_detail;
		
			$sToken = $code_token;
			$sMessage = "🚫 มีรายการยกเลิก\n";
	
			$sMessage .= "ชื่อ-นามสกุล : " . $cus_name . "\n";
			$sMessage .= "เบอร์โทรศัพท์มือถือ : " . $cus_tel . "\n";
			$sMessage .= "ประเภทงานซ่อม : " . $cus_type . "\n";
			$sMessage .= "อุปกรณ์ : " . $cus_equipment . "\n";
			$sMessage .= "รายละเอียดปัญหา : " . $cus_details . "\n";
			$sMessage .= "สถนาที่ : " . $address . '/' .$repair_equipment ."\n";
	
			$chOne = curl_init(); 
			curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
			curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
			curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
			curl_setopt( $chOne, CURLOPT_POST, 1); 
			curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
			$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
			curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
			curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
			$result = curl_exec( $chOne ); 
			
			$this->db->delete('rp_case', array('rp_case_id' => $rp_id));
			// echo $rp_id;
			$this->session->set_flashdata('del_success', TRUE);
	
	}


}

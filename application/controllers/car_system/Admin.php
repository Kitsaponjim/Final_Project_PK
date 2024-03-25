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
		$this->load->model('function_car_model_admin');
		$this->load->model('function_car_reserve');

	}

	// ########
	public function index()
	{
				
		$this->function_car_reserve->update(); //เช็ครายการรถที่ที่เสร็จเรียบร้อยและอัพเดท
		$this->function_car_reserve->update_status_car(); //เช็ครายการรถที่ไม่พร้อมและอัพเดต

		$id = $_SESSION['id'];
		$check = $this->function_car_reserve->check_test_2($id); 


		if(!empty($check) AND $check != '0'){
		if (!isset($_COOKIE['i_1'])) {
			setcookie('i_1', 0, time() + 180); // 60 วินาที
		}
		$i = $_COOKIE['i_1'];
		if ($i == 0) {
			$this->session->set_flashdata('check', TRUE);
			
			$i++;
			setcookie('i_1', $i, time() + 180); 
			redirect('car_system/admin/list_history_id', 'refresh');
		}
	}

	// if(!empty($check) AND $check != '0'){
    //     if (!$this->session->has_userdata('i_1')) {
    //         $this->session->set_userdata('i_1', 0);
    //     }
    //     $i = $this->session->userdata('i_1');
    //     if ($i == 0) {
    //         $this->session->set_flashdata('check', TRUE);
    //         $i++;
    //         $this->session->set_userdata('i_1', $i);
    //     }
    // }



		$user_role = $_SESSION['user_role'];
		$car_status = $this->input->get('car_status');

		$data['data'] = $this->function_car_model_admin->list_all_car_status($car_status);

		$data_all = array(
			'data' => $data,
			'user_role' => $user_role
		);


		$this->load->view('template/car_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('car_system/admin/admin_index', $data_all);

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

		$this->load->view('template/car_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('car_system/admin/list_history_id', $data_all);
	}


		// ########
		public function list_history_total()
		{
	
			$start_date = $this->input->get('start_date');
			$end_date = $this->input->get('end_date');

			$this->function_car_reserve->update(); //เช็ครายการรถที่ที่เสร็จเรียบร้อยและอัพเดท
			$this->function_car_reserve->update_status_car(); //เช็ครายการรถที่ไม่พร้อมและอัพเดต
	

			$data['data'] = $this->function_car_reserve->list_history_total($start_date, $end_date);
	
			$data_all = array(
				'data' => $data,
				
			);

			$this->load->view('template/car_system/header_admin');
			$this->load->view('template/footer');
			$this->load->view('car_system/admin/list_history_total', $data_all);
	
		}

// ########
		public function edit_request($case_id)
		{
			$data_case['data_case'] = $this->function_car_reserve->edit_request($case_id);
	
			$data = array(
				'data_case' =>$data_case,
			);

			$this->load->view('template/car_system/header_admin');
			$this->load->view('template/footer');
			$this->load->view('car_system/admin/edit_request',$data);
	
	
		}
// ########
		public function edit_request_total($case_id)
		{
			$data_case['data_case'] = $this->function_car_reserve->edit_request($case_id);
	
			$data = array(
				'data_case' =>$data_case,
			);

			$this->load->view('template/car_system/header_admin');
			$this->load->view('template/footer');
			$this->load->view('car_system/admin/edit_request_total',$data);
	
	
		}


// ########
	public function edit_user($id_user = 0)
	{

		$status_user['status_user'] = $this->function_car_reserve->status_user();
		$role_user['role_user'] = $this->function_model->role_user();

		$data = array(
			'id_user' => $id_user,
			'status_user' => $status_user,
			'role_user' => $role_user
		);

		$this->load->view('template/car_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('car_system/admin/admin_edit_user', $data);


	}

// ########
	public function admin_car_list()
	{

		$car_brand = $this->input->get('role');
		$car_type = $this->input->get('status');
		$sit = $this->input->get('sit');
		
		// echo $car_brand;
		// echo "<br>";
		// echo $car_type;
		// echo "<br>";
		// echo $sit;
		// echo "<br>";


		$data['data'] = $this->function_car_model_admin->list_all_car($car_brand ,$car_type ,$sit);

		$data_driver['data_driver'] = $this->function_car_model_admin->data_driver();

		$data_type_car['data_type_car'] = $this->function_car_model_admin->data_type_car();

		$data_brand_car['data_brand_car'] = $this->function_car_model_admin->data_brand_car();

		$car_readiness['car_readiness'] = $this->function_car_model_admin->car_readiness();

		$user_role['user_role'] = $this->function_car_model_admin->_role();
		
		$user_role_edit['user_role_edit'] = $this->function_car_model_admin->_role();

		$data_all = array(
			'data' => $data,
			'data_type_car' => $data_type_car,
			'data_brand_car' => $data_brand_car,
			'data_driver' => $data_driver,
			'car_readiness' => $car_readiness,
			'user_role' => $user_role,
			'user_role_edit' => $user_role_edit,
		);

		$this->load->view('template/car_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('car_system/admin/admin_car_list', $data_all);

	}

// ########
	public function add_driver() {

		$driver_name = $this->input->post('driver_name');
		$driver_tel = $this->input->post('driver_tel');
		$driver_history = $this->input->post('driver_history');
		$Token = $this->input->post('Token');

			// ดึงข้อมูลไฟล์รูปภาพ (ถ้ามีการอัพโหลดไฟล์)
			$cus_image_filename = null;
			$image_mime_type = null;
			$image_data = null;
	
			if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
				$cus_image_filename = $_FILES['file_upload']['name'];
				$image_mime_type = $_FILES['file_upload']['type'];
				$image_data = file_get_contents($_FILES['file_upload']['tmp_name']);
			}
	
	
			$data = array(
				'driver_name' => $driver_name,
				'driver_tel' => $driver_tel,
				'driver_history' => $driver_history,
				'image_filename_driver' => $cus_image_filename,
				'image_mime_type_driver' => $image_mime_type,
				'image_data_driver' => $image_data,
				'code_token' => $Token,
	
			);
	
			$this->db->insert('car_driver_information', $data);	
			$this->session->set_flashdata('save_success', TRUE);

	}


// ########
	public function edit_driver() {

		$inputValue = $this->input->post('inputValue');
		$driver_name = $this->input->post('driver_name');
		$driver_tel = $this->input->post('driver_tel');
		$driver_history = $this->input->post('driver_history');
		$code_token = $this->input->post('code_token');
		
		$date_edit = date('Y-m-d H:i:s'); 

		// ดึงข้อมูลไฟล์รูปภาพ (ถ้ามีการอัพโหลดไฟล์)
		$cus_image_filename = null;
		$image_mime_type = null;
		$image_data = null;

		if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
			$cus_image_filename = $_FILES['file_upload']['name'];
			$image_mime_type = $_FILES['file_upload']['type'];
			$image_data = file_get_contents($_FILES['file_upload']['tmp_name']);
		}
	
		if (!empty($inputValue)) {
			if (!empty($driver_name)) {
				$data['driver_name'] = $driver_name;
			}
			if (!empty($driver_tel)) {

				$data['driver_tel'] = $driver_tel;
			}
			if (!empty($driver_history)) {

				$data['driver_history'] = $driver_history;
			}
			if (!empty($code_token)) {

				$data['code_token'] = $code_token;
			}
			
			if (!empty($cus_image_filename) && !empty($image_mime_type) && !empty($image_data)) {
				$data['image_filename_driver'] = $cus_image_filename;
				$data['image_mime_type_driver'] = $image_mime_type;
				$data['image_data_driver'] = $image_data;
			}

			if (!empty($data)) {
				$data['date_edit'] = $date_edit;
				$this->db->where('id_driver', $inputValue);
				$this->db->update('car_driver_information', $data);

				if ($this->db->affected_rows() > 0) {
					//ดึงข้อมูลออกมา
					$sql_driver = "SELECT id_driver , driver_name , driver_tel ,driver_history 
					FROM car_driver_information WHERE id_driver = '$inputValue'";
					$row_driver = $this->db->query($sql_driver)->row();

					$id_driver_up = $row_driver->id_driver;
					$driver_name_up = $row_driver->driver_name;
					$driver_tel_up = $row_driver->driver_tel;
					$driver_history_up = $row_driver->driver_history;
					$data_driver = $id_driver_up.','.$driver_name_up. ',' .$driver_tel_up. ',' .$driver_history_up;
	
					//เอา id รถที่ทีีคนขับตรงกับ id ที่มีการอัพเดท จะได้รถคันที่มีคนขับคันนี้ไว้
					$sql_data = "SELECT car_id FROM car_list WHERE car_driver = $inputValue";
					$row_data = $this->db->query($sql_data)->row(); //id รถ
	
					if(!empty($row_data)){
						$car_id = $row_data->car_id;
						$status = 1;
						//เอา id รถไปค้นในรายการที่มีการจองรถ ที่มีสถานะ จอง -> 1
						$sql_data_up = "SELECT case_id FROM car_case 
										WHERE car_list = '$car_id' AND status_reserve = '$status'";
						//ได้ข้อมูลออกมาหลายรายการ
						$row_data_up = $this->db->query($sql_data_up)->result();

						if (!empty($row_data_up)) {
							foreach ($row_data_up as $row_update) {
								$case_id = $row_update->case_id;

								$sql_update = "UPDATE car_case
								SET data_driver = '$data_driver'
								WHERE case_id = $case_id AND status_reserve = 1";
								$this->db->query($sql_update);

								}
		
							}
						}
				}

				$this->session->set_flashdata('save_success', TRUE);
			} else {
				$this->session->set_flashdata('no_data', TRUE);
			}
		} else {
			$this->session->set_flashdata('wrong_alert', TRUE);
		}


	}

// ########
	public function car_add()
	{

		$car_brand = $this->input->post('car_brand');
		$car_model = $this->input->post('car_model');
		$car_color = $this->input->post('car_color');
		$car_registration = $this->input->post('car_registration');
		$car_number_seat = $this->input->post('car_number_seat');
		$car_usage_status = $this->input->post('car_usage_status');
		$car_other = $this->input->post('car_other');

		$car_drive = $this->input->post('car_drive');

		$selectedRoles = $this->input->post('selectedRoles');


		$cus_image_filename = null;
		$image_mime_type = null;
		$image_data = null;

		if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
			$cus_image_filename = $_FILES['file_upload']['name'];
			$image_mime_type = $_FILES['file_upload']['type'];
			$image_data = file_get_contents($_FILES['file_upload']['tmp_name']);
		}

		// 'image_filename' => $cus_image_filename,
		// 'image_mime_type' => $image_mime_type,
		// 'image_data' => $image_data,

			$data = array(
				'car_brand' => $car_brand,
				'car_model' => $car_model,
				'car_type' => $car_model,
				'car_color' => $car_color,
				'car_registration' => $car_registration,
				'car_number_seat' => $car_number_seat,
				'car_usage_status' => $car_usage_status,
				'car_driver' => $car_drive,
				'car_other' => $car_other,
				'role_id' => $selectedRoles,
				'image_filename' => $cus_image_filename,
				'image_mime_type' => $image_mime_type,
				'image_data' => $image_data
	
			);
	
		$this->db->insert('car_list', $data);
		$this->session->set_flashdata('save_success', TRUE);


	}
// ########
	public function car_add_b()
	{

		$car_brand = $this->input->post('car_brand');
		$car_model = $this->input->post('car_model');
		$car_color = $this->input->post('car_color');
		$car_registration = $this->input->post('car_registration');
		$car_number_seat = $this->input->post('car_number_seat');
		$car_usage_status = $this->input->post('car_usage_status');

		$car_drive = $this->input->post('car_drive');

		// $selectedRoles = $this->input->post('selectedRoles');

		// ดึงข้อมูลไฟล์รูปภาพ (ถ้ามีการอัพโหลดไฟล์)
		$cus_image_filename = null;
		$image_mime_type = null;
		$image_data = null;

		if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
			$cus_image_filename = $_FILES['file_upload']['name'];
			$image_mime_type = $_FILES['file_upload']['type'];
			$image_data = file_get_contents($_FILES['file_upload']['tmp_name']);
		}


			$data = array(
				'car_brand' => $car_brand,
				'car_model' => $car_model,
				'car_type' => $car_model,
				'car_color' => $car_color,
				'car_registration' => $car_registration,
				'car_number_seat' => $car_number_seat,
				'car_usage_status' => $car_usage_status,
				'car_driver' => $car_drive,
				'image_filename' => $cus_image_filename,
				'image_mime_type' => $image_mime_type,
				'image_data' => $image_data
	
			);
	
		$this->db->insert('car_list', $data);
		$this->session->set_flashdata('save_success', TRUE);


	}


// ########
	public function edit_car() {

		$inputValue = $this->input->post('inputValue');
		$brand_name = $this->input->post('brand_name');
		$type_name = $this->input->post('type_name');
		$car_color = $this->input->post('car_color');
		$car_registration = $this->input->post('car_registration');
		$car_number_seat = $this->input->post('car_number_seat');
		$id_driver = $this->input->post('id_driver');
		$readiness_id = $this->input->post('readiness_id');

		$selectedRoles = $this->input->post('selectedRoles');
		$car_other = $this->input->post('car_other_edit');

		$cus_image_filename = null;
		$image_mime_type = null;
		$image_data = null;

		if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
			$cus_image_filename = $_FILES['file_upload']['name'];
			$image_mime_type = $_FILES['file_upload']['type'];
			$image_data = file_get_contents($_FILES['file_upload']['tmp_name']);
		}

		if (!empty($inputValue)) {
			if (!empty($brand_name) && $brand_name != '--เลือก---') {
				$data['car_brand'] = $brand_name;
			}
			if (!empty($type_name) && $type_name != '--เลือก---') {
				$data['car_type'] = $type_name;
			}
			if (!empty($readiness_id) && $readiness_id != '#') {
				$data['car_usage_status'] = $readiness_id;
			}
			if (!empty($car_color)) {
				$data['car_color'] = $car_color;
			}
			if (!empty($car_registration)) {
				$data['car_registration'] = $car_registration;
			}
			if (!empty($car_number_seat)) {
				$data['car_number_seat'] = $car_number_seat;
			}
			if (!empty($id_driver) && $id_driver != '') {
				$data['car_driver'] = $id_driver;
			}
			if (!empty($car_other)) {
				$data['car_other'] = $car_other;
			}
			if ($selectedRoles !== null && !empty($selectedRoles)) {
				$data['role_id'] = $selectedRoles;
			}
			if (!empty($cus_image_filename) && !empty($image_mime_type) && !empty($image_data)) {
				$data['image_filename'] = $cus_image_filename;
				$data['image_mime_type'] = $image_mime_type;
				$data['image_data'] = $image_data;
			}

			if (!empty($data)) {
				$last_edit_car = date('Y-m-d H:i:s');
				$data['last_edit_car'] = $last_edit_car;

				$this->db->where('car_id', $inputValue);
				$this->db->update('car_list', $data);

				// alert("แจ้งให้ทราบว่าเราจะยกเลิกรายการจองรถนี้ที่มีรายการจองอีก 2 วันข้างหน้า");
				$this->function_car_reserve->update_edit_car($inputValue ,$readiness_id ,$id_driver);


				$this->session->set_flashdata('save_success', TRUE);
			} else {
				$this->session->set_flashdata('no_data', TRUE);
			}
		} else {
			$this->session->set_flashdata('wrong_alert', TRUE);
		}


	}

	// ########
	public function del_car($car_id) {

		$this->function_car_model_admin->del_car($car_id);

		$this->session->set_flashdata('del_success', TRUE);
		redirect('car_system/admin/admin_car_list', 'refresh');

	}


	// ########
	public function check_del_driver() {

		// $id_driver = $this->input->post('id_driver');

		// $sql_check = "SELECT car_id FROM car_list WHERE car_driver = $id_driver";
		// $row = $this->db->query($sql_check)->row();

		$id_driver = $this->input->post('id_driver');

		$sql_check = "SELECT car_id FROM car_list WHERE car_driver = ?";
		$row = $this->db->query($sql_check, array($id_driver))->row();


		if (!empty($row)) {
			$this->session->set_flashdata('del_driver_cancel', TRUE);
		} else {
			$this->function_car_model_admin->del_driver($id_driver);
			$this->session->set_flashdata('del_success', TRUE);

		}
	}


	// ########
	public function del_driver($id_driver) {


		$this->function_car_model_admin->del_driver($id_driver);


		$this->session->set_flashdata('del_success', TRUE);

		redirect('car_system/admin/list_driver', 'refresh');


	}


// ########
		public function list_type_car()
		{
			$list_type_car['list_type_car'] = $this->function_car_model_admin->list_type_car();
			$data_all = array(
				'list_type_car' => $list_type_car
			);
		
			$this->load->view('template/car_system/header_admin');
			$this->load->view('template/footer');
			$this->load->view('car_system/admin/list_type_car',$data_all);
	
	
		}
			// ########
		public function add_type_car() {

			$type_car = $this->input->post('type_car');

			// echo $type_car;

				$data = array(
					'type_name' => $type_car
				);

				$this->db->insert('car_type', $data);
	
				$this->session->set_flashdata('save_success', TRUE);
	
	
		}

		

		// ########
	public function admin_update_type() {

		$data = array();

		$inputValue = $this->input->post('inputValue');
		$type_name = $this->input->post('type_name');

	
		if (!empty($inputValue)) {
			if (!empty($type_name)) {
				$data['type_name'] = $type_name;
			}
	
			if (!empty($data)) {
				$this->db->where('car_type_id', $inputValue);
				$this->db->update('car_type', $data);

				$this->session->set_flashdata('save_edit', TRUE);
			} else {
				$this->session->set_flashdata('wrong_alert', TRUE);
			}
		} else {
			$this->session->set_flashdata('wrong_alert', TRUE);
		}

	}
	// ########
	public function del_type($car_type_id) {


		$this->function_car_model_admin->del_type($car_type_id);

		$this->session->set_flashdata('del_success', TRUE);

		redirect('car_system/admin/list_type_car', 'refresh');


	}


	// ########
	public function list_brand_car()
	{

		$list_brand_car['list_brand_car'] = $this->function_car_model_admin->list_brand_car();

		$data_all = array(
			'list_brand_car' => $list_brand_car
		);
	
		$this->load->view('template/car_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('car_system/admin/list_brand_car',$data_all);
	}

	
			// ########
	public function add_brand_car() {

		// $dat = array();
		$brand_car = $this->input->post('brand_car_add');

		// echo $brand_car;

			$data = array(
				'brand_name' => $brand_car

			);

			if(!empty($data)){
				$this->db->insert('car_brand', $data);

				$this->session->set_flashdata('save_success', TRUE);
			}else{
				$this->session->set_flashdata('wrong_alert', TRUE);
			}


			// echo "gg";


	}


	public function edit_time() {
		

		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');

		


	}


		// ########
	public function admin_update_brand() {

		$data = array();

		$inputValue = $this->input->post('inputValue');
		$brand_car = $this->input->post('brand_car');

		if (!empty($inputValue)) {
			if (!empty($brand_car)) {
				$data['brand_name'] = $brand_car;
			}
	
			if (!empty($data)) {
				$this->db->where('brand_id', $inputValue);
				$this->db->update('car_brand', $data);

				$this->session->set_flashdata('save_edit', TRUE);
			} else {
				$this->session->set_flashdata('wrong_alert', TRUE);
			}
		} else {
			$this->session->set_flashdata('wrong_alert', TRUE);
		}

	}

// ########
	public function del_brand($brand_id) {

		$this->function_car_model_admin->del_brand($brand_id);

		$this->session->set_flashdata('del_success', TRUE);

		redirect('car_system/admin/list_brand_car', 'refresh');


	}


// ########
	public function admin_list_user()
	{

		$status = $this->input->get('status');
		$role = $this->input->get('role');

		$data['query'] = $this->function_car_model_admin->list_user($status , $role);
	
		$this->load->view('template/car_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('car_system/admin/admin_list_user',$data);

	}

// ########
	public function list_driver() {

		$list_driver['list_driver'] = $this->function_car_model_admin->list_driver();
		$data_all = array(
			'list_driver' => $list_driver,

		);

		$this->load->view('template/car_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('car_system/admin/list_driver', $data_all);

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

		$this->load->view('template/car_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('car_system/admin/Profile', $data_total);

		
	}

	        // ########
			public function profile_edit($id = 0)
			{
		

				$data['query'] = $this->function_model->read($id);
		
				$this->load->view('template/car_system/header_admin');
				$this->load->view('template/footer');
				$this->load->view('car_system/admin/Profile_edit', $data);
		
		
			}

				  // ########

	public function admin_edit_password()
	{

		$this->load->view('template/car_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('car_system/admin/admin_edit_password');

	}



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
				$data['user_status_car'] = $status;
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

	public function show_events()
	{
		$event_data = $this->function_car_model_admin->events();
		$event_data2 = $this->function_car_model_admin->cars();

		$data = array();

		foreach ($event_data->result_array() as $row) {
			$color = ''; // ค่า default

			// เงื่อนไขในการกำหนดค่าสี
			if ($row['status_reserve'] == 1) {
				$color = '#4281ff';
			} elseif ($row['status_reserve'] == 2) {
				$color = '#e6e6e6';
			} elseif ($row['status_reserve'] == 3) {
				$color = '#99ffb3';
			}
			$data[] = array(
				'id' => $row['case_id'],
				'name' => $row['name_passengers'],
				'title' => $row['car_title'],
				'start' => date('Y-m-d H:i:s', $row['car_start_date']),
				'end'  => date('Y-m-d H:i:s', $row['car_end_date']),
				'color' => $color,
				'type' => '',
			);
		}

		foreach ($event_data2->result_array() as $key => $row) {
			$data[$key]['type'] = $row['car_type'];
		}

		echo json_encode($data);
	}

}

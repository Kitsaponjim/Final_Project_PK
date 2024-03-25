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
		$this->load->model('function_room_admin');
		$this->load->model('function_room');
	}

	public function index()
	{

		// $status = $this->input->get('status');
		$date = $this->input->get('date');
		// $date_end = $this->input->get('date_end');
		$room = $this->input->get('room');

		$this->function_room_admin->update();

		// $list_room['list_room'] = $this->function_room_admin->list_requesterRoom_total($date ,$date_end,$room ,$status);
		$list_room['list_room'] = $this->function_room->list_requesterRoom_total_index($date, $room);

		$data = array(
			'list_room' => $list_room
		);

		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/admin_index', $data);
	}



	public function list_room()
	{

		$room['room'] = $this->function_room_admin->list_room();

		$room_readiness['room_readiness'] = $this->function_room_admin->room_readiness();

		$equipment['equipment'] = $this->function_room_admin->list_equipment();
		$equipment_add['equipment_add'] = $this->function_room_admin->list_equipment();


		$data = array(
			'room' => $room,
			'room_readiness' => $room_readiness,
			'equipment' => $equipment,
			'equipment_add' => $equipment_add,
		);

		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/list_room', $data);
	}


	public function add_room()
	{

		$equipment['equipment'] = $this->function_room_admin->list_equipment();


		$data = array(
			'equipment' => $equipment
		);


		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/add_room', $data);
	}

	public function admin_addRoom()
	{


		$room_name = $this->input->post('room_name');
		$room_seating = $this->input->post('room_seating');
		$room_address = $this->input->post('room_address');
		$room_attendant = $this->input->post('room_attendant');
		$room_attendant_tel = $this->input->post('room_attendant_tel');
		$room_note = $this->input->post('room_note');
		$room_status = $this->input->post('room_status');
		$selectedEquipment = $this->input->post('selectedEquipment');

		// ดึงข้อมูลไฟล์รูปภาพ (ถ้ามีการอัพโหลดไฟล์)
		$cus_image_filename = null;
		$image_mime_type = null;
		$image_data = null;

		if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
			$cus_image_filename = $_FILES['file_upload']['name'];
			$image_mime_type = $_FILES['file_upload']['type'];
			$image_data = file_get_contents($_FILES['file_upload']['tmp_name']);
		}

		$sql_name = "SELECT room_id , room_name FROM room_table";
		$result = $this->db->query($sql_name)->result();

		$roomNameExists = false;

		foreach ($result as $row) {
			if ($row->room_name == $room_name) {
				$roomNameExists = true;
				$this->session->set_flashdata('room_name', TRUE);
				break;
			}
		}

		if (!$roomNameExists) {
			$data = array(
				'room_name' => $room_name,
				'room_capacity' => $room_seating,
				'room_address' => $room_address,
				'room_equipment' => $selectedEquipment,
				'room_attendant' => $room_attendant,
				'room_attendant_tel' => $room_attendant_tel,
				'room_note' => $room_note,
				'room_status' => $room_status,
				'image_filename' => $cus_image_filename,
				'image_mime_type' => $image_mime_type,
				'image_data' => $image_data
			);

			$this->db->insert('room_table', $data);

			$this->session->set_flashdata('save_success', TRUE);
		}
	}

	public function edit_room($room_id = 0)
	{

		$query['query'] = $this->function_room_admin->list_roomID($room_id);

		$data = array(
			'query' => $query
		);

		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/edit_room', $data);
	}



	public function admin_DelRoom($room_id = 0)
	{

		$this->function_room_admin->del_room($room_id);

		$this->session->set_flashdata('del_success', TRUE);

		redirect('room_system/admin/list_room', 'refresh');
	}

	public function admin_EditRoom()
	{
		$room_id = $this->input->post('room_id');
		$room_name = $this->input->post('room_name');
		$equipment = $this->input->post('selectedEquipment');
		$room_address = $this->input->post('room_address');
		$room_seating = $this->input->post('room_seating');
		$room_attendant = $this->input->post('room_attendant');
		$room_attendant_tel = $this->input->post('room_attendant_tel');
		$room_note = $this->input->post('room_note');

		$room_status = $this->input->post('room_status');

		// ดึงข้อมูลไฟล์รูปภาพ (ถ้ามีการอัพโหลดไฟล์)
		$image_filename = null;
		$image_mime_type = null;
		$image_data = null;

		if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
			$image_filename = $_FILES['file_upload']['name'];
			$image_mime_type = $_FILES['file_upload']['type'];
			$image_data = file_get_contents($_FILES['file_upload']['tmp_name']);
		}

		if (!empty($room_id)) {
			if (!empty($room_name)) {
				$data['room_name'] = $room_name;
			}
			if (!empty($room_seating)) {
				$data['room_capacity'] = $room_seating;
			}
			if (!empty($room_address)) {
				$data['room_address'] = $room_address;
			}

			if ($equipment !== null && !empty($equipment)) {
				$data['room_equipment'] = $equipment;
			}


			if (!empty($room_attendant)) {
				$data['room_attendant'] = $room_attendant;
			}
			if (!empty($room_attendant_tel)) {
				$data['room_attendant_tel'] = $room_attendant_tel;
			}
			if (!empty($room_note)) {
				$data['room_note'] = $room_note;
			}


			if (!empty($room_status)  && $room_status != '#') {
				$data['room_status'] = $room_status;
			}



			if (!empty($image_data)) {
				$data['image_data'] = $image_data;
				$data['image_filename'] = $image_filename;
				$data['image_mime_type'] = $image_mime_type;
			}

			if (!empty($data)) {
				$this->db->where('room_id', $room_id);
				$this->db->update('room_table', $data);


				if ($room_status == 2) {
					$status = 2;
					$cancel_detail = "ห้องไม่พร้อมใช้งาน";
					$date = date("Y-m-d H:i:s");
					$sql = "SELECT booking_id ,room_status FROM room_booking_table 
						WHERE room_id = $room_id AND room_status = 1";
					$result = $this->db->query($sql)->result();

					if (!empty($result)) {
						foreach ($result as $row) {
							$booking_id = $row->booking_id;
							$room_status = $row->room_status;

							$this->db->where('booking_id', $booking_id)
								->update('room_booking_table', array(
									'room_status' => $status,
									'cancel_detail' => $cancel_detail,
									'date_cancel' => $date
								));
						}
					}
				}

				// เปลี่ยนจาก = เป็น ==

				// if ($room_status == 2) {
				//     $status = 2;
				//     $cancel_detail = "ห้องไม่พร้อมใช้งาน";
				//     $date = date("Y-m-d H:i:s");
				//     $sql = "SELECT booking_id ,room_status FROM room_booking_table 
				//             WHERE room_id = $room_id AND room_status = 1";
				//     $result = $this->db->query($sql)->result();

				//     if (!empty($result)) {
				//         foreach ($result as $row) {
				//             if ($room_id == $row->booking_id) {
				//                 $this->db->where('booking_id', $room_id)
				//                          ->update('room_booking_table', array(
				//                              'room_status' => $status,
				//                              'cancel_detail' => $cancel_detail,
				//                              'date_cancel' => $date
				//                          ));
				//             }
				//         }
				//     }
				// }


				$this->session->set_flashdata('save_success', TRUE);
			} else {
				$this->session->set_flashdata('no_data', TRUE);
			}
		} else {
			$this->session->set_flashdata('wrong_alert', TRUE);
		}
	}




	public function list_equipment()
	{

		$equipment['equipment'] = $this->function_room_admin->list_equipment();

		$data = array(
			'equipment' => $equipment
		);

		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/list_equipment', $data);
	}


	public function add_equipment()
	{
		$equipment_name = $this->input->post('equipment_name');
		$data = array(
			'equipment_name' => $equipment_name

		);

		$this->db->insert('room_equipment', $data);

		$this->session->set_flashdata('save_success', TRUE);
	}


	public function edit_equipment()
	{

		$equipment_id = $this->input->post('equipment_id');
		$equipment_name = $this->input->post('equipment_name');


		if (!empty($equipment_id)) {

			if (!empty($equipment_name)) {
				$data['equipment_name'] = $equipment_name;
			}
			if (!empty($data)) {
				$this->db->where('equipment_id', $equipment_id);
				$this->db->update('room_equipment', $data);

				$this->session->set_flashdata('save_success', TRUE);
			} else {
				$this->session->set_flashdata('no_data', TRUE);
			}
		} else {
			$this->session->set_flashdata('wrong_alert', TRUE);
		}
	}



	public function del_equipment($equipment_id)
	{

		$this->function_room_admin->del_equipment($equipment_id);

		$this->session->set_flashdata('del_success', TRUE);
		redirect('room_system/admin/list_equipment', 'refresh');
	}



	public function Reserve_room()
	{

		$user_id = $this->input->post('user_id');
		$date_time = $this->input->post('date_time');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		$room_id = $this->input->post('room_id');
		$number_people = $this->input->post('number_people');
		$meeting_topic = $this->input->post('meeting_topic');
		$name_requester = $this->input->post('name_requester');
		$tel_requester = $this->input->post('tel_requester');


		$data = array(
			'user_id' => $user_id,
			'date_time' => $date_time,
			'start_time' => $start_time,
			'end_time' => $end_time,
			'room_id' => $room_id,
			'number_people' => $number_people,
			'meeting_topic' => $meeting_topic,
			'name_requester' => $name_requester,
			'tel_requester' => $tel_requester
		);

		$this->db->insert('room_booking_table', $data);

		$this->session->set_flashdata('save_success', TRUE);
	}


	public function list_requesterRoom()
	{

		$status = $this->input->get('status');
		$date = $this->input->get('date');
		$date_end = $this->input->get('date_end');
		$room = $this->input->get('room');


		$id = $_SESSION['id'];
		$this->function_room_admin->update();


		$list_room['list_room'] = $this->function_room_admin->list_requesterRoom($id, $date, $date_end, $room, $status);

		$data = array(
			'list_room' => $list_room
		);

		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/list_requesterRoom', $data);
	}


	public function Edit_requestRoom($booking_id)
	{

		$data_room['data_room'] = $this->function_room_admin->edit_requestRoom($booking_id);

		$data = array(
			'data_room' => $data_room

		);

		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/edit_requestRoom', $data_room);
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




	public function list_requesterRoom_total()
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


		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/list_requesterRoom_total', $data);
	}


	public function list_user()
	{

		$status = $this->input->get('status');
		$role = $this->input->get('role');


		$query['query'] = $this->function_room_admin->list_user($status);


		$data = array(
			'query' => $query
		);

		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/admin_list_user', $data);
	}


	public function edit_user($id_user = 0)
	{

		$status_user['status_user'] = $this->function_room_admin->status_user();
		$role_user['role_user'] = $this->function_model->role_user();

		$data = array(
			'id_user' => $id_user,
			'status_user' => $status_user,
			'role_user' => $role_user
		);

		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/admin_edit_user', $data);
	}

	public function update_user()
	{


		$data = array();
		$id_user = $this->input->post('id_user');
		$edit_cus_name = $this->input->post('edit_cus_name');
		$edit_cus_email = $this->input->post('edit_cus_email');
		$edit_cus_tel = $this->input->post('edit_cus_tel');
		$status = $this->input->post('status');


		$time_edit = date('Y-m-d H:i:s');

		$data['last_edit_data'] = $time_edit;

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
			if (!empty($status)) {
				$data['user_status_room'] = $status;
			}


			if (!empty($data)) {
				$this->db->where('id', $id_user);
				$this->db->update('user_info', $data);

				echo "บันทึกข้อมูลสำเร็จ";
			} else {
				echo "ไม่มีข้อมูลที่จะอัพเดต";
			}
		} else {
			echo "ไม่สามารถบันทึกข้อมูลได้เนื่องจากไม่มีค่า id_user";
		}
	}




	public function profile()
	{

		$status_user = $_SESSION['user_status_room'];
		$id = $_SESSION['id'];

		$data['query'] = $this->function_model->read($id);

		$user_status['user_status'] = $this->function_room_admin->user_status_id($id, $status_user);

		$data_total = array(
			'data' => $data,
			'user_status' => $user_status

		);


		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/Profile', $data_total);
	}


	public function edit_profile($id = 0)
	{
		$data['query'] = $this->function_model->read($id);

		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/edit_profile', $data);
	}

	public function edit_password()
	{

		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/edit_password');
	}

	public function update_password()
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
			if (!empty($status) && $status != '#') {
				$data['user_status_room'] = $status;
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



	public function update_cancel()
	{


		$cancel = $this->input->post('cancel');
		$booking_id = $this->input->post('booking_id');

		$status_reserve = '2'; //ยกเลิก
		$date_cancel = date('Y-m-d H:i:s');

		if (!empty($booking_id)) {
			$data['cancel_detail'] = $cancel;
			$data['room_status'] = $status_reserve;
			$data['date_cancel'] = $date_cancel;

			$this->db->where('booking_id', $booking_id);
			$this->db->update('room_booking_table', $data);

			$this->session->set_flashdata('cancel_car', TRUE);
		} else {
			$this->session->set_flashdata('no_data', TRUE);
		}
	}
	public function edit_time()
	{

		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');

		if (!empty($start_time)) {
			$data['start_time'] = $start_time;
		}
		if (!empty($end_time)) {
			$data['end_time'] = $end_time;
		}

		if (!empty($data)) {
			$this->db->update('room_time', $data);
			$this->session->set_flashdata('save_edit', TRUE);
		} else {
			$this->session->set_flashdata('wrong_alert', TRUE);
		}
	}

	public function admin_index2()
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


		$this->load->view('template/room_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('room_system/admin/admin_index2', $data_all);
	}

	public function show_events()
	{
		$event_data = $this->function_room_admin->events();
		$event_data2 = $this->function_room_admin->rooms();

		$data = array();

		foreach ($event_data->result_array() as $row) {
			$color = ''; // ค่า default

			// เงื่อนไขในการกำหนดค่าสี
			if ($row['room_status'] == 1) {
				$color = '#66b3ff';
			} elseif ($row['room_status'] == 2) {
				$color = '#e6e6e6';
			} elseif ($row['room_status'] == 3) {
				$color = '#99ffb3';
			}
			$start_datetime = $row['date_time'] . ' ' . $row['start_time'];
			$end_datetime = $row['date_time'] . ' ' . $row['end_time'];

			$data[] = array(
				'id' => $row['booking_id'],
				'name' => $row['name_requester'],
				'title' => $row['meeting_topic'],
				'start' => $start_datetime,
				'end'  =>  $end_datetime,
				'color' => $color,
			);
		}

		foreach ($event_data2->result_array() as $key => $row) {
			$data[$key]['room_name'] = $row['room_name'];
		}

		echo json_encode($data);
	}
}

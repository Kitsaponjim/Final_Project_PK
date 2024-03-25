<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reserve extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();


		$this->load->model('function_model');
		$this->load->model('function_car_model_admin');
		$this->load->model('function_car_reserve');

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

		$this->load->view('template/car_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('car_system/list_car', $data_all);

	}


// 	public function list_car_check()
// {
//     $car_id = $this->input->post('car_id');
//     $start_date = $this->input->post('start_date');

//     $status = 1; // ว่าง
//     $sql = "SELECT car_end_date FROM car_case WHERE car_list = ? AND status_reserve = ?";
//     $query = $this->db->query($sql, array($car_id, $status))->result();

//     if (!empty($query)) {
//         foreach ($query as $row) {
//             $car_end_date = strtotime($row->car_end_date);
//             $start_date_date = strtotime($start_date);

// 			$num = 3600;
//             // Check if $start_date_date is within 1 hour before or after $car_end_date
//             if (abs($start_date_date - $car_end_date) < $num) {
//                 echo "มีรายการจองรถคันนี้ก่อนหน้า 1 ชั่วโมง";
//                 return;
//             } else {
//                 echo "ok";
//             }
//         }
//     }
// }


// 	// ########
// 	public function list_car_check()
// {
//     $car_id = $this->input->post('car_id');
//     $start_date = $this->input->post('start_date');

//     $status = 1; // ว่าง 
//     $sql = "SELECT car_end_date FROM car_case WHERE car_list = $car_id AND status_reserve = $status";
//     $query = $this->db->query($sql)->row();

//     if ($query) {
//         $car_end_date = strtotime($query->car_end_date);
//         $start_date_date = strtotime($start_date);

//         // เช็คว่า $start_date_date อยู่หลัง $car_end_date น้อยกว่า 1 ชั่วโมง
//         if (($start_date_date - $car_end_date) < 3600) {
//             $formatted_end_date = date("Y-m-d H:i:s", $car_end_date);
//             echo "รถคันนี้มีการจองในช่วงเวลา $formatted_end_date ถึงปัจจุบัน";
//         } else {
//             echo "ok";
//         }
//     }
// }

	public function list_car_check()
	{
		$car_id = $this->input->post('car_id');
		$start_date = $this->input->post('start_date');

		$status = 1; //ว่าง 
		// $sql = "SELECT car_end_date FROM car_case WHERE car_list = $car_id AND status_reserve = $status";
		// $query = $this->db->query($sql)->result();

		$sql = "SELECT car_end_date FROM car_case WHERE car_list = ? AND status_reserve = ?";
		$query = $this->db->query($sql, array($car_id, $status))->result();

		// if (!empty($query)) {
		// 	// เรียกค่า car_end_date จาก array ที่ได้
		// 	$car_end_date = strtotime($query[0]->car_end_date);
		// 	$start_date_date = strtotime($start_date);

		// 	// เช็คว่า $start_date_date อยู่หลัง $car_end_date น้อยกว่า 1 ชั่วโมง
		// 	if (($start_date_date - $car_end_date) < 3600) {
		// 		echo "มีรายการจองรถคันนี้ก่อนหน้า 1 ชั่วโมง";
		// 	} else {
		// 		echo "ok";
		// 	}
		// }


		if (!empty($query)) {
			foreach ($query as $row) {
				$car_end_date = strtotime($row->car_end_date);
				$start_date_date = strtotime($start_date);
	
				// เช็คว่า $start_date_date อยู่หลัง $car_end_date น้อยกว่า 1 ชั่วโมง
				if (($start_date_date - $car_end_date) < 3600) {
					echo "มีรายการจองรถคันนี้ก่อนหน้า 1 ชั่วโมง";
					return;
				}else{
					echo "ok";
				}
			}
			
		}


		// if ($query) {
		// 	$car_end_date = strtotime($query->car_end_date);
		// 	$start_date_date = strtotime($start_date);

		// 	// เช็คว่า $start_date_date อยู่หลัง $car_end_date น้อยกว่า 1 ชั่วโมง
		// 	if (($start_date_date - $car_end_date) < 3600) {
		// 		echo "มีรายการจองรถคันนี้ก่อนหน้า 1 ชั่วโมง";
		// 	} else {
		// 		echo "ok";
		// 	}

		// }

	}


	// ######## จองรถ
	public function reserve_car_add()
	{

		$carIdValue = $this->input->post('carIdValue');

		$sql = "SELECT * FROM car_list
		LEFT JOIN car_driver_information ON car_driver = id_driver
			 WHERE car_id = $carIdValue";
		$row = $this->db->query($sql)->row();

		$code_token = $row->code_token;
		$car_id = $row->car_id;
		$car_brand = $row->car_brand;
		$car_model = $row->car_model;
		$car_registration = $row->car_registration;
		$car_color = $row->car_color;
		$car_type = $row->car_type;
		$car_number_seat = $row->car_number_seat;
		$car_other = $row->car_other;
		if (empty($car_other)) {
			$car_other = "-";
		}

		$id_driver = $row->id_driver;
		$driver_name = $row->driver_name;
		$driver_tel = $row->driver_tel;
		$driver_history = $row->driver_history;
		if (empty($driver_history)) {
			$driver_history = "-";
		}

		$car_details = $car_id . ',' . $car_brand . ',' . $car_model . ',' . $car_type . ',' . $car_registration . ',' . $car_color . ',' . $car_number_seat . ',' . $car_other;
		$driver_details = $id_driver . ',' . $driver_name . ',' . $driver_tel . ',' . $driver_history;

		$car_add_date = date('Y-m-d H:i:s'); //	วันที่เพิ่มข้อมูล	

		$start_date = $this->input->post('start_date');
		list($date_start, $time_start) = explode('T', $start_date);

		$end_date = $this->input->post('end_date'); //วันที่สิ้นสุดการจอง	
		list($date_ecd, $time_end) = explode('T', $end_date);

		$name_reserve = $this->input->post('name_reserve');
		$tel_reserve = $this->input->post('tel_reserve');
		$car_title = $this->input->post('car_title');

		$Pickup_location = $this->input->post('Pickup_location');
		$Down_finish = $this->input->post('Down_finish');
		$address = $this->input->post('address');

		$number_passengers = $this->input->post('number_passengers'); //จำนวนผู้โดยสาร	
		$name_passengers = $this->input->post('name_passengers'); //รายชื่อผู้โดยสาร	
		$tel_reserve_main = $this->input->post('tel_reserve_main'); //เบอร์
		$detail = $this->input->post('detail');

		$timestamp_add = strtotime($car_add_date);
		$timestamp_start = strtotime($start_date); //	วันที่เริ่มจอง	
		$timestamp_end = strtotime($end_date); //	วันที่สิ้นสุดการจอง	

		$timestamp_end_plus_one_hour = $timestamp_end + 1800; //จองถึงเวลาไหน บวกเพิ่มขึ้นอีก  30 นาที
		$status_reserve = 1;

		$user_id = $_SESSION['id'];

		$data = array(
			'car_list' => $carIdValue,
			'user_id' => $user_id,
			'name_reserve' => $name_reserve,
			'tel_reserve' => $tel_reserve,
			'car_title' => $car_title,
			'Pickup_location' => $Pickup_location,
			'Down_finish' => $Down_finish,
			'address' => $address,
			'number_passengers' => $number_passengers,
			'name_passengers' => $name_passengers,
			'tel_passengers' => $tel_reserve_main,
			'car_add_date' => $timestamp_add,
			'car_start_date' => $timestamp_start,
			'car_end_date' => $timestamp_end_plus_one_hour,
			'status_reserve' => $status_reserve,
			'data_car' => $car_details,
			'data_driver' => $driver_details,
			'note' => $detail,
		);

		$this->db->insert('car_case', $data);

		if ($this->db->affected_rows() > 0) {

			if(empty($detail)){
				$detail = '-';
			}

			$sToken = $code_token;
			$sMessage = "งานใหม่: รายการจองรถ \n";
			$sMessage .= "วันเวลาเริ่ม : " . $date_start . 'เวลา' . $time_start . "\n";
			$sMessage .= "วันเวลาสิ้นสุด : " . $date_ecd . 'เวลา' . $time_end . "\n";
			$sMessage .= "ชื่อ-นามสกุล : " . $name_passengers . "\n";
			$sMessage .= "เบอร์โทรศัพท์มือถือ : " . $tel_reserve_main . "\n";
			$sMessage .= "จุดขึ้นรถ : " . $Pickup_location . "\n";
			$sMessage .= "จุดลงรถ : " . $Down_finish . "\n";
			$sMessage .= "สถานที่ปลายทาง : " . $address . "\n";
			$sMessage .= "จำนวนผู้โดยสาร : " . $number_passengers . 'คน' . "\n";
			$sMessage .= "หมายเหตุ : " . $detail . "\n";

			$chOne = curl_init();
			curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
			curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($chOne, CURLOPT_POST, 1);
			curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
			$headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '', );
			curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
			$result = curl_exec($chOne);


			$this->session->set_flashdata('save_success', TRUE);

		} else {

			$this->session->set_flashdata('wrong_alert', TRUE);

		}



	}


	// ######## 
	public function edit_request()
	{
		$case_id = $this->input->post('case_id');
		$tel_reserve = $this->input->post('tel_reserve');
		$car_title = $this->input->post('car_title');
		$Pickup_location = $this->input->post('Pickup_location');
		$Down_finish = $this->input->post('Down_finish');
		$address = $this->input->post('address');
		$note = $this->input->post('note');
		$number_passengers = $this->input->post('number_passengers');
		$name_passengers = $this->input->post('name_passengers');
		$tel_passengers = $this->input->post('tel_reserve_main');

		$time_edit = date('Y-m-d H:i:s');

		if (!empty($case_id)) {
			if (!empty($tel_reserve)) {
				$data['tel_reserve'] = $tel_reserve;
			}
			if (!empty($car_title)) {
				$data['car_title'] = $car_title;
			}
			if (!empty($tel_passengers)) {
				$data['tel_passengers'] = $tel_passengers;
			}
			if (!empty($Pickup_location)) {
				$data['Pickup_location'] = $Pickup_location;
			}
			if (!empty($Down_finish)) {
				$data['Down_finish'] = $Down_finish;
			}
			if (!empty($address)) {
				$data['address'] = $address;
			}
			if (!empty($note)) {
				$data['note'] = $note;
			}
			if (!empty($number_passengers)) {
				$data['number_passengers'] = $number_passengers;
			}
			if (!empty($name_passengers)) {
				$data['name_passengers'] = $name_passengers;
			}

			if (!empty($data)) {
				$data['last_date_edit'] = $time_edit;
				$this->db->where('case_id', $case_id);
				$this->db->update('car_case', $data);

				if ($this->db->affected_rows() > 0) {
					$sql_warn = "SELECT car_case.* , car_driver_information.code_token  FROM car_case 
					JOIN car_list ON car_list.car_id = car_case.car_list
					JOIN car_driver_information ON car_list.car_driver = car_driver_information.id_driver
					WHERE case_id = $case_id";
					$row = $this->db->query($sql_warn)->row();

					$code_token_warn = $row->code_token;


					$start_date_warn = $row->start_date;
					$formatted_start = date("Y-m-d H:i:s", $start_date_warn);

					$end_date_warn = $row->end_date;
					$date_time = date('Y-m-d H:i:s', $end_date_warn);
					$new_date_time = date('Y-m-d H:i:s', strtotime($date_time . ' -1 hour'));

					$name_reserve_warn = $row->name_reserve;
					$tel_reserve_warn = $row->tel_reserve;
					$Pickup_location_warn = $row->Pickup_location;
					$Down_finish_warn = $row->Down_finish;
					$address_warn = $row->address;
					$note_warn = $row->note;
					$number_passengers_warn = $row->number_passengers;

					// if(empty($detail)){
					// 	$note_warn = '-';
					// }


					$sToken = $code_token_warn;
					$sMessage = "แจ้งเตือน : ⚠️ มีการปรับปรุงข้อมูลในรายการจองรถ\n";
					$sMessage .= "วันเวลาเริ่ม : " . $formatted_start . "\n";
					$sMessage .= "วันเวลาสิ้นสุด : " . $new_date_time . "\n";
					$sMessage .= "ชื่อ-นามสกุล : " . $name_reserve_warn . "\n";
					$sMessage .= "เบอร์โทรศัพท์มือถือ : " . $tel_reserve_warn . "\n";
					$sMessage .= "จุดขึ้นรถ : " . $Pickup_location_warn . "\n";
					$sMessage .= "จุดลงรถ : " . $Down_finish_warn . "\n";
					$sMessage .= "สถานที่ปลายทาง : " . $address_warn . "\n";
					$sMessage .= "จำนวนผู้โดยสาร : " . $number_passengers_warn . "\n";
					$sMessage .= "หมายเหตุ : " . $note_warn . "\n";

					$chOne = curl_init();
					curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
					curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
					curl_setopt($chOne, CURLOPT_POST, 1);
					curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
					$headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '', );
					curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
					$result = curl_exec($chOne);
					$this->session->set_flashdata('save_edit', TRUE);


				} else {
					$this->session->set_flashdata('wrong_alert', TRUE);
				}


			} else {
				$this->session->set_flashdata('no_data', TRUE);
			}
		} else {
			$this->session->set_flashdata('wrong_alert', TRUE);
		}


	}
	

	// ######## 
	public function update_cancel()
	{
		$cancel = $this->input->post('cancel');
		$car_list_cancel = $this->input->post('car_list_cancel');

		$status_reserve = '2'; //ยกเลิก
		$date_cancel = date('Y-m-d H:i:s');

		if (!empty($car_list_cancel)) {

			$data['cancel_detail'] = $cancel;
			$data['status_reserve'] = $status_reserve;
			$data['date_cancel'] = $date_cancel;

			$this->db->where('case_id', $car_list_cancel);
			$this->db->update('car_case', $data);

			if ($this->db->affected_rows() > 0) {

				$sql_warn = "SELECT car_case.* , car_driver_information.code_token  FROM car_case 
				JOIN car_list ON car_list.car_id = car_case.car_list
				JOIN car_driver_information ON car_list.car_driver = car_driver_information.id_driver
				WHERE case_id = $car_list_cancel";
				$row = $this->db->query($sql_warn)->row();

				$code_token_warn = $row->code_token;
				$start_date_warn = $row->car_start_date;
				$formatted_start = date("Y-m-d H:i:s", $start_date_warn);
				$end_date_warn = $row->car_end_date;
				$date_time = date('Y-m-d H:i:s', $end_date_warn);
				$new_date_time = date('Y-m-d H:i:s', strtotime($date_time . ' -1 hour'));
				$name_reserve_warn = $row->name_reserve;
				$name_reserve_warn = $row->name_reserve;
				$tel_reserve_warn = $row->tel_reserve;
				$address_warn = $row->address;

				$sToken = $code_token_warn;
				$sMessage = "🚫 การยกเลิกรายการจองรถ\n";
				$sMessage .= "เหตุผลการยกเลิก : " . $cancel . "\n";
				$sMessage .= "วันเวลาเริ่ม : " . $formatted_start . "\n";
				$sMessage .= "วันเวลาสิ้นสุด : " . $new_date_time . "\n";
				$sMessage .= "ชื่อ-นามสกุล : " . $name_reserve_warn . "\n";
				$sMessage .= "เบอร์โทรศัพท์มือถือ : " . $tel_reserve_warn . "\n";
				$sMessage .= "สถานที่ปลายทาง : " . $address_warn . "\n";

				$chOne = curl_init();
				curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
				curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($chOne, CURLOPT_POST, 1);
				curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
				$headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
				$result = curl_exec($chOne);

				$this->session->set_flashdata('cancel_car', TRUE);

			} else {
				$this->session->set_flashdata('wrong_alert', TRUE);
			}


		} else {
			$this->session->set_flashdata('no_data', TRUE);

		}


	}





	public function list_car_total()
	{

		$start_datetime = $this->input->post('start_datetime');
		$end_date = $this->input->post('end_date');

	

		$data['data'] = $this->function_car_model_admin->list_Empty_car($start_datetime, $end_date);


		$data_all = array(
			'data' => $data
		);

		$this->load->view('template/car_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('car_system/list_car', $data_all);

	}




	public function reserve_car($car_id = 0)
	{

		$start_datetime = $this->input->get('start_datetime');
		$end_date = $this->input->get('end_date');

		$date_time_start = explode("T", $start_datetime);
		// $date_time_parts[0] จะเก็บวันที่ (2023-09-20)
		// $date_time_parts[1] จะเก็บเวลา (11:40)
		$date_start = $date_time_start[0];
		$time_start = $date_time_start[1];
		$start_datetime = date('Y-m-d H:i:s', strtotime("$date_start $time_start"));

		$date_time_end = explode("T", $end_date);
		$date_end = $date_time_end[0];
		$time_end = $date_time_end[1];
		$end_datetime = date('Y-m-d H:i:s', strtotime("$date_end $time_end"));

		$data['data'] = $this->function_car_reserve->list_car_id($car_id);


		$data_all = array(
			'data' => $data,
			'date_start' => $date_start, // เพิ่ม start_date ในตัวแปร $data_all
			'time_start' => $time_start,     // เพิ่ม end_date ในตัวแปร $data_all
			'date_end' => $date_end,     // เพิ่ม end_date ในตัวแปร $data_all
			'time_end' => $time_end,     // เพิ่ม end_date ในตัวแปร $data_all
		);


		$this->load->view('template/car_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('car_system/reserve_car', $data_all);

	}








}

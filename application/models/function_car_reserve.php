<?php
defined('BASEPATH') or exit('No direct script access allowed');
class function_car_reserve extends CI_Model
{

	// ######## อัพเดทรายการสำเร็จ
	public function update()
	{
		$status = 3; // สำเร็จ
		$status_reserve = 1; // สำเร็จ

		// $sql = "SELECT case_id, car_end_date, status_reserve 
        // FROM car_case
        // WHERE status_reserve = '$status_reserve'";
		// $result = $this->db->query($sql)->result();

		// ใช้ CodeIgniter's Query Builder
		$result = $this->db->select('case_id, car_end_date, status_reserve')
		->from('car_case')
		->where('status_reserve', $status_reserve)
		->get()
		->result();

		$currentDateTime = time(); 
		// ที่บวก 1 ชม เพราะในฐานข้อมูลตอนจอง มีการบวกเพิ่มไป 1 ชม. 
		// $currentDateTimePlusOneHour = strtotime('+1 hour', $currentDateTime); 
		$currentDateTimePlusOneHour = strtotime('+30 minutes', $currentDateTime);

		// if (!empty($result)){
		// 	foreach ($result as $row) {
		// 		$rowTimestamp = $row->car_end_date;
		// 		$case_id = $row->case_id;
		// 		if($row->status_reserve != 2){
		// 			if ($rowTimestamp < $currentDateTimePlusOneHour) {
		// 				$this->db->set('status_reserve', $status);
		// 				$this->db->where('case_id', $case_id);
		// 				$this->db->update('car_case');
	
		// 			}
		// 		}
		// 	}
		// }

		if (!empty($result)) {
			foreach ($result as $row) {
				$rowTimestamp = $row->car_end_date;
				$case_id = $row->case_id;

				if ($row->status_reserve != 2 && $rowTimestamp < $currentDateTimePlusOneHour) {
					$this->db->where('case_id', $case_id)
							 ->update('car_case', array('status_reserve' => $status));
				}
			}
		}
		
	}
	

		// ########
		//เช็คความพร้อมของรถ อัพเดทรายการรถไม่พร้อม 
		public function update_status_car()
		{
			
			$sql_list = "SELECT car_id, car_usage_status FROM car_list WHERE car_usage_status = 2 OR car_driver = '#'";
			// echo "<br>";
			// echo $sql_list;
			// echo "<br>";
			$result = $this->db->query($sql_list)->result();

			$currentDateTimePlusTwoDay = strtotime('+2 days', time());
			$status = 2; // ยกเลิก
			$message = 'รถไม่พร้อมใช้งาน'; // รถไม่พร้อมใช้งาน
			$date = date('Y-m-d H:i:s');

			if(!empty($result)){
				foreach ($result as $row) {
					$car_id = $row->car_id;
					// echo $car_id;
					// echo "<br>";
					$sql_up = "SELECT case_id,car_start_date FROM car_case WHERE car_list = $car_id AND status_reserve = 1";
					// echo $sql_up;
					// echo "<br>";
					$result_up = $this->db->query($sql_up)->result();
					// echo "<pre>";
					// print_r($result_up);
					// echo "</pre>";
					// echo "<br>";
					$hasUpdate = false; 
					if(!empty($result_up)){
						foreach ($result_up as $row_up) {
							$case_id = $row_up->case_id;
							$car_start_date = $row_up->car_start_date;
							if ($car_start_date < $currentDateTimePlusTwoDay) {
								$data = array(
									'cancel_detail' => $message,
									'status_reserve' => $status,
									'date_cancel' => $date
								);
	
								$this->db->where('case_id', $case_id);
								$this->db->update('car_case', $data);

								$hasUpdate = true; // เปลี่ยนค่าเป็น TRUE เมื่อมีการอัปเดตข้อมูล
							}
						}
						if ($hasUpdate) {

							// $this->session->set_flashdata('check', TRUE);
						}
						
						
						
					}


				
				}
			}

			return $hasUpdate;



		}


// ########
	public function update_edit_car($inputValue ,$readiness_id ,$id_driver)
	{
			//มีการอัพเดทไปแล้วกรณํรถไม่หร้อม
			$sql_list = "SELECT 
			car_list.car_id , car_list.car_brand , car_list.car_model , car_list.car_registration , car_list.car_color
			, car_list.car_type , car_list.car_number_seat , car_list.car_other 
			, car_driver_information.id_driver ,car_driver_information.driver_name ,car_driver_information.driver_tel 
			, car_driver_information.driver_history
			FROM car_list
			LEFT JOIN car_driver_information ON car_list.car_driver = car_driver_information.id_driver
			WHERE car_id = $inputValue";

			$row = $this->db->query($sql_list)->row();

			$car_id = $row->car_id;
			$car_brand = $row->car_brand;
			$car_model = $row->car_model;
			$car_registration = $row->car_registration;
			$car_color = $row->car_color;
			$car_type = $row->car_type;
			$car_number_seat = $row->car_number_seat;
			$car_other = $row->car_other;

			$id_driver = $row->id_driver;
			$driver_name = $row->driver_name;
			$driver_tel = $row->driver_tel;
			$driver_history = $row->driver_history;

			$car_details = $car_id.','.$car_brand. ',' .$car_model. ',' .$car_type. ',' .$car_registration. ',' .$car_color . ',' .$car_number_seat . ',' .$car_other;			
			$data_driver = $id_driver.','.$driver_name. ',' .$driver_tel. ',' .$driver_history;
			
			$sql_update_ = "UPDATE car_case
				SET data_car = '$car_details'
				WHERE car_list = $car_id
				AND status_reserve = 1";
				$this->db->query($sql_update_);

			if(!empty($id_driver) && $id_driver != ''){
				$sql_update_driver = "UPDATE car_case
				SET data_driver = '$data_driver'
				WHERE car_list = $car_id
				AND status_reserve = 1";
				$this->db->query($sql_update_driver);
			}
				$status  = 2;
				$message = 'รถไม่พร้อมใช้งาน'; 
				$currentDateTimePlusTwoDay = strtotime('+2 days', time());
				// $readiness_id = car_usage_status
				if (!empty($readiness_id) && $readiness_id == '2') {		
					$sql_up = "SELECT case_id,car_start_date ,car_list FROM car_case WHERE car_list = $car_id AND status_reserve = 1";
					$result_up = $this->db->query($sql_up)->result();
					if(!empty($result_up)){
						foreach ($result_up as $row_up) {
							$case_id = $row_up->case_id;
							$car_start_date = $row_up->car_start_date;
							$car_list = $row_up->car_list; // id รถ

							if ($car_start_date < $currentDateTimePlusTwoDay) {
							$date_cancel =  date('Y-m-d H:i:s');
							$sql_update = "UPDATE car_case
								SET date_cancel = '$date_cancel',
									status_reserve = '$status',
									cancel_detail = '$message'
								WHERE case_id = $case_id
									AND status_reserve = 1";
							$this->db->query($sql_update);

							}

						}

					}

				}



	}



	// public function update_status_car($id_user)
	// {
	// 	$status = 2; // ยหเลิก
	// 	$sql_list = "SELECT car_id, car_usage_status FROM car_list WHERE car_list.car_usage_status = 2";
	// 	$result = $this->db->query($sql_list)->result();

	// 	$currentDateTime = time(); 

	// 	$currentDateTimePlusTwoDay = strtotime('+2 day', $currentDateTime);

	// 	foreach ($result as $row) {
	// 		$rowTimestamp = $row->car_start_date;
	// 		$case_id = $row->car_id;
	// 		if($row->status_reserve != 2){
	// 			if ($rowTimestamp < $currentDateTimePlusTwoDay) {
	// 				$this->db->set('status_reserve', $status);
	// 				$this->db->where('case_id', $case_id);
	// 				$this->db->update('car_case');

	// 			}
	// 		}

	// 	}
	// }


		// ########
	public function list_Empty_car($start_date, $end_date ,$sit)
	{

		$timestamp_start = strtotime($start_date);
		$timestamp_end = strtotime($end_date);		

		$timestamp_endPlus = strtotime('+30 minutes', $timestamp_end);
		// $timestamp_endPlus = strtotime('+30 minutes', $timestamp_start);
		// $timestamp_start = strtotime($start_date);

		// echo $timestamp_end;
		// echo "<br>";
		// echo $timestamp_endPlus;
		// echo "<br>";
		// ป้องกันการ Injection
		// if (!empty($timestamp_start) && !empty($timestamp_end)) {
		// 	$sql = "SELECT DISTINCT car_list FROM car_case  
		// 			WHERE status_reserve != 2 AND  status_reserve != 3
		// 			AND NOT ((car_start_date > ?) OR (car_end_date < ?))
		// 			AND ((car_start_date <= ?) OR (car_end_date >= ?))";

		// 	$query = $this->db->query($sql, array($timestamp_end, $timestamp_start, $timestamp_end, $timestamp_start));
		// 	$result = $query->result();
		// }

			if (!empty($timestamp_start) && !empty($timestamp_end)) {
				$sql = "SELECT DISTINCT car_list FROM car_case  
				WHERE status_reserve != 2 AND  status_reserve != 3
				AND NOT ((car_start_date > $timestamp_endPlus) OR (car_end_date < $timestamp_start))
				AND ((car_start_date <= $timestamp_endPlus) OR (car_end_date >= $timestamp_start))";

// echo 'กรองรถที่ซ้ำผตามวันที่ : ';
// echo "<br>";
// echo $sql;
// echo "<br>";
				$query = $this->db->query($sql);
				$result = $query->result();
			}

		$sql_car = "SELECT *
            FROM car_list
            JOIN car_driver_information ON car_list.car_driver = car_driver_information.id_driver";

// echo 'ข้อมูลรถพร้อมคนขับ : ';
// echo "<br>";
// echo $sql_car;
// echo "<br>";

			if (!empty($result)) {
				$car_list_values = [];
				foreach ($result as $car_id) {
					$car_list_values[] = $car_id->car_list;
				}
				$car_list_values = implode(",", $car_list_values);
				$sql_car .= " WHERE car_id NOT IN ($car_list_values)";
			}

// 			echo 'ข้อมูลรถพร้อมคนขับ_2 : ';
// 			echo "<br>";
// echo $sql_car;
// echo "<br>";

		$id = $_SESSION['id'];

		$sql_role = "SELECT user_role FROM user_info WHERE id = ?";
		$row = $this->db->query($sql_role, array($id))->row();
		$role = $row->user_role;

		if (!empty($role)) {
			$sql_car .= " AND FIND_IN_SET(?, car_list.role_id) > 0";
		}

		if(!empty($sit)){
					$sql_car .= " AND car_list.car_number_seat >= $sit";

		}

		$query_car = $this->db->query($sql_car, array($role));
		$result_car = $query_car->result();

		// foreach($result_car as $row){
		// 	$case_id = $row->case_id;
		// 	echo $car_id;
		// 	echo "<br>";
		// }

		return $result_car;


	}

	// ########
	public function data_driver()
	{


		$sql = "SELECT id_driver,driver_name FROM car_driver_information";

		$query = $this->db->query($sql)->result();

		return $query;

	}

	// ########
	public function data_type_car()
	{

		$sql = "SELECT * FROM car_type";

		$query = $this->db->query($sql)->result();

		return $query;

	}

	// ########
	public function list_history_id($id_user ,$start_date, $end_date)
	{

		$con = "";

		if (empty($start_date)) {
			$start_date = date('Y-m-d'); 

		}
	
		if (empty($end_date)) {
			$end_date =  date('Y-m-d', strtotime('+1 month'));
		}

		$timestamp_start = strtotime($start_date);
		$timestamp_end = strtotime($end_date); 

		if (!empty($timestamp_start)  && !empty($timestamp_end)) {
			$con .= " AND DATE(FROM_UNIXTIME(car_start_date)) BETWEEN '$start_date' AND '$end_date'";
		} 

		$sql = "SELECT * FROM car_case 
				LEFT JOIN car_list ON car_case.car_list = car_list.car_id
				LEFT JOIN car_driver_information ON car_list.car_driver = car_driver_information.id_driver
				LEFT JOIN car_status ON car_case.status_reserve = car_status.status_id
				WHERE user_id = $id_user $con";

// echo $sql;

		$query = $this->db->query($sql)->result();

		return $query;

	}
	
	// ########
	public function list_history_total($start_date, $end_date)
	{
		$con = "";

		if (empty($start_date)) {
			$start_date = date('Y-m-d'); 

		}
		if (empty($end_date)) {
			$end_date =  date('Y-m-d', strtotime('+1 month'));
		}

		$timestamp_start = strtotime($start_date);
		$timestamp_end = strtotime($end_date); 

		if (!empty($timestamp_start) && !empty($timestamp_end)) {
			$con = " WHERE DATE(FROM_UNIXTIME(car_start_date)) BETWEEN '$start_date' AND '$end_date'";
		}
		//  elseif (!empty($timestamp_start)) {
		// 	$con .= " AND DATE(FROM_UNIXTIME(car_start_date)) = '$start_date'";
		// }

		$sql = "SELECT * FROM car_case 
				LEFT JOIN car_list ON car_case.car_list = car_list.car_id
				LEFT JOIN car_driver_information ON car_list.car_driver = car_driver_information.id_driver
				LEFT JOIN car_status ON car_case.status_reserve = car_status.status_id $con";
				
		$query = $this->db->query($sql)->result();
		return $query;

	}
	
	// ########
	public function edit_request($case_id){
		
		$sql_status = "SELECT car_list.* , car_case.* , car_driver_information.*
		 FROM car_case
		LEFT JOIN car_list ON car_list.car_id = car_case.car_list
		LEFT JOIN car_driver_information ON car_driver_information.id_driver = car_list.car_driver
		WHERE case_id = $case_id";
		$status_user = $this->db->query($sql_status)->row();

		return $status_user;
	}

	// ########
	public function status_user(){
		
		$sql_status = "SELECT * FROM user_status_car";
		$status_user = $this->db->query($sql_status)->result();

		return $status_user;
	}






	public function list_car_id($car_id)
	{

		$sql = "SELECT * FROM car_list WHERE car_id = $car_id";
		$query = $this->db->query($sql)->row();

		return $query;

	}



	public function list_all_car()
	{


		$sql = "SELECT * FROM car_list JOIN car_status ON car_status = status_id";

		$query = $this->db->query($sql)->row();

		return $query;


	}

	public function list_all_car_status($car_status)
	{


		if ($car_status) {
			$sql = "SELECT * FROM car_list JOIN car_status ON car_status = status_id WHERE car_status = $car_status";
		} else {
			$sql = "SELECT * FROM car_list JOIN car_status ON car_status = status_id WHERE car_status = 1";
		}


		// $sql = "SELECT * FROM car_list JOIN car_status ON car_status = status_id WHERE car_status = $car_status";

		$query = $this->db->query($sql)->result();


		return $query;


	}



	public function del_car($car_id)
	{
		$this->db->delete('car_list', array('car_id' => $car_id));

	}


	public function list_all_carType()
	{
		$sql = "SELECT * FROM car_type";

		$query = $this->db->query($sql)->result();

		return $query;


	}
	public function list_all_carBrand()
	{
		$sql = "SELECT * FROM car_type";

		$query = $this->db->query($sql)->result();

		return $query;


	}


	//เรียกข้อมูล cas
	public function list_car_case($car_id)
	{


		$sql = "SELECT * FROM car_case WHERE car_list = $car_id";

		$query = $this->db->query($sql)->row();

		return $query;


	}


	public function list_status()
	{


		$sql = "SELECT * FROM car_status WHERE status_id = 4 OR status_id = 5";

		$query = $this->db->query($sql)->result();

		return $query;


	}



	// ########
	public function user_status_id($id , $status_user){

		$sql_status = "SELECT user_login, user_name , user_email, user_tel, name_car , user_role.role_name
		 FROM user_info 
		 JOIN user_status_car ON user_status_car = id_car
		 JOIN user_role ON user_role = id_role
		WHERE id = $id";
		$query = $this->db->query($sql_status)->row();

		
		return $query;


	}


	public function check($id){

		$sql = "SELECT car_id FROM car_list WHERE car_usage_status = 2";
		$result = $this->db->query($sql)->result();
		
		// print_r($result);
		// echo "<br>";
		
		$output = array();
		$currentDateTime = time(); 
		$currentDateTimePlusOneHour = strtotime('+30 minutes', $currentDateTime);
		
		// สร้างตัวแปร $result_check นอกลูป foreach
		$result_check = array();

		foreach ($result as $row) {
			$car_id = $row->car_id;
			//รถไม่พร้อม
			// echo $car_id;
			// echo "<br>";
			$sql_check = "SELECT case_id FROM car_case WHERE user_id = $id AND car_list = $car_id AND car_start_date > $currentDateTimePlusOneHour";
			echo $sql_check;
			echo "<br>";
		
			// เก็บผลลัพธ์ของการสอบถาม SQL ไว้ในตัวแปร $result_check
			$result_check[] = $this->db->query($sql_check)->result();
		}
		
		// echo "<br>";
		echo '<pre>';
		print_r($result_check);
		echo '</pre>';

		echo "<br>";



	return $output;


	}

	public function check_test($id){

		$sql = "SELECT car_id FROM car_list WHERE car_usage_status = 2";
		$result = $this->db->query($sql)->result();

		echo '<pre>';
		print_r($result);
		echo '</pre>';
		echo "<br>";
		
		$output = array();
		$currentDateTime = time(); 
		$currentDateTimePlusOneHour = strtotime('+30 minutes', $currentDateTime);

		echo $currentDateTime;
				echo "<br>";
				echo $currentDateTimePlusOneHour;
				echo "<br>";
		// สร้างตัวแปร $result_check นอกลูป foreach
		$result_check = array();
		foreach ($result as $row) {
			$car_id = $row->car_id;
			// รถไม่พร้อม
			// echo $car_id;
			// echo "<br>";
			$sql_check = "SELECT case_id FROM car_case WHERE user_id = $id AND car_list = $car_id AND car_start_date > $currentDateTime AND cancel_detail = 'รถไม่พร้อมใช้งาน'";
			// echo $sql_check;
			// echo "<br>";

			$query_result = $this->db->query($sql_check)->result();
			// นับจำนวนรายการที่ได้แล้วเพื่อเก็บในตัวแปร $result_check
			$result_count = count($query_result);
			// echo "จำนวน: " . $result_count . "<br>";
			// เก็บผลลัพธ์ลงในตัวแปร $result_check
			$result_check[] = $query_result;
		}

			// echo "จำนวน: " . $result_count . "<br>";
		// if(!empty($result_check)){
		// 	$this->session->set_flashdata('check', TRUE);
		// }

		echo "<br>";
		// echo '<pre>';
		// print_r($result_check);
		// echo '</pre>';

		// echo "<br>";


		// return array($result_count, $result_check);
	return $result_count;

	}

	public function check_test_2($id){

		$sql = "SELECT car_id FROM car_list WHERE car_usage_status = 2";
		$result = $this->db->query($sql)->result();
		
		$currentDateTime = time(); 
		$currentDateTimePlusOneHour = strtotime('+30 minutes', $currentDateTime);
	
		$result_count = 0; // ตั้งค่าเริ่มต้นของจำนวนรายการที่ตรงกับเงื่อนไขเป็น 0
	
		foreach ($result as $row) {
			$car_id = $row->car_id;
			$sql_check = "SELECT COUNT(*) AS count FROM car_case WHERE user_id = $id AND car_list = $car_id AND car_start_date > $currentDateTimePlusOneHour AND cancel_detail = 'รถไม่พร้อมใช้งาน'";
			$query_result = $this->db->query($sql_check)->row()->count;
	
			// ถ้ามีรายการที่ตรงกับเงื่อนไข เพิ่มจำนวนรายการนั้นเข้าไปในผลลัพธ์ที่นับได้
			$result_count += $query_result;
		}
		// echo $result_count;
	
		return $result_count;


	}
	public function check_test_3($id){

		$sql = "SELECT car_id FROM car_list WHERE car_usage_status = 2";
		$result = $this->db->query($sql)->result();
		
		$currentDateTime = time(); 
		$currentDateTimePlusOneHour = strtotime('+30 minutes', $currentDateTime);
	
		$result_count = 0; // ตั้งค่าเริ่มต้นของจำนวนรายการที่ตรงกับเงื่อนไขเป็น 0
	
		foreach ($result as $row) {
			$car_id = $row->car_id;
			$sql_check = "SELECT COUNT(*) AS count FROM car_case WHERE user_id = $id AND car_list = $car_id AND car_start_date > $currentDateTimePlusOneHour AND cancel_detail = 'รถไม่พร้อมใช้งาน'";
			$query_result = $this->db->query($sql_check)->row()->count;
	
			// ถ้ามีรายการที่ตรงกับเงื่อนไข เพิ่มจำนวนรายการนั้นเข้าไปในผลลัพธ์ที่นับได้
			$result_count += $query_result;
		}
		// echo $result_count;
	
		return $result_count;


	}







}

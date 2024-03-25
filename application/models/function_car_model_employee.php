<?php
defined('BASEPATH') or exit('No direct script access allowed');
class function_car_model_employee extends CI_Model
{

	public function list_all()
	{

		$sql = "SELECT * FROM car_list";

		$query = $this->db->query($sql)->result();

		return $query;


	}
	public function list_all_car()
	{

		$sql = "SELECT * FROM car_list JOIN car_driver_information ON car_driver = id_driver";

		$query = $this->db->query($sql)->result();

		return $query;


	}


	// public function count_car()
	// {

	// 	$sql_count = "SELECT COUNT(*) AS count_car FROM car_list";
	// 	$query_count = $this->db->query($sql_count)->row();

	// 	return $query_count;

	// }


	public function list_Empty_car($start_datetime, $end_date)
	{

		// echo $start_datetime;
		// echo "<br>";
		// echo $end_date;
		// echo "<br>";

		// ตรวจสอบว่า $start_datetime ไม่ได้รับค่ามา
		if ($start_datetime === null) {
			// ถ้าไม่มีการส่งค่า $start_datetime มา กำหนดให้เป็นวันปัจจุบัน
			$date_start = date('Y-m-d');
			$time_start = date('H:i');


			// echo $date_start;
			// echo "<br>";
			// echo $time_start;
			// echo "<br>";

		} else if ($start_datetime != null) {
			$date_time_start = explode("T", $start_datetime);
			// $date_time_parts[0] จะเก็บวันที่ (2023-09-20)
			// $date_time_parts[1] จะเก็บเวลา (11:40)
			$date_start = $date_time_start[0];
			$time_start = $date_time_start[1];

			$start_datetime = date('Y-m-d H:i:s', strtotime("$date_start $time_start"));
			// echo "<br>";
			// echo $start_datetime;

			// echo $date_start;
			// echo "<br>";
			// echo $time_start;
			// echo "<br>";

		}

		if (isset($end_date)) {
			$date_time_end = explode("T", $end_date);
			$date_end = $date_time_end[0];
			$time_end = $date_time_end[1];

			$end_datetime = date('Y-m-d H:i:s', strtotime("$date_end $time_end"));
		} else {
			$end_datetime = "";

		}

		// กำหนด SQL เพื่อค้นหา case_id ที่มีข้อมูลในช่วงเวลาที่ระบุ
		$sql = "SELECT case_id, car_list
		FROM car_case
		WHERE (car_start_date BETWEEN '$start_datetime' AND '$end_datetime'
				OR car_end_date BETWEEN '$start_datetime' AND '$end_datetime')
		   OR ('$start_datetime' BETWEEN car_start_date AND car_end_date
				OR '$end_datetime' BETWEEN car_start_date AND car_end_date)";


		// ถ้ามีการส่งค่า $end_date มา เพิ่มเงื่อนไขการกรองด้วย $end_date
		// if ($end_date !== null) {
		// 	$sql .= " AND NOT ('$end_date' BETWEEN car_start_date AND car_end_date)";
		// }

		$query = $this->db->query($sql);
		$car_i = $query->result();


		// echo "<pre>";
		// print_r($car_i);
		// echo "</pre>";


		// ตรวจสอบว่า $car_i มีข้อมูลหรือไม่
		if (!empty($car_i)) {
			// แปลงรายการ $car_i เป็นอาร์เรย์ของ case_id
			$case_ids = array();
			foreach ($car_i as $item) {
				$case_ids[] = $item->car_list;
			}

			// สร้าง SQL สำหรับการดึงข้อมูลรถจากตาราง "car_list" โดยระบุ case_id ที่ไม่อยู่ใน $case_ids
			$sql_car = "SELECT *
				FROM car_list
				WHERE car_id NOT IN (" . implode(',', $case_ids) . ")";
		} else {
			// ถ้า $car_i ไม่มีข้อมูล ดึงข้อมูลทั้งหมดจากตาราง "car_list"
			$sql_car = "SELECT * FROM car_list";
		}

		$query_car = $this->db->query($sql_car);
		$car_car = $query_car->result();

		// echo "<pre>";
		// print_r($car_car);
		// echo "</pre>";

		return $car_car;

	}


	public function list_car($start_date, $end_date, $user_role)
	{
		// echo $user_role;

		$sql_test = "SELECT car_id, role_id FROM car_list";
		$query_test = $this->db->query($sql_test);
		$car_list_test = $query_test->result();
		// echo "<pre>";
		// print_r($car_list_test);
		// echo "</pre>";

		$matching_car_ids = array();
	// ตรวจสอบข้อมูลที่ได้จากการ query
		foreach ($car_list_test as $car) {
			$role_ids = explode(',', $car->role_id); // แยกค่า role_id ที่เป็นสตริงเป็นอาร์เรย์

			// ตรวจสอบว่า $user_role อยู่ใน $role_ids หรือไม่
			if (in_array($user_role, $role_ids)) {
				$matching_car_ids[] = $car->car_id;
			}
		}
		// แสดงผลลัพธ์ รถที่สามารถแสดงได้ 
		// echo "<pre>";
		// print_r($matching_car_ids);
		// echo "</pre>";
		


	// ดึงข้อมูลรถที่ดึงมาจาก  matching_car_ids_str
		// $sql_ = "SELECT car_id, car_brand FROM car_list WHERE car_id IN ($matching_car_ids_str)";
		// $query_ = $this->db->query($sql_);
		// $car_ = $query_->result();
		// echo "<pre>";
		// print_r($car_);
		// echo "</pre>";


		// ###################################################################

		if ($start_date === null) {
			$start_datetime = date('Y-m-d:H:i:s');
		} else if ($start_date != null) {
			list($start_date, $start_time) = explode('T', $start_date);
			$start_datetime = date('Y-m-d H:i:s', strtotime("$start_date $start_time"));
		}

		if ($end_date !== null) {
			list($end_date, $end_time) = explode('T', $end_date);
			$end_datetime = date('Y-m-d H:i:s', strtotime("$end_date $end_time"));

		} else if ($end_date == null) {
			$end_datetime = "";
		}

		// เวลาที่จอง 
		// echo $start_datetime;
		// echo "<br>";
		// echo $end_datetime;

		if (!empty($start_datetime) && !empty($end_datetime)) {
			// กำหนด SQL เพื่อค้นหา case_id ที่มีข้อมูลในช่วงเวลาที่ระบุ
			// DISTINCT เลือกข้อมูลที่ไม่ซ้ำกันจากคอลัมน์ที่ระบุ
			$sql = "SELECT DISTINCT car_list
		FROM car_case
		WHERE (car_start_date BETWEEN '$start_datetime' AND '$end_datetime'
				OR car_end_date BETWEEN '$start_datetime' AND '$end_datetime')
			OR ('$start_datetime' BETWEEN car_start_date AND car_end_date
				OR '$end_datetime' BETWEEN car_start_date AND car_end_date)";

				echo $sql;
			$query = $this->db->query($sql);
			$car_id_list = $query->result();


		//  id รถที่มีการจองแล้ว 
		// echo "<pre>";
		// print_r($car_id_list);
		// echo "</pre>";
		}
		

		$matching_car_ids_str = implode(',', $matching_car_ids); // แปลงอาร์เรย์เป็นสตริง

		$sql_v1 = "SELECT car_id FROM car_list WHERE car_id IN ($matching_car_ids_str)";

		// ตรวจสอบว่ามีรายการ car_list ใน $car_id_list หรือไม่
		if (!empty($car_id_list)) {
			$car_list_values = [];
			foreach ($car_id_list as $car_id) {
				$car_list_values[] = $car_id->car_list;
			}
			$car_list_values = implode(",", $car_list_values);

			// เพิ่มเงื่อนไข WHERE เพื่อกรองข้อมูลที่ไม่ตรงกับรายการที่ได้จาก $car_id_list
			$sql_v1 .= "AND car_id NOT IN ($car_list_values)";
			
		}

		// echo $sql_v1;
		$query_v1 = $this->db->query($sql_v1);
		$car_list_v1 = $query_v1->result();

	// id รถที่สามารถจองได้ 
		// echo "<pre>";
		// print_r($car_list_v1);
		// echo "</pre>";


		$car_list_v1_str = implode(',', array_column($car_list_v1, 'car_id'));

$sql_car_v1 = "SELECT *
    FROM car_list
    JOIN car_status ON car_list.car_status = car_status.status_id
    JOIN car_driver_information ON car_list.car_driver = car_driver_information.id_driver
    WHERE car_list.car_id IN ($car_list_v1_str)";
// echo $sql_car_v1;

$query_v1_ = $this->db->query($sql_car_v1);
$car_list_v1_ = $query_v1_->result();
// echo "<pre>";
// print_r($car_list_v1_);
// echo "</pre>";


		return $car_list_v1_;

	}

	public function list_all_car_status($car_status)
	{

		$car_status = 3;

		$sql_total = "SELECT case_id, car_list FROM car_case WHERE status_reserve = $car_status";
		$query_total = $this->db->query($sql_total);
		$result_total = $query_total->result();


		// echo "<pre>";
		// print_r($result_total);
		// echo "</pre>";

		// ตรวจสอบว่าคำถามข้อมูลใน $sql_car ได้ตัวแปร $result_total มาจาก $sql_total หรือไม่
		if ($result_total) {
			// สร้าง SQL เพื่อดึงข้อมูลรถที่ตรงกับค่า car_list จาก $sql_total
			$car_list_ids = array();
			$car_case_ids = array();

			foreach ($result_total as $row) {
				$car_list_ids[] = $row->car_list;
				$car_case_ids[] = $row->case_id;
			}

			// แปลงรายการรหัสรถเป็นสตริง
			$car_list_ids_str = implode(',', $car_list_ids);
			$car_case_ids_str = implode(',', $car_case_ids);

			// สร้าง SQL สำหรับดึงข้อมูลรถจากตาราง car_list โดยใช้รายการรหัสรถที่มาจาก $sql_total เป็นเงื่อนไข
			// $sql_car = "SELECT * FROM car_list WHERE car_id IN ($car_list_ids_str)";


			// echo $sql_car;
			// echo "<br>";

			// สร้าง SQL สำหรับดึงข้อมูลรถจากตาราง car_list และ car_case โดยใช้รายการรหัสรถและรหัสเคสที่มาจาก $sql_total เป็นเงื่อนไข
			// $sql_car = "SELECT c.*, cc.* FROM car_list AS c
			// JOIN car_case AS cc ON c.car_id = cc.car_list
			// WHERE c.car_id IN ($car_list_ids_str) AND cc.case_id IN ($car_case_ids_str)";

			$sql_car = "SELECT c.*, cc.*, cs.status_name FROM car_list AS c
				JOIN car_case AS cc ON c.car_id = cc.car_list
				JOIN car_status AS cs ON cc.status_reserve = cs.status_id
				WHERE c.car_id IN ($car_list_ids_str) AND cc.case_id IN ($car_case_ids_str)";


			// echo $sql_car;
			// echo "<br>";


			$query_car = $this->db->query($sql_car);
			$result_car = $query_car->result();


			return $result_car;

		}


	}





	public function list_all_car_wait($car_status)
	{

		$car_status = 4;

		$sql_total = "SELECT case_id, car_list FROM car_case WHERE status_reserve = $car_status";
		$query_total = $this->db->query($sql_total);
		$result_total = $query_total->result();


		// echo "<pre>";
		// print_r($result_total);
		// echo "</pre>";

		// ตรวจสอบว่าคำถามข้อมูลใน $sql_car ได้ตัวแปร $result_total มาจาก $sql_total หรือไม่
		if ($result_total) {
			// สร้าง SQL เพื่อดึงข้อมูลรถที่ตรงกับค่า car_list จาก $sql_total
			$car_list_ids = array();
			$car_case_ids = array();

			foreach ($result_total as $row) {
				$car_list_ids[] = $row->car_list;
				$car_case_ids[] = $row->case_id;
			}

			// แปลงรายการรหัสรถเป็นสตริง
			$car_list_ids_str = implode(',', $car_list_ids);
			$car_case_ids_str = implode(',', $car_case_ids);

			// สร้าง SQL สำหรับดึงข้อมูลรถจากตาราง car_list โดยใช้รายการรหัสรถที่มาจาก $sql_total เป็นเงื่อนไข
			// $sql_car = "SELECT * FROM car_list WHERE car_id IN ($car_list_ids_str)";


			// echo $sql_car;
			// echo "<br>";

			// สร้าง SQL สำหรับดึงข้อมูลรถจากตาราง car_list และ car_case โดยใช้รายการรหัสรถและรหัสเคสที่มาจาก $sql_total เป็นเงื่อนไข
			// $sql_car = "SELECT c.*, cc.* FROM car_list AS c
			// JOIN car_case AS cc ON c.car_id = cc.car_list
			// WHERE c.car_id IN ($car_list_ids_str) AND cc.case_id IN ($car_case_ids_str)";

			$sql_car = "SELECT c.*, cc.*, cs.status_name FROM car_list AS c
				JOIN car_case AS cc ON c.car_id = cc.car_list
				JOIN car_status AS cs ON cc.status_reserve = cs.status_id
				WHERE c.car_id IN ($car_list_ids_str) AND cc.case_id IN ($car_case_ids_str)";


			// echo $sql_car;
			// echo "<br>";


			$query_car = $this->db->query($sql_car);
			$result_car = $query_car->result();


			return $result_car;

		}


	}


	public function del_car($car_id)
	{

		$this->db->delete('car_list', array('car_id' => $car_id));

	}

	public function del_car_history($case_id)
	{

		$this->db->delete('car_case', array('case_id' => $case_id));

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

	public function list_all_history()
	{


		$sql = "SELECT * FROM car_case JOIN car_status ON status_reserve = status_id";

		$query = $this->db->query($sql)->result();

		return $query;

	}

	public function list_user()
	{
		$con = "";

		$sql = "SELECT * FROM user_info JOIN user_status ON user_status_car = u_id";

		$query = $this->db->query($sql)->result();

		return $query;

	}

	public function list_type_car()
	{


		$sql = "SELECT * FROM car_type";

		$query = $this->db->query($sql)->result();

		return $query;

	}

	public function list_brand_car()
	{


		$sql = "SELECT * FROM car_brand";

		$query = $this->db->query($sql)->result();

		return $query;

	}


	public function del_brand($brand_id)
	{
		$this->db->delete('car_brand', array('brand_id' => $brand_id));

	}
	public function del_type($car_type_id)
	{
		$this->db->delete('car_type', array('car_type_id' => $car_type_id));

	}
	public function add_type_car($type_car)
	{

		$this->db->delete('car_type', array('car_type_id' => $type_car));

	}


	public function list_driver()
	{

		$sql = "SELECT * FROM car_driver_information";

		$query = $this->db->query($sql)->result();

		return $query;

	}


	public function del_driver($id_driver)
	{

		$this->db->delete('car_driver_information', array('id_driver' => $id_driver));

	}



	public function data_brand_car()
	{


		$sql = "SELECT * FROM car_brand";

		$query = $this->db->query($sql)->result();

		return $query;

	}

	public function events()
    {
        $this->db->order_by('case_id');
        return $this->db->get('car_case');
    }

}

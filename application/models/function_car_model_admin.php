<?php
defined('BASEPATH') or exit('No direct script access allowed');
class function_car_model_admin extends CI_Model
{

	public function list_all()
	{

		$sql = "SELECT * FROM car_list";

		$query = $this->db->query($sql)->result();
	
		return $query;


	}

	// ########
	public function list_all_car($car_brand ,$car_type ,$sit)
	{
		// if (!empty($car_brand) && $car_brand != '#' && !empty($car_type) && $car_type != '#' && !empty($sit)) {
		// 	$con = "WHERE cl.car_brand = '" . $car_brand . "' AND cl.car_type = '" . $car_type . "' AND cl.car_number_seat >= " . $sit;

		// } else if (!empty($car_brand) && $car_brand != '#' && !empty($car_type) && $car_type != '#'){
			
		// 	$con = "WHERE cl.car_brand = '" . $car_brand . "' AND cl.car_type = '" . $car_type . "'";
		// } else if (!empty($car_brand) && $car_brand != '#'){
		// 	$con = "WHERE cl.car_brand = '" . $car_brand . "'";
		// } else if (!empty($car_type) && $car_type != '#'){
		// 	$con = "WHERE cl.car_type = '" . $car_type . "'";
		// } else if (!empty($sit)){
		// 	$con = "WHERE cl.car_number_seat >= '" . $sit . "'";
		// } else {
		// 	$con = ""; 
		// }

		if (!empty($car_brand) && $car_brand != '#') {
			$conditions[] = "cl.car_brand = '" . $car_brand . "'";
		}
		if (!empty($car_type) && $car_type != '#') {
			$conditions[] = "cl.car_type = '" . $car_type . "'";
		}
		if (!empty($sit)) {
			$conditions[] = "cl.car_number_seat >= " . $sit;
		}
		
		if (!empty($conditions)) {
			$con = "WHERE " . implode(" AND ", $conditions);
		} else {
			$con = "";
		}
	


		$sql = "SELECT cl.*,cdi.*, 
		GROUP_CONCAT(ur.role_name) AS role_names
 FROM car_list cl
 LEFT JOIN car_driver_information cdi ON cl.car_driver = cdi.id_driver
 LEFT JOIN user_role ur ON FIND_IN_SET(ur.id_role, cl.role_id) $con
 GROUP BY cl.car_id;";
		// echo $sql;

		$query = $this->db->query($sql)->result();
	
		return $query;


	}
	// ########
	public function data_driver()
    {
		$sql_list = "SELECT car_driver FROM car_list";
		$query_list = $this->db->query($sql_list)->result();

			if (!empty($query_list)) {
				$sql = "SELECT id_driver, driver_name FROM car_driver_information WHERE id_driver NOT IN (SELECT car_driver FROM car_list)";

				// echo $sql;
				$query = $this->db->query($sql)->result();

				return $query;
			} else {
				$sql = "SELECT id_driver, driver_name FROM car_driver_information WHERE id_driver NOT IN (SELECT car_driver FROM car_list)";
				
				// echo $sql;
				$query = $this->db->query($sql)->result();

				return $query;
			}

    }

	// ########
	public function data_type_car()
    {

		
		$sql = "SELECT * FROM car_type";

		$query = $this->db->query($sql)->result();

		return $query;

    }
	// ########
	public function data_brand_car()
    {

		
		$sql = "SELECT * FROM car_brand";

		$query = $this->db->query($sql)->result();

		return $query;

    }
	// ########
	public function car_readiness()
	{
		$sql = "SELECT * FROM car_readiness";

		$query = $this->db->query($sql)->result();

		return $query;

	}
	// ########
	public function _role()
	{
		$sql = "SELECT * FROM user_role";

		$query = $this->db->query($sql)->result();

		return $query;

	}


	// ########
	public function del_car($car_id)
	{

		$sql_list = "SELECT 
		car_list.car_id , car_list.car_brand , car_list.car_model , car_list.car_registration , car_list.car_color
		, car_list.car_type , car_list.car_number_seat , car_list.car_other 
		, car_driver_information.id_driver ,car_driver_information.driver_name ,car_driver_information.driver_tel 
		, car_driver_information.driver_history
		FROM car_list
		LEFT JOIN car_driver_information ON car_list.car_driver = car_driver_information.id_driver
		WHERE car_id = $car_id";

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

		$status_reserve = 2;
		$cancel_detail = 'มีการลบรายการรถคันนี้ออกจากระบบ';
		$date_cancel = date('Y-m-d H:i:s');

		$car_details = $car_id.','.$car_brand. ',' 
		.$car_model. ',' .$car_type. ',' 
		.$car_registration. ',' .$car_color . ',' 
		.$car_number_seat . ',' .$car_other;

		$sql_update = "UPDATE car_case
		SET data_car = '$car_details',
			cancel_detail = '$cancel_detail',
			status_reserve = '$status_reserve',
			date_cancel = '$date_cancel'
		WHERE car_list = $car_id
		AND status_reserve = 1";
		$this->db->query($sql_update);

		$this->db->delete('car_list', array('car_id' => $car_id));

	}


	// ########
	public function del_driver($id_driver)
    {
		$sql = "SELECT car_id ,car_driver FROM car_list WHERE car_driver = $id_driver";
		$row = $this->db->query($sql)->row();
		$status = '#';
			if(!empty($row)){
				$car_id = $row->car_id;				
				$sql_update = "UPDATE car_list 
				SET car_driver = '$status',
				WHERE car_id = $car_id";
				$this->db->query($sql_update);
			}
			
		$this->db->delete('car_driver_information',array('id_driver'=>$id_driver));

    }




	public function del_car_history($case_id)
	{

		$this->db->delete('car_case', array('case_id' => $case_id));

	}




	public function list_Empty_car_test($start_date, $end_date)
	{


		$timestamp_start = strtotime($start_date);
		$timestamp_end = strtotime($end_date);



		// เพิ่ม 1 ชั่วโมง (3600 วินาที)
// $timestamp_end_plus_one_hour = $timestamp_end + 3600;	


$sql_test = "SELECT *
FROM car_case
WHERE (($timestamp_start BETWEEN car_start_date AND car_end_date)
     AND ($timestamp_end BETWEEN car_start_date AND car_end_date)
	 AND (car_start_date BETWEEN $timestamp_start AND $timestamp_end))";

// echo $sql_test;

		if ($start_date === null) {
			$start_datetime = date('Y-m-d:H:i:s');
		}else if($start_date != null) {

		list($start_date, $start_time) = explode('T', $start_date);


		$start_datetime = date('Y-m-d H:i:s', strtotime("$start_date $start_time"));

		// echo "วันที่เริ่ม: " . $start_date . "<br>";
		// echo "เวลาเริ่ม: " . $start_time;
		// $start_datetime = "";
		// echo "<br>";
		// echo $start_datetime;
	
	}
	
	

	if ($end_date !== null) {
		list($end_date, $end_time) = explode('T', $end_date);
		// echo "<br>";
		// echo "วันที่เสร็จสิน: " . $end_date . "<br>";
		// echo "เวลาเสร็จสิน: " . $end_time;

		$end_datetime = date('Y-m-d H:i:s', strtotime("$end_date $end_time"));
		// echo "<br>";
		// echo $end_datetime;

	} else if($end_date == null) {
		$end_datetime = "";

	}


	if (!empty($start_datetime) && !empty($end_datetime)) {

		// กำหนด SQL เพื่อค้นหา case_id ที่มีข้อมูลในช่วงเวลาที่ระบุ
		$sql = "SELECT DISTINCT car_list
		FROM car_case
		WHERE (car_start_date BETWEEN '$start_datetime' AND '$end_datetime'
				OR car_end_date BETWEEN '$start_datetime' AND '$end_datetime')
			OR ('$start_datetime' BETWEEN car_start_date AND car_end_date
				OR '$end_datetime' BETWEEN car_start_date AND car_end_date)";
// echo "<br>";
// echo $sql;
			$query = $this->db->query($sql);
			$car_id_list = $query->result();

		// 	echo "<pre>";
		// print_r($car_id_list);
		// echo "</pre>";
			}

			// echo "<br>";
			$sql_car = "SELECT *
						FROM car_list
						JOIN car_status ON car_list.car_status = car_status.status_id
						JOIN car_driver_information ON car_list.car_driver = car_driver_information.id_driver";
			// 	echo "<br>";
			// 	echo $sql_car;
			// echo "<br>";
			// ตรวจสอบว่ามีรายการ car_list ใน $car_id_list หรือไม่

			if (!empty($car_id_list)) {
				$car_list_values = [];
				foreach ($car_id_list as $car_id) {
					$car_list_values[] = $car_id->car_list;
				}
				$car_list_values = implode(",", $car_list_values);
			
				// เพิ่มเงื่อนไข WHERE เพื่อกรองข้อมูลที่ไม่ตรงกับรายการที่ได้จาก $car_id_list
				$sql_car .= " WHERE car_id NOT IN ($car_list_values)";
			}
			
			
			// echo $sql_car;

			$query_car = $this->db->query($sql_car);
			$car_list = $query_car->result();


return $car_list;



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


		$sql = "SELECT * FROM car_case JOIN car_status ON car_case.status_reserve = car_status.status_id 
		JOIN car_list ON car_case.car_list = car_list.car_id 
		JOIN car_driver_information ON car_list.car_driver = car_driver_information.id_driver";

		$query = $this->db->query($sql)->result();

		return $query;

	}


	public function list_history_id($id_user) 
	{


		$sql = "SELECT * FROM car_case 
		JOIN car_list ON car_case.car_list = car_list.car_id
		JOIN car_driver_information ON car_list.car_driver = car_driver_information.id_driver
		JOIN car_status ON car_case.status_reserve = car_status.status_id
		WHERE user_id = $id_user";

		$query = $this->db->query($sql)->result();

		return $query;

	}


	public function list_history($year , $month , $month_end)
	{
		
		$con = "";

		if (!empty($month) && $month !== '#' && !empty($month_end) && $month_end !== '#') {
			$con = " WHERE MONTH(FROM_UNIXTIME(car_start_date)) BETWEEN $month AND $month_end";
		} elseif (!empty($month) && $month !== '#') {
			$con = " WHERE MONTH(FROM_UNIXTIME(car_start_date)) = $month";
		}
	
		$sql = "SELECT * FROM car_case 
				JOIN car_list ON car_case.car_list = car_list.car_id
				JOIN car_driver_information ON car_list.car_driver = car_driver_information.id_driver
				JOIN car_status ON car_case.status_reserve = car_status.status_id
			 $con";

		$query = $this->db->query($sql)->result();

		return $query;

	}


	public function list_user($status , $role)
	{

		$con = "";

		if (!empty($status) && $status != '#' && !empty($role) && $role != '#') {
			$con = "WHERE user_status_car = $status AND user_role = $role";
		} elseif (!empty($status) && $status != '#') {
			$con = "WHERE user_status_car = $status";
			if (!empty($role) && $role != '#') {
				$con .= " AND user_role = $role";
			}
		}elseif(!empty($role) && $role != '#') {
			$con = "WHERE user_role = $role";

			if (!empty($status) && $status != '#') {
				$con .= " AND user_status_car = $status";
			}
		}

		$sql_user = "SELECT id,user_login,user_password,user_name,user_email,user_tel,user_status_car,name_car , role_name
		FROM user_info 
		JOIN user_status_car ON user_status_car = id_car 
		JOIN user_role ON user_role = id_role
		$con";
		$result_user = $this->db->query($sql_user)->result();

		return $result_user;
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
        $this->db->delete('car_brand',array('brand_id'=>$brand_id));

    }

	
	public function del_type($car_type_id)
    {
        $this->db->delete('car_type',array('car_type_id'=>$car_type_id));

    }
	public function add_type_car($type_car)
    {

        $this->db->delete('car_type',array('car_type_id'=>$type_car));

    }


	public function list_driver()
    {

		$sql = "SELECT * FROM car_driver_information";

		$query = $this->db->query($sql)->result();

		return $query;

    }

	public function events()
	{
		$this->db->order_by('case_id');
		return $this->db->get('car_case');
	}

	public function cars()
	{
		$this->db->order_by('car_id');
		return $this->db->get('car_list');
	}
}

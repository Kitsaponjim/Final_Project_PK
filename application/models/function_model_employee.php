<?php
defined('BASEPATH') or exit('No direct script access allowed');
class function_model_employee extends CI_Model
{


	// เช็ค login
	public function list_all()
	{



	}

	public function list_repair($id, $status, $year)
	{

		$con = "";
		if(!empty($status)) {
		// $status_list = $status;
			$con .= " AND  rp_case_status = $status";
		}

		if (!empty($year)) {
			$con .= " AND YEAR(rp_add_date) = $year";
		}

		$sql = "SELECT * FROM rp_case JOIN c_status ON rp_case_status = c_id WHERE id_repair = $id" . $con;
		$result = $this->db->query($sql)->result();

		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";
		//     exit;

		return $result;

	}

	
	public function rp_list_case($id,$status, $year , $month , $month_end)
	{



			$con = "";
			if(!empty($status)) {
			// $status_list = $status;
				$con .= "AND rp_case_status = $status";
			}

				// เพิ่มเงื่อนไขในกรณีที่มีการส่งค่า month และ month_end มา
				if (!empty($month) && $month !== '#' && !empty($month_end) && $month_end !== '#') {
					$con .= " AND MONTH(rp_add_date) BETWEEN $month AND $month_end";
				} elseif (!empty($month) && $month !== '#') {
					$con .= " AND MONTH(rp_add_date) = $month";
				}

				if (!empty($year)) {
					$con .= " AND YEAR(rp_add_date) = $year";
					
				} else {
					// $con .= " AND YEAR(rp_add_date) = " . date('Y');
					$latestYearQuery = $this->db->query("SELECT MAX(YEAR(rp_add_date)) as latest_year FROM rp_case");
					$latestYearResult = $latestYearQuery->row();
					$latestYear = $latestYearResult->latest_year;
					if ($latestYear !== null) {
						$con .= " AND YEAR(rp_add_date) = $latestYear";
					}
				}
	
				$sql = "SELECT * FROM rp_case
				JOIN c_status ON rp_case.rp_case_status = c_status.c_status WHERE id_repair = $id $con";
				$query = $this->db->query($sql);
			
				$result = $query->result();


		// $sql = "SELECT * FROM rp_case
		// 	JOIN c_status ON rp_case.rp_case_status = c_status.c_status $con AND id_repair = $id";
		// $query = $this->db->query($sql);
		// $result = $query->result();

		// echo '<pre>';
		// print_r($result);
		// echo '</pre>';
		// exit;
		return $result;
	}


	public function user_status($id, $status)
	{

		$sql_status = "SELECT n_status FROM user_info JOIN user_status ON user_status_repair = u_id WHERE id = $id";
		$query = $this->db->query($sql_status)->row();

		return $query;

	}
}

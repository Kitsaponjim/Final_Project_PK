<?php
defined('BASEPATH') or exit('No direct script access allowed');
class function_model_repairman extends CI_Model
{

	public function num_status($year, $month ,$month_end)
	{
		$con = "";

		if (empty($year)) {
			$year = date('Y'); 
		}


		if (!empty($year)) {
			$con = "WHERE YEAR(rp_add_date) = $year";
	
			// เพิ่มเงื่อนไขในกรณีที่มีการส่งค่า month และ month_end มา
			if (!empty($month) && $month !== '#' && !empty($month_end) && $month_end !== '#') {
				$con .= " AND MONTH(rp_add_date) BETWEEN $month AND $month_end";
			} elseif (!empty($month) && $month !== '#') {
				$con .= " AND MONTH(rp_add_date) = $month";
			}
		}

		$sql = "SELECT
		SUM(CASE WHEN rp_case_status = 1 THEN 1 ELSE 0 END) AS count_case_new,
		SUM(CASE WHEN rp_case_status = 2 THEN 1 ELSE 0 END) AS count_case_wait,
		SUM(CASE WHEN rp_case_status = 3 THEN 1 ELSE 0 END) AS count_case_finish,
		SUM(CASE WHEN rp_case_status = 4 THEN 1 ELSE 0 END) AS count_case_cancel
		FROM
		rp_case $con";

		// echo $sql;

		$query = $this->db->query($sql)->row();
		return $query;
	}




	public function rp_list_case($status, $year , $month , $month_end)
	{   

		   $con = "";
		   if(!empty($status)) {
		   // $status_list = $status;
			   $con .= "WHERE rp_case_status = $status";
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
		   JOIN c_status ON rp_case.rp_case_status = c_status.c_status $con";
		   $query = $this->db->query($sql);
	   
		   $result = $query->result();
		   // echo '<pre>';
		   // print_r($result);
		   // echo '</pre>';
		   
		   // exit;
			   return $result;
	   }

}

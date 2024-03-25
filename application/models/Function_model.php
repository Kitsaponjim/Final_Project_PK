<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class function_model extends CI_Model {


	// เช็ค login
        public function check_login($username,$password)
        {

			$this->db->where('user_login',$username);
			$this->db->where('user_password',$password);
			$query = $this->db->get('user_info');
			$result = $query->row();
			
			return $result;

        }

		// ########
         public function list_all()
        {   
            $query = $this->db->get('user_info');
			$result = $query->result();
            return $result;
        }


		public function rp_list_case($id, $status, $start_date, $end_date)
		{

			$con = "";

			if (empty($start_date)) {
				$start_date =  date('Y-m-d', strtotime('-3 month'));
			}
		
			if (empty($end_date)) {
				$end_date =  date('Y-m-d');
			}

			if (!empty($status)) {
				$con .= " AND rp_case_status = $status";
			}

			if (!empty($start_date) && !empty($end_date)) {
				$con .= " AND DATE(rp_add_date) BETWEEN '$start_date' AND '$end_date'";
			} elseif (!empty($start_date) && $start_date !== '') {
				$con .= " AND DATE(rp_add_date) = '$start_date'";
			}
			$sql = "SELECT rp_case.*, c_status.*, 
			COALESCE(rp_type.rp_name_type, 'อื่นๆ') AS rp_name_type
	FROM rp_case
	JOIN c_status ON rp_case.rp_case_status = c_status.c_status
	LEFT JOIN rp_type ON rp_case.rp_case_type = rp_type.id_type
	WHERE id_repair = $id $con";

			$query = $this->db->query($sql);
			$result = $query->result();

			return $result;
		}

		// ########
		public function rp_list_all($status, $start_date, $end_date)
		{

			$con = "";
			
			if (empty($start_date)) {
				// $start_date = date('Y-01-01'); 
				$start_date =  date('Y-m-d', strtotime('-3 month'));
				// echo $start_date;
			}
		
			if (empty($end_date)) {
				$end_date =  date('Y-m-d');
			}

	

			if (!empty($start_date) && $start_date !== '' && !empty($end_date) && $end_date !== '') {
				// Enclose date values in single quotes
				$con = " WHERE DATE(rp_add_date) BETWEEN '$start_date' AND '$end_date'";
			} elseif (!empty($start_date) && $start_date !== '') {
				$con .= " AND DATE(rp_add_date) = '$start_date'";
			}
			if (!empty($status)) {
				$con .= " AND rp_case_status = $status";

			}

			$sql = "SELECT rp_case.*, c_status.*, 
			COALESCE(rp_type.rp_name_type, 'อื่นๆ') AS rp_name_type , user_info.user_login
	FROM rp_case
	JOIN c_status ON rp_case.rp_case_status = c_status.c_status
	JOIN user_info ON user_info.id = rp_case.id_repair
	LEFT JOIN rp_type ON rp_case.rp_case_type = rp_type.id_type $con";

// echo $sql;


			$query = $this->db->query($sql);
			$result = $query->result();

			return $result;
		}





		// เพิ่ม user
	public function insert_admin()
	{
		$data = array(
                'user_name' => $this->input->post('user_name'),
                'user_login' => $this->input->post('user_login'),
                'user_password' => sha1($this->input->post('user_password'))
                );

				// print_r($data);
				// exit;

        $query=$this->db->insert('user_info',$data);
	}

	//show form edit
	public function read($id){
        $this->db->where('id',$id);
        $query = $this->db->get('user_info');


        if($query->num_rows() > 0){
            $data = $query->row();
            return $data;
        }
        return FALSE;
    }

		//ลบข้อมูล user
	public function del_user($id)
    {
        $this->db->delete('user_info',array('id'=>$id));

    }


	public function list_edit($rp_id = 0)
	{
		$sql = "SELECT * FROM rp_case 
		LEFT JOIN rp_type ON rp_case_type = id_type
		WHERE rp_case_id = $rp_id";
		$row = $this->db->query($sql)->row();
		return $row;
	}

	// ########
	public function list_type(){

		$sql = "SELECT * FROM rp_type";
		$cus_type = $this->db->query($sql)->result();

		return $cus_type;

	}

	// ########
	public function list_address(){

		$sql = "SELECT * FROM rp_address";
		$address = $this->db->query($sql)->result();

		return $address;

	}


	public function status_type(){
		
		$sql_status = "SELECT * FROM c_status";
		$status_type = $this->db->query($sql_status)->result();

		return $status_type;
	}

	public function status_user(){
		
		$sql_status = "SELECT * FROM user_status_repair";
		$status_user = $this->db->query($sql_status)->result();

		return $status_user;
	}

	public function role_user(){
		
		$sql_status = "SELECT * FROM user_role";
		$status_user = $this->db->query($sql_status)->result();

		return $status_user;
	}


	// 
	public function list_user($status , $role){

		$con = "";

		if (!empty($status) && $status != '#' && !empty($role) && $role != '#') {
			$con = "WHERE user_status_repair = $status AND user_role = $role";
		} elseif (!empty($status) && $status != '#') {
			$con = "WHERE user_status_repair = $status";
			if (!empty($role) && $role != '#') {
				$con .= " AND user_role = $role";
			}
		}elseif(!empty($role) && $role != '#') {
			$con = "WHERE user_role = $role";

			if (!empty($status) && $status != '#') {
				$con .= " AND user_status_repair = $status";
			}
		}

		
		$sql_user = "SELECT id,user_login,user_password,user_name,user_email,user_tel,user_status_repair,name_repair
		,user_role , role_name
		 FROM user_info 
		 LEFT JOIN user_status_repair ON user_status_repair = id_repair
		 LEFT JOIN user_role ON user_role = id_role
		  $con";

		$result_user = $this->db->query($sql_user)->result();

		return $result_user;
	}


	public function list_status_user(){

		$sql = "SELECT * FROM user_status";
		$list_status_user = $this->db->query($sql)->result();

		return $list_status_user;

	}


	
	        // ########
	public function admin_list_type(){
		$sql = "SELECT * FROM rp_type";
		$rp_type = $this->db->query($sql)->result();

		return $rp_type;
	}

	
	public function del_type($id_type)
    {
        $this->db->delete('rp_type',array('id_type'=>$id_type));

    }
	public function del_address($id_address)
    {
        $this->db->delete('rp_address',array('id_address'=>$id_address));

    }


	// num_status
	public function num_status($id, $start_date, $end_date)
	{
		$con = "";
		if (empty($start_date)) {
			$start_date = date('Y-m-d');
		}
	
		if (!empty($start_date) && $start_date !== '' && !empty($end_date) && $end_date !== '') {
			// Use single quotes for datetime values in the SQL query and format them appropriately
			$con .= " AND rp_add_date BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59'";
		} elseif (!empty($start_date) && $start_date !== '') {
			$con .= " AND DATE(rp_add_date) = '$start_date'";
		}
	
		$sql = "SELECT
			SUM(CASE WHEN rp_case_status = 1 THEN 1 ELSE 0 END) AS count_case_new,
			SUM(CASE WHEN rp_case_status = 2 THEN 1 ELSE 0 END) AS count_case_wait,
			SUM(CASE WHEN rp_case_status = 3 THEN 1 ELSE 0 END) AS count_case_finish,
			SUM(CASE WHEN rp_case_status = 4 THEN 1 ELSE 0 END) AS count_case_cancel
			FROM
			rp_case WHERE id_repair = $id $con";
		
		// Uncomment the line below for debugging purposes
		// echo $sql;
	
		$query = $this->db->query($sql)->row();
		return $query;
	}
	

	public function num_status_id($id, $start_date ,$end_date)
	{
		$con = "";
		if (empty($start_date)) {
			$start_date =  date('Y-m-d', strtotime('-3 month'));
		}

		if (empty($end_date)) {
			$end_date =  date('Y-m-d');
		}

		if (!empty($start_date) && !empty($end_date)) {
			$con .= " AND rp_add_date BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59'";
		} elseif (!empty($start_date) && $start_date !== '') {
			$con .= " AND DATE(rp_add_date) = '$start_date'";
		}

		$sql = "SELECT
		SUM(CASE WHEN rp_case_status = 1 THEN 1 ELSE 0 END) AS count_case_new,
		SUM(CASE WHEN rp_case_status = 2 THEN 1 ELSE 0 END) AS count_case_wait,
		SUM(CASE WHEN rp_case_status = 3 THEN 1 ELSE 0 END) AS count_case_finish,
		SUM(CASE WHEN rp_case_status = 4 THEN 1 ELSE 0 END) AS count_case_cancel ,
		COUNT(*) AS total
		FROM rp_case 
		WHERE id_repair = $id $con";

		$query = $this->db->query($sql)->row();
		return $query;
	}



	public function num_status_all($start_date ,$end_date)
	{
		$con = "";

        if (empty($start_date)) {
            // $start_date = date('Y-01-01'); 
            $start_date =  date('Y-m-d', strtotime('-3 month'));
            // echo $start_date;
        }
    
        if (empty($end_date)) {
            $end_date =  date('Y-m-d');
        }


		if (!empty($start_date) && $start_date !== '' && !empty($end_date) && $end_date !== '') {
			$con = " WHERE rp_add_date BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59'";
		} elseif (!empty($start_date) && $start_date !== '') {
			$con .= " AND DATE(rp_add_date) = '$start_date'";
		}

		$sql = "SELECT
		SUM(CASE WHEN rp_case_status = 1 THEN 1 ELSE 0 END) AS count_case_new,
		SUM(CASE WHEN rp_case_status = 2 THEN 1 ELSE 0 END) AS count_case_wait,
		SUM(CASE WHEN rp_case_status = 3 THEN 1 ELSE 0 END) AS count_case_finish,
		SUM(CASE WHEN rp_case_status = 4 THEN 1 ELSE 0 END) AS count_case_cancel,
		COUNT(*) AS total
		FROM
		rp_case $con";

		$query = $this->db->query($sql)->row();
		return $query;
	}



	
	public function user_status($status_user){

		$sql_status = "SELECT name_repair FROM user_info 
		JOIN user_status_repair ON user_status_repair = id_repair";
		$query = $this->db->query($sql_status)->row();

		
		return $query;


	}

	public function user_status_id($id , $status_user){

		$sql_status = "SELECT user_login, user_name , user_email, user_tel, name_repair , user_role.role_name
		 FROM user_info 
		 JOIN user_status_repair ON user_status_repair = id_repair
		 JOIN user_role ON user_role = id_role
		WHERE id = $id";
		$query = $this->db->query($sql_status)->row();

		
		return $query;


	}

	public function list_repair()
        {   
		echo "list_repair";
        //   echo $id;
		  exit;
        }


	public function token_list()
        {   

	$sql_token = "SELECT * FROM rp_token";
		$query = $this->db->query($sql_token)->result();

		
		return $query;
		


        }


	   
	

		
}

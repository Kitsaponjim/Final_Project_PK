<div class="content-wrapper">
	<section class="content-header">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-pencil"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการห้องประชุม</strong>
		</p>



		<div class="container-fluid">

			<div class="row">
				<style>
					/* CSS สำหรับเปลี่ยนสีพื้นหลังให้เป็นสีเหลือง */
					.small-box {
						color: white;
					}

					.small-box.bg-new {
						background-color: #4669e8;

					}

					.small-box.bg-doing {
						background-color: orange;

					}

					.small-box.bg-finish {
						background-color: green;

					}

					.small-box.bg-cancel {
						background-color: red;

					}

					/* CSS สำหรับเปลี่ยนรูปแบบมุมของกล่องเป็นสี่เหลี่ยมโค้ง */
					.small-box {
						border-radius: 10px;
						/* ปรับค่าตามต้องการ */
						overflow: hidden;
						/* จัดการขอบเขตของเนื้อหาในกรอบ */
					}

					/* สีพื้นหลังและสีตัวอักษรของกล่อง */
					.small-box.bg-new {
						background-color: #4669e8;
					}

					.repair-icon {
						width: 50px;
						height: 50px;
						background-color: #f2f2f2;
						color: #4281ff;
						border-radius: 5px;
						display: flex;
						align-items: center;
						justify-content: center;
						font-size: 16px;
						font-weight: bold;
					}

					.car-icon {
						width: 50px;
						height: 50px;
						background-color: #f2f2f2;
						color: #78d654;
						border-radius: 5px;
						display: flex;
						align-items: center;
						justify-content: center;
						font-size: 16px;
						font-weight: bold;
					}



					.users-icon {
						width: 50px;
						height: 50px;
						background-color: #f2f2f2;
						color: #ff5757;
						border-radius: 5px;
						display: flex;
						align-items: center;
						justify-content: center;
						font-size: 16px;
						font-weight: bold;
					}

					.wait-icon {
						width: 50px;
						height: 50px;
						background-color: #f2f2f2;
						color: #f7a94a;
						border-radius: 5px;
						display: flex;
						align-items: center;
						justify-content: center;
						font-size: 16px;
						font-weight: bold;
					}

					.custom-box {
						background-color: white;
						border-radius: 10px;
						box-shadow: none;
						border-top: solid white;
						/* กำหนดสีขอบด้านบนเป็นสีขาว */
					}





					/* Custom CSS for the lighter green button */
					.btn-light-success {
						background-color: #64de57;
						/* Change this to your desired color */
						color: #fff;
						/* Text color on the button */
						border-color: #64de57;
						/* Border color, you can adjust this if needed */
					}

					.btn-light-success:hover {
						background-color: #46b839;
						/* Change this to the hover color */
						color: #fff;
						border-color: #46b839;
						/* Border color on hover, adjust as needed */

					}
				</style>

				<style>
					table {
						border-collapse: collapse;
						width: 100%;
					}

					th,
					td {
						border: 1px solid #dddddd;
						text-align: left;
						padding: 8px;
						position: relative;
					}

					th {
						background-color: #f2f2f2;
					}

					.reservation {
						background-color: #ffcccb;
						/* สีแสดงการจอง */
						position: absolute;
						top: 0;
						right: 0;
						bottom: 0;
						left: 0;
						z-index: 1;
					}
				</style>

				<div class="col-sm-12">
				<?php

// Fetch data from the database (replace with your actual query)
$sql = "SELECT * FROM room_booking_table";
$query = $this->db->query($sql)->result();

// Initialize $timeTeach array
$timeTeach = array();

// Convert database result to $timeTeach format
foreach ($query as $data) {
    $start_time = date("H:i", strtotime($data->start_time));
    $end_time = date("H:i", strtotime($data->end_time));

    $timeTeach[] = array(
        array('time' => $start_time . '-' . $end_time, 'title' => $data->meeting_topic)
    );
}

$timeArr = array(
    0 => array("start" => "08:00", "stop" => "09:00"),
    1 => array("start" => "09:00", "stop" => "10:00"),
    2 => array("start" => "10:00", "stop" => "11:00"),
    3 => array("start" => "11:00", "stop" => "12:00"),
    4 => array("start" => "12:00", "stop" => "13:00"),
    5 => array("start" => "13:00", "stop" => "14:00"),
    6 => array("start" => "14:00", "stop" => "15:00"),
    7 => array("start" => "15:00", "stop" => "16:00"),
    8 => array("start" => "16:00", "stop" => "17:00"),
    9 => array("start" => "17:00", "stop" => "18:00"),
    10 => array("start" => "18:00", "stop" => "19:00")
);

function createCol($arr)
{
    $row = "";
    foreach ($arr as $data) {
        $row .= '<td>' . $data['start'] . '-' . $data['stop'] . '</td>';
    }
    return $row;
}

function getCol($haystack, $keyNeedle)
{
    $i = 0;
    foreach ($haystack as $arr) {
        if ($arr['start'] == $keyNeedle) {
            return $i;
        }
        $i++;
    }
}

function getTimeRange($timeT, $timeCol)
{
    $data = array();
    foreach ($timeT as $timeA) {
        $time = $timeA['time'];
        if (!$time)
            continue;
        $tm = explode("-", $time);
        $start = getCol($timeCol, $tm[0]);
        $end = getCol($timeCol, $tm[1]);
        $colspan = $end - $start;
        $data[$tm[0]] = array('colspan' => $colspan, 'title' => $timeA['title']);
    }
    return $data;
}

$list = "";
echo '<table border="1" width="90%" align="center" cellspacing="0">';
echo '<tr><td>Room ID</td>' . createCol($timeArr) . '</tr>';
foreach ($query as $data) {

    $timeT = $timeTeach[0]; // Assuming you want to use the first set of time for each record
    $arrRange = getTimeRange($timeT, $timeArr);

    $list = '<tr>';
    $list .= '<td rowspan="2" class="no">' . $data->room_id . '</td>';
    $list .= '<td rowspan="2" class="no">' . $data->meeting_topic . '</td>';
    $chkCol = 0;
    $col = 0;
    foreach ($timeArr as $timeA) {
        $highlight = "";
        $colspan = "";
        if ($chkCol < ($col - 1) && $col != 0) {
            $chkCol++;
            continue;
        }
        $col = 0;
        $chkCol = 0;
        if (!empty($arrRange[trim($timeA['start'])])) {
            $col = $arrRange[trim($timeA['start'])]['colspan'];
            $highlight = "highlight";
            $colspan = 'colspan="' . $col . '"';
        }
        $list .= '<td ' . $colspan . ' class="' . $highlight . '"> </td>';
    }
    $list .= '</tr>';

    $list .= '<tr>';


    foreach ($timeArr as $timeA) {
        $highlight = "";
        $colspan = "";
        if ($chkCol < ($col - 1) && $col != 0) {
            $chkCol++;
            continue;
        }
        $title = " ";
        $col = 0;
        $chkCol = 0;
        if (!empty($arrRange[trim($timeA['start'])])) {
            $col = $arrRange[trim($timeA['start'])]['colspan'];
            $title = $arrRange[trim($timeA['start'])]['title'];
            $highlight = "highlight";
            $colspan = 'colspan="' . $col . '"';
        }

        $list .= '<td ' . $colspan . ' class="' . $highlight . ' title">' . $title . '</td>';
    }
    $list .= '</tr>';
    echo $list;
}

echo '</table>';
?>







				</div>
			</div>
		</div>





</div>

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

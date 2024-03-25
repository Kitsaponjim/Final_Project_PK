<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>



<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>ระบบจองรถ</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<?php echo link_tag('asset/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>

	<?php echo link_tag('asset/bower_components/font-awesome/css/font-awesome.min.css'); ?>

	<?php echo link_tag('asset/bower_components/Ionicons/css/ionicons.min.css'); ?>

	<?php echo link_tag('asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>

	<?php echo link_tag('asset/dist/css/AdminLTE.min.css'); ?>

	<?php echo link_tag('asset/dist/css/skins/_all-skins.min.css'); ?>

	<script src="<?php echo base_url(); ?>asset/dist/js/app.min.js" type="text/javascript">


	</script>

	<!-- Google Font -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<!-- ckeditor-->
	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<style type="text/css">
		.fr {
			color: red;
		}
	</style>


</head>



<?php


$sql = "SELECT
SUM(CASE WHEN status_reserve = 1 THEN 1 ELSE 0 END) AS car_available,
SUM(CASE WHEN status_reserve = 2 THEN 1 ELSE 0 END) AS car_noEmpty,
SUM(CASE WHEN status_reserve = 3 THEN 1 ELSE 0 END) AS car_wait_approved,
SUM(CASE WHEN status_reserve = 4 THEN 1 ELSE 0 END) AS car_wait
FROM car_case;";

$query = $this->db->query($sql)->result();

foreach ($query as $row) {
	$car_available = $row->car_available;
	$car_noEmpty = $row->car_noEmpty;
	$car_wait = $row->car_wait;
	$car_wait_approved = $row->car_wait_approved;

}


// $sql_data = "SELECT
// SUM(CASE WHEN car_status = 1 THEN 1 ELSE 0 END) AS car_available,
// SUM(CASE WHEN car_status = 2 THEN 1 ELSE 0 END) AS car_noEmpty,
// SUM(CASE WHEN car_status = 3 THEN 1 ELSE 0 END) AS car_wait_approved,
// SUM(CASE WHEN car_status = 4 THEN 1 ELSE 0 END) AS car_wait
// FROM car_list;";

// $query_data = $this->db->query($sql_data)->result();

// foreach ($query_data as $row) {
// 	$car_available = $row->car_available;
// 	$car_noEmpty = $row->car_noEmpty;
// 	$car_wait = $row->car_wait;
// 	$car_wait_approved = $row->car_wait_approved;

// }



?>

<style>
	.badge-blue {
		background-color: #5c9dff;
		/* สีพื้นหลังเป็นสีฟ้า */
		color: white;
		/* สีตัวอักษรเป็นสีขาว */
		/* อื่น ๆ ตามต้องการ */
	}
	.badge-orange {
		background-color: orange;
		/* สีพื้นหลังเป็นสีฟ้า */
		color: white;
		/* สีตัวอักษรเป็นสีขาว */
		/* อื่น ๆ ตามต้องการ */
	}

	.user-panel {
		display: flex;
		align-items: flex-start;
	}

	.pull-left.image,
	.pull-left.info {
		margin-left: 10px;
		/* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
	}

	.sidebar-menu li a {
		color: gray;
		/* กำหนดสีตัวอักษรเป็นสีดำ */
	}



	.sidebar-menu li:hover a {
		background-color: #1E90FF !important;
		color: white !important;
	}

	/* เมื่อเมนูถูกเลือก (active) */
	.sidebar-menu li.active a {
		background-color: #1E90FF !important;
		color: white !important;
	}



	.user-icon {
		display: inline-block;
		vertical-align: middle;
		margin-right: 10px;
	}

	.square-icon {
		width: 30px;
		height: 30px;
		background-color: #e9d4ff;
		color: #a14aff;
		border-radius: 5px;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 16px;
		font-weight: bold;
	}

	.username {
		display: inline-block;
		vertical-align: middle;
	}
</style>

<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">

		<header class="main-header">


			<a href="<?php //echo $mylink;?>" class="logo" style="background-color: white;">

				<span class="logo-lg" style="color: black;"><b>ระบบจองรถ</b></span>

			</a>


			<nav class="navbar navbar-static-top" style="background-color: #43A2FF;">

				<!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a> -->


				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<div class="user-icon">
									<div class="square-icon">
										<?php echo mb_substr($_SESSION['user_name'], 0, 1, 'UTF-8'); ?>
									</div>

								</div>
								<span class="username">
									&nbsp; <strong>
										<?php echo $_SESSION['user_name']; ?>
									</strong>
									&nbsp; <strong><i class="fa fa-angle-down"></i> </strong> &nbsp; &nbsp; &nbsp;
								</span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo site_url('repair_system/admin/profile'); ?>"><i
											class="fa fa-user"></i>โปรไฟล์</a>
								</li>
								<li>
									<a href="<?php echo site_url('login/logout'); ?>"
										onclick="return confirm('คุณต้องการออกจากระบบหรือไม่!!!');"><i
											class="fa fa-sign-out"></i>ออกจากระบบ</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>

			</nav>
		</header>


		<aside class="main-sidebar" style="background-color: white;">

			<section class="">

				<ul class="sidebar-menu" data-widget="tree">

					<li class="header" style="background-color: white;">
						<strong style="color: #919191;">เมนู</strong>
					</li>

					<li class="ae"><a href="<?= site_url('car_system/Admin'); ?>"><i class="fa fa-calendar fa-lg"></i>
							&nbsp;
							<strong> <span>ปฏิทินการใช้รถ</span> </strong> </a></li>



					<li><a href="<?= site_url('car_system/employee/list_car'); ?>"><i
								class="fa fa-car fa-lg"></i> &nbsp;
							<strong> <span>รายการรถ

								</span></strong> </a></li>


					<li><a href="<?= site_url('car_system/employee/list_history'); ?>"><i
								class="fa fa-history fa-lg"></i> &nbsp;
							<strong> <span>ประวัติการจองรถ

								</span></strong> </a></li>


					<li class="header" style="background-color: white;">
						<strong style="color: #919191;">ตั้งค่า</strong>
					</li>
					<li><a href="<?= site_url('repair_system/admin/profile'); ?>"><i class="fa fa-user fa-lg"></i>
							&nbsp;
							<strong> <span>โปรไฟล์</span></a></strong> </li>


					<li><a href="<?= site_url('repair_system/admin/admin_edit_password'); ?>"><i
								class="fa fa-code fa-lg"></i> &nbsp;
							<strong> <span>เปลี่ยนรหัสผ่าน</span></a></strong> </li>


					<li><a href="<?= site_url('login/logout'); ?>"
							onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่');"><i
								class="fa fa-sign-out fa-lg"></i> &nbsp;
							<strong> <span>ออกจากระบบ</span></strong> </a></li>
				</ul>

			</section>
		</aside>

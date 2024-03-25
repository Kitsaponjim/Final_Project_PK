<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>ระบบแจ้งซ่อม</title>

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


<style>
	.badge-blue {
		background-color: #5c9dff;
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
		background-color: #ededed !important;
		color: #1E90FF !important;
	}

	/* เมื่อเมนูถูกเลือก (active) */
	.sidebar-menu li.active a {
		background-color: #1E90FF !important;
		color: white !important;
	}

	/* เพิ่มส่วนนี้ */
	.sidebar-collapse .sidebar-menu span {
		display: none;
	}

	.sidebar-collapse .sidebar-menu li:hover a {
		background-color: #ededed !important;
		/* คลาส .sidebar-collapse จะมีผลเมื่อ sidebar ถูกย่อ */
		color: #1E90FF !important;
	}
	/* เพิ่มส่วนนี้ */

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


			<a href="<?= site_url('repair_system/employee'); ?>" class="logo" style="background-color: white;">
			
				<span class="logo-lg" style="color: #4281ff; margin-top:10px;"><b> <i class="fa fa-wrench"></i>
ระบบแจ้งซ่อม</b></span>

			</a>

			
			<style>
    .sidebar-toggle {
        background-color: transparent !important; /* ยกเลิกการตั้งค่าสีพื้นหลัง */
    }

    .sidebar-toggle .icon-bar {
        background-color: #4281ff !important; /* กำหนดสีฟ้าใหม่ */
    }

    .sidebar-toggle:hover .icon-bar {
        background-color: #4281ff !important; /* กำหนดสีฟ้าเมื่อโฮเวอร์ */
    }
</style>

			<nav class="navbar navbar-static-top" style="background-color: #43A2FF;">
				<!-- Sidebar button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>


<?php

$sql = "SELECT
SUM(CASE WHEN rp_case_status = 1 THEN 1 ELSE 0 END) AS count_case_new
FROM
rp_case
WHERE
rp_case_status = 1 AND YEAR(rp_add_date) = YEAR(CURRENT_DATE())";

$query = $this->db->query($sql)->row();

$count_case_new = $query->count_case_new;

$id = $_SESSION['id'];
$sql_name = "SELECT user_name FROM user_info WHERE id = $id";
$query_name = $this->db->query($sql_name)->row();

$name = $query_name->user_name;



?>

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
    &nbsp; 
    <strong>
        <?php echo $name; ?> 
    </strong>
    <div style="display: inline-block; vertical-align: middle; text-align: center;margin-left:auto;">
        &nbsp; &nbsp; &nbsp; &nbsp; <!-- เพิ่มช่องว่างเพื่อความเป็นระเบียบ -->
        <strong><i style="margin-left:10px;" class="fa fa-angle-down"></i> </strong> &nbsp; &nbsp; &nbsp;
    </div>
    <br>
    <div style="display: inline-block; vertical-align: middle; text-align: center; margin-left:auto;">
	<span style="color: green; font-size: small;">●</span>
        <strong><span style="font-size: small;">ผู้ใช้งานระบบ</span></strong>  
    </div>
</span>




							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo site_url('repair_system/employee/profile'); ?>"><i
											class="fa fa-user"></i>โปรไฟล์</a>
								</li>
								<li>
									<a href="<?php echo site_url('login/page_choice'); ?>"><i
											class="fa fa-check-square-o""></i>เลือกระบบ</a>
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
			<hr style="border-top: 2px solid #e3e1e1;">

				<ul class="sidebar-menu" data-widget="tree">

					<li class="header" style="background-color: white;">
						<strong style="color: #919191; font-size:16px;">เมนู</strong>
					</li>


					<li class="ae"><a href="<?= site_url('repair_system/employee'); ?>"><i class="fa fa-home fa-lg"></i>
							&nbsp;&nbsp;&nbsp;
							<strong> <span>หน้าหลัก</span> </strong> </a></li>


					<li><a href="<?= site_url('repair_system/employee/repair'); ?>"><i class="fa fa-wrench fa-lg"></i>&nbsp;&nbsp;&nbsp;
							<strong><span>แจ้งซ่อม</span> </strong> </a></li>

					<li><a href="<?= site_url('repair_system/employee/list_repair'); ?>"><i class="fa fa-history fa-lg"></i>&nbsp;&nbsp;&nbsp;
							<strong><span>ประวัติการแจ้งซ่อม</span> </strong> </a></li>





							<li class="header" style="background-color: white;">
						<strong style="color: #919191;font-size:16px;">ตั้งค่า</strong>
					</li>
					<li><a href="<?= site_url('repair_system/employee/profile'); ?>"><i class="fa fa-user fa-lg"></i>
					&nbsp;&nbsp;&nbsp;
							<strong> <span>โปรไฟล์</span></a></strong> </li>


					<li><a href="<?= site_url('repair_system/employee/edit_password'); ?>"><i
								class="fa fa-key fa-lg"></i> &nbsp;&nbsp;&nbsp;
							<strong> <span>เปลี่ยนรหัสผ่าน</span></a></strong> </li>


					<li><a href="<?= site_url('login/logout'); ?>"
							onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่');"><i
								class="fa fa-sign-out fa-lg"></i> &nbsp;&nbsp;&nbsp;
							<strong> <span>ออกจากระบบ</span></strong> </a></li>
				</ul>




			</section>
		</aside>

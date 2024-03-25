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

<body class="skin-red" style="background-color: #dedede;"> 
	
	<div class="" style="background-color: #43A2FF;">

		<header class="main-header">
		
			<nav class="navbar navbar-static-top" style="background-color: #43A2FF;">

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




	</div>

</body>

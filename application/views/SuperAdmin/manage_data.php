<style>
	.custom-box {
		background-color: white;
		border-radius: 10px;
		box-shadow: none;
		border-top: solid white;

	}


	.text-primary {
		color: #4a89ff;

		font-size: 18px;
	}

	.text-primary .fa {
		color: #07c700;

	}

	.button-container {
		display: flex;
		justify-content: flex-end;

	}

	.btn-primary {
		background-color: green;

		color: white;

		margin-right: 5px;

	}

	.btn-danger {
		background-color: red;

		color: white;

	}

	.form-control {
		border-radius: 10px;
		/* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
	}


	.form-group {
		margin-top: 10px;
	}




	.customer-info {

		margin-left: 20px;
		margin-right: 20px;

	}

	.margin {
		margin-top: 20px;
	}

	.setone input[readonly] {
		font-size: 16px;


	}


	.customer-info input[readonly] {

		background-color: white;
		/* Set the desired background color */
		color: #555;
		/* Set the desired text color */
	}


	.custom input[readonly] {
		background-color: white;
		/* Set the desired background color */
		color: #555;
		/* Set the desired text color */
	}
</style>



<!-- ############################################################################################## -->

<?php

$sql = "SELECT * FROM user_info
LEFT JOIN user_role ON user_info.user_role = user_role.id_role 
LEFT JOIN user_status_repair ON user_info.user_status_repair = user_status_repair.id_repair
LEFT JOIN user_status_car ON user_info.user_status_car = user_status_car.id_car 
LEFT JOIN user_status_emeeting ON user_info.user_status_emeeting = user_status_emeeting.id_emeeting 
LEFT JOIN user_status_room ON user_info.user_status_room = user_status_room.id_room 
LEFT JOIN user_status_info ON user_info.user_status_info = user_status_info.id_status 
WHERE id = $id";

$result = $this->db->query($sql)->row();


$id = $result->id;
$user_login = $result->user_login;
$user_password = $result->user_password;
$user_name = $result->user_name;
$user_email = $result->user_email;
$user_tel = $result->user_tel;

$user_add_date = $result->user_add_date;
$user_status_info = $result->user_status_info;
$role_name = $result->role_name;

$name_repair = $result->name_repair;

$name_car = $result->name_car;
$name_emeeting = $result->name_emeeting;
$name_room = $result->name_room;


$activation_date = $result->activation_date;
$status_name = $result->status_name;


$user_edit_date = $result->user_edit_date;

$last_edit_password = $result->last_edit_password;
$last_edit_data = $result->	last_edit_data;
$name_edit = $result->	name_edit;



?>


<style>
	.table-bordered,
	.table-bordered th,
	.table-bordered td {
		border: none;
	}
</style>

<div style="display: flex; justify-content: center;">
	<div class="col-sm-10" style="padding-top: 15px;">
		<div class="box custom-box">



			<section class="content">
				<div class="box-body">
					<div class="row">


						<div class="col-sm-4">

							<div style="display: flex; justify-content: center; align-items: center; margin-top:20px;">
								<i id="" class="fa fa-user" style="font-size: 130px; color: #000000;"></i>
							</div>

							<div style="font-size: 26px; font-weight: bold; text-align: center; margin-top:10px;">
								<?= $user_name ?>
							</div>

							<div class="col-sm-12" style="margin-top:10px;">
								<div class="col-sm-6">
									<div style="display: flex; align-items: center; justify-content: center;">
										<i class="fa fa-envelope" style="margin-right: 5px; color:#4281ff;"></i>
										<br>
										<strong>
											<span style="font-size: 15px;">
												<?= $user_email ?>
											</span>
										</strong>


									</div>
								</div>
								<div class="col-sm-6">
									<div style="display: flex; align-items: center; justify-content: center;">
										<strong>
											<i class="fa fa-phone" style="margin-right: 10px; color:#4281ff;"></i>
										</strong>

										<strong>
											<span style="font-size: 15px;">
												<?= $user_tel ?>
											</span>
										</strong>

									</div>
								</div>


							</div>
							<!--  display: inline-block; เพื่อทำให้แต่ละรายการมีความกว้างเท่ากัน -->
							<div style=" margin-left:45px; ">

								<div style="font-size: 15px; margin-top: 50px;">
									<strong>
										<span style="display: inline-block; width: 150px;">สถานะใช้งาน :</span>

									</strong>

									<span>
										<?php if ($user_status_info == 1): ?>
											<span
												style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background-color: #07db00; vertical-align: middle;"></span>
										<?php else: ?>
											<span
												style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background-color: red; vertical-align: middle;"></span>
										<?php endif; ?>
										<?= $status_name ?>
									</span>
								</div>

								<div style="font-size: 15px; margin-top: 10px;">
									<strong>
										<span style="display: inline-block; width: 150px;">ชื่อผู้ใช้งาน :</span>

									</strong>

									<span>
										<?= $user_login ?>
									</span>
								</div>
								<div style="font-size: 15px; margin-top: 10px;">
									<strong>
										<span style="display: inline-block; width: 150px;">บทบาท :</span>
									</strong>
									<span>
										<?= $role_name ?>
									</span>
								</div>
								<div style="font-size: 15px; margin-top: 10px;">
									<strong>
										<span style="display: inline-block; width: 150px;">วันที่เปิดใช้งาน :</span>

									</strong>
									<span>
										<?= $activation_date ?>
									</span>
								</div>
							</div>


						</div>

						<div class="col-sm-8">



							<div class="col-sm-12" style="margin-top:10px;">

								<div style="font-size: 20px; margin-top: 15px; margin-left:15px;">
									<strong>
										<i class="fa fa-cogs"></i>
										<span>ข้อมูลการใช้งานระบบ</span>
									</strong>

								</div>

								<div class="col-sm-6">

									<div style=" margin-left:15px; ">

										<div style="font-size: 15px; margin-top: 25px;">
											<strong>
												<i class="fa fa-wrench"></i>
												<span style="display: inline-block; width: 150px;">ระบบแจ้งซ่อม</span>
											</strong>

										</div>


										<div style="font-size: 15px; margin-top: 10px;">

											<span style="display: inline-block; width: 150px;">สถานะใช้งาน :</span>
											<span>
												<?= $name_repair ?>
											</span>
										</div>


										<br>
										<div style="font-size: 15px; margin-top: 30px;">
											<strong>
												<img src="<?php echo base_url('img'); ?>/meeting.png" class="icon"
													alt="" style="height: 20px; width: 20px;">


												<span
													style="display: inline-block; width: 150px;">ระบบจองห้องประชุม</span>
											</strong>


										</div>

										<div style="font-size: 15px; margin-top: 10px;">
											<span style="display: inline-block; width: 150px;">สถานะใช้งาน :</span>
											<span>
												<?= $name_room ?>
											</span>
										</div>

									</div>



								</div>


								<div class="col-sm-6">


									<div style=" margin-left:15px; ">

										<div style="font-size: 15px; margin-top: 25px;">
											<strong>
												<i class="fa fa-car"></i>
												<span style="display: inline-block; width: 150px;">ระบบจองรถ</span>
											</strong>


										</div>

										<div style="font-size: 15px; margin-top: 10px;">
											<span style="display: inline-block; width: 150px;">สถานะใช้งาน :</span>
											<span>
												<?= $name_car ?>
											</span>
										</div>

										<br>
										<!-- <div style="font-size: 15px; margin-top: 30px;">
											<strong>
												<i class="fa fa-wrench"></i>
												<span style="display: inline-block; width: 150px;">ระบบเอกสาร</span>
											</strong>


										</div>

										<div style="font-size: 15px; margin-top: 10px;">
											<span style="display: inline-block; width: 150px;">สถานะใช้งาน :</span>
											<span>
												<?= $name_emeeting ?>
											</span>
										</div> -->


									</div>
									<br>




								</div>

							</div>

							<br>
							<br>

							<div class="col-sm-12" style="margin-top:40px;">



								<div style="font-size: 20px; margin-top: 15px; margin-left:15px;">
									<strong>
										<i class="fa fa-user"></i>
										<span>ข้อมูลบัญชีผู้ใช้</span>
									</strong>

								</div>



								<div class="col-sm-6">

									<div style=" margin-left:15px; ">

<!-- 
										<div style="font-size: 15px; margin-top: 15px;">
											<span style="display: inline-block; width: 150px;">เปิดใช้งาน :</span>
											<span>
												<?= $role_name ?>
											</span>
										</div> -->

										<div style="font-size: 15px; margin-top: 10px;">
											<span style="display: inline-block; width: 150px;">ชื่อผู้ใช้แก้ไขข้อมูล
												:</span>
											<span>
												<?= $name_edit ?>
											</span>
										</div>

										<div style="font-size: 15px; margin-top: 10px;">
											<span style="display: inline-block; width: 150px;">แก้ไขล่าสุด :</span>
											<span>
												<?= $user_edit_date ?>
											</span>
										</div>



									

									</div>

								</div>

								<div class="col-sm-6">
									<div style=" margin-left:15px; ">

										<div style="font-size: 15px; margin-top: 15px;">
											<span style="display: inline-block; width: 150px;">แก้ไข้รหัสผ่านล่าสุด
												:</span>
											<span>
												<?= $last_edit_password ?>
											</span>
										</div>
										<div style="font-size: 15px; margin-top: 10px;">
											<span style="display: inline-block; width: 150px;">แก้ไขข้อมูลล่าสุด
												:</span>
											<span>
												<?= $last_edit_data ?>
											</span>
										</div>



									</div>
									<br>
									<br>

								</div>

							</div>




							<div class="col-md-12 mt-2">
								<div class="button-container">
									<input class="btn btn-custom"
										style="background-color: #4281ff; color:white; margin-right:15px" type="submit"
										name="btnSave" id="btnSave" value="แก้ไขข้อมูล"
										onclick="onEdit('<?php echo $id; ?>')">

									<input type="button" value="ย้อนกลับ" class="btn btn-custom rounded-0"
										style="margin-right:15px"
										onclick="window.location='<?= base_url(); ?>SuperAdmin/list_user/'">

								</div>
							</div>

						</div>
					</div>
			</section>









		</div>
	</div>
</div>









<script>

	function onEdit(id) {

		window.location = "<?= base_url(); ?>SuperAdmin/edit_manage_data/" + id;

	}



</script>

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
								<?= $user_login ?>
							</div>



							<div>
							<div style="font-size: 15px; margin-top: 25px;">
								<strong>
									<span style="display: inline-block; width: 150px;">ชื่อ-นามสกุล</span>
								</strong>

							</div>

							<div style="font-size: 15px; margin-top: 10px;">
								<input type="text" id="user_name" name="user_name"
									class="form-control rounded-0 custom-placeholder" placeholder="<?= $user_name ?>">

							</div>
							</div>


							<div>
							<div style="font-size: 15px; margin-top: 25px;">
								<strong>
								<i class="fa fa-envelope" style="margin-right: 5px; color:#4281ff;"></i>

									<span style="display: inline-block; width: 150px;">อีเมล</span>
								</strong>

							</div>

							<div style="font-size: 15px; margin-top: 10px;">
							
								<input type="text" id="user_email" name="user_email"
									class="form-control rounded-0 custom-placeholder" placeholder="<?= $user_email ?>">

							</div>
							</div>

							<div>
							<div style="font-size: 15px; margin-top: 25px;">
								<strong>
								<i class="fa fa-phone" style="margin-right: 10px; color:#4281ff;"></i>

									<span style="display: inline-block; width: 150px;">เบอร์โทรศัพท์</span>
								</strong>

							</div>

							<div style="font-size: 15px; margin-top: 10px;">
								<input type="text" id="user_tel" name="user_tel"
									class="form-control rounded-0 custom-placeholder" placeholder="<?= $user_tel ?>">

							</div>
							</div>

							<div>
							<div style="font-size: 15px; margin-top: 25px;">
								<strong>
								<i class="fa fa-key" style="margin-right: 10px; color:#4281ff;"></i>

									<span style="display: inline-block; width: 150px;">แก้ไขรหัสผ่าน</span>
								</strong>

							</div>

							<div style="font-size: 15px; margin-top: 10px;">
								<input type="password" id="user_password1" name="user_password1"
									class="form-control rounded-0 custom-placeholder" placeholder="">

							</div>
							</div>
							

							<div>
							<div style="font-size: 15px; margin-top: 25px;">
								<strong>
								<i class="fa fa-key" style="margin-right: 10px; color:#4281ff;"></i>
									<span style="display: inline-block; width: 150px;">ยืนยันรหัสผ่าน</span>
								</strong>

							</div>

							<div style="font-size: 15px; margin-top: 10px;">
								<input type="password" id="user_password2" name="user_password2"
									class="form-control rounded-0 custom-placeholder" placeholder="">

							</div>
							</div>
							
							<br>
							<br>

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
												<span style="display: inline-block; width: 150px;">ระบบแจ้งซ่อม</span>
											</strong>

										</div>


										<div style="font-size: 15px; margin-top: 10px;">
										<select id="user_status_repair" name="user_status_repair" required class="form-control">
							<?php
							$sql_repair = "SELECT * FROM user_status_repair";
							$result_repair = $this->db->query($sql_repair)->result();
							echo '<option value="#">--เลือก---</option>';
							foreach ($result_repair as $repair) {

								$id_repair = @$repair->id_repair;
								$name_repair = @$repair->name_repair;

								echo '<option value="' . $id_repair . '">' . $name_repair . '</option>';
							}
							?>
						</select>
						
										</div>


										<br>
										<div style="font-size: 15px; margin-top: 30px;">
											<strong>
												<span
													style="display: inline-block; width: 150px;">ระบบจองห้องประชุม</span>
											</strong>


										</div>

										<div style="font-size: 15px; margin-top: 10px;">
										<select id="user_status_room" name="user_status_room" required class="form-control">
							<?php
							$sql_role = "SELECT * FROM user_status_room";
							$result_role = $this->db->query($sql_role)->result();
							echo '<option value="#">--เลือก---</option>';
							foreach ($result_role as $role) {

								$id_room = @$role->id_room;
								$role_name = @$role->name_room;

								echo '<option value="' . $id_room . '">' . $role_name . '</option>';
							}
							?>
						</select>
										</div>

									</div>



								</div>


								<div class="col-sm-6">


									<div style=" margin-left:15px; ">

										<div style="font-size: 15px; margin-top: 25px;">
											<strong>
												<span style="display: inline-block; width: 150px;">ระบบจองรถ</span>
											</strong>


										</div>

										<div style="font-size: 15px; margin-top: 10px;">
										<select id="user_status_car" name="user_status_car" required class="form-control">
							<?php
							$sql_role = "SELECT * FROM user_status_car";
							$result_role = $this->db->query($sql_role)->result();
							echo '<option value="#">--เลือก---</option>';
							foreach ($result_role as $role) {

								$id_car = @$role->id_car;
								$role_name = @$role->name_car;

								echo '<option value="' . $id_car . '">' . $role_name . '</option>';
							}
							?>
						</select>
										</div>

										<br>
										<div style="font-size: 15px; margin-top: 30px;">
											<strong>
												<span style="display: inline-block; width: 150px;">ระบบเอกสาร</span>
											</strong>


										</div>

										<div style="font-size: 15px; margin-top: 10px;">
										<select id="user_status_emeeting" name="user_status_emeeting" required class="form-control">
							<?php
							$sql_role = "SELECT * FROM user_status_emeeting";
							$result_role = $this->db->query($sql_role)->result();
							echo '<option value="#">--เลือก---</option>';
							foreach ($result_role as $role) {

								$id_emeeting = @$role->id_emeeting;
								$role_name = @$role->name_emeeting;

								echo '<option value="' . $id_emeeting . '">' . $role_name . '</option>';
							}
							?>
						</select>


										</div>


									</div>
									<br>




								</div>

							</div>


							<div class="col-sm-12" style="margin-top:10px;">



								<div style="font-size: 20px; margin-top: 15px; margin-left:15px;">
									<strong>
									<i class="fa fa-user"></i>
										<span>ข้อมูลบัญชีผู้ใช้</span>
									</strong>

								</div>


								<div class="col-sm-6">

								<div>
								<div style=" margin-left:15px; ">
<div style="font-size: 15px; margin-top: 25px;">
		<strong>
			
			<span style="display: inline-block; width: 150px;">สถานะการใช้งาน</span>
		</strong>


	</div>

	<div style="font-size: 15px; margin-top: 10px;">
	<select id="user_status_info" name="user_status_info" required class="form-control">
							<?php
							$sql_role = "SELECT * FROM user_status_info";
							$result_role = $this->db->query($sql_role)->result();
							echo '<option value="#">--เลือก---</option>';
							foreach ($result_role as $role) {

								$id_role = @$role->id_status;
								$role_name = @$role->status_name;

								echo '<option value="' . $id_role . '">' . $role_name . '</option>';
							}
							?>
						</select>


	</div>
								</div>
								<div>
								<div style=" margin-left:15px; ">

<div style="font-size: 15px; margin-top: 25px;">
		<strong>
			<span style="display: inline-block; width: 150px;">บทบาท</span>
		</strong>


	</div>

	<div style="font-size: 15px; margin-top: 10px;">
	<select id="user_role" name="user_role" required class="form-control">
							<?php
								$sql_role = "SELECT * FROM user_role";
								$result_role = $this->db->query($sql_role)->result();
							echo '<option value="#">--เลือก---</option>';
							foreach ($result_role as $role) {

								$id_role = @$role->id_role;
								$role_name = @$role->role_name;

								echo '<option value="' . $id_role . '">' . $role_name . '</option>';
							}
							?>
						</select>



	</div>
								</div>
									



									
								

									</div>

								</div>

							

							</div>




							<div class="col-md-12 mt-2">
								<div class="button-container">
									<input class="btn btn-custom"
										style="background-color: #4281ff; color:white; margin-right:15px" type="submit"
										name="btnSave" id="btnSave" value="บันทึกข้อมูล"
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

		var user_password_1 = $("#user_password1").val();
		var user_password_2 = $("#user_password2").val();
		var user_name = $("#user_name").val();
		var user_email = $("#user_email").val();
		var user_tel = $("#user_tel").val();

		var user_role = $("#user_role").val();
		var user_status_info = $("#user_status_info").val();
		var user_status_repair = $("#user_status_repair").val();
		var user_status_car = $("#user_status_car").val();
		var user_status_room = $("#user_status_room").val();
		var user_status_emeeting = $("#user_status_emeeting").val();



		if(user_name === '' && user_email === '' && user_tel === '' && user_password_1 === '' && user_password_2 === '' && user_role === '#' && user_status_info === '#'
		&& user_status_repair === '#' && user_status_car === '#' && user_status_room === '#' && user_status_emeeting === '#'){
	alert("กรุณากรอกข้อมูลที่ต้องการแก้ไข");
	return false;
}

// alert('1');

if(user_password_1 != '' && user_password_2 != ''){
	if (user_password_2 != user_password_1) {
				alert('รหัสผ่านไม่ตรงกัน');
				$('#password_2').focus();
				return false;

			} 
}

// alert('2');
// 			if(user_name != ''){
// 	if (!/^[a-zA-Zก-๙ ]+$/.test(user_name)) {
// 				alert("กรุณากรอกเฉพาะตัวอักษรในชื่อ-นามสกุล");
// 				$("#user_name").focus();
// 				return false;
// 			}
// }

// alert('3');
// if(user_tel != ''){
// 	if (user_tel.length !== 10) {
// 				alert("กรุณากรอกเบอร์โทรศัพท์มือถือให้ครบ 10 หลัก");
// 				$("#user_tel").focus();
// 				return false;
// 			}
// }

// alert('4');
// if(user_email != ''){
// 	if (!isValidEmail(user_email)) {
// 				alert("กรุณากรอกอีเมลที่ถูกต้อง");
// 				$("#user_email").focus();
// 				return false;
// 			}

// }

// alert('5');
if (confirm('คุณต้องการบันทึกข้อมูลใช่หรือไม่')) {
			var pmeters = 'id=' + <?= $id ?> + '&user_name=' + user_name 
			 + '&user_email=' + user_email
			 + '&user_tel=' + user_tel
			 + '&user_password_1=' + user_password_1
			 + '&user_password_2=' + user_password_2
			 + '&user_role=' + user_role
			 + '&user_status_info=' + user_status_info
			 + '&user_status_repair=' + user_status_repair
			 + '&user_status_car=' + user_status_car
			 + '&user_status_room=' + user_status_room
			 + '&user_status_emeeting=' + user_status_emeeting;
			pmeters = pmeters.replace("undefined", "");

			// alert(pmeters);

			$.ajax({
				url: "<?= base_url(); ?>SuperAdmin/update_user",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>SuperAdmin/";
				}
			});
			return false;
		}





	}



</script>

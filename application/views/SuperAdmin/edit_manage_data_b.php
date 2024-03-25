

<style>
	/* กำหนดหล่องเป็นเหลี่ยมโค้ง */
	.custom-box {
		background-color: white;
		border-radius: 10px;
		box-shadow: none;
		border-top: solid white;
		/* กำหนดสีขอบด้านบนเป็นสีขาว */
	}

	/* .custom-placeholder::placeholder {
		color: #4a89ff;
		font-weight: bold;
	} */

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
</style>



<!-- ############################################################################################## -->

<?php


$id = $query['query']->id;
$user_login = $query['query']->user_login;
$user_password = $query['query']->user_password;
$user_name = $query['query']->user_name;
$user_email = $query['query']->user_email;
$user_tel = $query['query']->user_tel;

$user_add_date = $query['query']->user_add_date;
$user_status_info = $query['query']->user_status_info;
$role_name = $query['query']->role_name;

$name_repair = $query['query']->name_repair;

$name_car = $query['query']->name_car;
$id_emeeting = $query['query']->id_emeeting;
$name_room = $query['query']->name_room;

$activation_date = $query['query']->activation_date;


?>


<div class="col-sm-5" style="padding-top: 15px;">

	<div class="box custom-box">


		<section class="content-header" style="display: flex; align-items: center;">

			<i class="fa fa-user"
				style="margin-right: 10px; padding: 8px; border-radius: 50%; color: back; font-size: 18px;"></i>

			<strong style="flex: 1; display: inline; font-size: 20px;">ข้อมูลผู้ใช้ระบบ </strong>


		</section>


		<section class="content">
			<div class="box-body">
				<div class="row">


					<div class="customer-info">
						<label class="setone"><i class="fa fa-user"></i> ชื่อ-นามสกุล </label>
						<input type="text" id="cus_name1" name="cus_name1"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $user_name ?>">
					</div>

					<div class="customer-info margin">
						<label class="setone"><i class="fa fa-sign-in"></i> ล็อกอินผู้ใช้ </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $user_login ?>">
					</div>

					<div class="customer-info margin">
						<label class="setone"><i class="fa fa-envelope"></i> อีเมล </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $user_email ?>">
					</div>

					<div class="customer-info margin">
						<label class="setone"><i class="fa fa-tel"></i> เบอร์โทรศัพท์ </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $user_tel ?>">
					</div>

					<!-- <div class="customer-info margin">
						<label class="setone"><i class="fa fa-tel"></i> สถานะการใช้งาน </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $user_login ?>" >
					</div> -->



				</div>
			</div>

		</section>

	</div>
</div>


<div class="col-sm-7" style="padding-top: 15px;">

	<div class="box custom-box">


		<section class="content-header" style="display: flex; align-items: center;">

			<i class="fa fa-user"
				style="margin-right: 10px; padding: 8px; border-radius: 50%; color: back; font-size: 18px;"></i>

			<strong style="flex: 1; display: inline; font-size: 20px;">รายการสถานะของแต่ละระบบ </strong>


		</section>

		<section class="content">
			<div class="box-body">
				<div class="row">


					<div class="col-sm-6">


						<div class="custom">
							<label class="setone"><i class="fa fa-user"></i> ระบบแจ้งซ่อม </label>

							<!-- <select id="status" name="status" required class="form-control">

								<?php
								foreach ($user_status_repair['user_status_repair'] as $key => $status) {
									$name_address = @$status->name_repair;
									$id_address = @$status->id_repair;
									$selected = ($user_status_repair == $id_address) ? 'selected' : '';
									echo '<option value="' . $id_address . '" ' . $selected . '>' . $name_address . '</option>';
								}
								?>
							</select> -->

							<select id="status" name="status" required class="form-control">
									
												<?php
												foreach ($user_status_repair['user_status_repair'] as $key => $status) {
													$name_address = @$status->name_repair;
													$id_address = @$status->id_repair;
													$selected = ($user_status_repair == $id_address) ? 'selected' : '';
													echo '<option value="' . $id_address . '" ' . $selected . '>' . $name_address . '</option>';
												}
												?>
											</select>



						</div>

						<div class="custom margin">
							<label class="setone"><i class="fa fa-car"></i> ระบบจองรถ </label>

							<input type="text" id="cus_name2" name="cus_name2"
								class="form-control rounded-0 custom-placeholder" placeholder="<?= $name_car ?>">

						</div>

						<div class="custom margin">
							<label class="setone"><i class="fa fa-envelope"></i> ระบบจองห้องประชุม </label>

							<input type="text" id="cus_name2" name="cus_name2"
								class="form-control rounded-0 custom-placeholder" placeholder="<?= $id_emeeting ?>">

						</div>

						<div class="custom margin">
							<label class="setone"><i class="fa fa-tel"></i> ระบบเอกสารประชุม </label>

							<input type="text" id="cus_name2" name="cus_name2"
								class="form-control rounded-0 custom-placeholder" placeholder="<?= $name_room ?>">

						</div>

					</div>

					<div class="col-sm-6">

					</div>


					<div class="col-md-12 mt-2">
						<div class="button-container">
							<input class="btn btn-custom"
								style="background-color: #4281ff; color:white; margin-right:15px" type="submit"
								name="btnSave" id="btnSave" value="แก้ไขข้อมูล" onclick="onEdit('<?php echo $id; ?>')">
						</div>
					</div>


				</div>
			</div>

		</section>

	</div>
</div>







<script>

	function onEdit(id) {

		window.location = "<?= base_url(); ?>SuperAdmin/profile_edit/" + id;

	}



</script>

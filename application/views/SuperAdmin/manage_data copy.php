<style>
	/* กำหนดหล่องเป็นเหลี่ยมโค้ง */
	.custom-box {
		background-color: white;
		border-radius: 10px;
		box-shadow: none;
		border-top: solid white;
		/* กำหนดสีขอบด้านบนเป็นสีขาว */
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

	.setone input[readonly]{
		font-size: 16px;


	}


	.customer-info input[readonly] {

        background-color: white; /* Set the desired background color */
        color: #555; /* Set the desired text color */
    }
	

	.custom input[readonly] {
        background-color: white; /* Set the desired background color */
        color: #555; /* Set the desired text color */
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


				<div class="customer-info margin">
						<label class="setone"><i class="fa fa-sign-in"></i> ล็อกอินผู้ใช้ </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" value="<?= $user_login?>"readonly >
					</div>

					<div class="customer-info">
						<label class="setone"><i class="fa fa-user"></i> ชื่อ-นามสกุล </label>
						<input type="text" id="cus_name1" name="cus_name1"
							class="form-control rounded-0 custom-placeholder" value="<?= $user_name?>"readonly >
					</div>

					<div class="customer-info margin">
						<label class="setone"><i class="fa fa-envelope"></i> อีเมล </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" value="<?= $user_email?>" readonly>
					</div>
					
					<div class="customer-info margin">
						<label class="setone"><i class="fa fa-phone"></i> เบอร์โทรศัพท์มือถือ </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" value="<?= $user_tel?>"readonly >
					</div>


					<div class="customer-info margin">
						<label class="setone"><i class="fa fa-calendar"></i> วันที่เปิดใช้งาน </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" value="<?= $activation_date?>"readonly >
					</div>


					<div class="customer-info margin">
						<label class="setone"><i class="fa fa-calendar"></i> ตำแหน่ง </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" value="<?= $role_name?>"readonly >
					</div>



				<div class="custom margin">
						<label class="setone"><i class="fa fa-user"></i> ระบบแจ้งซ่อม </label>
				
						<input type="text" id="cus_name1" name="cus_name1"
							class="form-control rounded-0 custom-placeholder" value="<?= $name_repair?>" readonly>
					</div>

					<div class="custom margin">
						<label class="setone"><i class="fa fa-car"></i> ระบบจองรถ </label>

					
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" value="<?= $name_car?>" readonly>
					</div>

					<div class="custom margin">
						<label class="setone"><i class="fa fa-envelope"></i> ระบบจองห้องประชุม </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" value="<?= $name_emeeting?>" readonly>
					</div>
					
					<div class="custom margin">
						<label class="setone"><i class="fa fa-file"></i> ระบบเอกสารประชุม </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" value="<?= $name_room?>" readonly>
					</div>
					<div class="custom margin">
						<label class="setone"><i class=""></i> สถานะการใข้งานระบบ </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" value="<?= $status_name?>" readonly>
					</div>





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

<strong style="flex: 1; display: inline; font-size: 20px;">แก้ไขข้อมูล </strong>


</section>

		<section class="content">
			<div class="box-body">
				<div class="row">


				<div class="col-sm-8">


				<div class="customer-info margin">
						<label class="setone"><i class="fa fa-sign-in"></i> ล็อกอินผู้ใช้ </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" value="<?= $user_login?>"readonly >
					</div>

					<div class="customer-info">
						<label class="setone"><i class="fa fa-user"></i> ชื่อ-นามสกุล </label>
						<input type="text" id="cus_name1" name="cus_name1"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $user_name?>" >
					</div>

					<div class="customer-info margin">
						<label class="setone"><i class="fa fa-envelope"></i> อีเมล </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $user_email?>" >
					</div>
					
					<div class="customer-info margin">
						<label class="setone"><i class="fa fa-phone"></i> เบอร์โทรศัพท์มือถือ </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $user_tel?>" >
					</div>


					<div class="customer-info margin">
						<label class="setone"><i class="fa fa-calendar"></i> วันที่เปิดใช้งาน </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $activation_date?>" >
					</div>


					<div class="customer-info margin">
						<label class="setone"><i class="fa fa-calendar"></i> ตำแหน่ง </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $role_name?>" >
					</div>



				<div class="custom margin">
						<label class="setone"><i class="fa fa-user"></i> ระบบแจ้งซ่อม </label>
				
						<input type="text" id="cus_name1" name="cus_name1"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $name_repair?>" >
					</div>

					<div class="custom margin">
						<label class="setone"><i class="fa fa-car"></i> ระบบจองรถ </label>

					
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $name_car?>" >
					</div>

					<div class="custom margin">
						<label class="setone"><i class="fa fa-envelope"></i> ระบบจองห้องประชุม </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $name_emeeting?>" >
					</div>
					
					<div class="custom margin">
						<label class="setone"><i class="fa fa-file"></i> ระบบเอกสารประชุม </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $name_room?>" >
					</div>
					<div class="custom margin">
						<label class="setone"><i class=""></i> สถานะการใข้งานระบบ </label>
						<input type="text" id="cus_name2" name="cus_name2"
							class="form-control rounded-0 custom-placeholder" placeholder="<?= $status_name?>" >
					</div>

				</div>
				
				<br>
			
				<div class="col-md-12 mt-2">
						<div class="button-container">
							<input class="btn btn-custom" style="background-color: #4281ff; color:white; margin-right:15px" type="submit" name="btnSave" id="btnSave" value="แก้ไขข้อมูล"
								onclick="onEdit('<?php echo $id; ?>')">
						
								<input type="button" value="ย้อนกลับ" class="btn btn-custom rounded-0" style="margin-right:15px"
								onclick="window.location='<?= base_url(); ?>SuperAdmin/list_user/'">
					
							</div>
					</div>
				</div>
			</div>

		</section>

	</div>
</div>







<script>
	
	function onEdit(id) {

		window.location = "<?= base_url(); ?>SuperAdmin/edit_manage_data/" + id;

	}



</script>





<style>
	/* กำหนดหล่องเป็นเหลี่ยมโค้ง */
	.custom-box {
		background-color: white;
		border-radius: 10px;
		box-shadow: none;
		border-top: solid white;
		/* กำหนดสีขอบด้านบนเป็นสีขาว */
	}



	/* ตั้งค่า i con  */
	.user-icons {
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



	/* Style for the table */
	#example1 {
		border-collapse: collapse;
		width: 100%;
		max-width: 800px;
		/* Set a maximum width for responsiveness */
		margin: 0 auto;
		/* Center the table */
		background-color: white;
		/* Background color for the table */
		border-radius: 10px;
		/* Rounded corners */
		overflow: hidden;
		/* Hide overflowing content */
	}

	#example1 th,
	#example1 td {
		padding: 10px;
		text-align: center;
		border: 1px solid #e6eaf5;
		/* Border for cells */
	}

	/* Header row */
	#example1 thead th {
		background-color: white;
		/* Header background color */
		color: black;
		/* Header text color */
	}

	/* Alternating row colors */
	#example1 tbody tr:nth-child(even) {
		background-color: white;
	}

	/* Hover effect on rows */
	#example1 tbody tr:hover {
		background-color: white;
	}
</style>

<!-- ############################################################################################## -->


<div class="col-sm-9" style="padding-top: 15px;">

	<div class="box custom-box">


		<section class="content-header" style="display: flex; align-items: center;">

			<i class="fa fa-users" style="margin-right: 10px; padding: 8px; border-radius: 50%; color: back"></i>

			<strong style="flex: 1; display: inline;">ข้อมูลตำแหน่ง</strong>


			<div style="display: flex; justify-content: flex-end; flex-grow: 1;">
				<a class="btn btn-custom" style="background-color: #4281ff; color:white; margin-right:15px" href="#"
					role="button" data-toggle="modal" data-target="#popupModal">
					<i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูลตำแหน่ง</a>
			</div>


		</section>

		<section class="content">
			<div class="box-body">
				<div class="row">

					<table id="example1" class="table table-bordered table-striped dataTable" role="grid"
						aria-describedby="example1_info">
						<thead>
							<tr role="row" class="info">
								<th tabindex="0" rowspan="1" colspan="1" style="width: 5%; text-align: center;">
									ลำดับที่
								</th>
								<th tabindex="0" rowspan="1" colspan="1" style="width: 25%; text-align: center;">
									ตำแหน่ง
								</th>
			
								<th tabindex="0" rowspan="1" colspan="1" style="width: 5%; text-align: center;">
									จัดการ
								</th>

							</tr>
						</thead>
						<tbody>
							<?php
$i = 1;
							foreach ($user_role['user_role'] as $value) {
								
								$id = $value->id_role;
								$role_name = $value->role_name;
								

								?>
								<tr role="row">


									<td style="font-size: 12px;  text-align: left;">
										<?= $i ; ?>
									</td>

									<td style="font-size: 12px;  text-align: left;">
										<?= $role_name; ?>
									</td>

									

								


									<style>
										.dropdown-menu {
											position: absolute;
											top: -100%;
											/* ขยับเมนูขึ้นขึ้นข้างบน */
											right: 0;
											display: none;
											/* ซ่อนเมนูเริ่มต้น */
										}

										.dropdown:hover .dropdown-menu {
											display: block;
											/* แสดงเมนูเมื่อโฮเวอร์บนปุ่ม */
										}
									</style>

									<td style="font-size: 14px;">

										<a href="#" class="open-popup" onclick="onData(<?= $id; ?>)">
											<i class="fa fa-edit" style="color: black; font-size: 15px;"></i>
										</a>
										
&nbsp;&nbsp;
										<a href="#" class="open-popup" onclick="onData(<?= $id; ?>)">
											<i class="fa fa-trash" style="color: black; font-size: 15px;"></i>
										</a>

									</td>


								</tr>

								<?php
							$i++;	
							}
							
							
							?>
						</tbody>
					</table>
				</div>
			</div><!-- /.box-body -->

		</section>

	</div>
</div>



<style>
	.system-container {
		border: 2px solid #ccc;
		padding: 10px;
		margin: 10px;
		display: inline-block;
		width: 300px;
		position: relative;
		/* เริ่มการใช้งาน Positioning */
	}

	.system-title {
		font-weight: bold;
		position: absolute;
		/* ทำให้หัวข้อเป็น Absolute Position */
		top: -10px;
		/* ย้ายหัวข้อขึ้นเหนือเส้นขอบ */
		left: 10px;
		/* ชิดซ้ายขอบ */
		background-color: #fff;
		/* ตั้งสีพื้นหลังของหัวข้อ */
		padding: 0 10px;
		/* ระยะห่างขอบหัวข้อ */
	}


	/* จัดการระยะห่าง checkbox สถานะ */
	.checkbox-container {
		display: flex;
		flex-wrap: wrap;
		gap: 10px;
		/* ระยะว่างระหว่างตัวเลือก */
	}

	.checkbox-container label {
		margin-right: 50px;
		/* ระยะว่างขวาของตัวเลือก */
	}
</style>


<div class="col-sm-3" style="padding-top: 15px;">

	<div class="box custom-box">

		<section class="content-header">

			<div>
				<i class="fa fa-users" style="margin-right: 10px; padding: 5px; border-radius: 50%; color: back"></i>

				<strong style="flex: 1; display: inline;">กรองข้อมูล</strong>

			</div>


			<div class="system-container">
				<p class="system-title">แผนก</p>
				<div id="options">
					<button onclick="selectOption('option1')">Option 1</button>
					<button onclick="selectOption('option2')">Option 2</button>
					<button onclick="selectOption('option3')">Option 3</button>
				</div>

			</div>

			<div class="system-container">
				<p class="system-title">นำออก</p>

				<div id="options">
					<button onclick="selectOption('option1')">Excel</button>
					<button onclick="selectOption('option2')">PDF</button>
				</div>

			</div>




		</section>
	</div>
</div>



<script>

	function onData(id) {

		// alert(id);
		window.location = "<?= base_url(); ?>SuperAdmin/manage_data/" + id;
	}


</script>







<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel1"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>

				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>เพิ่มข้อมูลผู้ใช้งาน</strong>
				</p>
			</div>


			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>ชื่อผู้ใช้งาน : </label>
					</div>

					<div class="col-sm-7">
						<input type="text" id="user_login" name="user_login" placeholder="ชื่อผู้ใช้งาน"
							class="form-control rounded-0 custom-placeholder" value="">
					</div>

				</div>
			</div>
			
			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>รหัสผ่าน : </label>
					</div>

					<div class="col-sm-7">
						<input type="password" id="user_password_1" name="user_password_1" placeholder="รหัสผ่าน"
							class="form-control rounded-0 custom-placeholder" value="">
					</div>

				</div>
			</div>

			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>ยืนยันรหัสผ่าน : </label>
					</div>

					<div class="col-sm-7">
						<input type="password" id="user_password_2" name="user_password_2" placeholder="ยืนยันรหัสผ่าน"
							class="form-control rounded-0 custom-placeholder" value="">
					</div>

				</div>
			</div>

			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">
					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>ชื่อ-นามสกุล : </label>
					</div>
					<div class="col-sm-7">
						<input type="text" id="user_name" name="user_name" placeholder="ชื่อ-นามสกุล"
							class="form-control rounded-0 custom-placeholder" oninput="validateName(this);">
						<small id="nameError" class="text-danger"></small>
					</div>
				</div>
			</div>

			<div class="row" style="margin-top:18px;">
				<div class="col-md-12">
					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>เบอร์โทรศัพท์มือถือ : </label>
					</div>
					<div class="col-sm-7">
						<input type="text" id="user_tel" name="user_tel" placeholder="เบอร์โทรศัพท์มือถือ"
							class="form-control rounded-0 custom-placeholder" maxlength="10"
							oninput="validatePhoneNumber(this);">
						<small id="telError" class="text-danger"></small>
					</div>
				</div>
			</div>



			<script>
				function validatePhoneNumber(input) {
					var telError = document.getElementById('telError');
					var inputValue = input.value;

					// ลบทุกอักขระที่ไม่ใช่ตัวเลข
					var numericValue = inputValue.replace(/[^\d]/g, '');

					// ไม่ให้เริ่มต้นด้วย 0
					if (numericValue.length > 0 && numericValue.charAt(0) !== '0') {
						numericValue = '0' + numericValue.substring(1);
					}

					// จำกัดความยาวไม่เกิน 10 ตัว
					numericValue = numericValue.substring(0, 10);

					// นำค่าที่ได้ไปใส่ใน input
					input.value = numericValue;

					// ตรวจสอบความถูกต้องของเบอร์โทร
					if (!/^[0-9]*$/.test(numericValue)) {
						telError.textContent = 'กรุณากรอกเฉพาะตัวเลข';
					} else if (numericValue.length !== 10) {
						telError.textContent = 'กรุณากรอกเบอร์โทรศัพท์มือถือ 10 หลัก';
					} else if (numericValue.charAt(0) !== '0') {
						telError.textContent = 'เบอร์โทรต้องขึ้นต้นด้วยเลข 0';
					} else {
						telError.textContent = '';
					}

					if (numericValue === '') {
						input.value = '';
						telError.textContent = '';
					}

				}

				function validateName(input) {
					var nameError = document.getElementById('nameError');

					if (!/^[a-zA-Zก-๙ ]+$/.test(input.value)) {
						nameError.textContent = 'กรุณากรอกเฉพาะตัวอักษร';
					} else {
						nameError.textContent = '';
					}
				}

				function validateName(input) {
					var nameError = document.getElementById('nameError');
					var inputValue = input.value;

					if (!/^[a-zA-Zก-๙ ]+$/.test(inputValue)) {
						nameError.textContent = 'กรุณากรอกเฉพาะตัวอักษร';
					} else {
						nameError.textContent = '';
					}
					if (inputValue === '') {
						input.value = '';
						nameError.textContent = '';
					}
				}


			</script>




			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>อีเมล : </label>
					</div>

					<div class="col-sm-7">
						<input type="text" id="user_email" name="user_email" placeholder="อีเมล"
							class="form-control rounded-0 custom-placeholder" value="">
					</div>

				</div>
			</div>




			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>ตำแหน่ง : </label>
					</div>

					<div class="col-sm-7">
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




			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>สถานะระบบแจ้งซ่อม : </label>
					</div>

					<div class="col-sm-7">
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

				</div>
			</div>

			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>สถานะระบบจองรถ : </label>
					</div>

					<div class="col-sm-7">
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

				</div>
			</div>

			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>สถานะระบบจองห้องประชุม : </label>
					</div>

					<div class="col-sm-7">
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

			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>สถานะระบบเอกสารการประชุม : </label>
					</div>

					<div class="col-sm-7">
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
			</div>


			<div class="row" style="margin-top:12px;">
				<div class="col-md-12">

					<div class="col-sm-4 control-label">
						<label><strong class="text-danger">*</strong>สถานะการใข้งานระบบ : </label>
					</div>

					<div class="col-sm-7">
						<select id="user_status_info" name="user_status_info" required class="form-control">
							<?php
								$sql_role = "SELECT * FROM user_status_info";
								$result_role = $this->db->query($sql_role)->result();
							echo '<option value="#">--เลือก---</option>';
							foreach ($result_role as $role) {

								$id_role = @$role->	id_status;
								$role_name = @$role->status_name;

								echo '<option value="' . $id_role . '">' . $role_name . '</option>';
							}
							?>
						</select>


					</div>

				</div>
			</div>

			<br>
			<br>


			<div class="form-group">
				<textarea style="display: none;" id="car_id_r" name="car_id_r"
					class="form-control rounded-0"></textarea>
			</div>



			<div class="modal-footer">

				<button type="button" class="btn btn-custom" id="saveChangesButton"
					style="background-color: #4281ff; color:white;" onclick="onAdd()">บันทึกข้อมูล</button>

				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

			</div>
		</div>
	</div>
</div>



<style>
	/* Customize the width, background color, and rounded corners of the modal */
	.modal-content {
		border-radius: 5px;
		/* Add rounded corners */
		background-color: white;
		/* Set your desired background color */
		padding: 20px;
		/* Add some padding for content */
	}

	/* Define custom width for the modal */
	.custom-width {
		max-width: 700px;
		/* Set your desired width here */
		width: 90%;
		/* You can use a percentage value if needed */
	}

	.form-control {

		border-radius: 7px;
	}

	</style>

<script>

function onAdd() {

var user_login = $("#user_login").val();
var user_password_1 = $("#user_password_1").val();
var user_password_2 = $("#user_password_2").val();
var user_name = $("#user_name").val();
var user_email = $("#user_email").val();
var user_tel = $("#user_tel").val();

var user_role = $("#user_role").val();
var user_status_info = $("#user_status_info").val();
var user_status_repair = $("#user_status_repair").val();
var user_status_car = $("#user_status_car").val();
var user_status_room = $("#user_status_room").val();
var user_status_emeeting = $("#user_status_emeeting").val();



			if (user_login == "") {
				alert("กรุณากรอกชื่อผู้ใช้งาน");
				$("#user_login").focus();
				return false;
			}

			if (user_password_1 === '') {
				alert('กรุณากรอกรหัวผ่าน');
				$('#user_password_1').focus();
				return false;
			} else if (user_password_2 === '') {
				alert('กรุณายืนยันรหัวผ่าน');
				$('#user_password_2').focus();
				return false;
			} else if (user_password_2 !== user_password_1) {
    alert('รหัสผ่านไม่ตรงกัน');
    $('#user_password_2').focus();
    return false;
}

			

if (user_name == "") {
	alert("กรุณากรอกชื่อ-นามสกุล");
	$("#user_name").focus();
	return false;
}
else if (user_tel == "") {
	alert("กรุณากรอกเบอร์โทรศัพท์มือถือ");
	$("#user_tel").focus();
	return false;
}
else if (user_email == "") {
	alert("กรุณากรอกอีเมล");
	$("#user_email").focus();
	return false;
}


else if (user_role == "#") {
	alert("กรุณาเลือกตำแหน่งการใข้งารระบบ");
	$("#user_role").focus();
	return false;
}
else if (user_status_repair == "#") {
	alert("กรุณาเลือกสถานะระบบแจ้งซ่อม");
	$("#user_status_repair").focus();
	return false;
}
else if (user_status_car == "#") {
	alert("กรุณาเลือกสถานะระบบจองรถ");
	$("#user_status_car").focus();
	return false;
}
else if (user_status_room == "#") {
	alert("กรุณาเลือกสถานะระบบจองห้องประชุม");
	$("#user_status_room").focus();
	return false;
}
else if (user_status_emeeting == "#") {
	alert("กรุณาเลือกสถานะระบบเอกสารการประชุม");
	$("#user_status_emeeting").focus();
	return false;
}
else if (user_status_info == "#") {
	alert("กรุณาเลือกสถานะการใข้งานระบบ");
	$("#user_status_info").focus();
	return false;
}

alert(user_status_repair);
alert(user_status_car);
alert(user_status_room);
alert(user_status_emeeting);

var formData = new FormData();
formData.append('user_login', user_login);
formData.append('user_password_1', user_password_1);
formData.append('user_password_2', user_password_2);
formData.append('user_name', user_name);
formData.append('user_email', user_email);
formData.append('user_tel', user_tel);
formData.append('user_role', user_role);
formData.append('user_status_info', user_status_info);
formData.append('user_status_repair', user_status_repair);
formData.append('user_status_car', user_status_car);
formData.append('user_status_room', user_status_room);
formData.append('user_status_emeeting', user_status_emeeting);

if (confirm("คุณต้องการบันทึกข้อมูลใช่หรือไม่")) {
	$.ajax({
		url: "<?= base_url(); ?>SuperAdmin/Add_user",
		type: 'POST',
		data: formData,
		contentType: false, // ต้องเป็น false เมื่อใช้ FormData
		processData: false, // ต้องเป็น false เมื่อใช้ FormData
		success: function (data) {
			// alert(data);
			$("#btnSave").attr("disabled", true);
			window.location = "<?= base_url(); ?>SuperAdmin/list_user";
		}
	});
	return false;

}
return false;


}



</script>

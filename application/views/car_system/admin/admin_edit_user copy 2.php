<?php

$sql = "SELECT * FROM user_info WHERE id ='$id_user'";

$row = $this->db->query($sql)->row();

$id_user = $row->id;
$user_login = @$row->user_login;
$user_password = @$row->user_password;
$user_name = @$row->user_name;
$user_email = @$row->user_email;
$user_tel = @$row->user_tel;
$user_status_repair = @$row->user_status_repair;
$user_role = @$row->user_role;

?>

<div class="content-wrapper">
	<section class="content">

		<div class="box custom-box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">

						<style>
							.custom-placeholder::placeholder {
								color: #4a89ff;
								font-weight: bold;
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
								background-color: #878787;

								color: white;

							}

							.form-control {
    border-radius: 10px; /* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
}



			/* style กำหนดกบ่องใส่ข้อมูลสี่เหลี่ยมโค้ง */
			.custom-box {
								background-color: white;
								border-radius: 10px;
								box-shadow: none;
								border-top: solid white;
								/* กำหนดสีขอบด้านบนเป็นสีขาว */
							}
							
							
						</style>

						<form class="form-horizontal">

							<div class="box-body">

								<div class="col-sm-8">

								<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <i class="fa fa-pencil"></i>&nbsp; แก้ไขข้อมูลของ&nbsp;<strong>
	<?= $user_name ?>
	</strong>
</p>


									<div class="form-group" style="margin-top:20px;">
										<div class="col-sm-3 control-label">
											<label></strong>ชื่อผู้ใช้งาน :</label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="user_login" name="user_login"
												class="form-control rounded-0 custom-placeholder"
												placeholder="<?= $user_login ?>" readonly>

										</div>
									</div>



									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>ชื่อ-นามสกุล : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="edit_cus_name" name="edit_cus_name"
												class="form-control rounded-0" oninput="validateName(this);" placeholder="<?= $user_name ?>" value="">
												<small id="nameError" class="text-danger"></small>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>เบอร์โทรศัพท์มือถือ : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="edit_cus_tel" name="edit_cus_tel"
												class="form-control rounded-0" placeholder="<?= $user_tel;?>" maxlength="10" oninput="validatePhoneNumber(this);">
												<small id="telError" class="text-danger"></small>
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
        telError.textContent = 'กรุณากรอกเบอร์โทรศัพท์ 10 หลัก';
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


							

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>อีเมล : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="edit_cus_email" name="edit_cus_email"
												class="form-control rounded-0" placeholder="<?= $user_email;?>" value="">
												<small id="emailError" class="text-danger"></small>
										</div>
									</div>
									
						
<script>
    var emailInput = document.getElementById('edit_cus_email');
    var emailError = document.getElementById('emailError');

    emailInput.addEventListener('input', function () {
        validateEmail();
    });

    emailInput.addEventListener('blur', function () {
        validateEmail();
    });

    function validateEmail() {
        var emailValue = emailInput.value.trim();

        if (emailValue === '') {
            emailError.textContent = '';
        } else if (!isValidEmail(emailValue)) {
            emailError.textContent = 'กรุณากรอกอีเมลที่ถูกต้อง';
        } else {
            emailError.textContent = '';
        }
    }

    function isValidEmail(email) {
        // Use regular expression to check the email format
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return emailPattern.test(email);
    }
</script>

<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>ตำแหน่ง : </label>
										</div>

										<div class="col-sm-7">
											<select id="role" name="role" required class="form-control">
									
												<?php
												foreach ($role_user['role_user'] as $key => $role) {
													$name_address = @$role->role_name;
													$id_address = @$role->id_role;
													$selected = ($user_role == $id_address) ? 'selected' : '';
													echo '<option value="' . $id_address . '" ' . $selected . '>' . $name_address . '</option>';
												}
												?>
											</select>

										</div>
									</div>

									

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>สถานะ : </label>
										</div>

										<div class="col-sm-7">
											<select id="status" name="status" required class="form-control">
									
											<?php
												foreach ($status_user['status_user'] as $key => $status) {
													$name_address = @$status->name_car;
													$id_address = @$status->id_car;
													$selected = ($user_status_car == $id_address) ? 'selected' : '';
													echo '<option value="' . $id_address . '" ' . $selected . '>' . $name_address . '</option>';
												}
												?>
											</select>

										</div>
									</div>

								

									
								</div>
							</div>
						</form>

					</div>

					<div class="col-md-12 mt-2">
						<div class="button-container">
							<input class="btn btn-success" type="submit" name="btnSave" id="btnSave"style="background-color: #4281ff;"
								value="บันทึกข้อมูล" onclick="onSave(<?= $id_user; ?>)">

							&nbsp;&nbsp;

							<input type="button" value="ย้อนกลับ" class="btn btn-custom rounded-0" style="margin-right: 15px;"
								onclick="window.location='<?= base_url(); ?>car_system/admin/admin_list_user'">
						</div>

					</div>

				</div>
			</div>
			<br>

		</div>

</div>
</section>
</div>

<script>
	function onSave(id_user) {
		
		var edit_cus_name = $('#edit_cus_name').val();
		var edit_cus_email = $('#edit_cus_email').val();
		var edit_cus_tel = $('#edit_cus_tel').val();

		var status = $("#status").val();
		var role = $("#role").val();



if(edit_cus_name === '' && edit_cus_email === '' && edit_cus_tel === '' ){
	alert("กรุณากรอกข้อมูลที่ต้องการแก้ไข");
	return false;
}

if(edit_cus_name != ''){
	if (!/^[a-zA-Zก-๙ ]+$/.test(edit_cus_name)) {
				alert("กรุณากรอกเฉพาะตัวอักษรในชื่อ-นามสกุล");
				$("#edit_cus_name").focus();
				return false;
			}
}

if(edit_cus_tel != ''){
	if (edit_cus_tel.length !== 10) {
				alert("กรุณากรอกเบอร์โทรศัพท์มือถือให้ครบ 10 หลัก");
				$("#edit_cus_tel").focus();
				return false;
			}
}

if(edit_cus_email != ''){
	if (!isValidEmail(edit_cus_email)) {
				alert("กรุณากรอกอีเมลที่ถูกต้อง");
				$("#edit_cus_email").focus();
				return false;
			}

}


// alert(role);
		if (confirm('คุณต้องการบันทึกข้อมูลใช่หรือไม่')) {
			var pmeters = 'id_user=' + <?= $id_user ?> + '&edit_cus_name=' + edit_cus_name + '&edit_cus_email='
			 + edit_cus_email + '&edit_cus_tel=' + edit_cus_tel
			 + '&status=' + status
			 + '&role=' + role;
			pmeters = pmeters.replace("undefined", "");

			$.ajax({
				url: "<?= base_url(); ?>car_system/admin/admin_update_user",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>car_system/admin/admin_list_user";
				}
			});
			return false;
		}
	}
</script>

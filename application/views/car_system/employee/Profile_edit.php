<div class="content-wrapper">
	<section class="content">

		<div class="box custom-box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">

						<style>
						
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

						<?php

						$id_user = $query->id;
						$user_login = $query->user_login;
						$user_name = $query->user_name;
						$user_email = $query->user_email;
						$user_tel = $query->user_tel;
					
						?>

						<form class="form-horizontal">

							<div class="box-body">

								<div class="col-sm-8">

								<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
									<i
											class="fa fa-user"></i>
											&nbsp; แก้ไขข้อมูลของ 
											&nbsp;
											<strong>
											<?= $user_name ?>
											</strong> 
									</p>

									<br>
									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>ชื่อผู้ใช้งาน : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0 custom-placeholder"
												value=" <?= $user_login ?>" readonly>

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>ชื่อ-นามสกุล : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="edit_cus_name" name="edit_cus_name"
												class="form-control rounded-0"  oninput="validateName(this);" placeholder="<?= $user_name; ?>">
												<small id="nameError" class="text-danger"></small>
										</div>
									</div>


									<div class="form-group">

										<div class="col-sm-3 control-label">
											<label></strong>เบอร์โทรศัพท์มิอถือ : </label>
										</div>

										<div class="col-sm-6">
											<input type="text" id="edit_cus_tel" name="edit_cus_tel"
												class="form-control rounded-0" placeholder="<?= $user_tel; ?>"  maxlength="10" oninput="validatePhoneNumber(this);">
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

										<div class="col-sm-6">
											<input type="text" id="edit_cus_email" name="edit_cus_email"
												class="form-control rounded-0" placeholder="<?= $user_email; ?>">
												<small id="emailError" class="text-danger"></small>
										</div>
									</div>

									<script>
							document.getElementById('edit_cus_email').addEventListener('blur', function () {
								var emailInput = this.value;
								var emailError = document.getElementById('emailError');

								if (!isValidEmail(emailInput)) {
									emailError.textContent = 'กรุณากรอกอีเมลที่ถูกต้อง';
								} else {
									emailError.textContent = '';
								}
							});

							function isValidEmail(email) {
								// ใช้ regular expression ในการตรวจสอบรูปแบบของอีเมล
								var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
								return emailPattern.test(email);
							}
						</script>

									
								</div>
							</div>

						</form>

					</div>

					<div class="col-md-12 mt-2">
						<div class="button-container">
							<input class="btn btn-custom" type="submit" name="btnSave" id="btnSave" style="background-color: #4281ff; color:white;"
								value="บันทึกข้อมูล" onclick="onSave(<?= $id_user; ?>)">

							&nbsp;
							&nbsp;
							<input type="button" value="ย้อนกลับ" class="btn btn-custom rounded-0" style="margin-right:15px"
								onclick="window.location='<?= base_url(); ?>car_system/employee/profile'">

							<!-- <button onclick="back()" class="btn btn-danger rounded-0">กลับ</button> -->
						</div>
					</div>
				</div>
			</div>
			<br>
		</div><!-- /.box-body -->

</div>
</section>
</div><!-- /.content-wrapper -->

<script>
	function onSave(id_user) {
		var edit_cus_name = $('#edit_cus_name').val();
		var edit_cus_email = $('#edit_cus_email').val();
		var edit_cus_tel = $('#edit_cus_tel').val();

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

		
		if (confirm('คุณต้องการบันทึกข้อมูลใช่หรือไม่')) {
			var pmeters = 'id_user=' + <?= $id_user ?> + '&edit_cus_name=' + edit_cus_name + '&edit_cus_email=' + edit_cus_email + '&edit_cus_tel=' + edit_cus_tel;

			pmeters = pmeters.replace("undefined", "");

			$.ajax({
				url: "<?= base_url(); ?>repair_system/admin/admin_update_user",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>car_system/employee/Profile";
				}
			});
			return false;
		}
	}
</script>

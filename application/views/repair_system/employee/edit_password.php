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

						<form class="form-horizontal">
							<div class="box-body">
								<div class="col-sm-6">

								<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
									<i
											class="fa fa-lock"></i> 
											&nbsp;แก้ไขรหัสผ่าน
											
									</p>

									<br>

									<div class="form-group">
										<div class="col-sm-4 control-label">
											<label></strong>ผู้ใช้ระบบ : </label>
										</div>
										
										<div class="col-sm-7">
											<input type="text" id="user_login" name="user_login"
												class="form-control rounded-0 custom-placeholder"
												placeholder="<?= $_SESSION['user_login']; ?>" readonly>

										</div>
									</div>

					
									<div class="form-group">
    <div class="col-sm-4 control-label">
        <label><strong class="text-danger">*</strong>รหัสผ่านใหม่ : </label>
    </div>
    <div class="col-sm-7">
        <input type="password" id="password_1" name="password_1" class="form-control rounded-0" placeholder="กรอกรหัสผ่านใหม่" oninput="validatePass(this);">
        <small id="passError" class="text-danger"></small>
    </div>
</div>
<script>
function validatePass(input) {
    var password = input.value;
    var passError = document.getElementById("passError");

    // ตรวจสอบว่ารหัสผ่านมีความยาวอย่างน้อย 8 ตัว
    var errors = [];
    if (password.length < 8) {
        errors.push("อย่างน้อย 8 ตัวอักษร");
    }

    // ตรวจสอบว่ารหัสผ่านมีตัวอักษรตัวพิมพ์ใหญ่
    var uppercaseLetter = /[A-Z]/;
    if (!uppercaseLetter.test(password)) {
        errors.push("รหัสผ่านต้องประกอบด้วยตัวอักษรตัวพิมพ์ใหญ่");
    }

    // ตรวจสอบว่ารหัสผ่านมีตัวอักษรตัวพิมพ์เล็ก
    var lowercaseLetter = /[a-z]/;
    if (!lowercaseLetter.test(password)) {
        errors.push("รหัสผ่านต้องประกอบด้วยตัวอักษรตัวพิมพ์เล็ก");
    }

    // ตรวจสอบว่ารหัสผ่านมีตัวเลขอย่างน้อยหนึ่งตัว
    var number = /[0-9]/;
    if (!number.test(password)) {
        errors.push("รหัสผ่านต้องประกอบด้วยตัวเลข");
    }

    // ตรวจสอบว่ารหัสผ่านมีอักขระพิเศษอย่างน้อยหนึ่งตัว
    var specialCharacter = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
    if (!specialCharacter.test(password)) {
        errors.push("รหัสผ่านต้องประกอบด้วยอักขระพิเศษ");
    }

    // แสดงข้อความของผิดพลาดเป็นรายการลงมา
    if (errors.length > 0) {
        passError.innerHTML = "<ul>";
        errors.forEach(function(error) {
            passError.innerHTML += "<li>" + error + "</li>";
        });
        passError.innerHTML += "</ul>";
    } else {
        passError.innerHTML = ""; // ล้างข้อความถ้าไม่มีข้อผิดพลาด
    }
}

</script>






									<div class="form-group">
										<div class="col-sm-4 control-label">
											<label></strong>ยืนยันรหัสผ่าน : </label>
										</div>

										<div class="col-sm-7">
											<input type="password" id="password_2" name="password_2"
												class="form-control rounded-0" placeholder="กรอกเพื่อยืนยันรหัสผ่าน"
												value="">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>

<!-- 
					<input type="password" id="password_1" name="password_1" class="form-control rounded-0" placeholder="กรอกรหัสผ่านใหม่" value="">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword1">
                    <i class="fas fa-eye"></i>
                </button>
            </div> 
		   <input type="password" id="password_2" name="password_2" class="form-control rounded-0" placeholder="กรอกเพื่อยืนยันรหัสผ่าน" value="">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword2">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
			
		-->

					<script>
    // JavaScript to toggle password visibility
    document.getElementById('togglePassword1').addEventListener('click', function () {
        var passwordInput = document.getElementById('password_1');
        togglePasswordVisibility(passwordInput);
    });

    document.getElementById('togglePassword2').addEventListener('click', function () {
        var passwordInput = document.getElementById('password_2');
        togglePasswordVisibility(passwordInput);
    });

    function togglePasswordVisibility(passwordInput) {
        var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    }
</script>

					<div class="col-md-12 mt-2">
						<div class="button-container">
							<input class="btn btn-custom" type="submit" name="btnSave" id="btnSave" style="background-color: #4281ff; color:white; margin-right:15px"
								value="บันทึกข้อมูล" onclick="onSave(<?= $_SESSION['id']; ?>)">
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
	function onSave(id) {
		var password_1 = $('#password_1').val();
		var password_2 = $('#password_2').val();

		var errors = [];
		// ตรวจสอบว่ารหัสผ่านมีตัวอักษรตัวพิมพ์ใหญ่
		var uppercaseLetter = /[A-Z]/;
		if (!uppercaseLetter.test(password_1)) {
			errors.push("รหัสผ่านต้องประกอบด้วยตัวอักษรตัวพิมพ์ใหญ่");
		}

		// ตรวจสอบว่ารหัสผ่านมีตัวอักษรตัวพิมพ์เล็ก
		var lowercaseLetter = /[a-z]/;
		if (!lowercaseLetter.test(password_1)) {
			errors.push("รหัสผ่านต้องประกอบด้วยตัวอักษรตัวพิมพ์เล็ก");
		}
		
		// ตรวจสอบว่ารหัสผ่านมีตัวเลขอย่างน้อยหนึ่งตัว
		var number = /[0-9]/;
		if (!number.test(password_1)) {
			errors.push("รหัสผ่านต้องประกอบด้วยตัวเลข");
		}

		// ตรวจสอบว่ารหัสผ่านมีอักขระพิเศษอย่างน้อยหนึ่งตัว
		var specialCharacter = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
		if (!specialCharacter.test(password_1)) {
			errors.push("รหัสผ่านต้องประกอบด้วยอักขระพิเศษ");
		}

		// ถ้ามีข้อผิดพลาดให้แสดง alert และ focus ที่ input รหัสผ่าน
		if (errors.length > 0) {
			alert(errors.join("\n"));
			$('#password_1').focus();
			return false;
		}

		
		if (confirm('คุณต้องการแก้ไขรหัสผ่านใช่หรือไม่')) {
			if (password_1 === '') {
				alert('กรุณากรอกรหัวผ่านใหม่');
				$('#password_1').focus();
				return false;
			} else if (password_2 === '') {
				alert('กรุณายืนยันรหัวผ่านใหม่');
				$('#password_2').focus();
				return false;
			} else if (password_2 != password_1) {
				alert('รหัสผ่านไม่ตรงกัน');
				$('#password_2').focus();
				return false;

			} else {
				var pmeters = 'id=' + <?= $_SESSION['id'] ?> + '&password_1=' + password_1 + '&password_2=' + password_2;
				pmeters = pmeters.replace("undefined", "");

				// alert(pmeters);

				$.ajax({
					url: "<?= base_url(); ?>repair_system/admin/admin_update_password",
					type: 'POST',
					data: pmeters,
					async: false,
					success: function (data) {
						alert(data);
						$("#btnSave").attr("disabled", true);
						window.location = "<?= base_url(); ?>repair_system/admin";
					}
				});

				return false;
			}
		}
	}
</script>

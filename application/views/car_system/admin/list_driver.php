<div class="content-wrapper">
	<section class="content-header">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-users"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการคนขับรถ</strong>


			<a href="#" class="btn btn-custom open-popup" data-toggle="modal"style="background-color: #4281ff;color:white;"
						data-target="#popupModal_add" role="button" style="margin-left: auto;">
						<i class="fa fa-fw fa-plus-circle"></i>
						เพิ่มรายการ
					</a>

		</p>

		<div class="container-fluid">

			<div class="row">
				<style>
				
					.custom-box {
						background-color: white;
						border-radius: 10px;
						box-shadow: none;
						border-top: solid white;
						/* กำหนดสีขอบด้านบนเป็นสีขาว */
					}

					/* Custom CSS for the lighter green button */
					.btn-light-success {
						background-color: #64de57;
						/* Change this to your desired color */
						color: #fff;
						/* Text color on the button */
						border-color: #64de57;
						/* Border color, you can adjust this if needed */
					}

					.btn-light-success:hover {
						background-color: #46b839;
						/* Change this to the hover color */
						color: #fff;
						border-color: #46b839;
						/* Border color on hover, adjust as needed */

					}
				</style>

				<div class="col-sm-12">
					<?php 
					
					if (!empty($list_driver['list_driver'])) {

					foreach ($list_driver['list_driver'] as $value) {

						$id_driver = $value->id_driver;
						$driver_name = $value->driver_name;
						$driver_tel = $value->driver_tel;
						$driver_history = $value->driver_history;
						$code_token = $value->code_token;
						
						$image_data_driver = base64_encode($value->image_data_driver);
						$image_mime_type_driver = $value->image_mime_type_driver;

						if (!empty($image_data_driver)) {
						$src = 'data:' . $image_mime_type_driver . ';base64,' . $image_data_driver;

						} else {
							$src_s = 'fa fa-user';
						}

						?>
						<div class="col-sm-4">
							<div class="box custom-box">
								<div class="box-body">

								<?php
										if ($src == 'fa fa-car') {
											echo '<div style="text-align: center; height: 100px; width: 160px; border-radius: 20px; margin-top:10px;  padding: 3px;">';
											echo '<i class="' . $src . '" style="font-size: 80px; color: black;"></i>';
											echo '</div>';
										} else {
											echo '<div style="text-align: left; padding-left: 10px;">';
											echo '<img style="height: 100px; width: 160px; border-radius: 20px; margin-top:10px;" src="' . $src . '" alt="รูปภาพ">';
											echo '</div>';
										}
										?>

									<div>
									<br>
										<strong style="margin-left: 20px; margin-top: 10px; font-size: 16px;">ชื่อ-นามสกุล :</strong>
										<span style="font-size: 15px;">
										<?= $driver_name ? $driver_name : '-'; ?>	
	
										</span>
									
										<br>

										<strong style="margin-left: 20px; margin-top: 10px; font-size: 16px;">เบอร์โทรศัพท์มือถือ :</strong>
										
										<span style="font-size: 15px;">
										<?= $driver_tel ? $driver_tel : '-'; ?>	
										</span>
									
										<br>
										<strong style="margin-left: 20px; margin-top: 10px; font-size: 16px;">ข้อมูลอื่นๆ :</strong>
										
										<span style="font-size: 15px;">
										<?= $driver_history ? $driver_history : '-'; ?>	
										</span>
									
									</div>

									<p style="font-size: 20px; display: flex; align-items: center; justify-content: flex-end;">
									<a href="#" class="" data-toggle="modal" data-target="#popupModal_edit"
													data-id_driver="<?= $id_driver; ?>"
													data-driver_name="<?= !empty($driver_name) ? $driver_name : '-'; ?>"
													data-driver_tel="<?= !empty($driver_tel) ? $driver_tel : '-'; ?>"
													data-code_token="<?= empty($code_token) ? '-' : $code_token; ?>"
													data-driver_history="<?= !empty($driver_history) ? $driver_history : '-'; ?>">
													<i class="fa fa-edit" style="color: black; margin-right: 7px;"></i>
												</a>
										
										&nbsp;&nbsp;
										<a class="" href="#" onclick="onDel(<?= $id_driver ?>)">
											<i class="fa fa-trash" style="color: black; margin-right: 7px;"></i>
										</a>
									</p>



								</div>
							</div>
						</div>
						<?php
						}
					} else {
						?>
						<br>
						<div class="col-sm-12">
							<div class="box custom-box">
								<div class="box-body"
									style="text-align: center; background-color: #ffffff; padding: 20px; border-radius: 10px;">
									<i class="fa fa-plus" style="font-size: 80px; color: #4281ff;"></i>
									<p style="font-size: 18px; color: #000;">ไม่มีข้อมูลคนขับรถ</p>
									<p style="font-size: 16px; color: #000;">เพิ่มข้อมูลคนขับรถ</p>
								</div>
							</div>
						</div>
					<?php
					}
					?>

				</div>



	</section><!-- /.content -->
</div><!-- /.content-wrapper -->


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
		max-width: 800px;
		/* Set your desired width here */
		width: 90%;
		/* You can use a percentage value if needed */
	}


	.form-control{
		
		border-radius: 7px;
	}


	#attached_image {

max-width: 100%;
width: 100%; 
border: 1px dashed #ccc;
/* Border style for the box */
padding: 10px;
/* Padding for the box content */
border-radius: 5px;
/* Rounded corners for the box */
box-sizing: border-box;
}
</style>





<div class="modal fade" id="popupModal_add" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel1"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>

				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>เพิ่มรายการข้อมูลคนขับรถ</strong>
				</p>
			</div>

			<div class="modal-body">
				<div class="row">

					<div class="col-md-8">
						<div class="form-group">
							<label for=""><strong class="text-danger">*</strong>ชื่อ-นามสกุล :</label>
							<!-- <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="กรอก ชื่อ-นามสกุล"> -->
							<input type="text" id="driver_name" name="driver_name" placeholder="ชื่อ-นามสกุล"
								class="form-control rounded-0" oninput="validateName(this);">
							<small id="nameError" class="text-danger"></small>
						</div>
						<div class="form-group">
							<label for=""><strong class="text-danger">*</strong>เบอร์โทรศัพท์มือถือ :</label>
							<!-- <input type="text" class="form-control" id="driver_tel" name="driver_tel" placeholder="กรอก เบอร์โทรศัพท์มือถือ"> -->
							<input type="tel" id="driver_tel" name="driver_tel" class="form-control rounded-0"
           placeholder="เบอร์โทรศัพท์มือถือ" maxlength="10" oninput="validatePhoneNumber(this);">
    <small id="telError" class="text-danger"></small>
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
							<label for="">รายละเอียด :</label>
							<input type="text" class="form-control" id="driver_history" name="driver_history" placeholder="รายละเอียด">
						</div>
						
						<div class="form-group">
							<label for=""><strong class="text-danger">*</strong>โค้ด Line Notify  :</label>
							<input type="text" class="form-control" id="Token" name="Token" placeholder="Token">
						</div>
						

						<div class="col-md-4 mb-2">
								<label><strong class="text-danger">*</strong>แนบไฟล์ภาพ</label>
								<input type="file" id="file_upload" class="form-control-file">
							</div>

					</div>

				

			
				</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-custom" id="saveChangesButton" style="background-color: #4281ff;color:white;"
					onclick="onSave_add()">บันทึกข้อมูล</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

			

			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="popupModal_edit" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel1"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>

				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>แก้ไขรายละเอียดข้อมูลคนขับรถ</strong>
				</p>
			</div>

			<div class="modal-body">
				<div class="row">

					<div class="col-md-8">

						<div class="form-group">
							<label for="">ชื่อ-นามสกุล :</label>
							<input type="text" class="form-control" id="driver_name_e" name="driver_name" placeholder="ชื่อ-นามสกุล" 
							oninput="validateNameEdit(this);">
							<small id="nameErrorEdit" class="text-danger"></small>

						</div>
						<div class="form-group">
							<label for="">เบอร์โทรศัพท์มือถือ :</label>
							<input type="tel" class="form-control" id="driver_tel_e" name="driver_tel" placeholder="เบอร์โทรศัพท์มือถือ"
							maxlength="10" oninput="validatePhoneNumberEdit(this);">
    <small id="telErrorEdit" class="text-danger"></small>

						</div>


<script>
    function validatePhoneNumberEdit(input) {
        var telError = document.getElementById('telErrorEdit');
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


function validateNameEdit(input) {
    var nameError = document.getElementById('nameErrorEdit');
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
							<label for="">รายละเอียด :</label>
							<input type="text" class="form-control" id="driver_history_e" name="driver_history"  placeholder="รายละเอียด">
						</div>					

						<div class="form-group">
							<label for="popupCode_token">โค้ด Line Notify :</label>
							<input type="text" class="form-control" id="popupCode_token" name="popupCode_token" readonly>
						</div>
						
						<div class="form-group">
							<label for="">โค้ดแก้ไข Line Notify :</label>
							<input type="text" class="form-control" id="code_token" name="code_token"  placeholder="แก้ไขโค้ด Line Notify">
						</div>
						<div class="col-md-4 mb-2">
								<label>ไฟล์ภาพ</label>
								<input type="file" id="file_upload_e" class="form-control-file">
							</div>

					</div>

					<input type="text" class="form-control" id="id_driver" name="id_driver" style="display: none;"
				readonly>
				
				</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-info" id="saveChangesButton"style="background-color:#4281ff; color:white;"
					onclick="onEdit_driver('id_driver')">บันทึกข้อมูล</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

			</div>
		</div>
	</div>
</div>



<script>

$('#popupModal_edit').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var modal = $(this);

		modal.find('#id_driver').val(button.data('id_driver'));
		// modal.find('#driver_name').val(button.data('driver_name'));
		// modal.find('#driver_tel').val(button.data('driver_tel'));
		// modal.find('#driver_history').val(button.data('driver_history'));


		modal.find('#popupCode_token').val(button.data('code_token'));
		// modal.find('#popupCode_token').val(button.data('code_token'));


		// modal.find('#driver_name').val(button.data('driver_name'));
		// เพิ่มข้อมูลอื่น ๆ ตามที่คุณต้องการแสดงใน Modal
	});






// เพิิ่มข้อมูล
	function onSave_add() {
		var driver_name = $("#driver_name").val();
		var driver_tel = $("#driver_tel").val();
		var driver_history = $("#driver_history").val();
		var Token = $("#Token").val();


		var file_upload = $("#file_upload")[0].files[0];

		if (driver_name == "") {
				alert("กรุณากรอกชื่อ-นามสกุล ");
				$("#driver_name").focus();
				return false;

			}
			else if (!/^[a-zA-Zก-๙ ]+$/.test(driver_name)) {
				alert("กรุณากรอกเฉพาะตัวอักษรในชื่อ-นามสกุล");
				$("#driver_name").focus();
				return false;
			}

			else if (driver_tel == "") {
				alert("กรุณากรอกเบอร์โทรศัพท์มือถือ ");
				$("#driver_tel").focus();
				return false;

			}

			else if (driver_tel.length !== 10) {
				alert("กรุณากรอกเบอร์โทรศัพท์ที่มี 10 ตัว");
				$("#driver_tel").focus();
				return false;
			}

			else if (Token == "") {
				alert("กรุณากรอก Token สำหรับแจ้งเตือนผ่านไลน์");
				$("#Token").focus();
				return false;
			}
	
			if (!file_upload) {
				alert("กรุณาแนบไฟล์ภาพ");
				return false;
				}

			var formData = new FormData();
		formData.append('file_upload', file_upload);

		if (confirm("คุณต้องการบันทึกข้อมูลใช่หรือไม่")) {
				formData.append('driver_name', driver_name);
				formData.append('driver_tel', driver_tel);
				formData.append('driver_history', driver_history);
				formData.append('Token', Token);

				$.ajax({
					url: "<?= base_url(); ?>car_system/Admin/add_driver",
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					async: false,
					success: function (data) {
						$("#btnSave").attr("disabled", true);
						window.location = "<?= base_url(); ?>car_system/Admin/list_driver";
					}
				});
				return false;
			
		}
		return false;
	}



	function onEdit_driver(inputId) {

		var inputValue = $('#' + inputId).val();

		var driver_name = $("#driver_name_e").val();
		var driver_tel = $("#driver_tel_e").val();
		var driver_history = $("#driver_history_e").val();
		var code_token = $("#code_token").val();
	
		var file_upload = $("#file_upload_e")[0].files[0];

		if (
			driver_name === '' &&
			driver_tel === '' &&
			driver_history === '' &&
			code_token === '' &&
			(typeof file_upload === 'undefined' || file_upload === null)
		) {
			alert("กรุณากรอกข้อมูลที่ต้องการแก้ไข");
			return false;
		}

		if(driver_name){
			if (!/^[a-zA-Zก-๙ ]+$/.test(driver_name)) {
				alert("กรุณากรอกเฉพาะตัวอักษรในชื่อ-นามสกุล");
				$("#driver_name").focus();
				return false;
			}
		}

		if(driver_tel){
			if (driver_tel.length !== 10) {
				alert("กรุณากรอกเบอร์โทรศัพท์ที่มี 10 ตัว");
				$("#driver_tel").focus();
				return false;
			}
		}

		var formData = new FormData();
		formData.append('file_upload', file_upload);


		if (confirm("คุณต้องการบันทึกข้อมูลใช่หรือไม่")) {

				formData.append('inputValue', inputValue);
				formData.append('driver_name', driver_name);
				formData.append('driver_tel', driver_tel);
				formData.append('driver_history', driver_history);
				formData.append('code_token', code_token);

				$.ajax({
					url: "<?= base_url(); ?>car_system/Admin/edit_driver",
					type: 'POST',
					data: formData,
					contentType: false, // ต้องเป็น false เมื่อใช้ FormData
    				processData: false, // ต้องเป็น false เมื่อใช้ FormData
					async: false,
					success: function (data) {
						$("#btnSave").attr("disabled", true);
						window.location = "<?= base_url(); ?>car_system/Admin/list_driver";
					}
				});
				return false;
			
		}
		return false;


}


	function onDel(id_driver) {

		alert("⚠️ คำเตือน : หากลบรายการคนขับรถจะส่งผลกระทบต่อรายรถที่มีจองรถโดยคนขับรถคันนี้");

		var formData = new FormData();
		formData.append('id_driver', id_driver);

			$.ajax({
				url: "<?= base_url(); ?>car_system/Admin/check_del_driver",
				type: 'POST',
				data: formData,
				contentType: false,
				processData: false,
				async: false,
				success: function (data) {
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>car_system/Admin/list_driver";
				}
			});
			return false;
	}




</script>




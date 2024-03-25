<div class="content-wrapper">
	<section class="content-header">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-users"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการคนขับรถ</strong>


			<a href="#" class="btn btn-custom open-popup" data-toggle="modal"style="background-color: #4281ff;color:white;
						data-target="#popupModal_add" role="button" style="margin-left: auto;">
						<i class="fa fa-fw fa-plus-circle"></i>
						เพิ่มรายคนขับรถ
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
					<?php foreach ($list_driver['list_driver'] as $value) {

						$id_driver = $value->id_driver;
						$driver_name = $value->driver_name;
						$driver_tel = $value->driver_tel;
						$driver_history = $value->driver_history;
						

						$image_data_driver = base64_encode($value->image_data_driver);
						$image_mime_type_driver = $value->image_mime_type_driver;

						$src = 'data:' . $image_mime_type_driver . ';base64,' . $image_data_driver;

						?>
						<div class="col-sm-4">
							<div class="box custom-box">
								<div class="box-body">

								<?php if (!empty($src)) { ?>
									<img src="<?php echo $src; ?>" class="card-img-top mt-2"
										style="height: 110px; width: 160px; border-radius: 20px; margin-top:10px; margin-left: 20px;">
								<?php } else { ?>
									<p>ไม่มีรูปภาพ</p>
								<?php } ?>


									<div>
										<br>

										<strong style="margin-left: 20px;">ชื่อ-นามสกุล : </strong> <?=$driver_name; ?>
										<span style="font-size: 16px; color: #4281ff;">
											
										</span>
										<br>

										<strong style="margin-left: 20px;">เบอร์โทรศัพท์ :</strong> <?=$driver_tel; ?>

										<br>

										<strong style="margin-left: 20px;">รายละเอียดข้อมูล :</strong> <?=$driver_history; ?>

									
									</div>


									<p style="font-size: 20px; display: flex; align-items: center; justify-content: flex-end;">
									<a href="#" class="" data-toggle="modal" data-target="#popupModal_edit"
													data-id_driver="<?= $id_driver; ?>"
													data-driver_name="<?= $driver_name; ?>"
													data-driver_tel="<?= $driver_tel; ?>"
													data-driver_history="<?= $driver_history; ?>"
													>
													<i class="fa fa-pencil" style="color: black; margin-right: 7px;"></i>
												</a>
										

										&nbsp;&nbsp;
										<a class="" onclick="onDel(<?= $id_driver ?>)">
											<i class="fa fa-trash" style="color: black; margin-right: 7px;"></i>
										</a>
									</p>



								</div>
							</div>
						</div>
					<?php } ?>

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
							<label for="">ชื่อ-นามสกุล :</label>
							<input type="text" class="form-control" id="driver_name" name="driver_name">
						</div>
						<div class="form-group">
							<label for="">เบอร์โทรศัพท์ :</label>
							<input type="text" class="form-control" id="driver_tel" name="driver_tel">
						</div>

						<div class="form-group">
							<label for="">รายละเอีนด :</label>
							<input type="text" class="form-control" id="driver_history" name="driver_history">
						</div>
						

						<div class="col-md-4 mb-2">
								<label>แนบไฟล์ภาพ</label>
								<input type="file" id="file_upload" class="form-control-file">
							</div>

					</div>

				

			
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

				<button type="button" class="btn btn-info" id="saveChangesButton"
					onclick="onSave_add()">บันทึก</button>

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
							<input type="text" class="form-control" id="driver_name_e" name="driver_name">
						</div>
						<div class="form-group">
							<label for="">เบอร์โทรศัพท์ :</label>
							<input type="text" class="form-control" id="driver_tel_e" name="driver_tel">
						</div>

						<div class="form-group">
							<label for="">รายละเอีนด :</label>
							<input type="text" class="form-control" id="driver_history_e" name="driver_history">
						</div>
						

						
						<div class="col-md-4 mb-2">
								<label>แนบไฟล์ภาพ</label>
								<input type="file" id="file_upload_e" class="form-control-file">
							</div>


					</div>

					<input type="text" class="form-control" id="id_driver" name="id_driver" style="display: none;"
				readonly>
				

			
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

				<button type="button" class="btn btn-info" id="saveChangesButton"
					onclick="onEdit_driver('id_driver')">บันทึก</button>

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
		// เพิ่มข้อมูลอื่น ๆ ตามที่คุณต้องการแสดงใน Modal
	});








// เพิิ่มข้อมูล

	function onSave_add() {
		var driver_name = $("#driver_name").val();
		var driver_tel = $("#driver_tel").val();
		var driver_history = $("#driver_history").val();

		var formData = new FormData();
		var file_upload = $("#file_upload")[0].files[0];
		var formData = new FormData();
		formData.append('file_upload', file_upload);

		if (confirm("คุณต้องการบันทึกข้อมูลใช่หรือไม่")) {
			if (driver_name == "") {
				alert("กรอกยี่ห้อรถ");
				$("#driver_name").focus();
				return false;
			} else if (driver_tel == "") {
				alert("กรอกรุ่นรถ");
				$("#driver_tel").focus();
				return false;

			} else if (driver_history == "") {
				alert("กรอกทะเบียนรถ");
				$("#driver_history").focus();
				return false;
			} else {

				formData.append('driver_name', driver_name);
				formData.append('driver_tel', driver_tel);
				formData.append('driver_history', driver_history);


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
		}
		return false;
	}



	function onEdit_driver(inputId) {

		var inputValue = $('#' + inputId).val();

		var driver_name = $("#driver_name_e").val();
		var driver_tel = $("#driver_tel_e").val();
		var driver_history = $("#driver_history_e").val();



		var file_upload = $("#file_upload_e")[0].files[0];

		// สร้าง FormData object เพื่อเก็บไฟล์ภาพ
		var formData = new FormData();
		formData.append('file_upload', file_upload);


		if (confirm("คุณต้องการบันทึกข้อมูลใช่หรือไม่")) {

				formData.append('inputValue', inputValue);
				formData.append('driver_name', driver_name);
				formData.append('driver_tel', driver_tel);
				formData.append('driver_history', driver_history);

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
		// alert(car_type_id);
		if (confirm("คุณต้องการ ลบ ใช่หรือไม่")) {
			window.location = "<?= base_url(); ?>car_system/admin/del_driver/" + id_driver;
		}
	}




</script>




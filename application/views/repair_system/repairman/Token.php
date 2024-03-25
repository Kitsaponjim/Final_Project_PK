<div class="content-wrapper">
	<section class="content-header">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-bell"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รหัสการแจ้งเตือน Line Notify</strong>
		</p>
	</section>


	<?php



	?>


	<section class="content">

		<div class="container-fluid">

			<div class="row">
				<style>
					/* CSS สำหรับเปลี่ยนสีพื้นหลังให้เป็นสีเหลือง */
					.small-box {
						color: white;
					}

					.small-box.bg-new {
						background-color: #4669e8;

					}

					.small-box.bg-doing {
						background-color: orange;

					}

					.small-box.bg-finish {
						background-color: green;

					}

					.small-box.bg-cancel {
						background-color: red;

					}

					/* CSS สำหรับเปลี่ยนรูปแบบมุมของกล่องเป็นสี่เหลี่ยมโค้ง */
					.small-box {
						border-radius: 10px;
						/* ปรับค่าตามต้องการ */
						overflow: hidden;
						/* จัดการขอบเขตของเนื้อหาในกรอบ */
					}

					/* สีพื้นหลังและสีตัวอักษรของกล่อง */
					.small-box.bg-new {
						background-color: #4669e8;
					}


					.repair-icon {
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

					.car-icon {
						width: 50px;
						height: 50px;
						background-color: #f2f2f2;
						color: #78d654;
						border-radius: 5px;
						display: flex;
						align-items: center;
						justify-content: center;
						font-size: 16px;
						font-weight: bold;
					}



					.users-icon {
						width: 50px;
						height: 50px;
						background-color: #f2f2f2;
						color: #ff5757;
						border-radius: 5px;
						display: flex;
						align-items: center;
						justify-content: center;
						font-size: 16px;
						font-weight: bold;
					}

					.wait-icon {
						width: 50px;
						height: 50px;
						background-color: #f2f2f2;
						color: #f7a94a;
						border-radius: 5px;
						display: flex;
						align-items: center;
						justify-content: center;
						font-size: 16px;
						font-weight: bold;
					}

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



				<div class="col-sm-12" style="margin-top:5px;">
					<div class="box custom-box">
						<div class="box-body">

							<style>
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





							<table id="example1" class="table table-striped dataTable" role="grid"
								aria-describedby="example1_info">
								<thead>
									<tr role="row" class="info">
										<th tabindex="0" rowspan="1" colspan="1" style="width: 10%; text-align: center;">
											#</th>
										<!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">Photp</th> -->

										<th tabindex="0" rowspan="1" colspan="1"
											style="width: 29%; text-align: center;">รหัสการแจ้งเตือน Line Notify</th>
						

								
									</tr>
								</thead>
								<tbody>


									<?php

									foreach ($data['data'] as $data) {
										$id_token = $data->id_token;
										$code_token = $data->code_token;

										$image_data = base64_encode($data->image_data);
										$image_mime_type = $data->image_mime_type;
										
										?>

										<tr role="row">
										<td align="center" style="font-size: 12px; text-align: center;">
            <?php if ($image_data): ?>
                <img src="data:<?php echo $image_mime_type; ?>;base64,<?php echo $image_data; ?>" alt="Token Image" style="max-width: 100px; max-height: 100px;">
            <?php else: ?>
                #
            <?php endif; ?>
        </td>

											<td align="" style="font-size: 12px; text-align: left;">
												<?= $code_token; ?>
											</td>


										</tr>

										<?php
									}

									?>

									</tr>


								</tbody>
							</table>

						</div>

					</div>


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

	.form-control {
		border-radius: 7px;
	}
</style>


<!-- add brand car -->


<div class="modal fade" id="popupModal_date" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel2"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close " data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>แก้ไขรหัสการแจ้งเตือน Line Notify</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

					<div class="col-md-6">

						<div class="form-group">
							<label for="popupCode_token">โค้ด Line Notify:</label>
							<input type="text" class="form-control" id="popupCode_token" name="popupCode_token" readonly
								style="">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="">โค้ดแก้ไข Line Notify:</label>
							<input type="text" class="form-control" id="Code_token" name="Code_token">
						</div>

					</div>



					<div class="mt-4 col-md-4 mb-2">
						<label>แนบไฟล์ภาพ</label>
						<input type="file" id="file_upload" class="form-control-file">
					</div>


				</div>
			</div>





			<input type="text" class="form-control" id="popupId_token" name="popupId_token" style="display: none;"
				readonly>






			<div class="modal-footer">
				<button type="button" class="btn btn-custom" id="saveChangesButton"
					style="background-color:#4281ff; color:white;" onclick="onSave('popupId_token')">บันทึก</button>

				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>


			</div>
		</div>


	</div>
</div>






<script>

	$('#popupModal_date').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var modal = $(this);


		modal.find('#popupId_token').val(button.data('id_token'));

		modal.find('#popupCode_token').val(button.data('code_token'));

		modal.find('#popupId_token').val(button.data('id_token'));

		modal.find('#popupCode_token').val(button.data('code_token'));
		// เพิ่มข้อมูลอื่น ๆ ตามที่คุณต้องการแสดงใน Modal
	});



	function onSave(inputId) {
		var inputValue = $('#' + inputId).val();
		var codeToken = $("#Code_token").val();
		var fileUpload = $("#file_upload")[0].files[0];

		var formData = new FormData();
		formData.append('file_upload', fileUpload);

		if (Code_token === '') {
			alert('กรุณากรอกข้อมูลที่ต้องการแก้ไข');
			$('#Code_token').focus();
			return false;
		}
		if (fileUpload === '') {
			alert('กรุณากแนบไฟล์ไลน์กลุ่ม');
			$('#fileUpload').focus();
			return false;
		}

		if (confirm('คุณต้องการแก้ไขข้อมูลใช่หรือไม่')) {
			formData.append('inputValue', inputValue);
        formData.append('Code_token', codeToken);
       $.ajax({
            url: "<?= base_url(); ?>repair_system/repairman/update_Token",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            async: false,
            success: function (data) {
                alert(data);
                $("#btnSave").attr("disabled", true);
                window.location = "<?= base_url(); ?>repair_system/repairman";
            }
        });
        return false;
    }
}


</script>

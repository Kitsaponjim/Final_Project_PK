<div class="content-wrapper">
	<section class="content-header">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-pencil"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการประเภทรถ</strong>

			<a href="#" class="btn btn-custom open-popup" data-toggle="modal"style="background-color: #4281ff;color:white;"
						data-target="#popupModal_add" role="button" style="margin-left: auto;">
						<i class="fa fa-fw fa-plus-circle"></i>
						เพิ่มรายการ
					</a>

			
		</p>



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





							<table id="example1" class="table table-bordered table-striped dataTable" role="grid"
								aria-describedby="example1_info">
								<thead>
									<tr role="row" class="info">
										<th tabindex="0" rowspan="1" colspan="1" style="width: 5%; text-align: center;">
											ลำดับที่</th>
										<!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">Photp</th> -->

										<th tabindex="0" rowspan="1" colspan="1"
											style="width: 29%; text-align: center;">รายการประเภทรถ</th>
										<th tabindex="0" rowspan="1" colspan="1" style="width: 5%; text-align: center;">
											จัดการ</th>
								
										<!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 3%;">ลบ</th> -->
									</tr>
								</thead>
								<tbody>


									<?php
									$i = 1;
									foreach ($list_type_car['list_type_car'] as $data) {
										$car_type_id = $data->car_type_id;
										$type_name = $data->type_name;


										?>

										<tr role="row">
											<td align="center" style="font-size: 12px; text-align: left;">
												<?= $i; ?>
											</td>

											<td align="" style="font-size: 12px; text-align: left;">
												<?= $type_name; ?>
											</td>

								

											<td align="center" style="font-size: 16px;">

											<a href="#" class="" data-toggle="modal" data-target="#popupModal_date"
													data-car_type_id="<?= $car_type_id; ?>" data-type_name="<?= $type_name; ?>">
													<i class="fa fa-edit" style="color: black; margin-right: 7px;"></i>
												</a>


												<a href="#" class="" onclick="onDel(<?= $car_type_id ?>)">
													<i class="fa fa-trash" style="color: black; margin-right: 7px;"></i>

												</a>
										
											</td>






										</tr>

										<?php $i++;
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


	.form-control{
		
		border-radius: 7px;
	}
</style>



<!-- add type car -->


<div class="modal fade" id="popupModal_add" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel2"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>เพิ่มข้อมูลรายการประเภทรถ</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

		
					<div class="col-md-8">
					
						<div class="form-group">
							<label for=""><strong class="text-danger">*</strong>ประเภทรถ:</label>
							<input type="text" class="form-control" id="type_car" name="type_car">
						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-custom" id="saveChangesButton" style="background-color: #4281ff;color:white;"
					onclick="onSave_type()">บันทึกข้อมูล</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

			
			</div>
		</div>


	</div>
</div>



<div class="modal fade" id="popupModal_date" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel2"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>แก้ไขรายละเอียดประเภทรถ</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

					<div class="col-md-6">

						<div class="form-group">
							<label for="popupType_name">ประเภทรถ :</label>
							<input type="text" class="form-control" id="popupType_name" name="popupType_name" readonly>
						</div>


					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="">ข้อมูลที่ต้องการแก้ไข :</label>
							<input type="text" class="form-control" id="type_name" name="type_name" placeholder="ประเภทรถ"> 
						</div>

					</div>
				</div>
			</div>

			<input type="text" class="form-control" id="popupCar_type_id" name="popupCar_type_id" style="display: none;"
				readonly>

			<div class="modal-footer">
			<button type="button" class="btn btn-custom" id="saveChangesButton" style="background-color: #4281ff;color:white;"
					onclick="onSave('popupCar_type_id')">บันทึกข้อมูล</button>
					
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

		
			</div>
		</div>


	</div>
</div>






<script>

$('#popupModal_date').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var modal = $(this);


		modal.find('#popupCar_type_id').val(button.data('car_type_id'));

		modal.find('#popupType_name').val(button.data('type_name'));
		// เพิ่มข้อมูลอื่น ๆ ตามที่คุณต้องการแสดงใน Modal
	});



	function onDel(car_type_id) {
		// alert(car_type_id);
		if (confirm("คุณต้องการ ลบ ใช่หรือไม่")) {
			window.location = "<?= base_url(); ?>car_system/admin/del_type/" + car_type_id;
		}
	}



	function onSave(inputId) {
		var inputValue = $('#' + inputId).val();
		var type_name = $("#type_name").val();

		if (type_name === '') {
			alert('กรุณากรอกข้อมูลที่ต้องการแก้ไข');
			$('#type_name').focus();
			return false;
		}

		if (confirm('คุณต้องการแก้ไขข้อมูลใช่หรือไม่')) {
			var parameters = 'inputValue=' + inputValue + '&type_name=' + type_name;
			
			parameters = parameters.replace("undefined", "");
			$.ajax({
				url: "<?= base_url(); ?>car_system/Admin/admin_update_type",
				type: 'POST',
				data: parameters,
				async: false,
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>car_system/Admin/list_type_car";
				}
			});
			return false;
		}


}


function onSave_type() {

var type_car = $("#type_car").val();

if (type_car === '') {
	alert('กรุณากรอกข้อมูลที่ต้องการเพิ่ม');
	$('#type_car').focus();
	return false;
}

if (confirm('คุณต้องการแก้ไขข้อมูลใช่หรือไม่')) {
	var parameters = 'type_car=' + type_car;

	parameters = parameters.replace("undefined", "");
	$.ajax({
		url: "<?= base_url(); ?>car_system/Admin/add_type_car",
		type: 'POST',
		data: parameters,
		async: false,
		success: function (data) {
			$("#btnSave").attr("disabled", true);
			window.location = "<?= base_url(); ?>car_system/Admin/list_type_car";
		}
	});
	return false;
}


}
	


</script>

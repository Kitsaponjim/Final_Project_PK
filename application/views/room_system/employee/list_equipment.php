<style>
	/* style กำหนดกบ่องใส่ข้อมูลสี่เหลี่ยมโค้ง */
	.custom-box {
		background-color: white;
		border-radius: 10px;
		box-shadow: none;
		border-top: solid white;
		/* กำหนดสีขอบด้านบนเป็นสีขาว */
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

<div class="content-wrapper">

	<section class="content">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-list-alt"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการอุปกรณ์</strong>


			<a href="#" class="btn btn-custom open-popup" data-toggle="modal"
				style="background-color: #4281ff;color:white;" data-target="#popupModal_add" role="button"
				style="margin-left: auto;">
				<i class="fa fa-fw fa-plus-circle"></i>
				เพิ่มรายการ
			</a>


		</p>


		<div class="box custom-box">
			<div class="box-body">
				<div class="row">

				
					<div class="col-sm-12">
						<br>
						<table id="example1" class="table table-bordered table-striped dataTable" role="grid"
							aria-describedby="example1_info">
							<thead>
								<tr role="row" class="info">
									<th tabindex="0" rowspan="1" colspan="1" style="width: 3%; text-align: center;">ลำดับที่
									</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 45%; ">
										รายการอุปกรณ์</th>

									<th tabindex="0" rowspan="1" colspan="1" style="width: 4%; text-align: center;">
										จัดการ</th>

							

								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								foreach ($equipment['equipment'] as $value) {
									$equipment_id = $value->equipment_id;
									$equipment_name = $value->equipment_name;


									?>

									<tr role="row">
										<td align="center" style="font-size: 12px;">
											<?= $i; ?>
										</td>

										<td align="" style="font-size: 12px;">
											<?= $equipment_name ? $equipment_name : '-'; ?>

		
										</td>


										<td align="center" style="font-size: 16px;">
												<a href="#" class=""
													data-toggle="modal"
													data-target="#popupModal_date"
													data-equipment_id="<?= $equipment_id; ?>" 
													data-equipment_name="<?= $equipment_name; ?>">
													<i class="fa fa-edit" style="color: black; margin-right: 7px;"></i>
												</a>
												&nbsp;&nbsp;

												<a href="#" onclick="onDel(<?= $equipment_id ?>)">
												<i class="fa fa-trash"  style="color: black; margin-right: 7px;"></i>
											</a>

											</td>

							
									

									</tr>

									<?php $i++;
								} ?>

							</tbody>
						</table>
					</div>
				</div>
			</div><!-- /.box-body -->
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->



<div class="modal fade" id="popupModal_date" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel2"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close " data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>แก้ไขรายการอุปกรณ์</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

					<div class="col-md-6">

						<div class="form-group">
							<label for=""> อุปกรณ์ :</label>
							<input type="text" class="form-control" id="popupEquipment_name" name="" readonly
								style="">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="">ข้อมูลแก้ไข:</label>
							<input type="text" class="form-control" id="equipment_name_edit" name="equipment_name_edit">
						</div>

					</div>

				</div>
			</div>

			<input type="text" class="form-control" id="equipment_id" name="equipment_id" style="display: none;"
				readonly>

			<div class="modal-footer">
				<button type="button" class="btn btn-custom" id="saveChangesButton"
					style="background-color:#4281ff; color:white;" onclick="onSave_edit('equipment_id')">บันทึกข้อมูล</button>

				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>


			</div>
		</div>


	</div>
</div>





<div class="modal fade" id="popupModal_add" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel2"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>เพิ่มรายการอุปกรณ์</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

					<div class="col-md-12">
						<div class="form-group">
							<label for="equipment_name_add"><strong class="text-danger">*</strong>รายการอุปกรณ์ :</label>
							<input type="text" class="form-control" id="equipment_name_add" name="equipment_name_add"
								placeholder="รายการอุปกรณ์">
						</div>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-custom" id="saveChangesButton"
					style="background-color:#4281ff; color:#ffffff;" onclick="onAdd()">บันทึกข้อมูล</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
			</div>
		</div>
	</div>
</div>

<script>

$('#popupModal_date').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var modal = $(this);


		modal.find('#room_id').val(button.data('room_id'));

		modal.find('#equipment_id').val(button.data('equipment_id'));


		modal.find('#popupEquipment_name').val(button.data('equipment_name'));
		// เพิ่มข้อมูลอื่น ๆ ตามที่คุณต้องการแสดงใน Modal
	});

	function onAdd() {
		var equipment_name = $("#equipment_name_add").val();

		if (equipment_name == "") {
			alert("กรุณากรอกรายการอุปกรณ์ที่ต้องการเพิ่ม");
			$("#equipment_name_add").focus();
			return false;
		}

		var formData = new FormData();

		if (confirm("คุณต้องการเพิ่มรายการอุปกรณ์ใช่หรือไม่")) {

		formData.append('equipment_name', equipment_name);

				$.ajax({
					url: "<?= base_url(); ?>room_system/Admin/add_equipment",
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					async: false,
					success: function (data) {
						// alert(data);
						$("#submit").attr("disabled", true);
						window.location = "<?= base_url(); ?>room_system/Admin/list_equipment";
					}
				});
				return false;
		}

		return false;	

	}

	function onSave_edit(equipment_id) {
		var equipment_id = $('#' + equipment_id).val();
		var equipment_name = $("#equipment_name_edit").val();

		if (equipment_name == "") {
			alert("กรุณากรอกรายการอุปกรณ์ที่ต้องการแก้ไข");
			$("#equipment_name_edit").focus();
			return false;
		}

		var formData = new FormData();

		if (confirm("คุณต้องการเพิ่มรายการอุปกรณ์ใช่หรือไม่")) {

		formData.append('equipment_id', equipment_id);
		formData.append('equipment_name', equipment_name);

				$.ajax({
					url: "<?= base_url(); ?>room_system/Admin/edit_equipment",
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					async: false,
					success: function (data) {
						// alert(data);
						$("#submit").attr("disabled", true);
						window.location = "<?= base_url(); ?>room_system/Admin/list_equipment";
					}
				});
				return false;
		}

		return false;	

	}



	function onDel(equipment_id) {

		if (confirm("คุณต้องการลบข้อมูลใช่หรือไม่")) {
			window.location = "<?= base_url(); ?>room_system/admin/del_equipment/" + equipment_id;
		}
	}


</script>


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

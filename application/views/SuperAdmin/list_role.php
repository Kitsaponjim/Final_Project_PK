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

<div style="display: flex; justify-content: center;">
<div class="col-sm-9" style="padding-top: 15px;">

	<div class="box custom-box">


		<section class="content-header" style="display: flex; align-items: center;">

			<i class="fa fa-users" style="margin-right: 10px; padding: 8px; border-radius: 50%; color: back"></i>

			<strong style="flex: 1; display: inline;">รายการตำแหน่ง</strong>


			<div style="display: flex; justify-content: flex-end; flex-grow: 1;">


			<a href="#" class="btn btn-custom open-popup" data-toggle="modal"style="background-color: #4281ff;color:white;"
						data-target="#popupModal_add" role="button" style="margin-left: auto;">
						<i class="fa fa-fw fa-plus-circle"></i>
						เพิ่มรายการ
					</a>

				<!-- <a class="btn btn-custom" style="background-color: #4281ff; color:white; margin-right:15px" href="#"
					role="button" data-toggle="modal" data-target="#popupModal">
					<i class="fa fa-fw fa-plus-circle"></i> รายการ</a> -->
			</div>


		</section>

		<section class="content">
			<div class="box-body">
				<div class="row">

					<table id="example1" class="table table-bordered table-striped dataTable" role="grid"
						aria-describedby="example1_info">
						<thead>
							<tr role="row" class="info">
								<th tabindex="0" rowspan="1" colspan="1" style="width: 3%; text-align: center;">
								ลำดับ
								</th>
								<th tabindex="0" rowspan="1" colspan="1" style="width: 24%; text-align: center;">
									ตำแหน่ง
								</th>
							

								<th tabindex="0" rowspan="1" colspan="1" style="width: 3%; text-align: center;">
									จัดการ
								</th>

							</tr>
						</thead>
						<tbody>
							<?php

$i = 1;
							foreach ($user_role['user_role'] as $value) {
								$id_role = $value->id_role;
								$role_name = $value->role_name;

								?>
								<tr role="row">


									<td style="font-size: 12px;  text-align: left;">
										<?= $i; ?>
									</td>

									<td style="font-size: 12px;  text-align: left;">
										<?= $role_name; ?>
									</td>

							
									<td style="font-size: 14px;">

									<a href="#" class="" data-toggle="modal" data-target="#popupModal_date"
													data-id_role="<?= $id_role; ?>" 
													data-role_name="<?= $role_name; ?>">
													<i class="fa fa-edit" style="color: black; font-size: 15px;"></i>
												</a>

												<a href="#" class="" onclick="onDel(<?= $id_role ?>)">
													<i class="fa fa-trash" style="color: black; font-size: 15px;margin-left: 10px;"></i>

												</a>
								
									</td>


								</tr>

								<?php
								$i++;
							} ?>
						</tbody>
					</table>
				</div>
			</div><!-- /.box-body -->

		</section>

	</div>
</div>
</div>



<div class="modal fade" id="popupModal_date" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel2"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close " data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>แก้ไขรายละเอียดตำแหน่ง</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

					<div class="col-md-6">

						<div class="form-group">
							<label for="role_name">ตำแหน่ง :</label>
							<input type="text" class="form-control" id="role_name" name="role_name" readonly
								style="">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="">ข้อมูลที่ต้องการแก้ไข :</label>
							<input type="text" class="form-control" id="role_name_edit" name="role_name_edit" placeholder="ตำแหน่ง"
								style="">
						</div>

					</div>
				</div>
			</div>

			<input type="text" class="form-control" id="id_role" name="id_role" style="display: none;"
				readonly>

			<div class="modal-footer">


			<button type="button" class="btn btn-custom" id="saveChangesButton" style="background-color: #4281ff;color:white;"
					onclick="onEdit('id_role')">บันทึกข้อมูล</button>

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
					<strong>เพิ่มข้อมูลรายการตำแหน่ง</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

		
					<div class="col-md-8">
					
						<div class="form-group">
							<label for=""><strong class="text-danger">*</strong>ตำแหน่ง :</label>
							<input type="text" class="form-control" id="role_name_add" name="role_name_add" placeholder="กรอกตำแหน่ง">
						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-custom" id="saveChangesButton" style="background-color: #4281ff;color:white;"
					onclick="onSave_role()">บันทึกข้อมูล</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

			
			</div>
		</div>


	</div>
</div>






<script>


$('#popupModal_date').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var modal = $(this);


		modal.find('#id_role').val(button.data('id_role'));

		modal.find('#role_name').val(button.data('role_name'));
		
	});

	function onEdit(id_role) {

var id_role = $('#' + id_role).val();

var role_name = $("#role_name_edit").val();

if (role_name === '') {
	alert('กรุณากรอกข้อมูลที่ต้องการแก้ไข');
	$('#role_name_edit').focus();
	return false;
}

if (confirm('คุณต้องการแก้ไขข้อมูลใช่หรือไม่')) {
	var parameters = 'id_role=' + id_role + '&role_name=' + role_name;
	parameters = parameters.replace("undefined", "");
	$.ajax({
		url: "<?= base_url(); ?>SuperAdmin/update_role",
		type: 'POST',
		data: parameters,
		async: false,
		success: function (data) {
			// alert(data);
			$("#btnSave").attr("disabled", true);
			window.location = "<?= base_url(); ?>SuperAdmin/list_role";
		}
	});
	return false;
}


}

	
function onSave_role() {

var role_name = $("#role_name_add").val();

if (role_name === '') {
	alert('กรุณากรอกข้อมูลที่ต้องการเพิ่ม');
	$('#role_name_add').focus();
	return false;
}

if (confirm('คุณต้องการแก้ไขข้อมูลใช่หรือไม่')) {
	var parameters = 'role_name=' + role_name;

	parameters = parameters.replace("undefined", "");
	$.ajax({
		url: "<?= base_url(); ?>SuperAdmin/add_role",
		type: 'POST',
		data: parameters,
		async: false,
		success: function (data) {
			$("#btnSave").attr("disabled", true);
			window.location = "<?= base_url(); ?>SuperAdmin/list_role";
		}
	});
	return false;
}


}



function onDel(id_role) {
		// alert(id_type);
		if (confirm("คุณต้องการลบข้อมูลใช่หรือไม่")) {
			window.location = "<?= base_url(); ?>SuperAdmin/del_role/" + id_role;
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
		max-width: 800px;
		/* Set your desired width here */
		width: 90%;
		/* You can use a percentage value if needed */
	}

	.form-control{
		
		border-radius: 7px;
	}
</style>


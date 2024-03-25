<div class="content-wrapper">
	<section class="content-header">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-pencil"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">รายการยี่ห้อรถ</strong>

			<a href="#" class="btn btn-custom open-popup" data-toggle="modal"style="background-color: #4281ff;color:white;"
						data-target="#popupModal_add" role="button" style="margin-left: auto;">
						<i class="fa fa-fw fa-plus-circle"></i>
						เพิ่มรายการ
					</a>
		</p>

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

										<th tabindex="0" rowspan="1" colspan="1"
											style="width: 29%; text-align: center;">รายการยี่ห้อรถ</th>
										<th tabindex="0" rowspan="1" colspan="1" style="width: 5%; text-align: center;">
											จัดการ</th>

									</tr>
								</thead>
								<tbody>


									<?php
									$i = 1;
									foreach ($list_brand_car['list_brand_car'] as $data) {
										$brand_id = $data->brand_id;
										$brand_name = $data->brand_name;


										?>

										<tr role="row">
											<td align="center" style="font-size: 12px; text-align: left;">
												<?= $i; ?>
											</td>

											<td align="" style="font-size: 12px; text-align: left;">
												<?= $brand_name; ?>
											</td>

									

											<td align="center" style="font-size: 16px;">
												<a href="#" class="" data-toggle="modal" data-target="#popupModal_date"
													data-brand_id="<?= $brand_id; ?>" data-brand_name="<?= $brand_name; ?>">
													<i class="fa fa-edit" style="color: black; margin-right: 7px;"></i>
												</a>

												<a href="#" class="" onclick="onDel(<?= $brand_id ?>)">
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


<!-- add brand car -->


<div class="modal fade" id="popupModal_add" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel2"
	aria-hidden="true">
	<div class="modal-dialog custom-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				
				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>เพิ่มข้อมูลรายการยี่ห้อรถ</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

		
					<div class="col-md-8">
					
						<div class="form-group">
							<label for=""><strong class="text-danger">*</strong>ยี่ห้อรถ :</label>
							<input type="text" class="form-control" id="brand_car_add" name="brand_car_add" placeholder="ยี่ห้อรถ">
						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-custom" id="saveChangesButton" style="background-color: #4281ff;color:white;"
					onclick="onSave_brand()">บันทึกข้อมูล</button>
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
				<button type="button" class="close " data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<p class="modal-title" id="popupModalLabel" style="font-size: 20px; color:back;">
					<strong>แก้ไขรายละเอียดยี่ห้อรถ</strong>
				</p>
			</div>
			<div class="modal-body">
				<div class="row">

					<div class="col-md-6">

						<div class="form-group">
							<label for="popupBrand_name">ยี่ห้อรถ :</label>
							<input type="text" class="form-control" id="popupBrand_name" name="popupBrand_name" readonly
								style="">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="">ข้อมูลที่ต้องการแก้ไข :</label>
							<input type="text" class="form-control" id="brand_car" name="brand_car" placeholder="ยี่ห้อรถ"
								style="">
						</div>

					</div>
				</div>
			</div>

			<input type="text" class="form-control" id="popupBrand_id" name="popupBrand_id" style="display: none;"
				readonly>

			<div class="modal-footer">


			<button type="button" class="btn btn-custom" id="saveChangesButton" style="background-color: #4281ff;color:white;"
					onclick="onSave('popupBrand_id')">บันทึกข้อมูล</button>

				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>


			</div>
		</div>


	</div>
</div>






<script>

	$('#popupModal_date').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var modal = $(this);


		modal.find('#popupBrand_name').val(button.data('brand_name'));

		modal.find('#popupBrand_id').val(button.data('brand_id'));
		// เพิ่มข้อมูลอื่น ๆ ตามที่คุณต้องการแสดงใน Modal
	});


	function onDel(brand_id) {
		// alert(id_type);
		if (confirm("คุณต้องการลบข้อมูลใช่หรือไม่")) {
			window.location = "<?= base_url(); ?>car_system/admin/del_brand/" + brand_id;
		}
	}

	
	function onSave_brand() {


		var brand_car_add = $("#brand_car_add").val();

// alert(brand_car_add);
		if (brand_car_add === '') {
			alert('กรุณากรอกข้อมูลที่ต้องการเพิ่ม');
			$('#brand_car_add').focus();
			return false;
		}

		if (confirm('คุณต้องการเพิ่มข้อมูลใช่หรือไม่')) {
			var parameters = 'brand_car_add=' + brand_car_add;

			parameters = parameters.replace("undefined", "");
// alert(parameters);
			$.ajax({
				url: "<?= base_url(); ?>car_system/Admin/add_brand_car",
				type: 'POST',
				data: parameters,
				async: false,
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>car_system/Admin/list_brand_car";
				}
			});
			return false;
		}


}



	function onSave(inputId) {

		var inputValue = $('#' + inputId).val();

		var brand_car = $("#brand_car").val();

		if (brand_car === '') {
			alert('กรุณากรอกข้อมูลที่ต้องการแก้ไข');
			$('#brand_car').focus();
			return false;
		}

		if (confirm('คุณต้องการแก้ไขข้อมูลใช่หรือไม่')) {
			var parameters = 'inputValue=' + inputValue + '&brand_car=' + brand_car;
			parameters = parameters.replace("undefined", "");
			$.ajax({
				url: "<?= base_url(); ?>car_system/Admin/admin_update_brand",
				type: 'POST',
				data: parameters,
				async: false,
				success: function (data) {
					// alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>car_system/Admin/list_brand_car";
				}
			});
			return false;
		}


	}


</script>

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
				<th tabindex="0" rowspan="1" colspan="1" style="width: 8%; text-align: center;">
										รูปภาพ</th>

										<th tabindex="0" rowspan="1" colspan="1" style="width: 14%; text-align: center;">
										ชื่อ-นามสกุล</th>
										<th tabindex="0" rowspan="1" colspan="1" style="width: 14%; text-align: center;">
										เบอร์โทรศัพท์มือถือ</th>
										<th tabindex="0" rowspan="1" colspan="1" style="width: 14%; text-align: center;">
										รายละเอียดข้อมูล</th>
					<th tabindex="0" rowspan="1" colspan="1" style="width: 5%; text-align: center;">
						จัดการ</th>
				</tr>
			</thead>
			<tbody>


			<?php foreach ($list_driver['list_driver'] as $value) {

$id_driver = $value->id_driver;
$driver_name = $value->driver_name;
$driver_tel = $value->driver_tel;
$driver_history = $value->driver_history;


$image_data_driver = base64_encode($value->image_data_driver);
$image_mime_type_driver = $value->image_mime_type_driver;

$src = 'data:' . $image_mime_type_driver . ';base64,' . $image_data_driver;

?>
				

					<tr role="row">
					<td align="center" style="font-size: 12px; text-align: left;">
											<img style="height: 80px; width: 130px; border-radius: 20px; margin-top:10px;"
												src="<?= $src; ?>" alt="รูปภาพ">
										</td>

						<td align="" style="font-size: 12px; text-align: left;">
							<?= $driver_name; ?>
						</td>
						<td align="" style="font-size: 12px; text-align: left;">
							<?= $driver_tel; ?>
						</td>
						<td align="" style="font-size: 12px; text-align: left;">
							<?= $driver_history; ?>
						</td>


						<td align="center" style="font-size: 12px;">
											<a href="#" class="" onclick="onEdit(<?= $id_driver ?>)">
												<i class="fa fa-edit" style="color: black; font-size: 15px;"></i>
											</a>

											<a href="#" class="" onclick="onEdit(<?= $id_driver ?>)">
												<i class="fa fa-trash" style="color: black; font-size: 15px;"></i>
											</a>
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








<script>



</script>




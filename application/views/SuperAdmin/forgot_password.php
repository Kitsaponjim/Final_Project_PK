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

			<strong style="flex: 1; display: inline;">รายการบัญชีผู้ใช้ลืมรหัสผ่าน</strong>

			<div style="display: flex; justify-content: flex-end; flex-grow: 1;">

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
								<th tabindex="0" rowspan="1" colspan="1" style="width: 10%; text-align: center;">
								วันเวลา
								</th>
								<th tabindex="0" rowspan="1" colspan="1" style="width: 15%; text-align: center;">
								ชื่อผู้ใช้งาน	
								</th>
								<th tabindex="0" rowspan="1" colspan="1" style="width: 15%; text-align: center;">
								ชื่อ-นามสกุล	
								</th>
								<th tabindex="0" rowspan="1" colspan="1" style="width: 15%; text-align: center;">
									ข้อมูลติดต่อ
								</th>
								<th tabindex="0" rowspan="1" colspan="1" style="width: 10%; text-align: center;">
									แผนก
								</th>
							

								<th tabindex="0" rowspan="1" colspan="1" style="width: 3%; text-align: center;">
									จัดการ
								</th>

							</tr>
						</thead>
						<tbody>
							<?php

$i = 1;
							foreach ($user_forgotpassword['user_forgotpassword'] as $value) {
								$id_forgot = $value->id_forgot;
								$username = $value->username;
								$fullname = $value->fullname;
								$phone = $value->phone;
								$email = $value->email;
								$department = $value->department;
								$date = $value->date;

								?>
								<tr role="row">


									<td style="font-size: 12px;  text-align: left;">
										<?= $i; ?>
									</td>

									<td style="font-size: 12px;  text-align: left;">
										<?= $date; ?>
									</td>
									<td style="font-size: 12px;  text-align: left;">
										<?= $username; ?>
									</td>
									<td style="font-size: 12px;  text-align: left;">
										<?= $fullname; ?>
									</td>
									<td style="font-size: 12px;  text-align: left;">
									<i class="fa fa-envelope" style="margin-top:10px;"></i>
										
											<?php echo !empty($email) ? $email : '-'; ?>
										
								
											<br>

											<i class="fa fa-phone" style="margin-top:10px;"></i>
								
												<?php echo !empty($phone) ? $phone : '-'; ?>

											

											<br>
									</td>
									<td style="font-size: 12px;  text-align: left;">
										<?= $department; ?>
		
									</td>

							
									<td style="font-size: 14px;">

									<a href="<?= site_url('superAdmin/list_user'); ?>" class="" data-toggle="modal">
													<i class="fa fa-edit" style="color: black; font-size: 15px;"></i>
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



<script>


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


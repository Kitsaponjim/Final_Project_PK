<div class="content-wrapper">

	<section class="content">

		<div class="box custom-box">

			<div class="box-body">

				<div class="row">

					<div class="col-sm-12">

						<strong>
							<i class="fa fa-wrench" class="fa fa-pencil"
								style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>
							ฟอร์มกรอกข้อมูล
						</strong>
						<hr style="border-color: #ababab;">

						<style>
							.custom-placeholder::placeholder {
								color: #0f007d;
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



							.custom-placeholder {
								border-radius: 10px;
								/* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
							}

							.form-control {
								border-radius: 10px;
								/* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
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

						<?php

						$car_id = $data['data']->car_id;

						$car_model = $data['data']->car_model;
						$car_brand = $data['data']->car_brand;

						$car_registration = $data['data']->car_registration;
						$car_type = $data['data']->car_type;
						$car_number_seat = $data['data']->car_number_seat;

						$image_data = base64_encode($data['data']->image_data);
						$image_mime_type = $data['data']->image_mime_type;

						$src = 'data:' . $image_mime_type . ';base64,' . $image_data;

						?>
						<!-- 
						<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px;"><i
								class="fa fa-pencil"></i> ข้อมูลรถ</p> -->


						<!--รายละเอียดรถ  -->

						<div class="box custom-box" style="height: 140px; margin: 10px 0;">

							<div style="display: flex; align-items: center; margin-top: 15px;">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<img src="<?php echo $src; ?>" alt="ระบบจองรถ"
									style="height: 120px; width: 190px; border-radius: 20px;">

								<p style="margin-left: 40px;"><strong style="font-size:15px;"> ข้อมูลรถ :  <?= $car_model; ?> , <?= $car_brand; ?> 

									</strong> <br>
									
									ประเภทรถ : <?= $car_type; ?>  <br> 
									ทะเบียน : <?= $car_registration; ?>  <br> 
									<strong> วันที่ใช้ : <?php echo $date_start; ?> เวลา <?php echo $time_start; ?>  .
									 ถึง <?php echo $date_end; ?> เวลา <?php echo $time_end; ?>  . </strong>
								</p>

								<br>
			
							</div>
						</div>


						<br>



						<form action="" method="post" class="form-horizontal">



							<div class="col-md-4 mb-2">
								<label><strong class="text-danger"></strong>วันที่จอง </label>

								<input type="datetime-local" id="time_add" class="form-control rounded-0 d-inline-block"
									placeholder="วันที่จอง" value="<?= date('Y-m-d\TH:i'); ?>"
									min="<?= date('Y-m-d\TH:i'); ?> " readonly>
							</div>


							<br>
							<br>
							<br>
							<br>

							<div class="col-md-4 mb-2">

								<label><strong class="text-danger">*</strong>ความต้องการใช้รถ : </label>

								<input type="text" id="car_title" name="car_title" class="form-control rounded-0"
									placeholder="กรอกความต้องการใช้รถ">

							</div>

							<div class=" col-md-4 mb-2">

								<label><strong class="text-danger">*</strong>วัตถุประสงค์การใช้รถ</label>
								<input type="text" id="reserve_detiel" name="reserve_detiel"
									class="form-control rounded-0" placeholder="กรอกวัตถุประสงค์การใช้รถ">
							</div>



							<br>
							<br>
							<br>
							<br>



							<div class="col-md-4 mb-2">
								<label><strong class="text-danger">*</strong>สถานที่ไป </label>

								<input type="text" id="detiel_address" name="detiel_address" class="form-control rounded-0"
									placeholder="กรอกสถานที่ไป">


							</div>


							<!-- <div class="col-md-4 mb-2">

								<label><strong class="text-danger">*</strong>จำนวนที่นั่ง </label>

								<input type="text" id="" class="form-control rounded-0"
									placeholder="กรอกจำนวนที่นั่ง">

							</div> -->


							<br>
							<br>
							<br>
							<br>

							<div class="col-md-4 mb-2">

								<label><strong class="text-danger">*</strong>จำนวนผู้โดยสาร : </label>

								<input type="text" id="car_number_seat" name="car_number_seat" class="form-control rounded-0"
									placeholder="กรอกจำนวนผู้โดยสาร">

							</div>


							<br>
							<br>
							<br>
							<br>


							<div class=" col-md-4 mb-2">

								<label><strong class="text-danger">*</strong>รายชื่อผู้โดยสาร</label>
								<textarea id="name_passengers" class="form-control rounded-0"></textarea>
							</div>



							<br>
							<br>
							<br>
							<br>

							<div class="col-md-4 mb-2">
								<label><strong class="text-danger">*</strong>ชื่อผู้จอง </label>

								<input type="text" id="name_reserve" name="name_reserve" class="form-control rounded-0"
									placeholder="กรอกชื่อผู้จอง">


							</div>


							<div class="col-md-4 mb-2">

								<label><strong class="text-danger">*</strong>เบอร์โทรศัพท์มือถือ </label>

								<input type="text" id="tel_reserve" class="form-control rounded-0"
									placeholder="กรอกเบอร์โทรศัพท์มือถือ">

							</div>



							<br>
							<br>
							<br>
							<br>


							<div class=" col-md-4 mb-2">

								<label><strong class="text-danger"></strong>เพิ่มเติม</label>
								<textarea id="approve_deteil" class="form-control rounded-0"></textarea>
							</div>


							<!-- <div class="col-md-10 mb-4">
								<label><strong class="text-danger">*</strong>ปัญหา/งานซ่อม</label>
								<textarea id="cus_details" class="form-control rounded-0"></textarea>
							</div>

								<br>
								<br>
								<br>
								<br>
								<br>

								<div class="col-md-4 mb-2">
									<label><strong class="text-danger">*</strong>อาคาร </label>

									<input type="text" id="repair_type" class="form-control rounded-0" placeholder="อาคาร">

								</div>

								<div class="col-md-4 mb-2">

									<label><strong class="text-danger">*</strong>ห้อง </label>

									<input type="text" id="repair_equipment" class="form-control rounded-0"
										placeholder="ห้อง">

								</div>


								<div class="col-md-4 mb-2">
									<label>แนบไฟล์ภาพ</label>
									<input type="file" id="file_upload" class="form-control-file">
								</div> -->


					</div>

				</div>

				<br>

				<div class="col-md-12 mt-2">

					<div class="button-container">

						<input type="button" value="กลับ" class="btn btn-danger rounded-0"
							onclick="window.location='<?= base_url(); ?>car_system/reserve/list_car'">


						&nbsp;
						&nbsp;

						<input class="btn btn-success" type="submit" name="submit" id="submit" value="จอง"
							onclick="onSave(<?= $car_id; ?>)">
					</div>
				</div>

				<br>
				<br>


				</form>

			</div><!-- /.box-body -->

		</div>



	</section><!-- /.content -->
</div><!-- /.content-wrapper -->



<script>

	function onSave(car_id) {

		var time_add = $("#time_add").val();
		var car_title = $("#car_title").val();

		
		var reserve_detiel = $("#reserve_detiel").val();
		var detiel_address = $("#detiel_address").val();
		var car_number_seat = $("#car_number_seat").val();
		var name_passengers = $("#name_passengers").val();

		var name_reserve = $("#name_reserve").val();
		var tel_reserve = $("#tel_reserve").val();
		var approve_deteil = $("#approve_deteil").val();


		var formData = new FormData();

		if (confirm("คุณต้องการจองรถฝช่หรือไม่")) {
			if (car_title == "") {
				alert("car_title");
				$("#car_title").focus();
				return false;
			} else if (reserve_detiel == "") {
				alert("reserve_detiel");
				$("#reserve_detiel").focus();
				return false;

			} else if (detiel_address == "") {
				alert("detiel_address");
				$("#detiel_address").focus();
				return false;
			} else {
			
				formData.append('car_id', car_id);
				
				formData.append('time_add', time_add);
				formData.append('car_title', car_title);
				formData.append('reserve_detiel', reserve_detiel);
				formData.append('detiel_address', detiel_address);
				formData.append('car_number_seat', car_number_seat);
				formData.append('name_passengers', name_passengers);
				formData.append('name_reserve', name_reserve);
				formData.append('tel_reserve', tel_reserve);
				formData.append('approve_deteil', approve_deteil);

				$.ajax({

					url: "<?= base_url(); ?>car_system/reserve/reserve_car_add",
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					async: false,
					success: function (data) {
						alert(data);
						$("#submit").attr("disabled", true);
						window.location = "<?= base_url(); ?>car_system/admin";
					}
				});
				return false;
			}
		}
		return false;
	}



</script>

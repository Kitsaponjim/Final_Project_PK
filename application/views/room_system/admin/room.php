<div class="content-wrapper">


	<section class="content">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-pencil"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">จองห้องประชุม</strong>
		</p>

		<style>
			.custom-box {
				background-color: white;
				border-radius: 10px;
				box-shadow: none;
				border-top: solid white;
				/* กำหนดสีขอบด้านบนเป็นสีขาว */
			}


			.form-control {
				border-radius: 10px;
				/* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
			}

			.form-control {
				border-radius: 10px;
				/* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
			}
		</style>


<?php

						$user_id = $_SESSION['id'];

						?>



		<div class="box custom-box">

			<div class="box-body">

				<div class="row">

					<div class="col-sm-12">


						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>วันที่ขอใช้ </label>
							<input type="date" id="date_time" name="date_time" class="form-control rounded-0"
								placeholder="">
						</div>

						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>เวลา</label>
							<input type="time" id="start_time" name="start_time" class="form-control rounded-0"
								oninput="setMinutesToZero(this)">
						</div>

						<script>
							function setMinutesToZero(input) {
								// ตั้งค่านาทีให้เป็น .00
								if (input.value.length === 5) {
									input.value = input.value.slice(0, -2) + '00';
								}
							}
						</script>



						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>ถึงเวลา</label>
							<input type="time" id="end_time" name="end_time" class="form-control rounded-0"
								oninput="setMinutesToZero(this)">
						</div>

						
					
						

						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>ห้องประชุม </label>

							<select id="room_id" name="room_id" required class="form-control">
								<?php
								echo '<option value="#">--เลือก--</option>';
								foreach ($room['room'] as $key => $value) {
									$room_name = @$value->room_name;
									$room_id = @$value->room_id;
									echo '<option value="' . $room_id . '">' . $room_name . '</option>';
								}
								?>
							</select>

						</div>


						<input type="submit" value="ค้นหา"> 
												<!-- ค้นหาวันเวลาที่จะจองว่าว่างหรือป่าว -->
												<br>
												<br>
												<br>


						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>จำนวนคน </label>
							<input type="number" id="number_people" name="number_people" class="form-control rounded-0"
								placeholder="">
						</div>


						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>หัวข้อการประชุม </label>
							<input type="text" id="meeting_topic" name="meeting_topic" class="form-control rounded-0"
								placeholder="">
						</div>


						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>ชื่อผู้ขอใช้ </label>
							<input type="text" id="name_requester" name="name_requester" class="form-control rounded-0"
								placeholder="">
						</div>
						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>เบอร์โทรศัพท์ </label>
							<input type="number" id="tel_requester" name="tel_requester" class="form-control rounded-0"
								placeholder="">
						</div>

					</div>

				</div>


				<div class="col-md-12 mt-2">
					<div class="button-container">
						<input class="btn btn-success" type="submit" name="submit" id="submit" value="บันทึกข้อมูล"
							onclick="onSave(<?= $user_id; ?>)" style="background-color: #4281ff;">
					</div>
				</div>

			</div><!-- /.box-body -->

		</div>


	</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>

	function onSave(user_id) {

		var date_time = $('#date_time').val();
		var start_time = $('#start_time').val();
		var end_time = $('#end_time').val();
		var room_id = $('#room_id').val();
		var number_people = $('#number_people').val();
		var meeting_topic = $('#meeting_topic').val();
		var name_requester = $('#name_requester').val();
		var tel_requester = $('#tel_requester').val();

		var formData = new FormData();

		if(confirm("คุณต้องการจองห้องประชุมใช่หรือไม่")){
			if(date_time == "") {
				alert("โปรดเลือกวันที่จองห้องประชุม");
				$("#date_time").focus();
				return false;
			}else if (start_time == "") {
				alert("");
				$("#start_time").focus();
				return false;
			}
			else if (end_time === "") {
				alert("");
				$("#end_time").focus();
				return false;
			}
			else if (room_id === "") {
				alert("");
				$("#room_id").focus();
				return false;
			}
			else if (number_people === "") {
				alert("");
				$("#number_people").focus();
				return false;
			}
			else if (meeting_topic === "") {
				alert("");
				$("#meeting_topic").focus();
				return false;
			}
			else if (name_requester === "") {
				alert("");
				$("#name_requester").focus();
				return false;
			}
			else if (tel_requester === "") {
				alert("");
				$("#tel_requester").focus();
				return false;
			}
			else{

				formData.append('date_time', date_time);
				formData.append('start_time', start_time);
				formData.append('end_time', end_time);
				formData.append('room_id', room_id);
				formData.append('number_people', number_people);
				formData.append('meeting_topic', meeting_topic);
				formData.append('name_requester', name_requester);
				formData.append('tel_requester', tel_requester);
				formData.append('user_id', user_id);
				
				$.ajax({
					url: "<?= base_url(); ?>room_system/admin/Reserve_room",
					type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                async: false,
                success: function (data) {
					alert(data);
                    $("#submit").attr("disabled", true);
						window.location = "<?= base_url(); ?>room_system/admin/list_room";
					}
				});
				return false;
				

			}


		}




	}





</script>

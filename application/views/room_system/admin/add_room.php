<div class="content-wrapper">

	<section class="content">
		<p
			style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-pencil"
				style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">เพิ่มรายการห้องประชุม</strong>
		</p>


		<style>
			/* style กำหนดกบ่องใส่ข้อมูลสี่เหลี่ยมโค้ง */
			.custom-box {
				background-color: white;
				border-radius: 10px;
				box-shadow: none;
				border-top: solid white;
				/* กำหนดสีขอบด้านบนเป็นสีขาว */
			}

			#attached_image {

				max-width: 100%;
				width: 100%; 
				border: 1px dashed #ccc;
				/* Border style for the box */
				padding: 10px;
				/* Padding for the box content */
				border-radius: 5px;
				/* Rounded corners for the box */
				box-sizing: border-box;
			}



			.custom-placeholder {
				border-radius: 10px;
				/* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
			}

			.form-control {
				border-radius: 10px;
				/* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
			}
		</style>

		<div class="box custom-box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">

						<!-- Display attached image next to the file input -->
						<div class="mt-4 col-md-4 mb-2">
							<img id="attached_image" src="#" alt="ไฟล์ภาพ">
						</div>


						<div class="mt-4 col-md-4 mb-2">
							<label>แนบรูป </label>
							<input type="file" id="file_upload" name="file_upload"
								class="form-control rounded-0 custom-placeholder">
						</div>


					</div>

					<div class="col-sm-12" style="margin-top:50px;">


						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>ชื่อห้อง </label>
							<input type="text" id="room_name" name="room_name"
								class="form-control rounded-0 custom-placeholder" value="ชื่อห้อง">
						</div>

						<!-- Add more fields for meeting room information -->
						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>จำนวนที่นั่ง </label>
							<input type="number" id="room_seating" name="room_seating"
								class="form-control rounded-0 custom-placeholder" placeholder="จำนวนที่นั่ง" required>
						</div>

						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>สถานที่ </label>
							<input type="text" id="room_address" name="room_address"
								class="form-control rounded-0 custom-placeholder" placeholder="สถานที่" required>
						</div>


						<!-- <div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>อุปกรณ์ </label>

							<select id="equipment" name="equipment" required class="form-control">
							<?php 
								echo '<option value="#">--เลือก---</option>';
							foreach ($equipment['equipment'] as $key => $value) {
								$equipment_id = $value->equipment_id;
								$equipment_name = $value->equipment_name;
								echo '<option value="' . $equipment_id . '">' . $equipment_name . '</option>';
							}
						
							?>
							</select>

							</div> -->

						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>อุปกรณ์ </label>
							<input type="text" id="equipment" name="equipment"
								class="form-control rounded-0 custom-placeholder" placeholder="อุปกรณ์" required>
						</div>

						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>ผู้ดูแลห้อง </label>
							<input type="text" id="room_attendant" name="room_attendant"
								class="form-control rounded-0 custom-placeholder" placeholder="ผู้ดูแลห้อง" required>
						</div>

						<div class="mt-4 col-md-4 mb-2">
							<label><strong class="text-danger">*</strong>หมายเหตุ </label>
							<input type="text" id="room_note" name="room_note"
								class="form-control rounded-0 custom-placeholder" placeholder="หมายเหตุ" required>
						</div>


					</div>






				</div>

				<div class="col-md-12 mt-2">
    <div class="button-container">
        <input class="btn btn-success" type="submit" name="submit" id="submit" value="บันทึกข้อมูล" onclick="onAdd()"
            style="background-color: #4281ff;">
    </div>
</div>


			

			</div><!-- /.box-body -->
		</div>


	</section><!-- /.content -->

</div><!-- /.content-wrapper -->




<script>
	function displayAttachedImage() {
		var input = document.getElementById('file_upload');
		var image = document.getElementById('attached_image');

		input.addEventListener('change', function () {
			var file = input.files[0];

			if (file) {
				var reader = new FileReader();
				reader.onload = function (e) {
					image.src = e.target.result;
				};
				reader.readAsDataURL(file);
			} else {
				// Set a placeholder image or display a message
				image.src = 'path_to_placeholder_image.jpg'; // Replace with the path to your placeholder image
				// Alternatively, you can display a message inside the box
				// image.src = '';
				// image.alt = 'ไฟล์รูป';
			}
		});
	}

	// Call the function when the document is ready
	document.addEventListener('DOMContentLoaded', function () {
		displayAttachedImage();
	});



	function onAdd() {

		var room_name = $("#room_name").val();
		var room_seating = $('#room_seating').val();
		var room_address = $('#room_address').val();
		var equipment = $('#equipment').val();
		var room_attendant = $('#room_attendant').val();
		var room_note = $('#room_note').val();

		var file_upload = $("#file_upload")[0].files[0];
		var formData = new FormData();
		formData.append('file_upload', file_upload);


		if (confirm("คุณต้องการแจ้งซ่อมใช่หรือไม่")) {

			if (room_name == "") {
				alert("กรอชื่อห้อง");
				$('#room_name');
				return false;
			}
			else if (room_seating == "") {
				alert("กรอก");
				$('#room_seating');
				return false;
			}
			else if (room_address == "") {
				alert("กรอก");
				$('#room_address');
				return false;
			}
			else if (equipment == "") {
				alert("กรอก");
				$('#equipment');
				return false;
			}
			else if (room_attendant == "") {
				alert("กรอก");
				$('#room_attendant');
				return false;
			}
			else if (!file_upload) {
            alert("กรุณาแนบไฟล์ภาพ");
            return false;
        }
		

			else {
				formData.append('room_name', room_name);
				formData.append('room_seating', room_seating);
				formData.append('room_address', room_address);
				formData.append('equipment', equipment);
				formData.append('room_attendant', room_attendant);
				formData.append('room_note', room_note);

				$.ajax({
					url: "<?= base_url(); ?>room_system/Admin/admin_addRoom",
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					async: false,
					success: function (data) {
						alert(data);
						$("#submit").attr("disabled", true);
						window.location = "<?= base_url(); ?>room_system/Admin/list_room";
					}
				});
				return false;



			}
		}

		return false;


	}
</script>

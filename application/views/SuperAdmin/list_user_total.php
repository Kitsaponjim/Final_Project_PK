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

<?php

// echo "<pre>";
// print_r($list_status['list_status']);

// echo "</pre>";


?>



<div class="col-sm-9" style="padding-top: 15px;">

	<div class="box custom-box">


		<section class="content-header" style="display: flex; align-items: center;">

			<i class="fa fa-users" style="margin-right: 10px; padding: 8px; border-radius: 50%; color: back"></i>

			<strong style="flex: 1; display: inline;">ข้อมูลผู้ใช้ </strong>

			<div style="display: flex; justify-content: flex-end; flex-grow: 1;">
				<a class="btn btn-success" href="#" role="button" data-toggle="modal" data-target="#popupModal"><i class="fa fa-fw fa-plus-circle"></i> เพิ่ม</a>
			</div>


		</section>



		<!-- ตารางแสดงรายการสมาชิก -->
		<section class="content">
			<div class="box-body">
				<div class="row">

					<table id="example1" class="table table-bordered table-striped dataTable" role="grid"
						aria-describedby="example1_info">
						<thead>
							<tr role="row" class="info">
								<th tabindex="0" rowspan="1" colspan="1" style="width: 15%; text-align: center;">
									ชื่อนาม-นามสกุล
								</th>
								<th tabindex="0" rowspan="1" colspan="1" style="width: 12%; text-align: center;">
									ข้อมูลติดต่อ</th>
								<th tabindex="0" rowspan="1" colspan="1" style="width: 8%; text-align: center;">
									แผนก</th>

								<th tabindex="0" rowspan="1" colspan="1" style="width: 8%; text-align: center;">
									สถานะ</th>
								<th tabindex="0" rowspan="1" colspan="1" style="width: 8%; text-align: center;">
									สถานะ</th>


								<th tabindex="0" rowspan="1" colspan="1" style="width: 3%; text-align: center;">
								</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							foreach ($query['query'] as $value) {
								$id = $value->id;
								$user_login = $value->user_login;
								$user_name = $value->user_name;

								$user_email = $value->user_email;
								$user_tel = $value->user_tel;
								$user_status_repair = $value->user_status_repair;
								$n_status = $value->n_status;

								?>

								<tr role="row">
									<td style="font-size: 12px;  text-align: left;">
										<?= $user_name; ?>
									</td>

									<td style="font-size: 12px; text-align: left;">
										อีเมล :
										<span style="font-weight: bold;">
											<?= $user_email; ?>
										</span>
										<br>

										เบอร์โทรศัพท์ :
										<span style="font-weight: bold; color: #4fa4ff;">
											<?= $user_tel; ?>
										</span>

										<br>
									</td>

									<td style="font-size: 12px;">
										<?= $user_name; ?>
									</td>



									<td style="font-size: 12px;">
										<?= $n_status; ?>
									</td>

									<td style="font-size: 12px;">
										'ใช้งานอยู่ , ไม่ใช้ , ลาออก'
									</td>

									<style>
										.dropdown-menu {
											position: absolute;
											top: -100%;
											/* ขยับเมนูขึ้นขึ้นข้างบน */
											right: 0;
											display: none;
											/* ซ่อนเมนูเริ่มต้น */
										}

										.dropdown:hover .dropdown-menu {
											display: block;
											/* แสดงเมนูเมื่อโฮเวอร์บนปุ่ม */
										}
									</style>

									<td style="font-size: 14px;">

										<div class="dropdown">
											<ul class="dropdown-menu dropdown-menu-right"
												aria-labelledby="dropdownMenuButton">


												<li>
													<a class="dropdown-item" href=""><i class="fa fa-user"></i> โปรไฟล์</a>
												</li>
												<li>
													<a class="dropdown-item" href=""
														onclick="return confirm('คุณต้องการออกจากระบบหรือไม่!!!');"><i
															class="fa fa-sign-out"></i> ออกจากระบบ</a>
												</li>
											</ul>


											<a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
												aria-haspopup="true" aria-expanded="false">

												<strong><i class="fa fa-ellipsis-v" style="color:black;"></i></strong>

											</a>

										</div>

									</td>


								</tr>

								<?php $i++;
							} ?>
						</tbody>
					</table>
				</div>
			</div><!-- /.box-body -->

		</section>

	</div>
</div>





<style>
	.system-container {
		border: 2px solid #ccc;
		padding: 10px;
		margin: 10px;
		display: inline-block;
		width: 300px;
		position: relative;
		/* เริ่มการใช้งาน Positioning */
	}

	.system-title {
		font-weight: bold;
		position: absolute;
		/* ทำให้หัวข้อเป็น Absolute Position */
		top: -10px;
		/* ย้ายหัวข้อขึ้นเหนือเส้นขอบ */
		left: 10px;
		/* ชิดซ้ายขอบ */
		background-color: #fff;
		/* ตั้งสีพื้นหลังของหัวข้อ */
		padding: 0 10px;
		/* ระยะห่างขอบหัวข้อ */
	}


	/* จัดการระยะห่าง checkbox สถานะ */
	.checkbox-container {
		display: flex;
		flex-wrap: wrap;
		gap: 10px;
		/* ระยะว่างระหว่างตัวเลือก */
	}

	.checkbox-container label {
		margin-right: 50px;
		/* ระยะว่างขวาของตัวเลือก */
	}
</style>


<div class="col-sm-3" style="padding-top: 15px;">

	<div class="box custom-box">

		<section class="content-header">

			<div>
				<i class="fa fa-users" style="margin-right: 10px; padding: 5px; border-radius: 50%; color: back"></i>

				<strong style="flex: 1; display: inline;">กรองข้อมูล</strong>

			</div>

			<br>
			<form method="GET" action="<?= base_url(); ?>superAdmin/page_list_user">
				<p>เลือกระบบ</p>
				<select id="system_type" name="system_type" required class="form-control">
					<?php
					echo '<option value="#">--เลือก---</option>';
					foreach ($list_system['list_system'] as $key => $value) {
						$name_system = @$value->name_system;
						$id_system = @$value->id_system;
						$selected = ($id_system == $_GET['system_type']) ? 'selected' : ''; // เช็คค่าที่เลือกกับค่าที่ส่งมาใน URL
						echo '<option value="' . $id_system . '" ' . $selected . '>' . $name_system . '</option>';
					}
					?>
				</select>


				<br>

				<div class="system-container">
					<p class="system-title">สถานะการใช้งาน</p>
					<br>
					<div class="checkbox-container">
						<?php $count = 0; ?>
						<?php foreach ($list_status['list_status'] as $key => $value): ?>
							<?php if ($count % 2 == 0): ?>
								<div>
								<?php endif; ?>
								<input type="checkbox" id="<?= $value->u_id; ?>" name="system[]"
									value="<?= $value->u_id; ?>" <?= in_array($value->u_id, $_GET['system'] ?? []) ? 'checked' : ''; ?>>
								<label for="<?= $value->u_id; ?>">
									<?= $value->n_status; ?>
								</label>

								<?php if ($count % 2 != 0 || $count == count($list_status['list_status']) - 1): ?>
								</div>
							<?php endif; ?>
							<?php $count++; ?>
						<?php endforeach; ?>
					</div>
				</div>
				<input type="submit" value="ค้นหา">
			</form>



			<br>
			<div class="system-container">
				<p class="system-title">แผนก</p>
				<div id="options">
					<button onclick="selectOption('option1')">Option 1</button>
					<button onclick="selectOption('option2')">Option 2</button>
					<button onclick="selectOption('option3')">Option 3</button>
				</div>

			</div>

			<div class="system-container">
				<p class="system-title">นำออก</p>

				<div id="options">
					<button onclick="selectOption('option1')">Excel</button>
					<button onclick="selectOption('option2')">PDF</button>
				</div>

			</div>

			<br>
			<br>

			<a class="btn btn-success" onclick="onSearch()">
				ค้นหา
			</a>
		</section>
	</div>
</div>


<!-- popup  -->

<style>
  /* กำหนดการขยายขอบด้านซ้ายและขวาของข้อความและฟอร์ม */
  .modal-content {
    margin-right: 10px; /* เพิ่มระยะขอบด้านขวา */
    margin-left: 10px; /* เพิ่มระยะขอบด้านซ้าย */
  }

  /* กำหนดการขยายขอบด้านซ้ายของฟอร์มแบบ input */
  .form-control {
    padding-left: 10px; /* เพิ่มระยะขอบด้านซ้ายของ input */
  }
</style>


<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="max-width: 650px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupModalLabel">กรอกข้อมูล</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- เริ่มฟอร์ม -->
        <form>
          <div class="form-group">
            <label for="name">ชื่อ-นามสกุล</label>
            <input type="text" class="form-control" id="cus_name" name="cus_name" style="width: 500px; ">
          </div>
          <div class="form-group">
            <label for="address">อีเมลเข้าสู่ระบบ</label>
            <input type="text" class="form-control" id="user_login" name="user_login" style="width: 400px;">
          </div>
          <div class="form-group">
            <label for="passengerCount">รหัสผ่าน</label>
            <input type="text" class="form-control" id="password" name="password" style="width: 400px;">
          </div>
          <div class="form-group">
            <label for="passengerName">ยืนยันรหัสผ่าน</label>
            <input type="text" class="form-control" id="passengerName" name="passengerName" style="width: 400px;">
          </div>
          <div class="form-group">
            <label for="passengerName">อีเมล</label>
            <input type="text" class="form-control" id="cus_email" name="cus_email" style="width: 400px;">
          </div>
          <div class="form-group">
            <label for="passengerName">เบอร์โทรศัพท์</label>
            <input type="text" class="form-control" id="cus_tel" name="cus_tel" style="width: 400px;">
          </div>
          <div class="form-group">
            <label for="passengerName">สถานะของแต่ละระบบ</label>
            <input type="text" class="form-control" id="n_status" name="n_status" style="width: 400px;">
          </div>

        </form>
        <!-- สิ้นสุดฟอร์ม -->
      </div>
      <div class="modal-footer">
        <button type="button" name="btnSave" id="btnSave" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

        <button type="button" class="btn btn-primary" onclick="onSave()">บันทึก</button>
      </div>
    </div>
  </div>
</div>


<script>
  $('#popupModal').on('show.bs.modal', function (event) {
    // สามารถเพิ่มโค้ดเพื่อปรับแต่งเนื้อหาใน Modal ที่นี่
    var button = $(event.relatedTarget); // ลิงก์ "เพิ่ม" ที่ถูกคลิก
    var modal = $(this);

  });
</script>


<!--end popup  -->



<script>

	function onSearch() {

		// รับค่าที่เลือกจาก select element
		var selectedSystem = $('#system_type').val();

		// สร้าง URL โดยรวมค่าที่เลือกเข้าไป
		var url = "<?= base_url(); ?>superAdmin/page_list_user/?system_type=" + selectedSystem;


		// ทำการ redirect ไปยัง URL ใหม่
		window.location.href = url;

	}



	function onSave() {

		var user_login = $("#user_login").val();
		var password = $("#password").val();
		var cus_name = $("#cus_name").val();
		var cus_email = $("#cus_email").val();
		var cus_tel = $("#cus_tel").val();

		if (user_login == "") {
			alert("กรอก user_login ");
			$("#user_login").focus();
			return false;
		} else if (password == "") {
			alert("password");
			$("#password").focus();
			return false;
		}
		else if (cus_name == "") {
			alert("กรอก ชื่อ-นามสกุล ");
			$("#cus_name").focus();
			return false;
		}
		else if (cus_email == "") {
			alert("กรอกอีเมล");
			$("#cus_email").focus();
			return false;
		}
		else if (cus_tel == "") {
			alert("กรอกเบอร์โทรศัพท์");
			$("#cus_tel").focus();
			return false;
		}
		else {
		

			var pmeters = 'cus_name=' + cus_name + '&cus_email=' + cus_email + '&cus_tel=' + cus_tel
				 + '&user_login=' + user_login + '&password=' + password;

			pmeters = pmeters.replace("undefined", "");
			
			// alert(pmeters);

			$.ajax({
				url: "<?= base_url(); ?>superAdmin/add_user",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>superAdmin/page_list_user";
				}
			});
			return false;
		}

		}


</script>

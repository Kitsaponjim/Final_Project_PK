<div class="content-wrapper">
	<section class="content-header">
		<p style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">

			<i class="fa fa-car" style="margin-right: 10px; background-color: #b3c3ff; padding: 8px; border-radius: 50%; color: white"></i>

			<strong style="flex: 1; display: inline;">ปฏิทินการใช้รถ</strong>
		</p>
		<div class="status-container">
			<div>
				<h4>สีของสถานะ : </h4>
			</div>
			<div class="status1">

			</div>
			<h4>จอง</h4>
			<div class="status2">

			</div>
			<h4>สำเร็จ</h4>
			<div class="status3">

			</div>
			<h4>ยกเลิก</h4>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div id="calendar" style='background-color:#ffffff; border-radius: 10px;'></div>
			<div class="row">
				<style>
					.custom-box {
						background-color: white;
						border-radius: 10px;
						box-shadow: none;
						border-top: solid white;
						/* กำหนดสีขอบด้านบนเป็นสีขาว */
					}

					#exampleModalCenter {
						font-size: 16px;
						display: none;
						position: fixed;
						top: 50%;
						left: 50%;
						transform: translate(-50%, -50%);
						z-index: 1050;
						width: 100%;
						height: 100%;
						background-color: rgba(0, 0, 0, 0.65);

					}

					.modal-content {
						border-radius: 5px;
						transition: all 0.5s ease;
					}

					/* .fade-in {
						opacity: 0;
						animation: fadeIn 0.5s forwards;
					}

					@keyframes fadeIn {
						from {
							opacity: 0;
						}

						to {
							opacity: 1;
						}
					} */
				</style>
				<div class="col-sm-12">
					<div class="col-sm-4">
					</div>
					<div class="col-sm-8">
						<!-- 
						<div>
							<span style="margin-left: 15px; font-size: 20px;"><strong>List Car </strong></span>
						</div>

						<div class="button-container" style="margin-left: 10px; margin-top: 10px;">
							<a href="<?= site_url('car_system/Admin/index'); ?>?car_status=1">
								<input class="btn btn-free" type="button" value="รถที่ว่าง"
									onclick="toggleActive('btn-free')">
							</a>
							<a href="<?= site_url('car_system/Admin/index'); ?>?car_status=2">
								<input class="btn btn-occupied" type="button" value="รถที่ไม่ว่าง"
									onclick="toggleActive('btn-occupied')">
							</a>
						</div>

						<script>
							function toggleActive(className) {
								const buttons = document.querySelectorAll('.btn');
								buttons.forEach((button) => {
									if (button.classList.contains(className)) {
										button.classList.add('active');
									} else {
										button.classList.remove('active');
									}
								});
							}
						</script>
						<?php foreach ($data['data'] as $value) :
							$car_id = $value->car_id;
							$car_brand = $value->car_brand;
							$car_model = $value->car_model;
							$car_registration = $value->car_registration;
							$car_type = $value->car_type;
							$car_number_seat = $value->car_number_seat;

							$image_data = base64_encode($value->image_data);
							$image_mime_type = $value->image_mime_type;
							$src = 'data:' . $image_mime_type . ';base64,' . $image_data;

						?>
							<div class="box custom-box" style="height: 140px; margin: 10px 0;">

								<div style="display: flex; align-items: center; margin-top: 15px;">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

									<img src="<?php echo $src; ?>"
										style="height: 100px; width: 160px; border-radius: 20px;">

									<p style="margin-left: 40px;">
										<strong style="font-size:20px;">Car brand : 
											<?php echo $car_brand; ?>
										</strong> <br>  Car Model :
										<?php echo $car_model; ?> <br>
										<?php echo $car_registration; ?> <br> <br>
										<strong>
											<?php echo $car_number_seat; ?> ที่นั่ง
										</strong>
									</p>
									<br>

									
									<div style="margin-left: auto;">
										<br><br><br>
										<a href="#" class="open-popup" data-toggle="modal" data-target="#popupModal"
											data-car_id="<?= $car_id; ?>" data-car_brand="<?= $car_brand; ?>"
											data-car_model="<?= $car_model; ?>" data-car_type="<?= $car_type; ?>"
											data-car_number_seat="<?= $car_number_seat; ?>">
											<i class="fa fa-fw fa-plus-circle" style="color: black; font-size: 20px;"></i>
										</a>

									
										&nbsp;

										<a class="" href="#" style="margin-right: 20px;">
											<i class="fa fa-list" style="color: black; font-size: 20px;" onclick="onList_car()"></i>
										</a>

								
									</div>



								</div>

							</div>
						<?php endforeach; ?> -->
					</div>
				</div>

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<div class="model" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 600px; padding:60px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="deletemodal()">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="">รายละเอียด</h3>

			</div>
			<div class="modal-body">
				<!-- Content -->
				<div id="eventName"></div>
				<div id="eventTitle"></div>
				<div>วันเวลา</div>
				<div id="eventStart"></div>
				<div id="eventEnd">&nbsp;&nbsp;</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="deletemodal()">ปิด</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal Popup -->

<!-- --Fullcalendar--- -->
<script>
	document.getElementById("exampleModalCenter").style.display = "none";

	function click(info) {
		console.log(info.event);
		var event = info.event;
		var startDate = new Date(event.start);
		var endDate = new Date(event.end);
		var startString = formatLocalDateTime(startDate);
		var endString = formatLocalDateTime(endDate);

		document.getElementById("exampleModalCenter").style.display = "block";
		document.getElementById('eventName').innerText = 'ชื่อผู้โดยสารหลัก: ' + event.extendedProps.name; // น่าจะต้องเป็น event.title หรือ event.name_passengers
		document.getElementById('eventTitle').innerText = 'เหตุผล: ' + event.title;
		document.getElementById('eventStart').innerText = 'เริ่มต้น: ' + startString;
		document.getElementById('eventEnd').innerText = 'สิ้นสุด: ' + endString;
	}


	// สร้างฟังก์ชันใหม่เพื่อแปลงเวลาในรูปแบบท้องถิ่น
	function formatLocalDateTime(dateTime) {
		const options = {
			year: 'numeric',
			month: 'long',
			day: 'numeric',
			hour: 'numeric',
			minute: 'numeric',
			second: 'numeric'
		};
		return dateTime.toLocaleString('th-TH', options);
	}

	function deletemodal() {
		document.getElementById("exampleModalCenter").style.display = "none";
	}
</script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var calendarEl = document.getElementById('calendar');
		var calendar = new FullCalendar.Calendar(calendarEl, {
			customButtons: {
				myCustomButton: {
					text: 'custom!',
					click: function() {
						alert('clicked the custom button!');
					}
				}
			},
			locale: 'th',
			eventTimeFormat: {
				hour: 'numeric',
				minute: '2-digit',
				hour12: false
			},
			allDaySlot: false,
			initialView: 'dayGridMonth',
			dayMaxEventRows: true,
			buttonText: {
				prevYear: 'ปีก่อนหน้า',
				nextYear: 'ปีถัดไป',
				year: 'ปี',
				today: 'วันนี้',
				month: 'เดือน',
				week: 'สัปดาห์',
				day: 'วัน',
				list: 'วัน',
			},
			weekText: 'สัปดาห์',
			allDayText: 'ตลอดวัน',
			moreLinkText: 'เพิ่มเติม',
			noEventsText: 'ไม่มีกิจกรรมที่จะแสดง',
			height: 750,
			headerToolbar: {
				left: 'dayGridMonth,timeGridWeek,listWeek',
				center: 'title',
				right: 'prev today next'
			},
			events: "<?php echo base_url('car_system/Admin/show_events'); ?>",
			eventColor: '#378006',
			eventTextColor: '#000',
			selectable: true,
			eventClick: function(info) {
				// updateEventDetailsAlert(info);
				click(info); // เรียกใช้งานฟังก์ชันที่นิยามไว้
				$('#exampleModalCenter').css('opacity', 0).fadeIn().animate({
					opacity: 1
				}, 300);
			}

		});

		calendar.render();


		function updateEventDetailsAlert(info) {
			var event = info.event;

			// สร้าง Object Date จาก timestamp ของ FullCalendar
			var startDate = new Date(event.start);
			var endDate = new Date(event.end);
			var startString = formatLocalDateTime(startDate);
			var endString = formatLocalDateTime(endDate);
			var startString = startDate.toISOString().slice(0, 19).replace("T", " ");
			var endString = endDate.toISOString().slice(0, 19).replace("T", " ");
			console.log(startString);
			console.log(endString);


			// สร้างข้อความที่ต้องการแสดง
			var message = 'Title: ' + event.title + '\n';
			message += 'Start: ' + startString + '\n';
			message += 'End: ' + endString + '\n';

			// สร้าง HTML สำหรับแสดงข้อมูลใน Modal Popup
			var modalContent = '<p>' + message + '</p>';

			// แสดง Modal Popup
			$('#eventDetailsContent').html(modalContent);
			$('#eventDetailsModal').modal('show');
		}

		// สร้างฟังก์ชันใหม่เพื่อแปลงเวลาในรูปแบบท้องถิ่น
		function formatLocalDateTime(dateTime) {
			const options = {
				weekday: 'short',
				year: 'numeric',
				month: 'short',
				day: 'numeric',
				hour: 'numeric',
				minute: 'numeric',
				second: 'numeric',
				hour12: false,
				timeZoneName: 'short'
			};
			return dateTime.toLocaleString('en-US', options);
		}



	});
</script>

<script>
	$(document).ready(function() {
		// เมื่อคลิกที่ลิงก์ "Open Popup"
		$('.open-popup').click(function() {
			var car_id = $(this).data('car_id');
			var car_brand = $(this).data('car_brand');
			var car_model = $(this).data('car_model');
			var car_type = $(this).data('car_type');
			var car_number_seat = $(this).data('car_number_seat');

			// แสดงข้อมูลในป๊อปอัพ
			$('#car_id').text(car_id);
			$('#car_brand').text(car_brand);
			$('#car_model').text(car_model);
			$('#car_type').text(car_type);
			$('#car_number_seat').text(car_number_seat);
		});
	});


	function onList_car() {
		window.location = "<?= base_url(); ?>car_system/reserve/list_car/";
	}
</script>
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
	.list-icons {
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
</style>

<!-- ############################################################################################## -->


<div class="col-sm-10" style="padding-top: 15px;">

	<div class="box custom-box">


		<section class="content-header">
			<p
				style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
				<i class="fa fa-cogs" style="margin-right: 10px; padding: 8px; border-radius: 50%; color: back"></i>

				<strong style="flex: 1; display: inline;">จัดการ</strong>
			</p>
		</section>




		<section class="content">


			<!-- row one -->
			<div class="row">

				<!-- จักการข้อมูลผู้ใช้งาน -->
				<div class="col-lg-3 col-1 mb-3">

					<a href="<?= site_url('superAdmin/list_user'); ?>">
						<div class="small-box"
							style="background-color: white; border-radius: 5px; width: 260px; height: 70px; color:black;">

							<div class="inner">
								<div style="display: flex; align-items: center;">
									<h3 class="user-icons">

										<strong><i class="fa fa-users"></i></strong>

									</h3>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

									<div style="flex-grow: 1; display: flex; flex-direction: column;">
										<sup style="font-size: 15px; margin-left: 5px;"><strong
												style="font-size: 24px;"> </strong> บัญชีผู้ใช้</sup>

									</div>
								</div>
							</div>

						</div>
					</a>
				</div>
			
				<div class="col-lg-3 col-1 mb-3">

					<a href="<?= site_url('superAdmin/list_role'); ?>">
						<div class="small-box"
							style="background-color: white; border-radius: 5px; width: 260px; height: 70px; color:black;">

							<div class="inner">
								<div style="display: flex; align-items: center;">
									<h3 class="user-icons">

										<strong>
											<i class="fa fa-lightbulb-o"></i>
									</strong>

									</h3>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

									<div style="flex-grow: 1; display: flex; flex-direction: column;">
										<sup style="font-size: 15px; margin-left: 5px;"><strong
												style="font-size: 24px;"> </strong> ตำแหน่ง</sup>

									</div>
								</div>
							</div>

						</div>
					</a>
				</div>
			
				<div class="col-lg-3 col-1 mb-3">

					<a href="<?= site_url('superAdmin/forgot_password'); ?>">
						<div class="small-box"
							style="background-color: white; border-radius: 5px; width: 260px; height: 70px; color:black;">

							<div class="inner">
								<div style="display: flex; align-items: center;">
									<h3 class="user-icons">

										<strong>
											<i class="fa fa-users"></i>
									</strong>

									</h3>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

									<div style="flex-grow: 1; display: flex; flex-direction: column;">
										<sup style="font-size: 15px; margin-left: 5px;"><strong
												style="font-size: 24px;"> </strong> รายการลืมรหัสผ่าน</sup>

									</div>
								</div>
							</div>

						</div>
					</a>
				</div>
			



			</div>



			<section class="content-header">
			<p
				style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
				<i class="fa fa-wrench" style="margin-right: 10px; padding: 8px; border-radius: 50%; color: back"></i>

				<strong style="flex: 1; display: inline;">จัดการระบบแจ้งซ่อม</strong>
			</p>
		</section>

			<div class="row">

				<!-- จักการข้อมูลผู้ใช้งาน -->
				<div class="col-lg-3 col-1 mb-3">

					<a href="<?= site_url('superAdmin/repair_list_all'); ?>">
						<div class="small-box"
							style="background-color: white; border-radius: 5px; width: 260px; height: 70px; color:black;">

							<div class="inner">
								<div style="display: flex; align-items: center;">
									<h3 class="list-icons">

										<strong><i class="fa fa-wrench"></i></strong>

									</h3>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

									<div style="flex-grow: 1; display: flex; flex-direction: column;">
										<sup style="font-size: 15px; margin-left: 5px;"><strong
												style="font-size: 24px;"> </strong> รายการแจ้งซ่อม</sup>

									</div>
								</div>
							</div>

						</div>
					</a>
				</div>
			

			</div>



			<section class="content-header">
			<p
				style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
				<i class="fa fa-car" style="margin-right: 10px; padding: 8px; border-radius: 50%; color: back"></i>

				<strong style="flex: 1; display: inline;">จัดการระบบจองรถ</strong>
			</p>
		</section>

			<div class="row">

				<!-- จักการข้อมูลผู้ใช้งาน -->
				<div class="col-lg-3 col-1 mb-3">

					<a href="<?= site_url('superAdmin/car_list_all'); ?>">
						<div class="small-box"
							style="background-color: white; border-radius: 5px; width: 260px; height: 70px; color:black;">

							<div class="inner">
								<div style="display: flex; align-items: center;">
								<h3 class="list-icons">


										<strong><i class="fa fa-car"></i></strong>

									</h3>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

									<div style="flex-grow: 1; display: flex; flex-direction: column;">
										<sup style="font-size: 15px; margin-left: 5px;"><strong
												style="font-size: 24px;"> </strong> รายการจองรถ</sup>

									</div>
								</div>
							</div>

						</div>
					</a>
				</div>
			

			</div>


			<section class="content-header">
			<p
				style="font-size: 20px; background-color: #ffffff; padding: 10px; border-radius: 10px; display: flex; align-items: center;">
				<!-- <i class="fa fa-cog" style="margin-right: 10px; padding: 8px; border-radius: 50%; color: back"></i> -->
				<img src="<?php echo base_url('img'); ?>/meeting.png" class="icon" alt="" style="margin-right: 10px; height: 30px; width: 30px;">

				<strong style="flex: 1; display: inline;">จัดการระบบจองห้องประชุม</strong>
			</p>
		</section>

			<div class="row">

				<!-- จักการข้อมูลผู้ใช้งาน -->
				<div class="col-lg-3 col-1 mb-3">

					<a href="<?= site_url('superAdmin/room_list_all'); ?>">
						<div class="small-box"
							style="background-color: white; border-radius: 5px; width: 260px; height: 70px; color:black;">

							<div class="inner">
								<div style="display: flex; align-items: center;">
								<h3 class="list-icons">


										<strong><i class="fa fa-users"></i></strong>

									</h3>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

									<div style="flex-grow: 1; display: flex; flex-direction: column;">
										<sup style="font-size: 15px; margin-left: 5px;"><strong
												style="font-size: 24px;"> </strong> รายการจองห้อ้งประชุม</sup>

									</div>
								</div>
							</div>

						</div>
					</a>
				</div>
			

			</div>


		</section>

	</div>
</div>

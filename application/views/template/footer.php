<!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Helpdesk System by devbanban.com 2020</b>
    </div>
   
  </footer> -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!-- <div class="control-sidebar-bg"></div>
</div> -->
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->


<script src="<?php echo base_url(); ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>asset/dist/js/demo.js"></script>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>

<!-- เรียกใช้ DataTables เป็นส่วนที่กำหนดการใช้งาน DataTables ในตารางที่มี id="example1" -->
<script>
$(document).ready(function() {
$('#example1').DataTable( {
"aaSorting" :[[0,'desc']],
//"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
});
} );

</script>
<script>
$(function () {
$('#example1').DataTable()
$('#example2').DataTable({
'paging'      : true,
'lengthChange': false,
'searching'   : false,
'ordering'    : true,
'info'        : true,
'autoWidth'   : false
})
})
</script>


<script type="text/javascript">
  <?php if ($this->session->flashdata('save_success')): ?>
  swal("", "บันทึกข้อมูลเรียบร้อย", "success");
   <?php endif; ?>


  <?php if ($this->session->flashdata('forgot_password')): ?>
  swal("", "บันทึกข้อมูลเรียบร้อย รอผลการดำเนินการ", "success");
   <?php endif; ?>

   <?php if ($this->session->flashdata('check_duplicate')): ?>
  swal("", "ข้อมูลซ้ำ!!!", "warning");
   <?php endif; ?>

   <?php if ($this->session->flashdata('wrong_alert')): ?>
  swal("", "เกิดข้อผิดพลาด!!!", "warning");
   <?php endif; ?>

	 
   <?php if ($this->session->flashdata('check')): ?>
  swal("", "มีรายการรถถูกยกเลิก!!!", "warning");
   <?php endif; ?>
	

	 
   <?php if ($this->session->flashdata('no_data')): ?>
  swal("", "ไม่มีข้อมูลที่จะอัพเดต!!!", "warning");
   <?php endif; ?>


	 <?php if ($this->session->flashdata('save_edit')): ?>
  swal("", "แก้ไขข้อมูลเรียบร้อย", "success");
   <?php endif; ?>

	 
   <?php if ($this->session->flashdata('del_success')): ?>
  swal("", "ลบข้อมูลเรียบร้อยแล้ว", "success");
   <?php endif; ?>

   <?php if ($this->session->flashdata('suspended_repair')): ?>
  swal("", "ไม่มีสิิทเข้าใช้งานระบบแจ้งซ่อม", "success");
   <?php endif; ?>

   <?php if ($this->session->flashdata('cancel_car')): ?>
  swal("", "ยกเลิการจองรถเรียบร้อย", "success");
   <?php endif; ?>


	 <?php if ($this->session->flashdata('del_driver_cancel')): ?>
  swal("", "ไม่สามารถลบคนขับนี้ได้เนื่องจากมีรายการรถที่เชื่อมโยงอยู่กับคนขับนี้", "warning");
   <?php endif; ?>

	 <?php if ($this->session->flashdata('del_car_cancel')): ?>
  swal("", "ไม่สามารถลบคนขับนี้ได้เนื่องจากมีรายการรถที่เชื่อมโยงอยู่กับคนขับนี้", "warning");
   <?php endif; ?>


	 <?php if ($this->session->flashdata('room_name')): ?>
  swal("", "มีรายการห้องอยู่แล้ว", "warning");
   <?php endif; ?>

</script>

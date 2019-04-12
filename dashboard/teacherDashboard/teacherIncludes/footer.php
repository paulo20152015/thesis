
<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small><span class="glyphicon glyphicon-copyright-mark"></span> 
              2017 Online Information Management System with SMS Notification 
              of the Quarterly Grade for Grade 7 to Senior High School of New Christian Academy 
					</small>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

	<?php include_once'modals.php'; ?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/sb-admin.min.js"></script>
    <script src="js/newjavascript6.js"></script>
    <script>
        function handleChange(input){
            if(input.value < 0 ) input.value = 0;
            if(input.value > 100) input.value = 100;
        }
    </script>    
  </body>

</html>
<style>
    a{
        text-decoration: none;
        
    }
    input[type='number'] {
    -moz-appearance:textfield;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
</style>
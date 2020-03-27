<!-- Page footer-->
      <footer class="footer-container"><span>&copy; <?php echo date("Y"); ?> - Palwinder199.com</span></footer>
   </div><!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="vendor/modernizr/modernizr.custom.js"></script>
   <!-- STORAGE API-->
   <script src="vendor/js-storage/js.storage.js"></script>
   <!-- SCREENFULL-->
   <script src="vendor/screenfull/dist/screenfull.js"></script>
   <!-- i18next-->
   <script src="vendor/i18next/i18next.js"></script>
   <script src="vendor/i18next-xhr-backend/i18nextXHRBackend.js"></script>
   <script src="vendor/jquery/dist/jquery.js"></script>
   <script src="vendor/popper.js/dist/umd/popper.js"></script>
   <script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
   <!-- =============== PAGE VENDOR SCRIPTS ===============-->
   <!-- SLIMSCROLL-->
   <script src="vendor/jquery-slimscroll/jquery.slimscroll.js"></script>
   <!-- SPARKLINE-->
   <script src="vendor/jquery-sparkline/jquery.sparkline.js"></script>
   <!-- FLOT CHART-->
   <script src="vendor/flot/jquery.flot.js"></script>
   <script src="vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js"></script>
   <script src="vendor/flot/jquery.flot.resize.js"></script>
   <script src="vendor/flot/jquery.flot.pie.js"></script>
   <script src="vendor/flot/jquery.flot.time.js"></script>
   <script src="vendor/flot/jquery.flot.categories.js"></script>
   <script src="vendor/jquery.flot.spline/jquery.flot.spline.js"></script>
   <!-- EASY PIE CHART-->
   <script src="vendor/easy-pie-chart/dist/jquery.easypiechart.js"></script>
   <!-- MOMENT JS-->
   <script src="vendor/moment/min/moment-with-locales.js"></script>
   <!-- FILESTYLE-->
   <script src="vendor/bootstrap-filestyle/src/bootstrap-filestyle.js"></script><!-- TAGS INPUT-->
   <script src="vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
   <!-- CHOSEN-->
   <script src="vendor/chosen-js/chosen.jquery.js"></script>
   <!-- SLIDER CTRL-->
   <script src="vendor/bootstrap-slider/dist/bootstrap-slider.js"></script>
   <!-- MOMENT JS-->
   <script src="vendor/moment/min/moment-with-locales.js"></script>
   <!-- DATETIMEPICKER-->
   <script src="vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
   <!-- Datatables-->
   <script src="vendor/datatables.net/js/jquery.dataTables.js"></script>
   <script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
   <script src="vendor/datatables.net-buttons/js/dataTables.buttons.js"></script>
   <script src="vendor/datatables.net-buttons-bs/js/buttons.bootstrap.js"></script>
   <script src="vendor/datatables.net-buttons/js/buttons.colVis.js"></script>
   <script src="vendor/datatables.net-buttons/js/buttons.flash.js"></script>
   <script src="vendor/datatables.net-buttons/js/buttons.html5.js"></script>
   <script src="vendor/datatables.net-buttons/js/buttons.print.js"></script>
   <script src="vendor/datatables.net-keytable/js/dataTables.keyTable.js"></script>
   <script src="vendor/datatables.net-responsive/js/dataTables.responsive.js"></script>
   <script src="vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
   <script src="vendor/jszip/dist/jszip.js"></script>
   <script src="vendor/pdfmake/build/pdfmake.js"></script>
   <script src="vendor/pdfmake/build/vfs_fonts.js"></script>
   <!-- PARSLEY-->
   <script src="vendor/parsleyjs/dist/parsley.js"></script>
   <!-- WYSIWYG-->
   <script src="vendor/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
   <!-- SWEET ALERT-->
   <script src="vendor/sweetalert/dist/sweetalert.min.js"></script>
   <!-- CK Editor -->
   <script src="vendor/ckeditor/ckeditor.js"></script> 
   <!-- =============== APP SCRIPTS ===============-->
   <script src="js/app.js"></script>
   <script src="custom.js"></script>
   <?php
   if(isset($_SESSION['SweetAlert']['type']))
   {
   ?>
   <script>
   //$("#swal-demo3").on("click",function(e){e.preventDefault(),swal("Good job!","You clicked the button!","success")})
   swal("<?php echo $_SESSION['SweetAlert']['p1']; ?>","<?php echo $_SESSION['SweetAlert']['p2']; ?>","<?php echo $_SESSION['SweetAlert']['type']; ?>");
   </script>
   <?php
   unset($_SESSION['SweetAlert']);
   }
   ?>
</body>
</html>
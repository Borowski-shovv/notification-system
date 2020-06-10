</div>
  <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
    </a>
    <!-- Date picker script -->
<!-- Bootstrap core JavaScript-->
  <script src="/admin/assets/js/jquery.min.js"></script>
  <script src="/admin/assets/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/admin/assets/js/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/admin/assets/js/sb-admin-2.min.js"></script>
  <script src="/admin/assets/js/jquery.dataTables.min.js"></script>
  <script src="/admin/assets/js/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/admin/assets/js/datatables-demo.js"></script>
  <script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
</body>

</html>
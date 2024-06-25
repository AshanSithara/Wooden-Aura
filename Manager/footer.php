    

    <!-- Essential javascripts for application to work-->

  <script src="../AdminSources/docs/js/jquery-3.2.1.min.js"></script> 


    <script src="../AdminSources/docs/js/popper.min.js"></script>
    <script src="../AdminSources/docs/js/bootstrap.min.js"></script>
    <script src="../AdminSources/docs/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../AdminSources/docs/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
 
    <script type="text/javascript" src="../AdminSources/docs/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../AdminSources/docs/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

     

 
    <script type="text/javascript" src="../AdminSources/docs/js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="../AdminSources/docs/js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="../AdminSources/docs/js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="../AdminSources/docs/js/plugins/select2.min.js"></script>



    <script type="text/javascript">
      $('#sl').click(function(){
      	$('#tl').loadingBtn();
      	$('#tb').loadingBtn({ text : "Signing In"});
      });
      
      $('#el').click(function(){
      	$('#tl').loadingBtnComplete();
      	$('#tb').loadingBtnComplete({ html : "Sign In"});
      });
      
      $('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
      
      $('#demoSelect').select2();
    </script>




  </body>
</html>
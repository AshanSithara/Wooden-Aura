<?php

  include('header.php');  include('Database.php'); 
 
mysqli_query($Wooden_AuraConnection,"DELETE FROM production_hold WHERE temp_trans_id = '".$_GET['id']." '")or die(mysqli_error($DynamicFitness));

        echo '<script type="text/javascript">
        swal("Deleted!", "Successfully Deleted" , "success");
          </script>';

        echo '<script>
                 setTimeout(function(){
                    window.location.href = "Save_Production.php";
                 }, 1000);
              </script>';


?>
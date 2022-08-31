<?php

  include('header.php');  include('Wooden_Aura.php'); 
 
mysqli_query($Wooden_AuraConnection,"DELETE FROM purchase_hold WHERE purchase_hold_id = '".$_GET['id']." '")or die(mysqli_error($Wooden_AuraConnection));

        echo '<script type="text/javascript">
        swal("Deleted!", "Successfully Deleted" , "success");
          </script>';

        echo '<script>
                 setTimeout(function(){
                    window.location.href = "Save_Purchase.php";
                 }, 1000);
              </script>';


?>
<?php

  include('header.php');  include('Wooden_Aura.php'); 
 
mysqli_query($Wooden_AuraConnection,"DELETE FROM payment_check")or die(mysqli_error($Wooden_AuraConnection));

        echo '<script type="text/javascript">
        swal("Deleted!", "Successfully Deleted" , "success");
          </script>';

        echo '<script>
                 setTimeout(function(){
                    window.location.href = "Save_Payment.php";
                 }, 1000);
              </script>';


?>
<?php

  include('header.php');  include('Wooden_Aura.php'); 
 
mysqli_query($Wooden_AuraConnection,"DELETE FROM item WHERE prod_id = '".$_GET['id']." '")or die(mysqli_error($Wooden_AuraConnection));

        echo '<script type="text/javascript">
        swal("Deleted!", "item Successfully Deleted" , "success");
          </script>';

        echo '<script>
                 setTimeout(function(){
                    window.location.href = "View_item.php";
                 }, 1000);
              </script>';


?>
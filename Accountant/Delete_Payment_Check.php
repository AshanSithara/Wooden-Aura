<?php

  include('header.php');  include('Wooden_Aura.php'); 
 


$query = mysqli_query($Wooden_AuraConnection,"select * from payment_backup where requested_id='".$_GET['id']." ' ")or die(mysqli_error($Wooden_AuraConnection));
while($row=mysqli_fetch_array($query)){

$serial = $row['serial'];
$requested_id = $row['requested_id'];	
$supplier = $row['supplier'];	
$total = $row['total']; 
$qty = $row['qty']; 
$date = $row['date']; 
 


  mysqli_query($Wooden_AuraConnection,"INSERT INTO payment_hold(serial,requested_id,supplier,total,qty,date) VALUES('$serial','$requested_id','$supplier','$total','$qty','$date')")or die(mysqli_error($Wooden_AuraConnection));
 
}

$query2 = mysqli_query($Wooden_AuraConnection,"select * from payment_check where requested_id='".$_GET['id']." ' ")or die(mysqli_error($Wooden_AuraConnection));
while($row2=mysqli_fetch_array($query2)){

  $p_check_id = $row2['p_check_id'];	

mysqli_query($Wooden_AuraConnection,"DELETE FROM payment_check WHERE p_check_id = $p_check_id ")or die(mysqli_error($Wooden_AuraConnection));

}

        echo '<script type="text/javascript">
        swal("Deleted!", "Successfully Deleted" , "success");
          </script>';

        echo '<script>
                 setTimeout(function(){
                    window.location.href = "Save_payment.php";
                 }, 1000);
              </script>';


?>
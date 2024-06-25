<?php

include('header.php');  include('Wooden_Aura.php'); 
$id=$_GET['id'];		


//update product to stock
$query1 = mysqli_query($Wooden_AuraConnection,"select * from salesdetails left join products on salesdetails.pro_id = products.prod_id where salesdetails.Request_id = '$id'")or die(mysqli_error($Wooden_AuraConnection));
$row=mysqli_fetch_array($query1); 	{
$pro_id=$row['pro_id'];	
//$prod_qty=$row['prod_qty'];	
$qty=$row['qty'];	
$Requested_id=$row['Requested_id'];	
mysqli_query($Wooden_AuraConnection,"INSERT INTO customerreturn(prod_id,qty) VALUES('$pro_id','$qty')")or die(mysqli_error($Wooden_AuraConnection));

// re add qty
mysqli_query($Wooden_AuraConnection,"UPDATE  products  SET prod_qty=prod_qty + '$qty'    WHERE prod_id='$pro_id'")or die(mysqli_error($Wooden_AuraConnection));
//delete from sale
mysqli_query($Wooden_AuraConnection,"DELETE FROM salesdetails WHERE Request_id = '$id'")or die(mysqli_error($Wooden_AuraConnection));
}

echo '<script type="text/javascript">
swal("Deleted!", "Successfully Removed" , "success");
  </script>';
echo "<script> Requested_id = " . json_encode($Requested_id) . "</script>";
echo '<script>
         setTimeout(function(){
            window.location.href = "Save_SalesReturn.php?Gotid="+ Requested_id +"";
         }, 1000);
      </script>';
 


?>
<?php include('header.php');  include('Wooden_Aura.php');   


if($id=$_GET['id']){ 

    // Insert  new data
  $query = mysqli_query($Wooden_AuraConnection,"select * from material_supplier  join payment_hold on material_supplier.supplier_id = payment_hold.supplier where payment_hold_id='".$_GET['id']." ' ")or die(mysqli_error($Wooden_AuraConnection));
  while($row=mysqli_fetch_array($query)){

$supplier_name = $row['supplier_name'];
$supplier_id = $row['supplier_id'];	
$requested_id = $row['requested_id'];	
 $total = $row['total']; 
   


    mysqli_query($Wooden_AuraConnection,"INSERT INTO payment_check(supplier_name,supplier_id,requested_id,total) VALUES('$supplier_name','$supplier_id','$requested_id','$total')")or die(mysqli_error($Wooden_AuraConnection));
    mysqli_query($Wooden_AuraConnection,"DELETE FROM payment_hold WHERE payment_hold_id = '".$_GET['id']." '")or die(mysqli_error($Wooden_AuraConnection));
    echo "<script> supplier_name = " . json_encode($supplier_name) . "</script>";
    echo '<script type="text/javascript">
    swal("Saved!", " " + supplier_name + "  Supplier   Successfully Saved  " , "success");
      </script>';
    
    

    echo '<script>
             setTimeout(function(){
                window.location.href = "Save_Payment.php";
             }, 1000);
          </script>';

	  
  }
//delete payment hold



}


?>
   
 
<?php include('header.php');  include('Wooden_Aura.php'); ?>



<?php
//save to payment table
if(isset($_POST['submit'])){ 
  $serial = $_POST['serial']; 
  $supplier_name = $_POST['supplier_name'];
  $ammount = $_POST['ammount'];
  	
	date_default_timezone_set("Asia/colombo"); 
	$date = date("Y-m-d H:i:s");

  
  
  // Genarade Serial Code     
  $readAction = mysqli_query($Wooden_AuraConnection,"SELECT serial FROM supplier_payment WHERE serial='$serial'")or die(mysqli_error($Wooden_AuraConnection));
  $readAction=mysqli_num_rows($readAction);  
  if ($readAction > 0)
  {
    echo "<script> serial = " . json_encode($serial) . "</script>";
    echo '<script type="text/javascript">
    swal("Cant be Saved!", " " + serial + "  Serial  Found" , "warning");
      </script>';
	  }
    else
	{
    $query=mysqli_query($Wooden_AuraConnection,"select * from payment_check ")or die(mysqli_error($Wooden_AuraConnection));
		while ($result=mysqli_fetch_array($query)) // select all material from Invoice to save into second table with forgin key
		{
      $requested_id = $result['requested_id'];

    mysqli_query($Wooden_AuraConnection,"INSERT INTO supplier_payment(serial,supplier_name,date,ammount,requested_id) VALUES('$serial','$supplier_name','$date','$ammount','$requested_id')")or die(mysqli_error($Wooden_AuraConnection));
    }
    echo "<script> supplier_name = " . json_encode($supplier_name) . "</script>";
    echo '<script type="text/javascript">
    swal("Saved!", " " + supplier_name + "  Payment   Successfully Saved  " , "success");
      </script>';
	  }

  



  //save to second table
  
  
    
    
    $query=mysqli_query($Wooden_AuraConnection,"select * from payment_check ")or die(mysqli_error($Wooden_AuraConnection));
		while ($result=mysqli_fetch_array($query)) // select all material from Invoice to save into second table with forgin key
		{
			$supplier_id = $result['supplier_id'];
      $supplier_name = $result['supplier_name'];
      $total = $result['total'];
					
			// save into second table
			mysqli_query($Wooden_AuraConnection,"INSERT INTO supplier_payment_details(supplier_id,supplier_name,total) VALUES('$supplier_id','$supplier_name','$total')")or die(mysqli_error($Wooden_AuraConnection));
		
      

	}
}
		//clear  Invoice
		//$result3=mysqli_query($Wooden_AuraConnection,"DELETE FROM payment_check")	or die(mysqli_error($Wooden_AuraConnection));
 
	//	echo "<script>document.location='Customer_Invocie.php?Gotid=$Request_id'</script>";  	
	


$query=mysqli_query($Wooden_AuraConnection,"select * from supplier_payment  order by serial DESC LIMIT 1")or die(mysqli_error()); 
$result =mysqli_num_rows ($query);
if ($result == 0) {
  $newidNew = "PAY00001";
} else {
 $rec= mysqli_fetch_assoc($query);
  $lastid = $rec["serial"];
  $num = substr($lastid, 3);
  $num++;
  $newidNew = "PAY" . str_pad($num, 5, "0", STR_PAD_LEFT);


}
?>
 
 
 





    <main class="app-content">
      
    <!-- search box -->
    <form class="row"  method="post" enctype='multipart/form-data'>
    <div class="form-group col-md-6">
    <label class="control-label"> Select Item    </label>
                  <select class="form-control"    name="supplier_name"  required>
               <option selected disabled> Select</option> 
               <?php

            $query2=mysqli_query($Wooden_AuraConnection,"select * from material_supplier     ")or die(mysqli_error());
             while($row=mysqli_fetch_array($query2)){

          ?>	
              <option value="<?php echo $row['supplier_name'];?>"> <?php echo $row['supplier_name']?></option>
<?php }?>
              </select>
              <button class="btn btn-primary" type="submit" name="search"><i class="fa fa-fw fa-lg fa-check-circle"></i>Search  </button>
                </div>

                
</form>

      

      
      <div class="app-title">
        <div>

        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Payment       </a></li>
        </ul>
      </div>
      <div class='row'>
      <div class="col-md-6">
      <table class="table table-hover table-bordered" >
        
                <thead>
                  
                  <tr>
                  <th>    </th>
                      <th>Supplier Name </th>
						           
                        <th> Material Invoice Code  </th>
                        <th>Total </th>
					 
				
                    
                  </tr>
                </thead>
                <tbody>
                <?php
					
          //connect search button
          if(isset($_POST['supplier_name'])) 
          { 
          
              //connect input
           $supplier_name = $_POST['supplier_name'];
          $query=mysqli_query($Wooden_AuraConnection,"select * from material_supplier  join payment_hold on material_supplier.supplier_id = payment_hold.supplier where  supplier_name = '$supplier_name'  ")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
            
           
          ?>
                  <tr>
           
                  <td>
                  <!-- ADD To First table -->
                    <a href="Save_Payment_Check.php?id=<?php echo $row['payment_hold_id']; ?>
                    " class="btn btn-add btn-sm"  ><i class="fa fa-plus fa-add"></i></a> 
                  </td>

                  <td><?php echo $row['supplier_name'];?></td>
                       
                        <td><?php echo $row['serial'];?></td>
                        <td><?php echo $row['total'];?></td>
                        

                       
                       
                     



                </tr>
                  </tr>

                  <?php } }?>             
                </tbody>
              </table>
   </div>
   <div class="col-md-6">
      <table class="table table-hover table-bordered" >
        
                <thead>
                  
                  <tr>
                  <th>    </th>
                      <th>Supplier Name </th>
						           
                     
                        <th>Total </th>
					 
				
                    
                  </tr>
                </thead>
                <?php
					
          //connect Delete button
        
          $query=mysqli_query($Wooden_AuraConnection,"select * from payment_check ")or die(mysqli_error());
          while($row=mysqli_fetch_array($query)){
           
          ?>
                <tbody>
                
					
        
                  <tr>
                  <td>
                  <!-- Delete invalid entries -->
                    <a href="Delete_Payment_Check.php?id=<?php echo $row['requested_id']; ?>" 
                    onclick="return confirm('Are you sure to Delete?')"  class="btn btn-danger btn-sm"  ><i class="fa fa-lg fa-trash"></i></a> 
                  </td>

                  <!-- Second Table Data -->
                  <td><?php echo $row['supplier_name'];?></td>
                       
                 
                        <td><?php echo $row['total'];?></td>
                        

                       
                       
                     



                </tr>
                  </tr>

                  <?php  }?>             
                </tbody>
              </table>
   </div>
          </div>




      <div class="row">
 <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">
              <form class="row"  method="post" enctype='multipart/form-data'>


 
          
              <div class="form-group col-md-6">
                  <label class="control-label"> Payment  Code</label>
                  <input class="form-control" type="text"  name="serial" value="<?php echo($newidNew)?>" readonly >
                </div>

              <!-- ADD To Second table -->
                <?php 
                        $query=mysqli_query($Wooden_AuraConnection,"select *  from payment_check")or die(mysqli_error());
              $grand=0;
              while($row=mysqli_fetch_array($query)){ 
              $total= $row['total'];
              $grand=$grand+$total;
              $supplier_name = $row['supplier_name'];

              }
            
             ?> 

                
                <div class="form-group col-md-6">
              
                  Total   Payment   <input size="15" type="text" style="text-align:right" class="form-control" id="total" name="ammount"  
                  value="<?php echo "$grand.00" ?>"     readonly>   </a>

          </div>

              <!-- Supplier name hidden value -->
          <div class="form-group col-md-6">
              
               <input size="15" type="text" style="text-align:left" class="form-control"  name="supplier_name"  
              value="<?php echo "$supplier_name" ?>"     hidden>   </a>

          </div>
      
            
            </div>
            <div class = "float-right" style = "margin-top:30px">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save  </button>
              <?php
					
          //connect Invoice Clear button
        
          // $query=mysqli_query($Wooden_AuraConnection,"select * from payment_check ")or die(mysqli_error());
          // while($row=mysqli_fetch_array($query)){
           
          ?>
              
              <!-- Delete invalid entries -->
              <a href="Clear_Invoice.php"  
                    onclick="return confirm('Are you sure you want to Clear Invoice?')"  class="btn btn-danger "  ><i class="fa fa-exclamation-triangle"> Clear Invoice</i></a> 
                    
            </div>
             
            </form>
            

          </div>
        </div>


      </div>
    </main>

    <?php include('footer.php');?>
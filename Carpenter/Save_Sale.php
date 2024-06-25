<?php include('header.php');  include('Wooden_Aura.php'); ?>
 
 <?php 
// start code to add selected product to customer list
if(isset($_POST['AddTolist'])){
$qty = $_POST['qty']; 
$prod_name = $_POST['prod_name'];

//check for current stock to sell
$readAction = mysqli_query($Wooden_AuraConnection,"SELECT * FROM item WHERE prod_id='$prod_name'")or die(mysqli_error($Wooden_AuraConnection));
$row1=mysqli_fetch_array($readAction); 	
$avblQty=$row1['prod_qty'];	 

if ($qty < $avblQty)
{ 
 
//get selected product's price
$readAction = mysqli_query($Wooden_AuraConnection,"SELECT * FROM item WHERE prod_id='$prod_name'")or die(mysqli_error($Wooden_AuraConnection));
$row=mysqli_fetch_array($readAction);

$price=$row['prod_price'];
		
//check item already in list
    $query1 = mysqli_query($Wooden_AuraConnection,"select * from sales_hold where prod_id='$prod_name'")or die(mysqli_error($Wooden_AuraConnection));
    $count=mysqli_fetch_array($query1);
      
// get total ammount for selected product
		$total=$price*$qty;

		if ($count>0){
      // if same product found update it
			mysqli_query($Wooden_AuraConnection,"update sales_hold set qty=qty+'$qty',price=price+'$total' where prod_id='$prod_name'  ")or die(mysqli_error());
	
		}
		else{
      // if product is new save it
			mysqli_query($Wooden_AuraConnection,"INSERT INTO sales_hold(prod_id,qty,price) VALUES('$prod_name','$qty','$price')")or die(mysqli_error($Wooden_AuraConnection));
		}

    echo '<script type="text/javascript">
    swal("Added!", "  Successfully Added  " , "success");
      </script>';
 }
else

{
  echo '<script type="text/javascript">
  swal("NO STOCK!", "  Has No Stock   " , "info");
    </script>';
}
 
} // end code to add selected product to customer Invoice
?>
                                

<?php   // start code to final save from list  
if(isset($_POST['salesDone'])){
	 	$total = $_POST['total']; // get main variables to save into first table
	 	$discount = $_POST['discount'];
		$customer = $_POST['customer'];
    $discount = $_POST['discount'];
		$balance = $_POST['balance'];
	 		
			
			
			
	date_default_timezone_set("Asia/colombo"); 
	$date = date("Y-m-d H:i:s");
  
	mysqli_query($Wooden_AuraConnection,"INSERT INTO Sales(total,date_added,discount,balance,customer_id)  
	VALUES('$total','$date','$discount','$balance','$customer')")or die(mysqli_error($Wooden_AuraConnection)); // save to first table
			 
	$Request_id=mysqli_insert_id($Wooden_AuraConnection); // genarate forgin key to save into second table

	$query=mysqli_query($Wooden_AuraConnection,"select * from sales_hold ")or die(mysqli_error($Wooden_AuraConnection));
		while ($row=mysqli_fetch_array($query)) // select all item from Invoice to save into second table with forgin key
		{
			$pid=$row['prod_id'];	
 			$qty=$row['qty'];
			$price=$row['price'];
			
			// save into second table
			mysqli_query($Wooden_AuraConnection,"INSERT INTO Salesdetails(pro_id,qty,price,Requested_id) VALUES('$pid','$qty','$price','$Request_id')")or die(mysqli_error($Wooden_AuraConnection));
		
      // update product qty (-)
			mysqli_query($Wooden_AuraConnection,"UPDATE item SET prod_qty=prod_qty-'$qty' where prod_id='$pid' ") or die(mysqli_error($Wooden_AuraConnection)); 
		}
		//clear  Invoice
		$result=mysqli_query($Wooden_AuraConnection,"DELETE FROM sales_hold")	or die(mysqli_error($Wooden_AuraConnection));
    // go for invoice print
		echo "<script>document.location='Customer_Invocie.php?Gotid=$Request_id'</script>";  	
		
}
?>

 

    <main class="app-content">
   

      <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Sales       </a></li>
        </ul>
      </div>



      <div class="row">
 <div class="col-md-3">
          <div class="tile">
          
            <div class="tile-body">
              <form class="row"  method="post" enctype='multipart/form-data'>
                <div class="form-group col-md-11">
                  <label class="control-label"> Select Item    </label>
                  <select class="form-control"  id="demoSelect"  name="prod_name"  required>
               <option selected disabled> Select</option> 
               <?php

$query2=mysqli_query($Wooden_AuraConnection,"select * from item     ")or die(mysqli_error());
   while($row=mysqli_fetch_array($query2)){

?>	
<option value="<?php echo $row['prod_id'];?>"> <?php echo $row['prod_name']." Available(".$row['prod_qty'].")";?></option>
<?php }?>
              </select>
                </div>

                <div class="form-group col-md-12">
                  <label class="control-label">  Qty  </label>
                  <input class="form-control" type="number"   name="qty" min="1" required>
                </div>
                </div>
          
              <button class="btn btn-primary" type="submit" name="AddTolist">+</button>
           
            

            
            </form>
 
   </div>   </div>
  
  

   
 <div class="col-md-9">
          <div class="tile">
            <div class="tile-body">
            <table class="table table-hover table-bordered" >
                <thead>
                  <tr>
                  <th>    </th>
                  <th>Item Name </th>
						            <th>Qty</th>
                        <th>Price </th>
                        <th>Total </th>
					 
				
                    
                  </tr>
                </thead>
                <tbody>
                <?php
	 		
   $query=mysqli_query($Wooden_AuraConnection,"select * from sales_hold left join item on sales_hold.prod_id = item.prod_id ")or die(mysqli_error());
   while($row=mysqli_fetch_array($query)){
   
?>
                  <tr>
           
                  <td>

<a href="Delete_SalesList.php?id=<?php echo $row['temp_trans_id']; ?>" 
onclick="return confirm('Are you sure to Delete?')"  class="btn btn-danger btn-sm"  ><i class="fa fa-lg fa-trash"></i></a> 
</td>

                  <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['qty'];?></td>
                        <td><?php echo $row['price'];?></td>
                       
                        <td><?php echo  $row['qty'] * $row['price'];?>.00</td>
                       
                       
                     



                </tr>
                  </tr>

                  <?php } ?>             
                </tbody>
              </table>
              <form method="post"  >         
              
     
          
  
    
  <!--Start Auto calcuation -->
 

<script type="text/javascript"> 
   function setval2()
   {
      document.getElementById('balance').value = document.getElementById('total').value - document.getElementById('discount').value;
   }
 </script>
  <!--End Auto calcuation -->
  
                  <?php 
                        $query=mysqli_query($Wooden_AuraConnection,"select *  from sales_hold")or die(mysqli_error());
              $grand=0;
              while($row=mysqli_fetch_array($query)){ 
              $total= $row['qty']*$row['price'];
              $grand=$grand+$total;
            }
                        ?>  
                 
              
   Total      <input size="15" type="text" style="text-align:right" class="form-control" id="total" name="total"  
                  value="<?php echo "$grand"; ?>"     readonly>   </a>
 
               

                  
              

             discount      <input size="20" type="number" style="text-align:right" class="form-control" id="discount" name="discount"  required   onkeyup="setval2()"  
                        >   


  Balance    <input size="20" type="text" style="text-align:right" class="form-control" id="balance" name="balance"  
                  value="<?php echo "$grand"; ?>"       


                 
  <br/>  <br/>
  
  
  
          <label class="control-label">Customer    </label>
                  <select class="form-control"   name="customer"  id="demoSelect" required>
               <option selected disabled> Select</option> 
                <?php
            
              $queryc=mysqli_query($Wooden_AuraConnection,"select * from  customer  ")or die(mysqli_error());
                while($rowc=mysqli_fetch_array($queryc)){
                ?>
                  <option value="<?php echo $rowc['customer_id'];?>"><?php echo $rowc['customer_name'];?></option>
                <?php }?>
              </select>
			  
			  
               
  <P>
   
  <button class="btn btn btn-block btn-danger"   name="salesDone" type="submit"   >
    <i class="fa fa-fw fa-lg fa-check-circle"></i> Done       </button>   
                      </div>
  
  
  
                
                  <form>

</div></div></div>


        </div>

 
      </div>
    </main>

    <?php include('footer.php');?>
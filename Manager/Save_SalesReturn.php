<?php include('header.php');  include('Wooden_Aura.php'); ?>
 
 <?php 
// start code to add selected product to customer list
$Gotid=$_GET['Gotid'];		
if(isset($_POST['AddTolist'])){
$qty = $_POST['qty']; 
$prod_name = $_POST['prod_name'];

//check for current stock to sell
$readAction = mysqli_query($Wooden_AuraConnection,"SELECT * FROM products WHERE prod_id='$prod_name'")or die(mysqli_error($Wooden_AuraConnection));
$row1=mysqli_fetch_array($readAction); 	
$avblQty=$row1['prod_qty'];	 

if ($qty < $avblQty)
{ 
 
//get selected product's price
$readAction = mysqli_query($Wooden_AuraConnection,"SELECT * FROM products WHERE prod_id='$prod_name'")or die(mysqli_error($Wooden_AuraConnection));
$row=mysqli_fetch_array($readAction);

$price=$row['prod_price'];
		
//check products already in list
    $query1 = mysqli_query($Wooden_AuraConnection,"select * from salesdetails where pro_id='$prod_name' and salesdetails.Requested_id = '$Gotid' ")or die(mysqli_error($Wooden_AuraConnection));
    $count=mysqli_fetch_array($query1);
      
// get total ammount for selected product
		$total=$price*$qty;

		if ($count>0){
      // if same product found update it
			mysqli_query($Wooden_AuraConnection,"update salesdetails set qty=qty+'$qty',price=price+'$total' where pro_id='$prod_name' and salesdetails.Requested_id = '$Gotid'   ")or die(mysqli_error());
      mysqli_query($Wooden_AuraConnection,"UPDATE products SET prod_qty=prod_qty-'$qty' where prod_id='$prod_name' ") or die(mysqli_error($Wooden_AuraConnection)); 

		}
		else{
      // if product is new save it
			mysqli_query($Wooden_AuraConnection,"INSERT INTO salesdetails(pro_id,qty,price,Requested_id) VALUES('$prod_name','$qty','$price','$Gotid')")or die(mysqli_error($Wooden_AuraConnection));
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
if(isset($_POST['ReturnDone'])){
	 	$total = $_POST['total']; // get main variables to save into first table
	 	$discount = $_POST['discount'];
		$balanceAfterDicount = $_POST['balanceAfterDicount'];
    $paid = $_POST['paid'];
		$balance = $_POST['balance'];



// 

	 		
//update sales table	
  mysqli_query($Wooden_AuraConnection,"UPDATE  Sales  SET total='$total' , discount='$discount' , balanceAfterDicount='$balanceAfterDicount', balance='$balance'    WHERE sales_id='$Gotid'")or die(mysqli_error($Wooden_AuraConnection));
  echo "<script>document.location='Customer_Invocie.php?Gotid=$Request_id'</script>";  	

		
}
?>






    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i>   Sales Return </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="Dashborad.php">Dashboard</a></li>
        </ul>
      </div>



      <div class="row">
 <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">
              <form class="row"  method="post" enctype='multipart/form-data'>
                <div class="form-group col-md-6">
                  <label class="control-label">Product    </label>
                  <select class="form-control"  id="demoSelect" style="width: 91%;" name="prod_name"  required>
               <option selected disabled> Select</option> 
               <?php

$query2=mysqli_query($Wooden_AuraConnection,"select * from products  order by prod_name")or die(mysqli_error());
   while($row=mysqli_fetch_array($query2)){

?>	
<option value="<?php echo $row['prod_id'];?>"> <?php echo $row['prod_name']." Available(".$row['prod_qty'].")";?></option>
<?php }?>
              </select>
                </div>

                <div class="form-group col-md-3">
                  <label class="control-label">  Qty  </label>
                  <input class="form-control" type="text"   name="qty" min="1" required>
                </div>
                
                <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="AddTolist"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add List</button>
           
            </div>

            </div>
            </form>
 
   </div>
          


   <div class="row">
 <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            <table class="table table-hover table-bordered" >
                <thead>
                  <tr>
                  <th>Product </th>
						            <th>Qty</th>
                        <th>Price </th>
                        <th>Total </th>
					 
						  <th>Remove from Invoice</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php
	 		
   $query=mysqli_query($Wooden_AuraConnection,"select * from salesdetails left join products on salesdetails.pro_id = products.prod_id where salesdetails.Requested_id = '$Gotid' ")or die(mysqli_error());
   while($row=mysqli_fetch_array($query)){
   
?>
                  <tr>
           
                  <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['qty'];?></td>
                        <td><?php echo $row['price'];?></td>
                       
                        <td><?php echo  $row['qty'] * $row['price'];?></td>
                        <td>

                        <a href="Delete_ReturnList.php?id=<?php echo $row['Request_id']; ?>" 
                 onclick="return confirm('Are you sure to Delete?')"  class="btn btn-danger btn-sm"  ><i class="fa fa-lg fa-trash"></i></a> 
                 </td>
                </tr>
                  </tr>

                  <?php } ?>             
                </tbody>
              </table>
              <form method="post"  >         
              
     
          <div align="right">
  
    
  <!--Start Auto calcuation -->
          <script type="text/javascript"> 
   function setval()
   {
      document.getElementById('balanceAfterDicount').value = document.getElementById('total').value - document.getElementById('discount').value;
   }
 </script>


<script type="text/javascript"> 
   function setval2()
   {
      document.getElementById('balance').value = document.getElementById('balanceAfterDicount').value - document.getElementById('paid').value;
   }
 </script>
  <!--End Auto calcuation -->
  
                  <?php 
                        $query=mysqli_query($Wooden_AuraConnection,"select *  from salesdetails where salesdetails.Requested_id = '$Gotid'")or die(mysqli_error());
              $grand=0;
              while($row=mysqli_fetch_array($query)){ 
              $total= $row['qty']*$row['price'];
              $grand=$grand+$total;
            }
                        ?>  
                 
              
     <a   class="btn btn-success "  > Total      <input size="15" type="text" style="text-align:right" class="form-control" id="total" name="total"  
                  value="<?php echo "$grand"; ?>"     readonly>   </a>
  
                  <a   class="btn btn-success "  > Discount      <input size="20"  type="number" style="text-align:right" class="form-control" id="discount" name="discount" value="0"  onkeyup="setval()" 
                     >   </a>    

                  
                  <a   class="btn btn-success "  > Total After Discount      <input size="20" type="text" style="text-align:right" class="form-control" id="balanceAfterDicount" name="balanceAfterDicount"  
                  value="<?php echo "$grand"; ?>"   readonly   >   </a> 
       


                  <a   class="btn btn-success "  > Customer Paid      <input size="20" type="number" style="text-align:right" class="form-control" id="paid" name="paid"  required   onkeyup="setval2()"  
                        >   </a> 


                  <a   class="btn btn-success "  > Change to Give      <input size="20" type="text" style="text-align:right" class="form-control" id="balance" name="balance"  
                  value="<?php echo "$grand"; ?>"      >   </a> 


                 
  <br/>  <br/>
               
  <P>
   
    <a   class="btn btn-primary" name="btn_delete">  <button class="btn btn btn-block btn-success"   name="ReturnDone" type="submit"   >
    <i class="fa fa-fw fa-lg fa-check-circle"></i>Complate Sale     </button>    </a>
                      </div>
  
  
  
                
                  <form>

</div></div></div>


        </div>

 
      </div>
    </main>

    <?php include('footer.php');?>
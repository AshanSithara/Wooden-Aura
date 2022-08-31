<?php include('header.php');  include('Wooden_Aura.php'); 
if(isset($_POST['submit'])){ 

  $prod_id = $_POST['prod_id'];
  $prod_name = $_POST['prod_name']; 
  $return_qty= $_POST['qty']; 
  $customer_name = $_POST['customer_name'];
  $requested_id = $_POST['requested_id'];
  $request_id = $_POST['request_id'];


  date_default_timezone_set("Asia/colombo"); 
	$date = date("Y-m-d H:i:s");

  //check for current stock to sell
$readAction = mysqli_query($Wooden_AuraConnection,"SELECT * FROM salesdetails WHERE request_id='$request_id'")or die(mysqli_error($Wooden_AuraConnection));
$row1=mysqli_fetch_array($readAction); 	
$avblQty=$row1['qty'];	 

if ($return_qty <= $avblQty)
{ 
 // new data
    mysqli_query($Wooden_AuraConnection,"INSERT INTO return_details(prod_name,return_qty,customer_name,date,requested_id) VALUES('$prod_name','$return_qty','$customer_name','$date','$requested_id')") or die(mysqli_error($Wooden_AuraConnection));

// Update Sales details table
    mysqli_query($Wooden_AuraConnection,"update salesdetails set qty=qty -'$return_qty' where request_id ='$request_id' ")or die(mysqli_error());

      echo '<script type="text/javascript">
    swal("updated!", "Return Item Added to System" , "success");
      </script>';

    echo '<script>
             setTimeout(function(){
                window.location.href = "View_return.php";
             }, 1000);
          </script>';
 }
else

{
  echo '<script type="text/javascript">
  swal(" Invalid Quantity !", " Please Check Return Quantity   " , "info");
    </script>';
}

   
}
?>
 





    <main class="app-content">
    <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Sales Return       </a></li>
        </ul>
      </div>



      <div class="row">
 <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">


            <?php //get data to input 
if($id=$_GET['id']){
  $query=mysqli_query($Wooden_AuraConnection,"select * from sales left join customer on sales.customer_id = customer.customer_id JOIN salesdetails on sales.sales_id = salesdetails.Requested_id JOIN item on item.prod_id = salesdetails.prod_id  WHERE request_id='".$_GET['id']."' ")or die(mysqli_error($Wooden_AuraConnection));
  while($row=mysqli_fetch_array($query)){ 
  // get all data into veriable
  $prod_id =  $row['prod_id'];
  $prod_name =  $row['prod_name']; 
  $qty =  $row['qty'];
  $customer_name =  $row['customer_name'];
  $requested_id = $row['requested_id'];
   $request_id = $row['request_id'];
 
  
 
  }
}
?>

              <form class="row"  method="post" enctype='multipart/form-data'>

             



                <div class="form-group col-md-3">
                  <label class="control-label">  Product Name</label>
                  <input class="form-control" type="text"   name="prod_name" value="<?php echo($prod_name)?>" readonly>
                </div>
                
              

               

                <div class="form-group col-md-3">
                  <label class="control-label">Qty    </label>
                  <input class="form-control" type="text"   name="qty"   value="<?php echo($qty)?>" >
                </div>

                <div class="form-group col-md-3">
                  <label class="control-label">  Customer Name</label>
                  <input class="form-control" type="text"   name="customer_name" value="<?php echo($customer_name)?>" readonly>
                </div>
      
                <div class="form-group col-md-3">
                  <input class="form-control" type="text"   name="requested_id" value="<?php echo($requested_id)?>" hidden>
                </div>

                <div class="form-group col-md-3">
                  <input class="form-control" type="text"   name="prod_id" value="<?php echo($prod_id)?>" hidden>
                </div>

                <div class="form-group col-md-3">
                  <input class="form-control" type="text"   name="request_id" value="<?php echo($request_id)?>" hidden>
                </div>
              
               

                  

                </div>
                </div>
           
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Submit    </button>
              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="View_Sales.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>

            </form>

          </div>
        </div>
        

      </div>
    </main>

    <?php include('footer.php');?>
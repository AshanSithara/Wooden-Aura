<?php include('header.php');  include('Wooden_Aura.php'); 
if(isset($_POST['submit'])){ 
   
  $prod_name = $_POST['prod_name']; 
  $qty= $_POST['qty']; 
  $customer_name = $_POST['customer_name'];
   
  date_default_timezone_set("Asia/colombo"); 
	$date = date("Y-m-d H:i:s");

  {
    // Update existing /  new data
    mysqli_query($Wooden_AuraConnection,"INSERT INTO return_details(prod_name,qty,customer_name,date) VALUES('$prod_name','$qty','$customer_name','$date')") or die(mysqli_error($Wooden_AuraConnection));
 
    echo '<script type="text/javascript">
    swal("updated!", "Item Successfully Updated" , "success");
      </script>';

    echo '<script>
             setTimeout(function(){
                window.location.href = "View_return.php";
             }, 1000);
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
          <li class="breadcrumb-item"><a > Foods       </a></li>
        </ul>
      </div>



      <div class="row">
 <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">


            <?php //get data to input 
if($id=$_GET['id']){
  $query=mysqli_query($Wooden_AuraConnection,"select * from sales left join customer on sales.customer_id = customer.customer_id JOIN salesdetails on sales.sales_id = salesdetails.Requested_id JOIN item on item.prod_id = salesdetails.pro_id")or die(mysqli_error($Wooden_AuraConnection));
  while($row=mysqli_fetch_array($query)){ 
  // get all data into veriable
  ; 
  $prod_name =  $row['prod_name']; 
  $qty =  $row['qty'];
  $customer_name =  $row['customer_name'];
 
  
 
  }
}
?>

              <form class="row"  method="post" enctype='multipart/form-data'>

             



                <div class="form-group col-md-3">
                  <label class="control-label">  Product Name</label>
                  <input class="form-control" type="text"   name="prod_name" value="<?php echo($prod_name)?>" required>
                </div>
                
              

               >

                <div class="form-group col-md-3">
                  <label class="control-label">Qty    </label>
                  <input class="form-control" type="text"   name="qty"   value="<?php echo($qty)?>" >
                </div>

                
      

              
                <div class="form-group col-md-3">
                  <label class="control-label">customer_name </label>
                  <select class="form-control" style="width: 91%;" name="customer_name"  id="demoSelect" required>
               <option selected value="<?php echo($customer_name)?>"> <?php echo($customer_name)?></option> 
                <?php
            
              $queryc=mysqli_query($Wooden_AuraConnection,"select * from customer order by customer_id")or die(mysqli_error());
                while($rowc=mysqli_fetch_array($queryc)){
                ?>
                  <option value="<?php echo $rowc['customer_name'];?>"><?php echo $rowc['customer_name'];?></option>
                <?php }?>
              </select>
                </div>

                  

                </div>
                </div>
           
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Update    </button>
              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="View_Product.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>

            </form>

          </div>
        </div>
        

      </div>
    </main>

    <?php include('footer.php');?>
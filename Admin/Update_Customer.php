<?php include('header.php');  include('Wooden_Aura.php');

if (isset($_POST['submit'])) {
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];

  

    {
    // Update existing /  new data
    mysqli_query($Wooden_AuraConnection, "UPDATE  customer  SET customer_name='$customer_name' , customer_address='$customer_address' , customer_contact='$customer_contact' ,  customer_email='$customer_email'  WHERE customer_id='".$_GET['id']."'")or die(mysqli_error($Wooden_AuraConnection));
 
    echo '<script type="text/javascript">
    swal("updated!", "Supplier Successfully Updated" , "success");
      </script>';

    echo '<script>
             setTimeout(function(){
                window.location.href = "Customer_View.php";
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
          <li class="breadcrumb-item"><a > Item  Category    </a></li>
        </ul>
      </div>



      <div class="row">
 <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">



            <?php //get data to input
if ($id=$_GET['id']) {
    $query=mysqli_query($Wooden_AuraConnection, "select * from customer  WHERE customer_id='".$_GET['id']."' ")or die(mysqli_error($Wooden_AuraConnection));
    while ($row=mysqli_fetch_array($query)) {
        // get all data into veriable
        $name = $row['customer_name'];
        $address = $row['customer_address'];
        $contact = $row['customer_contact'];
        $job = $row['customer_email'];
    }
}
?>         
  <form class="row"  method="post" enctype='multipart/form-data'>
                <div class="form-group col-md-6">
                  <label class="control-label">Customer Name  </label>
                  <input class="form-control" type="text"   name="customer_name" value="<?php echo($name)?>" required pattern="[A-Za-z. ]+">
                </div>


            
              <div class="form-group col-md-6">
                  <label class="control-label"> Address</label>
                  <input class="form-control" type="text"  name="customer_address"  value="<?php echo($address)?>" required >
                </div>



                <div class="form-group col-md-6">
                  <label class="control-label"> Customer Contact Number  </label>
                  <input class="form-control" type="text"   name="customer_contact" value="<?php echo($contact)?>" onkeypress="return isNumberKey(evt)" onchange="phonenumber()" id="txtTell"  required>
                </div>
                
      
                <div class="form-group col-md-6">
                  <label class="control-label"> Email  </label>
                  <input class="form-control" type="text"   name="customer_email" value="<?php echo($job)?>"  onchange="ValidateEmail(customer_email)" id="txtEmail" required>  
                
                </div>

               
            </div>
            <div align="right">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>  Update</button>
         
            </div>

            </form>

          </div>
        </div>


      </div>
    </main>

    <?php include('footer.php');?>
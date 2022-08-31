<?php include('header.php');  include('Wooden_Aura.php'); 
if(isset($_POST['submit'])){ 
  $supplier_name = $_POST['supplier_name']; 
  $supplier_address = $_POST['supplier_address']; 
	$supplier_contact = $_POST['supplier_contact'];
  $supplier_nic = $_POST['supplier_nic'];
  $supplier_dob = $_POST['supplier_dob'];
  $supplier_gender = $_POST['supplier_gender'];
  
        
  $readAction = mysqli_query($Wooden_AuraConnection,"SELECT supplier_contact FROM material_supplier WHERE supplier_contact='$supplier_contact'")or die(mysqli_error($Wooden_AuraConnection));
  $readAction=mysqli_num_rows($readAction);  
  if ($readAction > 0)
  {
    echo "<script> supplier_contact = " . json_encode($supplier_contact) . "</script>";
    echo '<script type="text/javascript">
    swal("Cant be Saved!", " " + supplier_contact + "  Number  Found" , "warning");
      </script>';
	  }
    else
	{

    mysqli_query($Wooden_AuraConnection,"INSERT INTO material_supplier(supplier_name,supplier_address,supplier_contact,supplier_nic,supplier_dob,supplier_gender) VALUES('$supplier_name','$supplier_address','$supplier_contact','$supplier_nic','$supplier_dob','$supplier_gender')")or die(mysqli_error($Wooden_AuraConnection));
    echo "<script> supplier_name = " . json_encode($supplier_name) . "</script>";
    echo '<script type="text/javascript">
    swal("Saved!", " " + supplier_name + "  Supplier   Successfully Saved  " , "success");
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
          <li class="breadcrumb-item"><a > Martial  Suppliers    </a></li>
        </ul>
      </div>



      <div class="row">
 <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">
              <form class="row"  method="post" enctype='multipart/form-data'>


  


                <div class="form-group col-md-6">
                  <label class="control-label">  Supplier Name</label>
                  <input class="form-control" type="text"   name="supplier_name" required pattern="[A-Za-z. ]+">
                </div>
                
              

                <div class="form-group col-md-6">
                  <label class="control-label">Address  </label>
                  <input class="form-control" type="text"  name="supplier_address" >
                </div>



                <div class="form-group col-md-6">
                  <label class="control-label">Mobile Number    </label>
                  <input type="number" class="form-control"    name="supplier_contact"  onkeypress="return isNumberKey(evt)" onchange="phonenumber()" id="txtTell" >
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">NIC    </label>
                  <input type="text" class="form-control" type="text"   name="supplier_nic"     name="supplier_nic"  onchange="nicnumber()"   id="txtNIC"  >
				  
                </div>

				

            </div>
           <div align="right">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save  </button>
              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="View_Product.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>

            </form>

          </div>
        </div>

		

 

      </div>
    </main>

    <?php include('footer.php');?>
<?php include('header.php');  include('Wooden_Aura.php');   

if(isset($_POST['submit'])){ 
    $supplier_name = $_POST['supplier_name'];	  
	$supplier_address = $_POST['supplier_address'];
    $supplier_contact = $_POST['supplier_contact'];	
    $supplier_nic = $_POST['supplier_nic'];		

  

  {
    // Update existing /  new data
    mysqli_query($Wooden_AuraConnection,"UPDATE  material_supplier  SET supplier_name='$supplier_name' , supplier_address='$supplier_address' , supplier_contact='$supplier_contact' ,  supplier_nic='$supplier_nic'  WHERE supplier_id='".$_GET['id']."'")or die(mysqli_error($Wooden_AuraConnection));
 
    echo '<script type="text/javascript">
    swal("updated!", "Supplier Successfully Updated" , "success");
      </script>';

    echo '<script>
             setTimeout(function(){
                window.location.href = "View_Supplier.php";
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
if($id=$_GET['id']){
  $query=mysqli_query($Wooden_AuraConnection,"select * from material_supplier  WHERE supplier_id='".$_GET['id']."' ")or die(mysqli_error($Wooden_AuraConnection));
  while($row=mysqli_fetch_array($query)){ 
  // get all data into veriable
  $supplier_name = $row['supplier_name'];	  
  $supplier_address = $row['supplier_address'];
  $supplier_contact = $row['supplier_contact'];	
  $supplier_nic = $row['supplier_nic'];	
  }
}
?>         
  <form class="row"  method="post" enctype='multipart/form-data'>
                <div class="form-group col-md-6">
                  <label class="control-label">Supplier Name  </label>
                  <input class="form-control" type="text"   name="supplier_name" value="<?php echo($supplier_name)?>" required>
                </div>


            
              <div class="form-group col-md-6">
                  <label class="control-label">Supplier Address</label>
                  <input class="form-control" type="text"  name="supplier_address"  value="<?php echo($supplier_address)?>" required >
                </div>



                <div class="form-group col-md-6">
                  <label class="control-label">Supplier Contact  </label>
                  <input class="form-control" type="text"   name="supplier_contact" value="<?php echo($supplier_contact)?>" required>
                </div>
                
      
                <div class="form-group col-md-6">
                  <label class="control-label">Supplier NIC </label>
                  <input class="form-control" type="text"   name="supplier_nic" value="<?php echo($supplier_nic)?>" required>
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
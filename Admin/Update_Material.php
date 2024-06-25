<?php include('header.php');  include('Wooden_Aura.php');   

if(isset($_POST['submit'])){ 
    $material_name = $_POST['material_name'];	  
	$material_price = $_POST['material_price'];
    $minimum_qty = $_POST['minimum_qty'];	
    $material_qty = $_POST['material_qty'];
    $material_serial = $_POST['material_serial'];		

  

  {
    // Update existing /  new data
    mysqli_query($Wooden_AuraConnection,"UPDATE  material  SET material_name='$material_name' , material_price='$material_price' , material_qty='$material_qty', minimum_qty='$minimum_qty' ,  material_serial='$material_serial'  WHERE material_id='".$_GET['id']."'")or die(mysqli_error($Wooden_AuraConnection));
 
    echo '<script type="text/javascript">
    swal("updated!", "Material Successfully Updated" , "success");
      </script>';

    echo '<script>
             setTimeout(function(){
                window.location.href = "View_material.php";
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
  $query=mysqli_query($Wooden_AuraConnection,"select * from material  WHERE material_id='".$_GET['id']."' ")or die(mysqli_error($Wooden_AuraConnection));
  while($row=mysqli_fetch_array($query)){ 
  // get all data into veriable
  $material_name = $row['material_name'];	  
  $material_price = $row['material_price'];
  $material_qty = $row['material_qty'];	
  $minimum_qty = $row['minimum_qty'];	
  $material_serial = $row['material_serial'];
  }
}
?>         
  <form class="row"  method="post" enctype='multipart/form-data'>
                <div class="form-group col-md-6">
                  <label class="control-label">Material Code  </label>
                  <input class="form-control" type="text"   name="material_serial" value="<?php echo($material_serial)?>" readonly>
                </div>


            
              <div class="form-group col-md-6">
                  <label class="control-label">Material Name</label>
                  <input class="form-control" type="text"  name="material_name"  value="<?php echo($material_name)?>" required >
                </div>



                <div class="form-group col-md-6">
                  <label class="control-label">Material Price  </label>
                  <input class="form-control" type="text"   name="material_price" value="<?php echo($material_price)?>" required>
                </div>
                
      
                <div class="form-group col-md-6">
                  <label class="control-label"> Minimum Qty  </label>
                  <input class="form-control" type="text"   name="minimum_qty" value="<?php echo($minimum_qty)?>" required>
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label"> Qty  </label>
                  <input class="form-control" type="text"   name="material_qty" value="<?php echo($material_qty)?>" required>
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
<?php include('header.php');  include('Wooden_Aura.php'); 
if(isset($_POST['submit'])){ 
  $material_serial = $_POST['material_serial']; 
  $material_name = $_POST['material_name']; 
	$material_price = $_POST['material_price'];
  $minimum_qty = $_POST['minimum_qty'];	    
  $material_qty = $_POST['material_qty'];
  
        
  $readAction = mysqli_query($Wooden_AuraConnection,"SELECT material_serial FROM material WHERE material_serial='$material_serial'")or die(mysqli_error($Wooden_AuraConnection));
  $readAction=mysqli_num_rows($readAction);  
  if ($readAction > 0)
  {
    echo "<script> material_serial = " . json_encode($material_serial) . "</script>";
    echo '<script type="text/javascript">
    swal("Cant be Saved!", " " + material_serial + "  material_serial  Found" , "warning");
      </script>';
	  }
    else
	{

    mysqli_query($Wooden_AuraConnection,"INSERT INTO material(material_serial,material_name,material_price,material_qty,minimum_qty) VALUES('$material_serial','$material_name','$material_price','$material_qty','$minimum_qty')")or die(mysqli_error($Wooden_AuraConnection));
    echo "<script> material_name = " . json_encode($material_name) . "</script>";
    echo '<script type="text/javascript">
    swal("Saved!", " " + material_name + "Successfully Saved  " , "success");
      </script>';

       //Go to View Item Catogory
      echo "<script>document.location='View_material.php'</script>";
	  }

  }


$query=mysqli_query($Wooden_AuraConnection,"select * from material  order by material_serial DESC LIMIT 1")or die(mysqli_error()); 
$result =mysqli_num_rows ($query);
if ($result == 0) {
  $newidNew = "MAT00001";
} else {
 $rec= mysqli_fetch_assoc($query);
  $lastid = $rec["material_serial"];
  $num = substr($lastid, 3);
  $num++;
  $newidNew = "MAT" . str_pad($num, 5, "0", STR_PAD_LEFT);
}
?>
  
 





    <main class="app-content">
      

      
    

   <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Material       </a></li>
        </ul>
      </div>



      <div class="row">
 <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">
              <form class="row"  method="post" enctype='multipart/form-data'>


 
          
              <div class="form-group col-md-6">
                  <label class="control-label"> Material  Code</label>
                  <input class="form-control" type="text"  name="material_serial" value="<?php echo($newidNew)?>" readonly >
                </div>



                <div class="form-group col-md-6">
                  <label class="control-label">  Material Name</label>
                  <input class="form-control" type="text"   name="material_name" required pattern="[A-Za-z. ]+">
                </div>
                
              

                <div class="form-group col-md-6">
                  <label class="control-label">  Price  </label>
                  <input class="form-control" type="number"  name="material_price"   >
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">Material Qty    </label>
                  <input class="form-control" type="number"   name="material_qty"  >
                </div>


                <div class="form-group col-md-6">
                  <label class="control-label">Minimum Qty    </label>
                  <input class="form-control" type="number"   name="minimum_qty"  >
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
<?php include('header.php');  include('Wooden_Aura.php'); 
if(isset($_POST['submit'])){ 
  $serial = $_POST['serial']; 
  $prod_name = $_POST['prod_name']; 
	$prod_price = $_POST['prod_price'];
  $prod_qty = $_POST['prod_qty'];
  $category = $_POST['category'];	    
  
  $ms = $_POST['ms'];	 

        
  $readAction = mysqli_query($Wooden_AuraConnection,"SELECT serial FROM item WHERE serial='$serial'")or die(mysqli_error($Wooden_AuraConnection));
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

    mysqli_query($Wooden_AuraConnection,"INSERT INTO item(serial,prod_name,prod_price,cat_id,prod_qty,ms) VALUES('$serial','$prod_name','$prod_price','$category','$prod_qty','$ms')")or die(mysqli_error($Wooden_AuraConnection));
    echo "<script> prod_name = " . json_encode($prod_name) . "</script>";
    echo '<script type="text/javascript">
    swal("Saved!", " " + prod_name + " Successfully Saved  " , "success");
      </script>';
	  }

  }


$query=mysqli_query($Wooden_AuraConnection,"select * from item  order by serial DESC LIMIT 1")or die(mysqli_error()); 
$result =mysqli_num_rows ($query);
if ($result == 0) {
  $newidNew = "I00001";
} else {
 $rec= mysqli_fetch_assoc($query);
  $lastid = $rec["serial"];
  $num = substr($lastid, 3);
  $num++;
  $newidNew = "I" . str_pad($num, 5, "0", STR_PAD_LEFT);
}
?>
  ?>
 
 





    <main class="app-content">
      

      
      <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > item       </a></li>
        </ul>
      </div>




      <div class="row">
 <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">
              <form class="row"  method="post" enctype='multipart/form-data'>

                <div class="form-group col-md-6">
                  <label class="control-label">Item category  </label>
                  <select class="form-control" style="width: 91%;" name="category"  id="demoSelect" required>
               <option selected disabled> Select</option> 
                <?php
            
              $queryc=mysqli_query($Wooden_AuraConnection,"select * from item_category order by cat_name")or die(mysqli_error());
                while($rowc=mysqli_fetch_array($queryc)){
                ?>
                  <option value="<?php echo $rowc['cat_id'];?>"><?php echo $rowc['cat_name'];?></option>
                <?php }?>
              </select>
                </div>
 
          
              <div class="form-group col-md-6">
                  <label class="control-label"> item  Code</label>
                  <input class="form-control" type="text"  name="serial" value="<?php echo($newidNew)?>" readonly >
                </div>



                <div class="form-group col-md-6">
                  <label class="control-label">  item Name</label>
                  <input class="form-control" type="text"   name="prod_name" required pattern="[A-Za-z. ]+">
                </div>
                
              

                <div class="form-group col-md-6">
                  <label class="control-label">  Price  </label>
                  <input class="form-control" type="number"  name="prod_price"   >
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">Qty    </label>
                  <input class="form-control" type="number"   name="prod_qty"  >
                </div>

 
                <div class="form-group col-md-6">
                  <label class="control-label"> mimum Stock    </label>
                  <input class="form-control" type="number"   name="ms"  >
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
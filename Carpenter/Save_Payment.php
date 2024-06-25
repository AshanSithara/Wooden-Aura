<?php include('header.php');  include('Wooden_Aura.php'); 
if(isset($_POST['submit'])){ 
  $serial = $_POST['serial']; 
  $supplier_id = $_POST['supplier_id'];
  $ammount = $_POST['ammount'];
  	
	date_default_timezone_set("Asia/colombo"); 
	$date = date("Y-m-d H:i:s");

  

  
        
  $readAction = mysqli_query($Wooden_AuraConnection,"SELECT serial FROM supplier_payment WHERE serial='$serial'")or die(mysqli_error($Wooden_AuraConnection));
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

    mysqli_query($Wooden_AuraConnection,"INSERT INTO supplier_payment(serial,supplier_id,date,ammount) VALUES('$serial','$supplier_id','$date','$ammount')")or die(mysqli_error($Wooden_AuraConnection));
    echo "<script> supplier_id = " . json_encode($supplier_id) . "</script>";
    echo '<script type="text/javascript">
    swal("Saved!", " " + supplier_id + "  Payment   Successfully Saved  " , "success");
      </script>';
	  }

  }


$query=mysqli_query($Wooden_AuraConnection,"select * from supplier_payment  order by serial DESC LIMIT 1")or die(mysqli_error()); 
$result =mysqli_num_rows ($query);
if ($result == 0) {
  $newidNew = "PAY00001";
} else {
 $rec= mysqli_fetch_assoc($query);
  $lastid = $rec["serial"];
  $num = substr($lastid, 3);
  $num++;
  $newidNew = "PAY" . str_pad($num, 5, "0", STR_PAD_LEFT);
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
          <li class="breadcrumb-item"><a > Payment       </a></li>
        </ul>
      </div>




      <div class="row">
 <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">
              <form class="row"  method="post" enctype='multipart/form-data'>


 
          
              <div class="form-group col-md-6">
                  <label class="control-label"> Payment  Code</label>
                  <input class="form-control" type="text"  name="serial" value="<?php echo($newidNew)?>" readonly >
                </div>



                
                
              

                <div class="form-group col-md-6">
                  <label class="control-label">  Amount  </label>
                  <input class="form-control" type="text"  name="ammount"   >
                </div>

                

 

     
              
               

                <div class="form-group col-md-6">
                  <label class="control-label">Supplier  </label>
                  <select class="form-control" style="width: 91%;" name="supplier_id"  id="demoSelect" required>
               <option selected disabled> Select</option> 
                <?php
            
              $queryc=mysqli_query($Wooden_AuraConnection,"select * from material_supplier order by supplier_id")or die(mysqli_error());
                while($rowc=mysqli_fetch_array($queryc)){
                ?>
                  <option value="<?php echo $rowc['supplier_id'];?>"><?php echo $rowc['supplier_name'];?></option>
                <?php }?>
              </select>
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
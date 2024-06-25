<?php include('header.php');  include('Wooden_Aura.php');   

if(isset($_POST['submit'])){ //from btn name start 

  $cat_code = $_POST['cat_code'];  //from input filed
	$cat_name = $_POST['cat_name'];	   //from input filed
	$cat_note = $_POST['cat_note'];	   //from input filed

 


  $readAction = mysqli_query($Wooden_AuraConnection,"SELECT cat_code FROM item_category WHERE cat_code='$cat_code'")or die(mysqli_error($Wooden_AuraConnection));
  $readAction=mysqli_num_rows($readAction);  
  if ($readAction > 0)
  {
    echo "<script> cat_code = " . json_encode($cat_code) . "</script>";
    echo '<script type="text/javascript">
    swal("Cant be Saved!", " " + cat_code + "  Category  Found" , "warning");
      </script>';
	  }
    else
	{

    //save data 'INSERT INTO item_category'
    mysqli_query($Wooden_AuraConnection,"INSERT INTO item_category(cat_code,cat_name,cat_note) VALUES  ('$cat_code','$cat_name','$cat_note')")or die(mysqli_error($Wooden_AuraConnection));

    // for js message
    echo "<script> cat_name = " . json_encode($cat_name) . "</script>";
    echo '<script type="text/javascript">
    swal("Saved!", " " + cat_name + "  Category   Successfully Saved  " , "success");
      </script>';
	  }

  }//from btn name end


$query=mysqli_query($Wooden_AuraConnection,"select * from item_category  order by cat_code DESC LIMIT 1")or die(mysqli_error()); 
$result =mysqli_num_rows ($query);
if ($result == 0) {
  $newidNew = "C00001";
} else {
 $rec= mysqli_fetch_assoc($query);
  $lastid = $rec["cat_code"];
  $num = substr($lastid, 3);
  $num++;
  $newidNew = "C" . str_pad($num, 5, "0", STR_PAD_LEFT);
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

              <form class="row"  method="post" enctype='multipart/form-data'>
              <div class="form-group col-md-6">
                  <label class="control-label">Category   Code</label>
                  <input class="form-control" type="text"  name="cat_code" value="<?php echo($newidNew)?>" readonly >
                </div>



                <div class="form-group col-md-6">
                  <label class="control-label">Category Name  </label>
                  <input class="form-control" type="text"   name="cat_name" required>
                </div>
                
      
                <div class="form-group col-md-6">
                  <label class="control-label">Category Note  </label>
                  <input class="form-control" type="text"   name="cat_note" required>
                </div>




            </div>
            <div align="right">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save  </button>
              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="View_Category.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
             </div >

            </form>

          </div>
        </div>


      </div>
    </main>

    <?php include('footer.php');?>
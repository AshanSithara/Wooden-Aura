<?php include('header.php');  include('Wooden_Aura.php');   

if(isset($_POST['submit'])){ 
  $cat_code = $_POST['cat_code']; 
	$cat_name = $_POST['cat_name'];	  
	$cat_note = $_POST['cat_note'];	

  

  {
    // Update existing /  new data
    mysqli_query($Wooden_AuraConnection,"UPDATE  item_category  SET cat_code='$cat_code' , cat_name='$cat_name' , cat_note='$cat_note'   WHERE cat_id='".$_GET['id']."'")or die(mysqli_error($Wooden_AuraConnection));
 
    echo '<script type="text/javascript">
    swal("updated!", "Category Successfully Updated" , "success");
      </script>';

    echo '<script>
             setTimeout(function(){
                window.location.href = "View_Item_Category.php";
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
  $query=mysqli_query($Wooden_AuraConnection,"select * from item_category  WHERE cat_id='".$_GET['id']."' ")or die(mysqli_error($Wooden_AuraConnection));
  while($row=mysqli_fetch_array($query)){ 
  // get all data into veriable
  $cat_code =  $row['cat_code']; 
  $cat_name =  $row['cat_name']; 
  $cat_note =  $row['cat_note']; 
  }
}
?>
              <form class="row"  method="post" enctype='multipart/form-data'>
              <div class="form-group col-md-6">
                  <label class="control-label">Category   ID</label>
                  <input class="form-control" type="text"  name="cat_code"  value="<?php echo($cat_code)?>" readonly >
                </div>



                <div class="form-group col-md-6">
                  <label class="control-label">Category Name  </label>
                  <input class="form-control" type="text"   name="cat_name" value="<?php echo($cat_name)?>" pattern="[A-Za-z. ]+" required>
                </div>
                
      
                <div class="form-group col-md-6">
                  <label class="control-label">Category Note  </label>
                  <input class="form-control" type="text"   name="cat_note" value="<?php echo($cat_note)?>" pattern="[A-Za-z. ]+" required>
                </div>

            </div>
            <div align="right">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>  Update</button>
              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="View_Item_Category.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
         
            </div>

            </form>

          </div>
        </div>


      </div>
    </main>

    <?php include('footer.php');?>
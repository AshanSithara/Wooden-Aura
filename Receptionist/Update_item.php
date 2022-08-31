<?php include('header.php');  include('Wooden_Aura.php'); 
if(isset($_POST['submit'])){ 
  $serial = $_POST['serial']; 
  $prod_name = $_POST['prod_name']; 
	$prod_price = $_POST['prod_price'];
  $prod_qty = $_POST['prod_qty']; 
  $category = $_POST['category'];	  

  {
    // Update existing /  new data
    mysqli_query($Wooden_AuraConnection,"UPDATE  item  SET serial='$serial' , prod_name='$prod_name' , prod_price='$prod_price', prod_qty='$prod_qty',  cat_id='$category'   WHERE prod_id='".$_GET['id']."'")or die(mysqli_error($Wooden_AuraConnection));
 
    echo '<script type="text/javascript">
    swal("updated!", "Item Successfully Updated" , "success");
      </script>';

    echo '<script>
             setTimeout(function(){
                window.location.href = "View_item.php";
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
  $query=mysqli_query($Wooden_AuraConnection,"select * from item left join item_category on item.cat_id = item_category.cat_id WHERE prod_id='".$_GET['id']."' ")or die(mysqli_error($Wooden_AuraConnection));
  while($row=mysqli_fetch_array($query)){ 
  // get all data into veriable
  $serial =  $row['serial']; 
  $prod_name =  $row['prod_name']; 
  $prod_price =  $row['prod_price'];
  $prod_qty =  $row['prod_qty'];
  $cat_name =  $row['cat_name'];
  $cat_id =  $row['cat_id'];
  
 
  }
}
?>

              <form class="row"  method="post" enctype='multipart/form-data'>

              <div class="form-group col-md-3">
                  <label class="control-label"> Product  Code</label>
                  <input class="form-control" type="text"  name="serial" value="<?php echo($serial)?>" readonly >
                </div>



                <div class="form-group col-md-3">
                  <label class="control-label">  Product Name</label>
                  <input class="form-control" type="text"   name="prod_name" value="<?php echo($prod_name)?>" required>
                </div>
                
              

                <div class="form-group col-md-3">
                  <label class="control-label">Price  </label>
                  <input class="form-control" type="text"  name="prod_price"   value="<?php echo($prod_price)?>"  >
                </div>

                <div class="form-group col-md-3">
                  <label class="control-label">Qty    </label>
                  <input class="form-control" type="text"   name="prod_qty"   value="<?php echo($prod_qty)?>" >
                </div>

      

               

                <div class="form-group col-md-3">
                  <label class="control-label">Product Category </label>
                  <select class="form-control" style="width: 91%;" name="category"  id="demoSelect" required>
               <option selected value="<?php echo($cat_id)?>"> <?php echo($cat_name)?></option> 
                <?php
            
              $queryc=mysqli_query($Wooden_AuraConnection,"select * from item_category order by cat_name")or die(mysqli_error());
                while($rowc=mysqli_fetch_array($queryc)){
                ?>
                  <option value="<?php echo $rowc['cat_id'];?>"><?php echo $rowc['cat_name'];?></option>
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
<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
    <main class="app-content">
   
    <form class="row"  method="post" enctype='multipart/form-data'>
    <div class="form-group col-md-6">
    <label class="control-label"> Select Item    </label>
                  <select class="form-control"    name="supplier_name"  required>
               <option selected disabled> Select</option> 
               <?php

            $query2=mysqli_query($Wooden_AuraConnection,"select * from material_supplier     ")or die(mysqli_error());
             while($row=mysqli_fetch_array($query2)){

          ?>	
              <option value="<?php echo $row['supplier_id'];?>"> <?php echo $row['supplier_name']?></option>
<?php }?>
              </select>
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Search  </button>
                </div>

                
</form>

     
     



      <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Purchase Report        </a></li>
        </ul>
      </div>



      <div class="row">
 


 
        
 <br/>
            <div class="col-md-12">
          <div class="tile">
            <section>
              
                 
               <p> WOODEN Aura | PURCHASE    REPORT</p>
               
              <?php echo date("Y/m/d")  ?>
              </h2>

                  <table class="table">
                    <thead>
                      <tr>
                      <th> Serial</th>
                      <th>Supplier Name    </th>
                      <th>Supplier Contact Number</th>
                      <th>Total</th>   
                      </tr>
                    </thead>
                    <tbody>

                    <?php

if(isset($_POST['submit'])) 
{ 

    //connect input
  $supplier_name = $_POST['supplier_name'];                    
					
$query=mysqli_query($Wooden_AuraConnection,"select * from payment_hold  join payment_backup on payment_hold.requested_id = payment_backup.requested_id join material_supplier on material_supplier.supplier_id = payment_hold.supplier where supplier_id ='$supplier_name' ")or die(mysqli_error());
while($row=mysqli_fetch_array($query)){
 
?>
                      <tr>
                        <td><?php echo $row['serial'];?></td>
                        <td><?php echo $row['supplier_name'];?></td>
                        <td><?php echo $row['supplier_contact'];?></td>    
                        <td><?php echo $row['total'];?></td>
              
 
                      </tr>
                      <?php }} ?>
                    </tbody>
                  </table>
               
                  
              

                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();"  ><i class="fa fa-print"></i> </a></div>
       
                
            </section>
            
 
    </main>

    <?php include('footer.php');?>
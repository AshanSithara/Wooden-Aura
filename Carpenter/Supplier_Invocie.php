<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
    <main class="app-content">
   
     
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
      </div>

      <div class="row">
 <div class="col-md-12">

 <div class="tile">
            <div class="tile-body">
            <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header">     <img src="../AdminSources/arz.JPG" width="230" height="70"></h2>
                </div>

         

                <div class="col-6">

                <?php         $id=$_GET['Gotid'];							
$query=mysqli_query($Wooden_AuraConnection,"select * from purchase left join supplier on  purchase.supplier =  supplier.supplier_id  where purchase_id = '$id'")or die(mysqli_error());
 
while($row=mysqli_fetch_array($query)){
 
 
?>

                  <h5 class="text-right">Date: <?php echo $row['date_added'];?> </h5>
                  <h5 class="text-right">Supplier Invoice#: <?php echo $row['purchase_id'];?> </h5>

                  <br/>

                  <h5 class="text-right">Supplier Name: <?php echo $row['supplier_name'];?> </h5>
                  <h5 class="text-right">Address: <?php echo $row['supplier_address'];?> </h5>
                  <?php } ?>

                </div>
              </div>
               
 
            
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                      <th>Items</th>
						        <th>    Qty</th>
                    <th>    Price</th>
                    <th>    Total</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php

$id=$_GET['Gotid'];							
$query=mysqli_query($Wooden_AuraConnection,"select * from purchaseetails left join products on purchaseetails.pro_id = products.prod_id  where Requested_id = '$id' ")or die(mysqli_error());
 
while($row=mysqli_fetch_array($query)){
 
 
?>

                      <tr>
                           
                <td class="product-name">   <?php echo $row['prod_name'];?>   </td>
								<td class="product-name"> <?php echo $row['qty'];?> </td>
                <td class="product-name"> <?php echo $row['price'];?> </td>
                <td class="product-name"> <?php echo $row['price']  *  $row['qty'];?> .00</td>
 
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>




<div align="right"> 
  

<div class="col-4 table-responsive">
                  <table class="table table-striped">
                  <thead>
                      <tr>
                      <th>Sub Total</th>
						        <th>    Discount</th>
                    <th>    Paid</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php

$id=$_GET['Gotid'];							
$query=mysqli_query($Wooden_AuraConnection,"select * from purchase  where purchase_id = '$id' ")or die(mysqli_error());
 
while($row=mysqli_fetch_array($query)){
 
 
?>

                      <tr>
                           
                <td class="product-name">    <?php echo $row['total'];?>   </td>
         
								<td class="product-name"> <?php echo $row['discount'];?> </td>
                <td class="product-name"> <?php echo $row['balance'];?>  </td>
 
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>





</div>
 












              
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();"  ><i class="fa fa-print"></i> Print</a></div>
              </div>
            </section>
          </div>
        </div>
            </div>
          </div>
        </div>

         
        </div>
      </div>
    </main>

    <?php include('footer.php');?>
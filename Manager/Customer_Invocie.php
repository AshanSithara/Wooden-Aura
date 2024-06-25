<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
    <main class="app-content">
   
 
      <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Invoice       </a></li>
        </ul>
      </div>


 
 <br/>

 
            <div class="col-md-6">
          <div class="tile">
            <section class="invoice">
            <p>WOODEN Aura </p>

               

                <?php         $id=$_GET['Gotid'];							
$query=mysqli_query($Wooden_AuraConnection,"select * from sales  where sales_id = '$id'")or die(mysqli_error());
 
while($row=mysqli_fetch_array($query)){
 
 
?>

                Date: <?php echo $row['date_added'];?> 
                <br/>
                Invoice#: <?php echo $row['sales_id'];?>  

                  <?php } ?>

                </div>
              

              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                      <th>item</th>
						        <th>    Qty</th>
                    <th>    Price</th>
                    <th>    Total</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php

$id=$_GET['Gotid'];							
$query=mysqli_query($Wooden_AuraConnection,"select * from salesdetails left join item on salesdetails.pro_id = item.prod_id  where Requested_id = '$id' ")or die(mysqli_error());
 
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
  

<div class="col-6 table-responsive">
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
$query=mysqli_query($Wooden_AuraConnection,"select * from sales  where sales_id = '$id' ")or die(mysqli_error());
 
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
 

 

              
          
                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();"  ><i class="fa fa-print"></i>  </a></div>
              
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
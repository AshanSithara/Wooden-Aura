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
$query=mysqli_query($Wooden_AuraConnection,"select * from supplier_payment  where payment_id = '$id'")or die(mysqli_error());
 
while($row=mysqli_fetch_array($query)){
 
 
?>

                Date: <?php echo $row['date'];?> 
                <br/>
                Invoice#: <?php echo $row['serial'];?>  
                <br/>
                Customer Name#: <?php echo $row['supplier_name'];?> 

                  <?php } ?>

                </div>
              






<div align="right"> 
  

<div class="col-6 table-responsive">
                  <table class="table table-striped">
                  <thead>
                      <tr>
                      <th></th>  
                      <th>Sub Total</th>
						     
                      </tr>
                    </thead>
                    <tbody>

                    <?php

$id=$_GET['Gotid'];							
$query=mysqli_query($Wooden_AuraConnection,"SELECT * FROM supplier_payment_details where payment_details_id = '$id'")or die(mysqli_error());
 
while($row=mysqli_fetch_array($query)){
 
 
?>

                      <tr>
                        <td></td>
                           
                <td class="product-name">    <?php echo $row['total'];?>  </td>
         
							
 
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
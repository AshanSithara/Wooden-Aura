<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
<main class="app-content">
 

      <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Payment History       </a></li>
        </ul>
      </div>



      <div class="row">
 <div class="col-md-12">

 <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Payment  Date    </th>
                    <th>      Total</th>
                   <th>Supplier</th>   
                      
                  </tr>
                </thead>
                <tbody>

 <?php $query=mysqli_query($Wooden_AuraConnection,"select * from purchase_order  join purchase_orderdetails on purchase_orderdetails.Requested_id = purchase_order.order_id JOIN material_supplier ON purchase_order.supplier = material_supplier.supplier_id join material on purchase_orderdetails.material_id = material.material_id ")or die(mysqli_error());
  while($row=mysqli_fetch_array($query)){

?>
                  <tr>
                    <td><?php echo $row['date_added'];?></td>
                    <td><?php echo $row['supplier_name'];?></td>
                    <td><?php echo $row['material_name'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td>     


                    <a href="#.php?Gotid=<?php echo $row['purchase_id']; ?>"  class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-lg fa-print"></i></a>
                
                        
 
                </tr>
                  </tr>

                  <?php } ?>             
                </tbody>
              </table>
            </div>
          </div>
        </div>

         
        </div>
      </div>
    </main>

    <?php include('footer.php');?>
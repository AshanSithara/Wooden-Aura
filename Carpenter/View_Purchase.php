<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
<main class="app-content">
 

      <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Purchase  Invoices       </a></li>
        </ul>
      </div>



      <div class="row">
 <div class="col-md-12">

 <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Purchase  Date    </th>
                    <th>      Total</th>
                   <th>Supplier</th>   
                    
                    <th>Manage</th>   
                  </tr>
                </thead>
                <tbody>

 <?php $query=mysqli_query($Wooden_AuraConnection,"select * from purchase left join material_supplier on purchase.supplier = material_supplier.supplier_id ")or die(mysqli_error());
  while($row=mysqli_fetch_array($query)){

?>
                  <tr>
                    <td><?php echo $row['date_added'];?></td>
                    <td><?php echo $row['total'];?></td>
              
 <td><?php echo $row['supplier_name'];?></td>
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
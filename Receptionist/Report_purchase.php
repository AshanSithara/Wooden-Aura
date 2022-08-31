<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
    <main class="app-content">
   
     
     



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
                       <th>Purchase  Date    </th>
                       <th>Supplier</th>
                    <th>      Total</th>
                      
                      </tr>
                    </thead>
                    <tbody>

                    <?php
					
$query=mysqli_query($Wooden_AuraConnection,"select * from purchase left join material_supplier on purchase.supplier = material_supplier.supplier_id ")or die(mysqli_error());
while($row=mysqli_fetch_array($query)){
 
?>
                      <tr>
                           
                    <td><?php echo $row['date_added'];?></td>
                    
              
                    <td><?php echo $row['supplier_name'];?></td>
                    <td><?php echo $row['total'];?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
               
                  
              

                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();"  ><i class="fa fa-print"></i> </a></div>
       
                
            </section>
            
 
    </main>

    <?php include('footer.php');?>
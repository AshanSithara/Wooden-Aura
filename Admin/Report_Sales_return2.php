<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
    <main class="app-content">
   
     
     



      <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Sales Return Report        </a></li>
        </ul>
      </div>



      <div class="row">
 


 
        
            <br/>
            <div class="col-md-12">
          <div class="tile">
            <section>
              
                 
               <p> WOODEN Aura | SALES RETURN REPORT</p>
               
              <?php echo date("Y/m/d")  ?>
              </h2>

                  <table class="table">
                    <thead>
                      <tr>
                      <th> Return Date    </th>
                      <th> Customer Name  </th>
                      <th>   Product Name</th>
                      <th> Sale Quantity    </th>
                      <th> Return Quantity    </th>
                      <th> Available Quantity    </th>
                   
					
                      </tr>
                    </thead>
                    <tbody>

                    <?php
					
$query=mysqli_query($Wooden_AuraConnection,"SELECT * FROM return_details join salesbackup on salesbackup.requested_id=return_details.requested_id ")or die(mysqli_error());
while($row=mysqli_fetch_array($query)){
 
?>
                      <tr>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['customer_name'];?></td>
                        <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['qty'];?></td>
                        <td><?php echo $row['return_qty'];?></td>
                        <td><?php echo $row['qty']-$row['return_qty'];?></td>
                   

				   
				   
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
               
                  
              

                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();"  ><i class="fa fa-print"></i> </a></div>
       
                
            </section>
            
 
    </main>

    <?php include('footer.php');?>
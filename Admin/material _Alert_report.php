<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
    <main class="app-content">
   
    


 

      <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Material Report        </a></li>
        </ul>
      </div>


 
      <div class="row">
 


 
        
 <br/>
            <div class="col-md-12">
          <div class="tile">
            <section>
              
                 
               <p> WOODEN Aura | LOW MATERIAL REPORT</p>
               
              <?php echo date("Y/m/d")  ?>
              </h2>

                  <table class="table">
                    <thead>
                      <tr>
                      
                    <th>    Material Serial </th>
                    <th> Material Name    </th>
                    <th> Material Price    </th>
                    <th>    Material QTY </th>
                    <th>    Minimum QTY </th>
					  
                      </tr>
                    </thead>
                    <tbody>

                    <?php
					
 

  
$query=mysqli_query($Wooden_AuraConnection,"select * from material  where minimum_qty > material_qty")or die(mysqli_error());
while($row=mysqli_fetch_array($query)){
 
?>
                      <tr>
                           
                      <td><?php echo $row['material_serial'];?></td>
                    <td><?php echo $row['material_name'];?></td>
                   
  
                    <td><?php echo $row['material_price'];?></td>
                    <td><?php echo $row['material_qty'];?></td>
                    <td><?php echo $row['minimum_qty'];?></td>
					    
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
               
                  
              

                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();"  ><i class="fa fa-print"></i> </a></div>
       
                
            </section>
            
 
    </main>

    <?php include('footer.php');?>
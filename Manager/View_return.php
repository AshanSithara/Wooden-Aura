<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
<main class="app-content">
<div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > item       </a></li>
        </ul>
      </div>



      <div class="row">
 <div class="col-md-12">

 <div class="tile">
            <div class="tile-body">
            
              <table class="table table-hover table-bordered" id="sampleTable">
              <a  href="Save_return.php" class="btn btn-success float-right">
                    ADD Return 
            </a> 
                <thead>
                  <tr>
                    <th> Product Name </th>
                    <th> Qty </th>
                    <th> Customer Name    </th>
        
                   
                    
                    
                      
                  </tr>
                </thead>
                <tbody>

 <?php $query=mysqli_query($Wooden_AuraConnection,"select * from return_details ")or die(mysqli_error());
  while($row=mysqli_fetch_array($query)){

?>
                  <tr>
                    

                    <td><?php echo $row['prod_name'];?></td>
                    <td><?php echo $row['return_qty'];?></td>
                    <td><?php echo $row['customer_name'];?></td>
 
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
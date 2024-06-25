<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
<main class="app-content">
 

      <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Sales Ivoices       </a></li>
        </ul>
      </div>



      <div class="row">
 <div class="col-md-12">

 <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Sold Date    </th>
                    <th>      Total</th>
                    <th> Discount    </th>
                    <th>   Net  </th>
                    
                    <th>Manage</th>   
                  </tr>
                </thead>
                <tbody>

 <?php $query=mysqli_query($Wooden_AuraConnection,"select * from sales ")or die(mysqli_error());
  while($row=mysqli_fetch_array($query)){

?>
                  <tr>
                    <td><?php echo $row['date_added'];?></td>
                    <td><?php echo $row['total'];?></td>
					                  
                    <td><?php echo $row['discount'];?></td>

                  <td><?php echo $row['balance'];?></td>
                   

                    <td>     


                    <a href="Customer_Invocie.php?Gotid=<?php echo $row['sales_id']; ?>"  class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-lg fa-print"></i></a>
                
                        
 
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
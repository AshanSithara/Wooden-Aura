<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
<main class="app-content">
 

      <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Production History Invoices       </a></li>
        </ul>
      </div>



      <div class="row">
 <div class="col-md-12">

 <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Produced Date    </th>
                   
                    <th> Produced Product    </th>
                    <th>   Qty_Produced  Produced </th>
                     <th>     Production Cost</th>
                    <th>Print</th>   
                  </tr>
                </thead>
                <tbody>

 <?php $query=mysqli_query($Wooden_AuraConnection,"select * from production left join item  on production.item_id = item.prod_id ")or die(mysqli_error());
  while($row=mysqli_fetch_array($query)){

?>
                  <tr>
                    <td><?php echo $row['date_added'];?></td>
					  <td><?php echo $row['serial'];?> - <?php echo $row['prod_name'];?> </td>
                    <td><?php echo $row['made_qty'];?></td>
					                  
                    <td><?php echo $row['total'];?></td>

                
                   

                    <td>     


                    <a href="Production_Invoice.php?Gotid=<?php echo $row['production_id']; ?>"  class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-lg fa-print"></i></a>
                
                        
 
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
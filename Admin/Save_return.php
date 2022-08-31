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
                <thead>
                  <tr>
                    <th> Product Name </th>
                    <th> Customer Name </th>
                    <th> Product Price     </th>
                    <th> Product Qty    </th>
                    
                    
                    <th>Manage</th>   
                  </tr>
                </thead>
                <tbody>

 <?php $query=mysqli_query($Wooden_AuraConnection,"select * from sales left join customer on sales.customer_id = customer.customer_id JOIN salesdetails on sales.sales_id = salesdetails.Requested_id JOIN item on item.prod_id = salesdetails.prod_id")or die(mysqli_error());
  while($row=mysqli_fetch_array($query)){

?>
                  <tr>
                    

                    <td><?php echo $row['prod_name'];?></td>
                    <td><?php echo $row['customer_name'];?></td>
                    <td><?php echo $row['prod_price'];?></td>
                    <td><?php echo $row['qty'];?></td>
                   
                   
                    
            
                  

                    <td>     


                    <a href="Update_SaleReturn.php?id=<?php echo $row['request_id']; ?>"  class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-lg fa-edit"></i></a>
                
                  
                                          
 
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
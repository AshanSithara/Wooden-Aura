<?php include('header.php');  include('Wooden_Aura.php');   ?>

  
 
    <main class="app-content">
   
     
     
  <form class="row"  method="post" enctype='multipart/form-data'>
    <div class="form-group col-md-6">
                  <label class="control-label">Customer Purchases more than  </label>
                  <input class="form-control" type="text"  name="search_stockID"  >
                   

                
                
              </br>
              <button class="btn btn-primary" type="submit" name="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Search  </button>
       
            </div>
</form>


      <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > SALES Report        </a></li>
        </ul>
      </div>



      <div class="row">
 


 
        
 <br/>
            <div class="col-md-12">
          <div class="tile">
            <section>
              
                 
               <p> WOODEN Aura | SALES REPORT</p>
               
              <?php echo date("Y/m/d")  ?>
              </h2>

                  <table class="table">
                    <thead>
                      <tr>
                       
                    <th>      Customer Name</th>
                    <th> Discount    </th>
                    <th>   Net Payment  </th>
                      </tr>
                    </thead>
                    <tbody>

                    
                    <?php
					
//connect search button
if(isset($_POST['submit'])) 
{ 

  

  //connect input
  $search_stockID = $_POST['search_stockID']; 

//   $cx=mysqli_query($Wooden_AuraConnection,"SELECT * FROM sales join customer on customer.customer_id=sales.customer_id where customer.customer_name = $search_stockID")or die(mysqli_error());
// $cx=mysqli_num_rows($cx);

  

$query=mysqli_query($Wooden_AuraConnection,"SELECT * FROM salesdetails join sales on salesdetails.requested_id = sales.sales_id join customer on sales.customer_id = customer.customer_id where  salesdetails.qty > '$search_stockID' ")or die(mysqli_error());
while($row=mysqli_fetch_array($query)){

?>
                   
                      <tr>
                      
                    <td><?php echo $row['customer_name'];?></td>
                    <td><?php echo $row['total'];?></td>
                    <td><?php echo $row['customer_contact'];?></td>
                    
                   
                      </tr>
                      <?php } }?>
                      
                    </tbody>
                  </table>
               
                  
              

                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();"  ><i class="fa fa-print"></i> </a></div>
       
                
            </section>
            
 
    </main>

    <?php include('footer.php');?>
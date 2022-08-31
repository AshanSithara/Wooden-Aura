<?php include('header.php');  include('Wooden_Aura.php');   ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main class="app-content">

        
                       <script>

$(document).ready(function(){
  $("#but").click(function(){
  var str = $("#myInput").val();
  $("#myval").val(str)

  });
});
</script>

    <form class="row"  method="post" enctype='multipart/form-data'>
    <div class="form-group col-md-6">
                  <label class="control-label">Payment Code  </label>
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
          <li class="breadcrumb-item"><a > Payment Report </a></li>
        </ul>
      </div>

      
        
 
      <div class="row">
      
 


 
        
 <br/>
            <div class="col-md-12">
          <div class="tile">
            <section>
              
                  
               <p> WOODEN Aura | Payment REPORT</p>

               

               
              <?php echo date("Y/m/d")  ?>
              <?php $row['search_stockID'];  ?>
              </h2>

                  <table class="table">
                    <thead>
                      <tr>
                        <th> Payment Code    </th>
                       <th> Date Of Payment  </th>
                        <th>    Supplier Name</th>
                    <th>    Material Name</th>
                    <th> Material Price    </th>
                    <th> Quantity    </th>
                    <th> Total    </th>
                   
                      </tr>
                    </thead>
                    <tbody>

                    <?php
					
//connect search button
if(isset($_POST['submit'])) 
{ 

  

  //connect input
  $search_stockID = $_POST['search_stockID']; 

  $query1 = mysqli_query($Wooden_AuraConnection,"select * from supplier_payment where serial='$search_stockID'")or die(mysqli_error($Wooden_AuraConnection));
  $row=mysqli_fetch_array($query1);

  $supllier_name =$row['supplier_name'];
  

$query=mysqli_query($Wooden_AuraConnection,"SELECT * FROM purchaseetails join supplier_payment on supplier_payment.requested_id = purchaseetails.Requested_id join material on purchaseetails.material_id=material.material_id where  supplier_payment.serial = '$search_stockID' ")or die(mysqli_error());
while($row=mysqli_fetch_array($query)){

?>
                   
                      <tr>
                      <td><?php echo $row['serial'];?></td>     
                     <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['supplier_name'];?></td>
                    <td><?php echo $row['material_name'];?></td>
                    <td><?php echo $row['material_price'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo  $row['qty'] * $row['price'];?></td>
                   
                      </tr>
                      <?php } }?>
                      
                    </tbody>
                  </table>

                  
               <script>

                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();"  ><i class="fa fa-print"></i> </a></div>
       
                
            </section>

            
            
 
    </main>

    <?php include('footer.php');?>
<?php include('header.php');  include('Wooden_Aura.php');   ?>
<script type="text/javascript" src="../AdminSources/chart/chart.js"></script>
<script src="../AdminSources/chart/highcharts.js"></script>
<script src="../AdminSources/chart/exporting.js"></script>
    <script src="../AdminSources/docs/js/main.js"></script>



    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


    
    <main class="app-content">



    <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Dashboard        </a></li>
        </ul>
      </div>







  <br/> <br/>

      <div class="row">
 


      <!-- Material Count -->
 <?php
$material=mysqli_query($Wooden_AuraConnection,"SELECT * FROM material")or die(mysqli_error());
$material=mysqli_num_rows($material);

?>
       <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon" >   <a href="Report_material.php"> <i class="icon fa fa-connectdevelop  fa-3x"></i> </a>
            <div class="info">
              <h4>Material</h4>
              <p><b><?php echo  "$material";?></b></p>
            </div>
          </div>
        </div>

      <!-- Item Count -->
        <?php
$item=mysqli_query($Wooden_AuraConnection,"SELECT * FROM item")or die(mysqli_error());
$item=mysqli_num_rows($item);

?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><a href="Report_All_Stock.php"> <i class="icon fa fa-google-wallet fa-3x"></i> </a>
            <div class="info">
              <h4>Wood Products</h4>
              <p><b><?php echo  "$item";?></b></p>
            </div>
          </div>
        </div>
      
      
        <!-- supplier count  -->

        <?php
$material_supplier=mysqli_query($Wooden_AuraConnection,"SELECT * FROM material_supplier")or die(mysqli_error());
$material_supplier=mysqli_num_rows($material_supplier);

?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><a href="Report_supplier_Details.php"> <i class="icon fa fa-truck fa-3x"></i></i> </a>
            <div class="info">
            <h4>Material Supplier</h4>
            <p><b><?php echo  "$material_supplier";?></b></p>
              
            </div>
          </div>
        </div>


        <!-- Item Catogory count -->
        <?php
$item_category=mysqli_query($Wooden_AuraConnection,"SELECT * FROM item_category")or die(mysqli_error());
$item_category=mysqli_num_rows($item_category);

?>

        <div class="col-md-6 col-lg-3">
                    <div class="widget-small  coloured-icon" style="color: black; background-color: white;">
                    <a href="Report_Category.php" style="background-color: #4E4E4E;">
            <i class="icon fa fa-stack-overflow fa-3x" style="color: white;"></i> 

          </a>
            <div class="info">
              <h4>item category</h4>
              <p><b><?php echo  "$item_category";?></b></p>
            </div>
          </div>
        </div>
  

      <!-- Low stock Count -->
        <?php
$low=mysqli_query($Wooden_AuraConnection,"select * from item left join item_category on item.cat_id = item_category.cat_id  where prod_qty < ms")or die(mysqli_error());
$low=mysqli_num_rows($low);

?>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small  coloured-icon" style="color: black; background-color: white;">
          <a href="stock%20_Alert_report.php" style="background-color: 7C0D0E;">
           <i class="icon fa fa-exclamation-triangle" style="color: white;"></i> 
          </a>
            <div class="info">
              <h4>Production LOW STOCK  </h4>
              <p><b><?php echo  "$low";?></b></p>
            </div>
          </div>
        </div>


        <!-- Low Material Count -->
        <?php
$low=mysqli_query($Wooden_AuraConnection,"select * from material  where minimum_qty > material_qty")or die(mysqli_error());
$low=mysqli_num_rows($low);

?>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small  coloured-icon" style="color: black; background-color: white;">
          <a href="material%20_Alert_report.php" style="background-color: RED;">
          <i class="icon fa fa-exclamation-triangle" style="color: white;">
          </i> 
        </a>
            
            
            <div class="info">
              <h4>Material LOW STOCK  </h4>
              <p><b><?php echo  "$low";?></b></p>
            </div>
          </div>
        </div>
       
        <!-- Pending Payment -->

        <?php
$low=mysqli_query($Wooden_AuraConnection,"select * from payment_hold  join payment_backup on payment_hold.requested_id = payment_backup.requested_id join material_supplier on material_supplier.supplier_id = payment_hold.supplier")or die(mysqli_error());
$low=mysqli_num_rows($low);

?>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small  coloured-icon" style="color: black; background-color: white;">
          <a href="Pending_Payment.php" style="background-color: #000080;"> 
            <i class="icon fa fa-spinner fa-3x" style="color: white;">
          </i>
             </a>
            <div class="info">
              <h4>Pending  Payment </h4>
              <p><b><?php echo  "$low";?></b></p>
            </div>
          </div>
        </div>

      <!-- Sales Return -->
        
        <?php
$low=mysqli_query($Wooden_AuraConnection,"select * from return_details")or die(mysqli_error());
$low=mysqli_num_rows($low);

?>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small  coloured-icon" style="color: black; background-color: white;">
          <a href="#" style="background-color: #006400;"> 
            <i class="icon fa fa-recycle fa-3x" style="color: white;"></i>
             </a>
            <div class="info">
              <h4>Sales Return </h4>
              <p><b><?php echo  "$low";?></b></p>
            </div>
          </div>
        </div>
      
        </div>

        <div class="col-md-6 col-lg-12">
        <div class="widget-small warning coloured-icon" >
            <div class="info"> 

  
            
 <?php 
$result=mysqli_query($Wooden_AuraConnection,"SELECT date_added,sum(total) as total FROM sales group by date_added")or die(mysqli_error());
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ date_added:'".$row["date_added"]."', total:".$row["total"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
 
 
  <br /><br />
  <div class="container" style="width:900px;">
   <h3 align="center">SALES TREND  </h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date_added',
 ykeys:['total'],
 labels:['Sold Rs:'],
 hideHover:'auto',
 stacked:true
});
</script>


   
            </div>
          </div>
        </div>









      </div>
    </main>




 
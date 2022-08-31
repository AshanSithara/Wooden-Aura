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
                    <th> Item Code  </th>
                    <th>    Item Name</th>
                    <th> item_category    </th>
                    <th> Price    </th>
                    <th>    Left Qty  </th>
                    <th>    Mimum Stock    </th>
                       
                  </tr>
                </thead>
                <tbody>

 <?php $query=mysqli_query($Wooden_AuraConnection,"select * from item left join item_category on item.cat_id = item_category.cat_id   ")or die(mysqli_error());
  while($row=mysqli_fetch_array($query)){

?>
                  <tr>
                    <td><?php echo $row['serial'];?></td>
                    <td><?php echo $row['prod_name'];?></td>
                    <td><?php echo $row['cat_name'];?></td>
  
                    <td><?php echo $row['prod_price'];?></td>
                    <td><?php echo $row['prod_qty'];?></td>
                    <td><?php echo $row['ms'];?></td>
            
                  

                   
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
<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
<main class="app-content">
<div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-material"> </li>
          <li class="breadcrumb-material"><a > material       </a></li>
        </ul>
      </div>



      <div class="row">
 <div class="col-md-12">

 <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th> material Code  </th>
                    <th>    material Name</th>
                    <th> material price   </th>
                    <th> Minimum Quantity    </th>
                    <th> Material Quantity    </th>
                  
                    <th>Manage</th>   
                  </tr>
                </thead>
                <tbody>

 <?php $query=mysqli_query($Wooden_AuraConnection,"select * from material   ")or die(mysqli_error());
  while($row=mysqli_fetch_array($query)){

?>
                  <tr>
                    <td><?php echo $row['material_serial'];?></td>
                    <td><?php echo $row['material_name'];?></td>
             
  
                    <td><?php echo $row['material_price'];?></td>
                    <td><?php echo $row['minimum_qty'];?></td>
                    <td><?php echo $row['material_qty'];?></td>

            
                  

                    <td>     


                    <a href="Update_Material.php?id=<?php echo $row['material_id']; ?>"  class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-lg fa-edit"></i></a>
                
                    <a href="Delete_Material.php?id=<?php echo $row['material_id']; ?>" 
                 onclick="return confirm('Are you sure to Delete?')"  class="btn btn-danger btn-sm"  ><i class="fa fa-lg fa-trash"></i></a> 
                                          
 
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
<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
<main class="app-content">
    
 
     
      <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Martial  Suppliers    </a></li>
        </ul>
      </div>





      <div class="row">
 <div class="col-md-12">

 <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th> Supplier Name    </th>
					                  <th> Supplier Address    </th>
									                    <th> Supplier Contact    </th>
                                      <th> Supplier Nic    </th>
                    <th>Manage</th>   
                  </tr>
                </thead>
                <tbody>

 <?php $query=mysqli_query($Wooden_AuraConnection,"select * from material_supplier  ")or die(mysqli_error());
  while($row=mysqli_fetch_array($query)){

?>
                  <tr>
             
                    <td><?php echo $row['supplier_name'];?></td>
             
                <td><?php echo $row['supplier_address'];?></td>        
				<td><?php echo $row['supplier_contact'];?></td>
        <td><?php echo $row['supplier_nic'];?></td>

                    <td>     
                    <a href="Update_Supplier.php?id=<?php echo $row['supplier_id']; ?>"  class="btn btn-info btn-sm" name="btn_edit"><i class="fa fa-lg fa-edit"></i></a>
                
                    <a href="Delete_Supplier.php?id=<?php echo $row['supplier_id']; ?>" 
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
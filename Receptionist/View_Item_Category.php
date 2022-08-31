<?php include('header.php');  include('Wooden_Aura.php');   ?>
 
<main class="app-content">
     

      <div class="app-title">
        <div>
        <h1 >  <a class="fa fa-home" href="Dashborad.php"> </a>  </h1>
       
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> </li>
          <li class="breadcrumb-item"><a > Item  Category    </a></li>
        </ul>
      </div>




      <div class="row">
 <div class="col-md-12">

 <div class="tile">
            <div class="tile-body">

              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th> Category Code  </th>
                    <th>   Category Name</th>
                    <th>   Category Note</th>
                      
                  </tr>
                </thead>
                <tbody>

 <?php $query=mysqli_query($Wooden_AuraConnection,"select * from item_category ")or die(mysqli_error());
  while($row=mysqli_fetch_array($query)){

?>
                  <tr>
                    <td><?php echo $row['cat_code'];?></td>
                    <td><?php echo $row['cat_name'];?></td>
                
                    <td><?php echo $row['cat_note'];?></td>
            


                       


                                      
 
                
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
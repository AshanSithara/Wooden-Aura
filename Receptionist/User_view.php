<?php include('header.php');  include('Wooden_Aura.php');   ?>
<main class="app-content">

<!-- USER Tittle and Header Area -->
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user"></i> System User</h1>
         
        </div>
        <!-- <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul> -->
      </div>


     


      <div class="row">
 <div class="col-md-12">
      <div class="row">
 <div class="col-md-12">

 <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th> Employee Name    </th>
                    
                    <th> Employee Contact </th>
                    <th> Job Category</th>   
                  
                  </tr>
                </thead>
                <tbody>

 <?php $query=mysqli_query($Wooden_AuraConnection, "SELECT * FROM employee ")or die(mysqli_error());
  while ($row=mysqli_fetch_array($query)) {
      ?>
                  <tr>
                    <td><?php echo $row['name']; ?></td>
                   
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['job']; ?></td>
                   
                       
 
                </tr>
                  </tr>

                  <?php
  } ?>             
                </tbody>
              </table>
            </div>
          </div>
        </div>

       

         
        </div>
      </div>
    </main>

    <?php include('footer.php');?>
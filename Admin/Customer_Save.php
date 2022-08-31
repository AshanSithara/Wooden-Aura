<?php include('header.php');  include('Wooden_Aura.php');   ?>
<?php 
        if(isset($_POST['submit'])){ // connect to button
             // define veriables
              $customer_name = $_POST['customer_name'];	
              $customer_address = $_POST['customer_address'];  
              $customer_contact = $_POST['customer_contact'];	
              $customer_email = $_POST['customer_email'];
              

          // check for existing data
            $readAction = mysqli_query($Wooden_AuraConnection,"SELECT customer_contact FROM customer WHERE customer_contact='$customer_contact'")or die(mysqli_error($Wooden_AuraConnection));
            $category=mysqli_num_rows($readAction);  
            if ($category > 0)
            {   echo '<script type="text/javascript">
              swal("Not Saved!", "Phone Number Already Taken" , "error");
                </script>';
                }
              else
              {



              // save new data
              // $pic = $_FILES["image"]["name"]; // to save product image
              // if ($pic=="")
              // {
              //     $pic="default.gif";
              // }
              // else
              // {
              //     $pic = $_FILES["image"]["name"];
              //     $type = $_FILES["image"]["type"];
              //     $size = $_FILES["image"]["size"];
              //     $temp = $_FILES["image"]["tmp_name"];
              //     $error = $_FILES["image"]["error"];
              
              //     if ($error > 0){
              //         die("Error uploading file! Code $error.");
              //         }
              //     else{
              //         if($size > 100000000000) //conditions for the file
              //             {
              //             die("Format is not allowed or file size is too big!");
                          
              //             }
              //     else
              //           {
              //         move_uploaded_file($temp, "../AdminSources//".$pic);
              //           }
              //         } 
              // }	
          
              mysqli_query($Wooden_AuraConnection,"INSERT INTO customer(customer_name,customer_address,customer_contact,customer_email)
              VALUES('$customer_name',' $customer_address','$customer_contact','$customer_email')")or die(mysqli_error($Wooden_AuraConnection));
          
          
 
          
          echo '<script type="text/javascript">
          swal("Saved!", "User  Successfully Saved" , "success");
            </script>';
                }
          
            }
          

          
          ?>

   
        
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user"></i> Save Customer</h1>
         
        </div>
        <!-- <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul> -->
      </div>



      <div class="row">
 <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">
              <form  method="post" method="post" enctype='multipart/form-data'>
                

                <div class="form-group">
                  <label class="control-label"> Customer Name</label>
                  <input class="form-control" type="text" placeholder="Staff Name" name="customer_name" required required pattern="[A-Za-z. ]+">
                </div>

                <div class="form-group">
                  <label class="control-label">Customer Address   </label>
                  <input class="form-control" type="text" placeholder="Contact Address" name="customer_address" required>
                </div>
               
                

                <div class="form-group">
                  <label class="control-label">Customer Contact Number    </label>
                  <input class="form-control" type="number" placeholder="Contact Number" name="customer_contact" onkeypress="return isNumberKey(evt)" onchange="phonenumber()" id="txtTell"  required>
                </div>
                


                <div class="form-group">
                  <label class="control-label">  Customer Email</label>
                  <input class="form-control" type="text" placeholder="Email" name="customer_email" onchange="ValidateEmail(customer_email)" id="txtEmail" required>
                </div>
                



            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save User</button>
              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="User_Save.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>

            </form>

          </div>
        </div>


      </div>
    </main>

    <?php include('footer.php');?>
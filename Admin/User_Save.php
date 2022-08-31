<?php include('header.php');  include('Wooden_Aura.php');   ?>
<?php 
        if(isset($_POST['submit'])){ // connect to button
             // define veriables
              $Name = $_POST['Name'];	
              $Job = $_POST['Job'];  
              $contact = $_POST['contact'];	
              $Email = $_POST['Email'];
              $Password = md5($_POST['Password']);	//password input encripted
              $nic = $_POST['nic'];	
             


          // check for existing data
            $readAction = mysqli_query($Wooden_AuraConnection,"SELECT Email FROM employee WHERE Email='$Email'")or die(mysqli_error($Wooden_AuraConnection));
            $category=mysqli_num_rows($readAction);  
            if ($category > 0)
            {   echo '<script type="text/javascript">
              swal("Not Saved!", "Email Already Taken" , "error");
                </script>';
                }
              else
              {



              // save new data
              $pic = $_FILES["image"]["name"]; // to save product image
              if ($pic=="")
              {
                  $pic="default.gif";
              }
              else
              {
                  $pic = $_FILES["image"]["name"];
                  $type = $_FILES["image"]["type"];
                  $size = $_FILES["image"]["size"];
                  $temp = $_FILES["image"]["tmp_name"];
                  $error = $_FILES["image"]["error"];
              
                  if ($error > 0){
                      die("Error uploading file! Code $error.");
                      }
                  else{
                      if($size > 100000000000) //conditions for the file
                          {
                          die("Format is not allowed or file size is too big!");
                          
                          }
                  else
                        {
                      move_uploaded_file($temp, "../AdminSources//".$pic);
                        }
                      } 
              }	
          
              mysqli_query($Wooden_AuraConnection,"INSERT INTO employee(name,Job,contact,Email,Password,nic,photo)
              VALUES('$Name','$Job','$contact','$Email','$Password','$nic','$pic')")or die(mysqli_error($Wooden_AuraConnection));
          
          
 
          
          echo '<script type="text/javascript">
          swal("Saved!", "User  Successfully Saved" , "success");
            </script>';
                }
          
            }
          

          
          ?>

        
    <main class="app-content">
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
          <div class="tile">
          
            <div class="tile-body">
              <form  method="post" method="post" enctype='multipart/form-data' name="form1">
                

                <div class="form-group">
                  <label class="control-label">  Name</label>
                  <input class="form-control" type="text" placeholder="Staff Name" name="Name" required pattern="[A-Za-z. ]+">
                </div>


                <div class="form-group">
                  <label class="control-label">    User Role</label>
                  <select class="form-control select2" style="width: 100%;" name="Job" required required>
               <option selected disabled> Select</option> 
        
                  <option value="admin"  > Admin</option>
                  <option value="carpenter"  > Carpenter  </option>
                  <option value="manager"  > Manager</option>
                  <option value="receptionist"  >  Receptionist</option>
                  <option value="accountant"  >  Accountant</option>
          
              </select>
                </div>
                




                <div class="form-group">
                  <label class="control-label">Contact Number    </label>
                  <input class="form-control" type="number" placeholder="Contact Number" name="contact" onkeypress="return isNumberKey(evt)" onchange="phonenumber()" id="txtTell"  required>
                </div>
                




                <div class="form-group">
                  <label class="control-label">   Email</label>
                  <input class="form-control" type="text" placeholder="Email" name="Email"  onchange="ValidateEmail(Email)"   id="txtEmail" required>
                </div>
                

                <div class="form-group">
                  <label class="control-label">   Password</label>
                  <input class="form-control" type="text" placeholder="Password" name="Password" required>
                </div>
                
                <div class="form-group">
                  <label class="control-label">NIC    </label>
                  <input type="text" class="form-control" type="text"   name="nic"   onchange="nicnumber()"   id="txtNIC"  required >
                </div>

                </div>

                <div class="form-group">
                  <label class="control-label"> Photo  </label>
                  <input class="form-control" type="file"   name="image" required>
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
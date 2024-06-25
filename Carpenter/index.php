<?php include('header_login.php');  include('Wooden_Aura.php');   ?>

<div class="row"> <img src="../AdminSources/carousel.gif" width="380" height="390" alt="User Image"  >


 <div class="col-md-6">

 


      <div class="login-box"> 
        <form class="login-form" method="post">
         
         <h3>  <p style="color:#FF0000";> WOODEN Aura   </p>   </h3>

         

         <br/>
 
      <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Email" value="admin@gmail.com" autofocus name="username">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" value="admin@gmail.com"  name="password">
          </div>
           
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="login"><i class="fa fa-check-circle fa-lg fa-fw"></i>LOGIN  </button>
            <button class="btn btn-warning btn-block" type="reset" name="login"><i class="fa fa-circle-o-notch fa-lg fa-fw"></i>Clear  </button>
          </div>
        </form>
        
      </div>
      </div>   

 
 
  
      <?php 
 
 
if(isset($_POST['login'])){
 
$username=$_POST['username'];
$password=MD5($_POST['password']);
$query=mysqli_query($Wooden_AuraConnection,"select * from employee where Email='$username' and password='$password'")or die(mysqli_error($Wooden_AuraConnection));
$row=mysqli_fetch_array($query); // get user realted data
$counter=mysqli_num_rows($query); // check for valid login [correct username and password]
	
$userid=$row['id'];  
$StaffName=$row['Name'];  
$UserRole =$row['Job'];  

  	if ($counter == 0)  // username or password not found as input
	  {	

 // no Account fond with input 
    echo '<script type="text/javascript">
    jQuery(function validation(){
    swal("Invalid Login", "Please try again!", "warning", {
    button: "Ok",
        });
    });
    </script>';

    }
    if ($counter > 0)  // valid login
    {	

                       if ($UserRole == 'Admin') //user Role check

                       {
                        session_start();
                        $_SESSION['userid']=$userid;	 
                        $_SESSION['StaffName']=$StaffName;	
                        $_SESSION['UserRole']=$UserRole;	

                       
                        echo '<script type="text/javascript">
                        swal("Success", "Admin Successfully logged" , "success");
                          </script>';

                          echo '<script>
                                   setTimeout(function(){
                                      window.location.href = "dashborad.php";
                                   }, 2000);
                                </script>';

                        }


                        if ($UserRole == 'FrontDesk') //user Role check

                        {
                         session_start();
                         $_SESSION['userid']=$userid;	 
                         $_SESSION['StaffName']=$StaffName;	
                         $_SESSION['UserRole']=$UserRole;	
 
                        
                         echo '<script type="text/javascript">
                         swal("Success", "Front Desk Successfully logged" , "success");
                           </script>';
 
                           echo '<script>
                                    setTimeout(function(){
                                       window.location.href = "../FrontDesk/dashborad.php";
                                    }, 2000);
                                 </script>';
 
                         }
                       
                

                

                       }
                     


                       if ($counter == 0)  // valid login
                       {

                 
                       
                         echo '<script type="text/javascript">
                         swal("Invalid", "Login invalid.Try Again" , "error");
                           </script>';
                      
 

                       }
 
 
}	 
?>


      <?php // include('footer_login.php');   ?>
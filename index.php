<?php include('header_login.php');  include('Admin/Wooden_Aura.php');   ?>


<style type="text/css">
  
::placeholder {
  color: #B2BEB5;
  opacity: 1; 

}


</style>

<!-- <div class="row"> <img src="AdminSources/carousel.gif" width="380" height="390" alt="User Image"  > -->

<!-- <div class="row">
<div class="col-md-4"></div> 
<div class="col-md-5"></div>
 <div class="col-md-3 " > -->

<!--     <div class="login-box"> 
        <form class="login-form" method="post">
         
         <h3>  <p style="color:#FF0000";> WOODEN Aura   </p>   </h3>
         <br/>
 
      <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Email"  autofocus name="username">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password"   name="password">
          </div>
           
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="login"><i class="fa fa-check-circle fa-lg fa-fw"></i>LOGIN  </button>
            <button class="btn btn-warning btn-block" type="reset" name="login"><i class="fa fa-circle-o-notch fa-lg fa-fw"></i>Clear  </button>
          </div>
        </form>
        
    </div>
 -->
<div class="login-box" >
  <h1 style="color: #D2AC47;">Login</h1>

  <form class="login-form" method="post">
  <div class="textbox">
    <i class="fas fa-user" style="color: #D2AC47;"></i>
    <input type="text" placeholder="Email"  name="username" style="color: #D2AC47; background: none;">
  </div>

  <div class="textbox">
    <i class="fas fa-lock" style="color: #D2AC47;"></i>
    <input type="password" placeholder="Password" name="password" style="color: #D2AC47;">
  </div>


          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="login" style="color: #D2AC47;"><i class="fa fa-check-circle fa-lg fa-fw" style="color: #D2AC47;"></i>LOGIN  </button>
            <button class="btn btn-warning btn-block" type="reset" name="login" style="color: #D2AC47;"><i class="fa fa-circle-o-notch fa-lg fa-fw" style="color: #D2AC47;"></i>Clear  </button>
          </div>
          </form>



</div>



<!--   </div> 
</div> -->
      <?php 
 
 
if(isset($_POST['login'])){
 
$username=$_POST['username'];
$password=MD5($_POST['password']);
$query=mysqli_query($Wooden_AuraConnection,"select * from employee where Email='$username' and password='$password'")or die(mysqli_error($Wooden_AuraConnection));
$row=mysqli_fetch_array($query); // get user realted data
$counter=mysqli_num_rows($query); // check for valid login [correct username and password]
	
$userid=$row['id'];  
$StaffName=$row['name'];  
$UserRole =$row['job'];  

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
                                      window.location.href = "Admin/dashborad.php";
                                   }, 2000);
                                </script>';

                        }


                        if ($UserRole == 'manager') //user Role check

                        {
                         session_start();
                         $_SESSION['userid']=$userid;	 
                         $_SESSION['StaffName']=$StaffName;	
                         $_SESSION['UserRole']=$UserRole;	
 
                        
                         echo '<script type="text/javascript">
                         swal("Success", "Manager Successfully logged" , "success");
                           </script>';
 
                           echo '<script>
                                    setTimeout(function(){
                                       window.location.href = "Manager/dashborad.php";
                                    }, 2000);
                                 </script>';
 
                         }
                       
                         
                        if ($UserRole == 'carpenter') //user Role check

                        {
                         session_start();
                         $_SESSION['userid']=$userid;	 
                         $_SESSION['StaffName']=$StaffName;	
                         $_SESSION['UserRole']=$UserRole;	
 
                        
                         echo '<script type="text/javascript">
                         swal("Success", "Carpenter Successfully logged" , "success");
                           </script>';
 
                           echo '<script>
                                    setTimeout(function(){
                                       window.location.href = "Carpenter/dashborad.php";
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
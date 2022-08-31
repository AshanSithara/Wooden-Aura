<?php include('Wooden_Aura.php');
session_start();
if(empty($_SESSION['userid'])):
header('Location:index.php');
endif;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title >WOODEN AURA</title>
    <link href="../AdminSources/favicon.ico" rel="icon" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../AdminSources/docs/css/main.css">
    <!-- Java Script file -->
	  <script type="text/javascript" src="../AdminSources/docs/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="../AdminSources/docs/js/validation.js"></script>
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
    <style type="text/css">
body {
   /*background-color: red;*/
  /* background-image: url("../AdminSources/bg2.jpg");
   background-repeat: no-repeat;
   background-size: cover;*/

}

</style>
  <body class="app sidebar-mini rtl" >
    <!-- Navbar-->
    <header class="app-header" style="background-color: black;" > <div style="background-color: black; width: 230px;"> <img   src="../AdminSources/wood.ico" style="width: 48px; height: 48px; margin-left: 80px; margin-top: 5px;"   > </div> 
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
       
   

        <!--Notification Menu-->
        <li class="dropdown"> 
          
        <?php 
    $userid = $_SESSION['userid'];
    $query=mysqli_query($Wooden_AuraConnection,"select * from employee where id = '$userid'  ")or die(mysqli_error());
  while($row=mysqli_fetch_array($query)){ ?>

 
     
        </li>
        <!-- User Menu-->
        <li  ><a class="app-nav__item" href="Dashborad.php"   >

       User  :  <?php echo $row['name'];?> |

        <img   class="app-sidebar__user-avatar" src="../AdminSources/<?php echo $row['photo'];?>" alt="User Image"  width="30" height="25"></a>


     
          <?php } ?>
        </li>
      </ul>
    </header>

 

    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar" ></div>
    <aside class="app-sidebar">
 

      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="Dashborad.php"><i class="app-menu__icon fa fa-server"></i><span class="app-menu__label">Dashboard</span></a></li>
  
         
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-calculator"></i><span class="app-menu__label">    Sales   </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="Save_Sale.php"><i class="icon fa fa-circle-o"></i>    New  Sales </a></li>
            <li><a class="treeview-item" href="View_Sales.php"><i class="icon fa fa-circle-o"></i>     Sales Invoices</a></li>
            <li><a class="treeview-item" href="View_return.php"><i class="icon fa fa-circle-o"></i>     Save Return</a></li>
          </ul>
        </li>

        

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-gamepad"></i><span class="app-menu__label">    Production        </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <!-- <li><a class="treeview-item" href="Save_Production.php"><i class="icon fa fa-circle-o"></i> New   Production        </a></li> -->
            <li><a class="treeview-item" href="View_Production.php"><i class="icon fa fa-circle-o"></i> Production    History      </a></li>
      
          </ul>
        </li> 


 <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-medium"></i><span class="app-menu__label"> Material Purchase       </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <!-- <li><a class="treeview-item" href="Save_Purchase.php"><i class="icon fa fa-circle-o"></i> New   Material Purchase     </a></li> -->
            <li><a class="treeview-item" href="View_Purchase.php"><i class="icon fa fa-circle-o"></i> Purchase   Invoices      </a></li>
      
          </ul>
        </li> 


  <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-bandcamp"></i><span class="app-menu__label">   Purchase  Order     </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="Save_PurchaseOrder.php"><i class="icon fa fa-circle-o"></i> Create Purchase  Order    </a></li>
            <li><a class="treeview-item" href="View_PurchaseOrder.php"><i class="icon fa fa-circle-o"></i> Purchase  Order History      </a></li>
      
          </ul>
        </li>  -->
		
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-bandcamp"></i><span class="app-menu__label">   Payment    </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
          <!-- <li><a class="treeview-item" href="Save_Payment.php"><i class="icon fa fa-circle-o"></i>  Make Payment Supplier </a></li> -->
            <!-- <li><a class="treeview-item" href="View_payment.php"><i class="icon fa fa-circle-o"></i> Payment History </a></li> -->
      
          </ul>

 
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-google-wallet "></i><span class="app-menu__label">    wood Items   </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <!-- <li><a class="treeview-item" href="Save_item.php"><i class="icon fa fa-circle-o"></i>    New  Item </a></li> -->
            <li><a class="treeview-item" href="View_item.php"><i class="icon fa fa-circle-o"></i>     Item inventory  </a></li>
            
          </ul>
        </li>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-black-tie"></i><span class="app-menu__label"> Martial    Suppliers   </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <!-- <li><a class="treeview-item" href="Save_Supplier.php"><i class="icon fa fa-circle-o"></i>  Add    Supplier </a></li> -->
            <li><a class="treeview-item" href="View_Supplier.php"><i class="icon fa fa-circle-o"></i> View    Suppliers </a></li>

           


          </ul>
        </li>
 
 
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-connectdevelop"></i><span class="app-menu__label">    Material       </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <!-- <li><a class="treeview-item" href="Save_material.php"><i class="icon fa fa-circle-o"></i> Add Material         </a></li> -->
            <li><a class="treeview-item" href="View_material.php"><i class="icon fa fa-circle-o"></i>       View Material    </a></li>
          </ul>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-500px "></i><span class="app-menu__label">  Item   Category  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <!-- <li><a class="treeview-item" href="Save_Item_Category.php"><i class="icon fa fa-circle-o"></i> New    Category</a></li> -->
            <li><a class="treeview-item" href="View_Item_Category.php"><i class="icon fa fa-circle-o"></i> All Categories  </a></li>
          </ul>
        </li>


    

       
		


        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-gg-circle "></i><span class="app-menu__label">  System Users    </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <!-- <li><a class="treeview-item" href="User_Save.php"><i class="icon fa fa-circle-o"></i> Add   Users     </a></li> -->
            <!-- <li><a class="treeview-item" href="User_view.php"><i class="icon fa fa-circle-o"></i> View  Users    </a></li> -->
          </ul>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-gg-circle "></i><span class="app-menu__label">   Customer    </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="Customer_Save.php"><i class="icon fa fa-circle-o"></i> Add   Customer     </a></li>
            <li><a class="treeview-item" href="Customer_View.php"><i class="icon fa fa-circle-o"></i> View  Customer    </a></li>
          </ul>
        </li>





        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-print"></i><span class="app-menu__label">  Reports    </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">

             <!-- <li><a class="treeview-item" href="Report_Pending_Payment.php"><i class="icon fa fa-circle-o"></i> Pending Payment Report     </a></li> -->
            <!-- <li><a class="treeview-item" href="material _Alert_report.php"><i class="icon fa fa-circle-o"></i> Material Low Stock       Report    </a></li> -->
            <li><a class="treeview-item" href="stock _Alert_report.php"><i class="icon fa fa-circle-o"></i> Production Low Stock       Report    </a></li>
            <!-- <li><a class="treeview-item" href="Report_Payment.php"><i class="icon fa fa-circle-o"></i>  Payment Details Report     </a></li> -->
            <li><a class="treeview-item" href="Report_Sales_return2.php"><i class="icon fa fa-circle-o"></i>  Return Details Report     </a></li>
            <!-- <li><a class="treeview-item" href="Report_Sales.php"><i class="icon fa fa-circle-o"></i> Sales   Report     </a></li> -->
            <!-- <li><a class="treeview-item" href="Report_purchase.php"><i class="icon fa fa-circle-o"></i>   Material Purchase Report    </a></li>
            <li><a class="treeview-item" href="Report_production.php"><i class="icon fa fa-circle-o"></i> Production   Report     </a></li> -->
            <li><a class="treeview-item" href="Report_Stock.php"><i class="icon fa fa-circle-o"></i> Item Stock       Report    </a></li>
            <!-- <li><a class="treeview-item" href="Report_material.php"><i class="icon fa fa-circle-o"></i> Material Stock       Report    </a></li> -->
 
          </ul>
        </li>




        <li><a class="app-menu__item" href="logout.php"><i class="app-menu__icon fa fa-power-off"></i><span class="app-menu__label">Logout</span></a></li>
       
       
      </ul>
    </aside>

    
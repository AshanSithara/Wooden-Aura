<?php include('header.php');  include('Wooden_Aura.php'); 
if(isset($_POST['submit'])){ 
  $supplier_name = $_POST['supplier_name']; 
  $supplier_address = $_POST['supplier_address']; 
	$supplier_contact = $_POST['supplier_contact'];
  $supplier_nic = $_POST['supplier_nic'];
  
        
  $readAction = mysqli_query($Wooden_AuraConnection,"SELECT supplier_contact FROM material_supplier WHERE supplier_contact='$supplier_contact'")or die(mysqli_error($Wooden_AuraConnection));
  $readAction=mysqli_num_rows($readAction);  
  if ($readAction > 0)
  {
    echo "<script> supplier_contact = " . json_encode($supplier_contact) . "</script>";
    echo '<script type="text/javascript">
    swal("Cant be Saved!", " " + supplier_contact + "  Number  Found" , "warning");
      </script>';
	  }
    else
	{

    mysqli_query($Wooden_AuraConnection,"INSERT INTO material_supplier(supplier_name,supplier_address,supplier_contact,supplier_nic) VALUES('$supplier_name','$supplier_address','$supplier_contact','$supplier_nic')")or die(mysqli_error($Wooden_AuraConnection));
    echo "<script> supplier_name = " . json_encode($supplier_name) . "</script>";
    echo '<script type="text/javascript">
    swal("Saved!", " " + supplier_name + "  Supplier   Successfully Saved  " , "success");
      </script>';
	  }

  }

 
?>
 
 

 <script>
	function phonenumber()
	{
		var phoneno = /^\d{10}$/;          
		if(document.getElementById("txtTell").value=="")
		{
		}
		else
		{
			if( document.getElementById("txtTell").value.match(phoneno))
			{
			
				hand();
			}
			else
			{
				alert("Enter 10 digit Mobile Number");
				document.getElementById("txtTell").value="";
				document.getElementById("txtTell").focus()=true;		
				return false;
			}
		}	 
	}
	function hand()
	{
		var str = document.getElementById("txtTell").value;
		var res = str.substring(0, 2);
		if(res=="07")
		{
			return true;
		}
		else
		{
				alert("Enter 10 digit of Mobile Number start with 07xxxxxxxx");
				document.getElementById("txtTell").value="";
				document.getElementById("txtTell").focus()=true;			
				return false;
		}
		
	}
	function nicnumber()
	{
		var nic=document.getElementById("txtNIC").value;
		if(nic.length==10)
		{
			var nicformat1=/^[0-9]{9}[a-zA-Z0-9]{1}$/;
			if(nic.match(nicformat1))
			{
				var nicformat2=/^[0-9]{9}[vVxX]{1}$/;
				if(nic.match(nicformat2))
				{
					calculatedob(nic);
				}
				else
				{
					alert("Last character must be V/v/X/x...!\nHint: 762042410V or 762042410X");
					document.getElementById("txtNIC").value="";
					document.getElementById("txtNIC").focus();
				
				}
			}
			else
			{
				alert("First 9 characters must be numbers...!");
				document.getElementById("txtNIC").value="";	
				document.getElementById("txtNIC").focus();
			
			}	
		}
		else if(nic.length==12)
		{
		
			var nicformat3=/^[0-9]{12}$/;
			if(nic.match(nicformat3))
				{
					calculatedob(nic);
				}
				else
				{
					alert("All 12 characters must be numbers...!");
					document.getElementById("txtNIC").value="";
					document.getElementById("txtNIC").focus();
				
				}
		}
		else if(nic.length==0)
		{
				
		}
		else
		{
			alert("NIC No must be contain 10 or 12 Characters...!\nRetype the correct NIC nuimber...\nHint: 762042410V or 200020424105");
			document.getElementById("txtNIC").value="";
			document.getElementById("txtNIC").focus();	
		
		}
	}

	function isNumberKey(evt) 
	{
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
			return false;

			return true;
	}

function isTextKey(evt) 
	{
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if (((charCode >64 && charCode < 91)||(charCode >96 && charCode < 123)||charCode ==08 || charCode ==127||charCode ==32||charCode ==46)&&(!(evt.ctrlKey&&(charCode==118||charCode==86))))
			return true;

			return false;
	}


function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{

document.form1.text1.focus();
return true;
}
else
{
alert("You have entered an invalid email address...!\nRetype the correct email address...\nHint:\n Some valid email formats are...\n a@b.cd, ab-cd@ef.gh, ab.cd@ef.ghi, abc_def@mail.com");    
document.getElementById("txtEmail").value="";
document.form1.text1.focus();
return false;
}
}


    </script>
 

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
              <form class="row"  method="post" enctype='multipart/form-data'>


  


                <div class="form-group col-md-6">
                  <label class="control-label">  Supplier Name</label>
                  <input class="form-control" type="text"   name="supplier_name" required pattern="[A-Za-z. ]+">
                </div>
                
              

                <div class="form-group col-md-6">
                  <label class="control-label">Address  </label>
                  <input class="form-control" type="text"  name="supplier_address" >
                </div>



                <div class="form-group col-md-6">
                  <label class="control-label">Mobile Number    </label>
                  <input type="number" class="form-control"    name="supplier_contact"  onkeypress="return isNumberKey(evt)" onchange="phonenumber()" id="txtTell" >
                </div>

                <div class="form-group col-md-6">
                  <label class="control-label">NIC    </label>
                  <input type="text" class="form-control" type="text"   name="supplier_nic"  onchange="nicnumber()"   id="txtNIC" >
                </div>

              
     
         
            </div>
           <div align="right">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save  </button>
              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="View_Product.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>

            </form>

          </div>
        </div>


 

      </div>
    </main>

    <?php include('footer.php');?>
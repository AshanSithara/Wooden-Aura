        
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


function ValidateEmail(Email)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(Email.value.match(mailformat))
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






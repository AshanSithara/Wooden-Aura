<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
<head>
 
</head>	
<body>
<div style="width:150px;margin:auto;height:500px;">
<?php

	session_destroy();
	
 echo '<meta http-equiv="refresh" content="0;url=../index.php">';
 
?>
	 
</div>
</body>
</html>

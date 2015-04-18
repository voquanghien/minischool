<?php
include("config.php");
session_start();
if(isset($_POST['submit']))
{
	$u=$p="";
	if($_POST['us'] == NULL)
 	{
	}
	else
	{
  		$u=$_POST['us'];
 	}
 	if($_POST['psw'] == NULL)
 	{
	}
	else
	{
 		$p=$_POST['psw'];
 	}
	$sql1="select name from user where user='".$u."'";
	$result1=mysqli_query($dbConn,$sql1);
	$row1=mysqli_fetch_array($result1);
	$name1=$row1['name'];
	$_SESSION["username"]=$name1;
	if($u && $p)
	{
		$sql="select * from user where user='".$u."' and password='".$p."'";
		if($result=mysqli_query($dbConn,$sql))
		{
			$row=mysqli_num_rows($result);
		}
  		if($row==0)
  		{	
   			echo "Username or password is not correct, please try again";
  		}
  		else
  		{
			echo "<script>location.href='personal_timeline.php'</script>";
		}
  
	}
}
?>
<html>
	<head>
		<link href="stylesheets/style.css" type="text/css" rel="stylesheet"/> 
	</head>
    <script language="javascript" type="text/javascript">
	function validate()
	{
		if(document.getElementById("us").value=="")
    	{
        	alert("Please Enter Your Name");
        	document.getElementById("us").focus();
        	return false;
    	}
		if(document.getElementById("psw").value=="")
    	{
        	alert("Please Enter Your Name");
        	document.getElementById("psw").focus();
        	return false;
    	}
		return true;
	}
	</script>
	<body>
    <form method="post" action="index.php" onsubmit="return validate();">
		 <div class="wrapper">
	        <div class="circle popup">
	        	<div class="content">
		    		<div class="input_label">Username</div><input type="text" name="us" id="us"/>
		    		<br/>
		    		<div class="input_label">Password</div><input type="password" name="psw" id="psw"/>
		    		<br/>
		        	<div class="icon">
		    			<input type="submit" name="submit" id="submit" value=" Log in "/>
                        <a href="register.php"><input type="button" name="submit" value=" Register "/></a>
		    		</div>
		    	</div>
	        </div>
	    </div>
        </form>
	</body>
</html>
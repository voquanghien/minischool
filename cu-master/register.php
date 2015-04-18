<?php
session_start();
include("config.php");
if(isset($_POST['submit']))
{
	$name=$_POST["text_name"];
    $email=$_POST["text_email"];
    $user=$_POST["text_user"];
    $password=$_POST["text_pass"];
	$DOB=$_POST["dob"];
	$interest=$_POST["text_interest"];
	
	$str="insert into user(name,email,user,password,interest,DOB)value 
    ('".$name."','".$email."','".$user."','".$password."','".$interest."','".$DOB."')";
	$str1="insert into timeline(user) value ('".$user."')";

	mysqli_query($dbConn,$str1);
    mysqli_query($dbConn,$str);
	echo "<script>location.href='index.php'</script>";
}

?>

<html>
	<head>
		<link href="stylesheets/style.css" type="text/css" rel="stylesheet"/> 
	</head>
	<body>
    <form method="post" name="registration" action="register.php" onSubmit="return validate();">
		 <div class="wrapper">
	        <div id="register" class="circle popup">
	        	<div class="content">
		    		<div class="input_label">Username</div><input name="text_user" id="text_user" type="text" class="textbox" required/><br/>
		    		<div class="input_label">Password</div><input name="text_pass" id="text_pass" type="password" class="textbox"/><br/>
		    		<div class="input_label">Retype</div><input name="text_repass" id="text_repass" type="password" class="textbox"/><br/>
		    		<div class="input_label">Email</div><input name="text_email" id="text_email" type="text" class="textbox"/><br/>

		    	</div>
		    	<div class="content">
	        		<button class="btn_register">&gt;</button>
	        	</div>
	        </div>
	        <div id="register2" class="circle popup hiding">
	        	<div class="content">
	        		<button class="btn_back">&lt;</button>
	        	</div>
	        	<div class="content">
		    		<div class="input_label">Full Name</div><input id="text_name" name="text_name" type="text" class="textbox"/><br/>
		    		<div class="input_label">DOB</div><input name="dob" id="dob" type="date" class="textbox"/><br/>
		    		<div class="input_label">Interest</div><input id="text_interest" name="text_interest" type="text" class="textbox"/><br/>
		    		<div class="icon">
		    			<input type="submit" id="submit" name="submit" value="Register"/>
		    		</div>
		    	</div>
	        </div>
	    </div>
        </form>
	</body>
	<script type="text/javascript">
		var buttons = document.querySelectorAll('.btn_register');
		for (var i = 0, len = buttons.length; i < len; i++) {
			buttons.item(i).onclick = function() {
				document.querySelector('#register').classList.add('hiding');
				document.querySelector('#register2').classList.remove('hiding');
			}
		}
		var buttons = document.querySelectorAll('.btn_back');
		for (var i = 0, len = buttons.length; i < len; i++) {
			buttons.item(i).onclick = function() {
				document.querySelector('#register').classList.remove('hiding');
				document.querySelector('#register2').classList.add('hiding');
			}
		}
		function validate()
		{
		 if(document.getElementById("text_name").value=="")
    	{
        	alert("Please Enter Your Name");
        	document.getElementById("text_name").focus();
        	return false;
    	}

    	if(!(isNaN(document.registration.text_name.value)))
    	{
        	alert("Name has character only!");
        	return false;
    	}
		var emailPat=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    	var emailid=document.getElementById("text_email").value;
    	var matchArray = emailid.match(emailPat);

    	if (matchArray == null)
    	{
			alert("Your email address seems incorrect. Please try again.");
			document.getElementById("text_email").focus();
			return false;
    	}
		if(document.getElementById("text_user").value=="")
		{
			alert("Please Enter User Name");
			document.getElementById("text_user").focus();
			return false;
		}

		if(document.getElementById("text_pass").value=="")
		{
			alert("Please Enter Your Password");
			document.getElementById("text_pass").focus();
			return false;
		}
	
		if(document.getElementById("text_repass").value=="")
		{
			alert("Please ReEnter Your Password");
			document.getElementById("text_repass").focus();
			return false;
		}
		if(document.getElementById("text_repass").value!="")
		{
			  if(document.getElementById("text_repass").value != document.getElementById("text_pass").value)
			  {
				   alert("Confirm Password doesnot match!");
				   document.getElementById("text_repass").focus();
				   return false;
			  }
		}
		
	}
	</script>
</html>

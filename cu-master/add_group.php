<?php
session_start();
include('config.php');
if(isset($_POST['creategroup']))
{
	
	$name=$_POST['text_groupname'];
	$description=$_POST['text_groupdescription'];
	$user=$_SESSION['username'];
	$query = "select * from coursegroup where id like \"g%\"";
	$result = mysqli_query($dbConn,$query);
	$rows = mysqli_num_rows($result);
	$query = "insert into coursegroup (id, cgname, description, rating, user) values (\"" . "g%" . "_$rows\", \"$name\", \"$description\", 0, \"$user\");";
	mysqli_query($dbConn,$query);
	$str1="insert into timeline(cgid) value (\"" . "g%" . "_$rows\")";

	mysqli_query($dbConn,$str1);
	header('Location: group_timeline.php?groupid='."g%"."_".$rows);
	
}
?>
<html>
	<head>
		<link href="stylesheets/style.css" type="text/css" rel="stylesheet"/> 
	</head>
     <script type="text/javascript">
	function validate()
	{
	if(document.getElementById("text_groupname").value=="")
    	{
        	alert("Please enter content!");
        	document.getElementById("text_groupname").focus();
        	return false;
    	}

    	if(!(isNaN(document.addgroup.text_timeline.value)))
    	{
        	alert("Please enter content!");
        	return false;
    	}
		return true;
	}
	</script>
	<body>
    <form method="post" name="addgroup" action="add_group.php" onSubmit="return validate();">
		 <div class="wrapper">
	        <div class="circle popup">
	        	<div class="content">
		    		<div class="input_label">Group Name</div><input id="text_groupname" name="text_groupname" type="text" class="textbox"/><br/>
		    		<div class="input_label">Group Description</div><input id="text_groupdescription" name="text_groupdescription" type="text" class="textbox"/><br/>
		    		<div class="button_block">
		    			<a href="group_timeline.php"><button type="submit" id="creategroup" name="creategroup" >Create</button></a>
		    			<a href="personal_timeline.php"><button type="button">Cancel</button></a>
		    		</div>
		    	</div>
	        </div>
	    </div>
        </form>
	</body>
</html>
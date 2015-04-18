<?php
session_start();
include('config.php');
if(isset($_POST['createcourse']))
{
	
	$name=$_POST['text_coursename'];
	$description=$_POST['text_coursedescription'];
	$startdate=$_POST['fromdate'];
	$enddate=$_POST['enddate'];
	$user=$_SESSION['username'];
	$query = "select * from coursegroup where id like \"c%\"";
	$result = mysqli_query($dbConn,$query);
	$rows = mysqli_num_rows($result);
	$query1 = "insert into coursegroup (id, cgname, description, rating, user, startdate, enddate) values (\"" . "c%" . "_$rows\", \"$name\", \"$description\", 0, \"$user\",\"$startdate\",\"$enddate\");";
	mysqli_query($dbConn,$query1);
	$str1="insert into timeline(cgid) value (\"" . "c%" . "_$rows\")";

	mysqli_query($dbConn,$str1);
	header('Location: course_timeline.php?courseid='."c%"."_".$rows);
	
}
?>
<html>
	<head>
		<link href="stylesheets/style.css" type="text/css" rel="stylesheet"/> 
	</head>
    <script type="text/javascript">
	function validate()
	{
	if(document.getElementById("text_coursename").value=="")
    	{
        	alert("Please enter content!");
        	document.getElementById("text_coursename").focus();
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
    <form method="post" name="addcourse" action="add_course.php" onSubmit="return validate();">
		 <div class="wrapper">
	        <div class="circle popup">
	        	<div class="content">
		    		<div class="input_label">Course Name</div><input type="text" name="text_coursename" id="coursename" class="textbox"/><br/>
		    		<div class="input_label">Course Description</div><input type="text" id="text_coursedescription" name="text_coursedescription" class="textbox"/><br/>
		    		<div class="input_label">From</div><input name="fromdate" id="fromdate" type="date" class="textbox"/><br/>
		    		<div class="input_label">To</div><input name="enddate" id="enddate" type="date" class="textbox"/><br/>
		    		<div class="input_label">Assign TA</div>
		    		<button>+</button>
		    		<br/>
		        	<div class="button_block">
		    			<a href="course_timeline.php"><button type="submit" id="createcourse" name="createcourse" >Create</button></a>
		    			<a href="personal_timeline.php"><button type="button">Cancel</button></a>
		    		</div>
		    	</div>
	        </div>
	    </div>
        </form>
	</body>
</html>
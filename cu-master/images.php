<?php 
// Get our database connector
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Dream in code tutorial - List of Images</title>
	</head>

	<body>
	
		<div>

			<?php	
				// Grab the data from our people table
				$sql = "select * from people";
				$result = mysqli_query($dbConn,$sql) or die ("Could not access DB: " . mysql_error());

				while ($row = mysqli_fetch_assoc($result))
				{
					echo "<div class=\"picture\">";
					echo "<p>";

					// Note that we are building our src string using the filename from the database
					echo "<img width='200px' height='200px' src=\"images/" . $row['filename'] . "\" alt=\"\" /><br />";
					echo $row['fname'] . " " . $row['lname'] . "<br />";
					echo "</p>";
					echo "</div>";
				}

			?>
		
		</div>
	</body>
</html>

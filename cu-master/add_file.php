<html>
	<head>
		<link href="stylesheets/style.css" type="text/css" rel="stylesheet"/>
		
	</head>
	<body>
		<div class="header">
			<input type="text" class="textbox"></input>
			<a href=""><img src="images/search.png"></a>
			<div id="menubar_wrapper">
				<img class="kaka" align="right" src="images/settings.png">
				<div class="hidden_task_bar">
                	<div class="task_bar_item">
						<a href="personal_timeline.php">
							<img src="images/home.png">
							<div>Timeline</div>
						</a>
					</div>
					<div class="task_bar_item">
						<a href="backpack.php">
							<img src="images/add_docs.png">
							<div>Add file</div>
						</a>
					</div>
					<div class="task_bar_item">
						<a href="add_group.php">
							<img src="images/add.png">
							<div>Add Group</div>
						</a>
					</div>
					<div class="task_bar_item">
						<a href="add_course.php">
							<img src="images/add.png">
							<div>Add Course</div>
						</a>
					</div>
                    <div align="center">
                    <div class="task_bar_item" >
						<form action="logout.php"><button>Log out</button></form>
					</div>
                    </div>
				</div>
			</div>
		</div>
       <div align="center">
        <?php
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', 'root', 'login');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Gather all required data
        $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);
 
        // Create the SQL query
        $query = "
            INSERT INTO `file` (
                `name`, `mime`, `size`, `data`, `created`
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";
 
        // Execute the query
        $result = $dbLink->query($query);
 
        // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    $dbLink->close();
}
else {
    echo 'Error! A file was not sent!';
}
 
?>
<br/>
  	<a href="backpack.php"><button>Go back</button></a>
    </div>
	</body>
</html>
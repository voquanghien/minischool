

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
					<div class="task_bar_item">
						<a href="">
							<img src="images/add.png">
							<div>My Course</div>
						</a>
					</div>
					<div class="task_bar_item">
						<a href="">
							<img src="images/add.png">
							<div>My Group</div>
						</a>
					</div>
					<div class="task_bar_item">
						<a href="backpack.php">
							<img src="images/add.png">
							<div>Backpack</div>
						</a>
					</div>
					<div class="task_bar_item">
						<a href="friend_list.php">
							<img src="images/add.png">
							<div>Friendlist</div>
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
		</div>
        <!--
		<div class="search_box" align="center">
			<div class="group_box">
				<div>Group By</div>
				<select class="textbox">
					<option value="Type">None</option>
	    			<option value="Type">Type</option>
	    			<option value="LTO"/>Date (Latest to Oldest)</option>
	    			<option value="Course"/>Course</option>
	    			<option value="Group"/>Group</option>
	    			<option value="OTL"/>Date (Oldest to Latest)</option>
			    </select>
			</div>
			<input type="text" class="textbox"></input>
			<a href=""><img src="images/search.png"></a>
		</div>		
		<div align="center" class="category">
			<a href="">All</a><span>|</span>
			<a href="">Folder 1</a><span>|</span>
			<a href="">Folder 2</a>
		</div>
		<div align="center">
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/doc.png">
					<div><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/excel.png">
					<div><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/image.png">
					<div><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/doc.png">
					<div><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/powerpoint.png">
					<div><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/video.png">
					<div><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/other.png">
					<div><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/other.png">
					<div><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
		</div>-->
        
    <?php
$dbLink = new mysqli('localhost', 'root', 'root', 'login');
if(mysqli_connect_errno()) {
    die("MySQL connection failed: ". mysqli_connect_error());
}
 
// Query for a list of all existing files
$sql = 'SELECT `id`, `name`, `mime`, `size`, `created` FROM `file`';
$result = $dbLink->query($sql);
 
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else {
        // Print the top of a table
        echo '<table width="100%">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Mime</b></td>
                    <td><b>Size (bytes)</b></td>
                    <td><b>Created</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';
 
        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['mime']}</td>
                    <td>{$row['size']}</td>
                    <td>{$row['created']}</td>
                    <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
                </tr>";
        }
 
        // Close table
        echo '</table>';
    }
 
    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$dbLink->error}</pre>";
}

// Close the mysql connection
$dbLink->close();
?>
<a href="personal_timeline.php">Go back to Timeline</a>
	</body>
</html>
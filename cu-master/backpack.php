
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
			<div id="menubar_wrapper" class="second">
				<img class="kaka" align="left" src="images/custom.png">
				<div class="hidden_task_bar">
					<div class="task_bar_item">
						<a href="">
							<img src="images/add.png">
							<div>Promote Mod</div>
						</a>
					</div>
					<div class="task_bar_item">
						<a href="">
							<img src="images/add.png">
							<div>Member List</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	<div align="center">
    <form action="add_file.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploaded_file"><br>
        <input type="submit" value="Upload file">
    </form>
    <p>
        <a href="list_files.php"><button>See all files</button></a>
    </p>
	
    </div>
	</body>
</html>
<?php
include('config.php');
?>
<html>
	<head>
		<link href="stylesheets/style.css" type="text/css" rel="stylesheet"/> 
	</head>
	<body>
    <form method="get" action="search_result.php">
		<div class="header">
			<a class="home" href="personal_timeline"><img src="images/home.png"></a>
			<input class="textbox" type="text" id="searchbox" name="searchbox">
			<input id="searchbutton" type="image" src="images/search.png">
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
        </form>
		<div align="center" class="category">
			<a href="">All</a><span>|</span>
			<a href="">People</a><span>|</span>
			<a href="">Group</a><span>|</span>
			<a href="">Course</a>
		</div>
		<div align="center">
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/av.png">
					<div><b>Username</b></div>
					<div>Description</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/av.png">
					<div><b>Username</b></div>
					<div>Description</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/av.png">
					<div><b>Username</b></div>
					<div>Description</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/av.png">
					<div><b>Username</b></div>
					<div>Description</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/av.png">
					<div><b>Username</b></div>
					<div>Description</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/av.png">
					<div><b>Username</b></div>
					<div>Description</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/av.png">
					<div><b>Username</b></div>
					<div>Description</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/av.png">
					<div><b>Username</b></div>
					<div>Description</div>
				</a>
			</div>
		</div>
	</body>
</html>
<?php
$name = $_GET["searchbox"];
$sql="select name from user where name like '%".$name."%'";
$tmp=mysqli_query($dbConn,$sql);
$row=mysqli_fetch_array($tmp);
$result=$row['name'];
echo $result;
?>
<?php
include('config.php');
session_start();
$courseid=$_GET['courseid'];
$query="select cgname, description, startdate, enddate, user from coursegroup where id='".$courseid."'";
$result=mysqli_query($dbConn, $query);
$row=mysqli_fetch_array($result);
$coursename=$row['cgname'];
$description=$row['description'];
$user=$row['user'];
$startdate=$row['startdate'];
$enddate=$row['enddate'];

?>
<html>
	<head>
		<link href="stylesheets/style.css" type="text/css" rel="stylesheet"/> 
	</head>
	<body>
    <form method="get">
		<div class="header">
			<a class="home" href="personal_timeline"><img src="images/home.png"></a>
			<input type="text" class="textbox"></input>
			<a href=""><img src="images/search.png"></a>
			<div id="menubar_wrapper">
				<img class="kaka" align="right" src="images/settings.png">
				<div class="hidden_task_bar">
					<div class="task_bar_item">
						<a href="<?php echo "course_timeline.php?courseid=".$courseid; ?>">
							<img src="images/add.png">
							<div>Course</div>
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
		<div class="timeline_header" align="center">
			<div class="line"></div>
			<img src="images/av.png"/>
			<div class="line"></div>
			<div class="title"><?php echo $coursename ?></div>
		</div>
		<div align="center" class="icon_group">
			<img src="images/add_friend.png"/>
		</div>
		<div class="about_layout" align="center">
			<div class="one-third">
				<div class="circle about">Info</div>
				<p>Admin:<?php echo $user ?></p>
				<p>Description:<?php echo $description ?></p>
				<p>From:<?php echo $startdate?></p>
				<p>To:<?php echo $enddate ?></p>
			</div>
		</div>
	</body>
</html>
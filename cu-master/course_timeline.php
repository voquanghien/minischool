<?php
include('config.php');
session_start();
$courseid=$_GET['courseid'];
$query="select cgname from coursegroup where id='".$courseid."'";
$result=mysqli_query($dbConn, $query);
$row=mysqli_fetch_array($result);
$coursename=$row['cgname'];
if(isset($_POST['Submit']))
{
	$description=$_POST['text_timeline'];
	$id=$_GET['courseid'];
	$str1="select tid from timeline, coursegroup where timeline.cgid=coursegroup.id and coursegroup.id='".$id."'";
	$result1=mysqli_query($dbConn,$str1);
	$row1=mysqli_fetch_array($result1);
	$tid=$row1['tid'];
	$str2="select cgname from coursegroup where coursegroup.id='".$id."'";
	$result2=mysqli_query($dbConn,$str2);
	$row2=mysqli_fetch_array($result2);
	$cgname=$row2['cgname'];

	$str="insert into post(tid, text, datetime, cg) value ('".$tid."', '".$description."' ,NOW(), '".$id."')";
	mysqli_query($dbConn,$str);
	header ('Location: course_timeline.php?courseid='.$id);
}
?>
<html>
	<head>
		<link href="stylesheets/style.css" type="text/css" rel="stylesheet"/> 
	</head>
	<body>
    <form method="post" name="timeline" onSubmit="return validate();">
		<div class="header">
			<a class="home" href="personal_timeline"><img src="images/home.png"></a>
			<input type="text" class="textbox"></input>
			<a href=""><img src="images/search.png"></a>
			<div id="menubar_wrapper">
				<img class="kaka" align="right" src="images/settings.png">
				<div class="hidden_task_bar">
					<div class="task_bar_item">
						<a href="<?php echo "course_info.php?courseid=".$courseid; ?>">
							<img src="images/add.png">
							<div>Course info</div>
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
						<a href="add_group">
							<img src="images/add.png">
							<div>Add Assigment</div>
						</a>
					</div>
					<div class="task_bar_item">
						<a href="evaluate_course">
							<img src="images/add.png">
							<div>Evaluate course</div>
						</a>
					</div>
					<div class="title"><b>Quiz</b></div>
						<p><a href="" class="task_bar_sub_item">Quiz 1</a></p>
						<p><a href="" class="task_bar_sub_item">Quiz 2</a></p>
						<p><a href="" class="task_bar_sub_item">More</a></p>
					<div class="title"><b>Assigment</b></div>
						<p><a href="" class="task_bar_sub_item">Assigment 1</a></p>
						<p><a href="" class="task_bar_sub_item">Assigment 2</a></p>
						<p><a href="" class="task_bar_sub_item">More</a></p>
					<div class="title"><b>Final Exam</b></div>
						<p><a href="p" class="task_bar_sub_item">Dec 1 2014</a></p>
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
			<img src="images/unfriend.png"/>
		</div>
		<div align="center">
			<div class="frame_left">
				<div class="friend_item">
					<img src="images/av.png"/>
					<div>Friend 1</div>
				</div>
				<div class="friend_item">
					<img src="images/av.png"/>
					<div>Friend 2</div>
				</div>
			</div>
			<div class="frame_main">
				<div class="share_block">
					<img src="images/av.png"/>
					<form method="post" action="<?php echo 'course_timeline.php?='.$courseid ?>">
					<div class="post_info">
                   
						<textarea class="textbox" name="text_timeline" id="text_timeline" placeholder="Share what you have!"></textarea><br/>
						<!--<span>Attach</span><input class="post_file" type="file">-->
						<input type="submit" name="Submit" id="Submit" value="Post" />
                         <?php
						$out="select text from post where cg='".$courseid."' order by post.pid DESC";
						$result=mysqli_query($dbConn,$out);
						
						while($row=mysqli_fetch_array($result))
						{
						echo"<br/>";
						echo"<textarea readonly class='textbox'>".$row['text']."</textarea>";
						echo "<br/>";
						}
						?>
					</div>
                    </form>
				</div>
			</div>
			<div class="frame_right">
				<div class="friend_item">
					<img src="images/doc.png"/>
					<div>Document</div>
				</div>
				<div class="friend_item">
					<img src="images/excel.png"/>
					<div>Excel</div>
				</div>
			</div>
		</div>
        </form>
	</body>
</html>
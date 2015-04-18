<?php
include('config.php');
session_start();
$groupid=$_GET['groupid'];
$query="select cgname from coursegroup where id='".$groupid."'";
$result=mysqli_query($dbConn, $query);
$row=mysqli_fetch_array($result);
$groupname=$row['cgname'];
if(isset($_POST['Submit']))
{
	$description=$_POST['text_timeline'];
	$id=$_GET['groupid'];
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
	header ('Location: group_timeline.php?groupid='.$id);
}
?>
<html>
	<head>
		<link href="stylesheets/style.css" type="text/css" rel="stylesheet"/> 
	</head>
    <script type="text/javascript">
	function validate()
	{
	if(document.getElementById("text_timeline").value=="")
    	{
        	alert("Please enter content");
        	document.getElementById("text_timeline").focus();
        	return false;
    	}

    	if(!(isNaN(document.timeline.text_timeline.value)))
    	{
        	alert("Please enter content!");
        	return false;
    	}
		return true;
	}
	</script>
	<body>
    <form method="post" name="timeline" onSubmit="return validate();">
		<div class="header">
			<a class="home" href="personal_timeline.php"><img src="images/home.png"></a>
			<input type="text" class="textbox"></input>
			<a href=""><img src="images/search.png"></a>
			<div id="menubar_wrapper">
				<img class="kaka" align="right" src="images/settings.png">
				<div class="hidden_task_bar">
					<div class="task_bar_item">
						<a href="<?php echo "group_info.php?groupid=".$groupid; ?>">
							<img src="images/add.png">
							<div>Group info</div>
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

		<div class="timeline_header" align="center">
			<div class="line"></div>
			<img src="images/av.png"/>
			<div class="line"></div>
			<div class="title"><?php echo $groupname ?></div>
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
					<form method="post" action="<?php echo 'group_timeline.php?='.$groupid ?>">
					<div class="post_info">
                   
						<textarea class="textbox" name="text_timeline" id="text_timeline" placeholder="Share what you have!"></textarea><br/>
						<!--<span>Attach</span><input class="post_file" type="file">-->
						<input type="submit" name="Submit" id="Submit" value="Post" />
                         <?php
						$out="select text from post where cg='".$groupid."' order by post.pid DESC";
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
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

		<div align="center" class="sort_area"><b>Document</b></div>
		<div align="center">
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/doc.png">
					<div align="center"><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/doc.png">
					<div align="center"><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/doc.png">
					<div align="center"><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/doc.png">
					<div align="center"><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
		</div>

		<div align="center" class="sort_area"><b>Excel</b></div>
		<div align="center">
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/excel.png">
					<div align="center"><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/excel.png">
					<div align="center"><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/excel.png">
					<div align="center"><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
		</div>

		<div align="center" class="sort_area"><b>Power Point</b></div>
		<div align="center">
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/powerpoint.png">
					<div align="center"><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/powerpoint.png">
					<div align="center"><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/powerpoint.png">
					<div align="center"><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/powerpoint.png">
					<div align="center"><b>Doc Name</b></div>
					<div>Date</div>
				</a>
			</div>
		</div>

		<div align="center" class="sort_area"><b>Other</b></div>
		<div align="center">
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/other.png">
					<div align="center"><b>other Name</b></div>
					<div>Date</div>
				</a>
			</div>
			<div class="search_item">
				<a href="">
					<img class="circle item" src="images/other.png">
					<div align="center"><b>other Name</b></div>
					<div>Date</div>
				</a>
			</div>
		</div>
	</body>
</html>
<!DOCTYPE HTML>
<html>
<style type="text/css">
#button {
	background-image: url(images/search.png);
	height: 100px;
	width: 100px;
	background-color: transparent;
}
</style> 
<body>

<form action="Untitled-1.php" method="get">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
<input type="image" src="images/search.png">
</form>
<button id="button"></button>
</body>
</html>

Welcome <?php echo $_GET["name"]; ?><br>
Your email address is: <?php echo $_GET["email"]; ?>
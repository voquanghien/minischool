<!DOCTYPE html>
<?php
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        //&nbsp;Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'project');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        //&nbsp;Gather all required data
        $name&nbsp;= $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $mime&nbsp;= $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $data&nbsp;= $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size&nbsp;= intval($_FILES['uploaded_file']['size']);
 
        //&nbsp;Create the SQL query
        $query = "
            INSERT INTO `file` (
                `name`, `mime`, `size`, `data`, `created`
            )
            VALUES (
                '{$name}',&nbsp;'{$mime}', {$size}, '{$data}', NOW()
            )";
 
        //&nbsp;Execute the query
        $result = $dbLink->query($query);
 
        //&nbsp;Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else&nbsp;{
            echo 'Error! Failed to insert the file'
               . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {
        echo&nbsp;'An error accured while the&nbsp;file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    $dbLink->close();
}
else {
    echo 'Error! A file was not sent!';
}
 
// Echo a link back to the main page
echo '<p>Click <a href="index.html">here</a> to go back</p>';
?>



<head>
    <title>MySQL file upload example</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
    <form action="add_file.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploaded_file"><br>
        <input type="submit" value="Upload file">
    </form>
    <p>
        <a href="list_files.php">See all files</a>
    </p>
</body>
</html>
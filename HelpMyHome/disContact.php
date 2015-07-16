<html>
<?php
require 'core.inc.php';
?>
<head>
	<Title> Contact Details </title>
<link href="header_n.css" rel="stylesheet" type="text/css">
</head>
<body>
    
<?php require "header.php"; ?>	
<?php 
    if(!loggedin())
          {
            header("location: Login/index.php");
           }
	$id=$_GET['id'];
	$db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
    mysql_select_db('project');
    $sql = "SELECT * FROM servicep where id='".$id."'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    ?>
    <font color="white" size="25">
        <p align = "center">
    <?php
    echo "Phone number: ";
    echo $row['phone'];
    echo "<br>";
    echo "Email Id: ";
    echo $row['email'];
	?>
	<br>
	Press the browser back button to book a slot!
</p>
</font>
</body>
</html>
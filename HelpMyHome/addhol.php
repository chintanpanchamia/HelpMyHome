<html>
<head>
	<title>Holiday Booked</title>
<link href="header_n.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php require "header.php"; ?>
<font color="white" size="25">
<p align="center">
<?php
require 'core.inc.php';
    if(!loggedin())
          {
            header("location: Login/index.php");
           }
	$spid=$_GET['spid'];
	$dateS=$_POST['dateS'];
	$reason=$_POST['reason'];
	echo "A holiday for: ";
	echo $dateS;
	echo " with reason ";
	echo $reason;
	echo " has been added";
	$db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
    mysql_select_db('project');
    $sql = "INSERT INTO holiday(dateS,reason,spid) values ('$dateS','$reason','$spid')";
    $result = mysqli_query($db,$sql);
    $url="sphome.php?spid=".$spid;
	?>
	<br>	<br>
	<a href=<?php echo "'$url'"; ?>><input type="submit" value="Home"></a>
	</body>
</html>
<html>
<head>
	<title>Approved</title>
<link href="header_n.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php require "header.php"; ?>
	<?php
	require 'core.inc.php';
    if(!loggedin())
          {
            header("location: Login/index.php");
           }
		$email=$_GET['email'];
		$db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
		mysqli_select_db($db,'project');
		$sql3="DELETE from servicep_temp WHERE email='$email'";
        $result3 = mysqli_query($db,$sql3);
        if(!$result3)
        {
            echo "error deleteing";
        }
    	echo "Deletionn for : ";
		echo $email;
		echo " is done";
	?>
	<br>
	Click <a href="adminpanel.php"> here </a> to go back to the pending requests list.
</body>
</html>
<html>
<head>
	<title>Cancelled</title>
<link href="header_n.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php require "header.php"; ?>	
<?php
		$reqid=$_GET['reqid'];
        $spid=$_GET['spid'];
		$db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
   		mysqli_select_db($db,'project');
   		$sql="SELECT * from requests WHERE reqid='$reqid'";
    	$result = mysqli_query($db,$sql);
    	$row = mysqli_fetch_array($result);
        $sql2="UPDATE requests set status='Cancelled' WHERE reqid='$reqid'";
    	$result2 = mysqli_query($db,$sql2);
    	if(!$result2)
        {
            echo "some error here updating";
        }
    	echo "Cancellation for : ";
		echo $reqid;
		echo " is done";
        $url="sppend.php?spid=".$spid;
	?>
    <br>
    Click <a href=<?php echo "'$url'"; ?>> here </a> to go back to the pending requests list.
</body>
</html>
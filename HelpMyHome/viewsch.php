<html>
<head>

<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
	<title>View SP Schedule</title>
<link href="header_n.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php require "header.php"; ?>
<font color="white">
	Other Appointments of the service provider for the day:
	<?php
	require 'core.inc.php';
    if(!loggedin())
          {
            header("location: Login/index.php");
           }
	$id=$_GET['id'];
	$dateS=$_GET['dateS'];
	$db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
    mysql_select_db('project');
    $sql = "SELECT * FROM requests where spid='".$id."' AND dateS='$dateS'";
    $result = mysqli_query($db,$sql);
    echo "<table border=1 id='box-table-b'>"; // start a table tag in the HTML
    echo "<th>User ID</th><th>Date</th><th>Time</th><th>Type of Service</th><th>Status</th>";                
    while($row = mysqli_fetch_array($result))
    {
    	echo "<tr><td>".$row['uid']."</td><td>".$row['dateS']."</td><td>".$row['time']."</td><td>".$row['service']."</td><td>".$row['status']."</td></tr>";
    }
    echo "</table>";
	?> 
	If any prior commitments of the service provider for the day:
	<?php
		$sql2="SELECT * from holiday where spid='".$id."' AND dateS='$dateS'";
		$result2=mysqli_query($db,$sql2);
		echo "<table border=1 id='box-table-b'>";
		echo "<th>Date</th><th>Comments</th>";
		while($row2 = mysqli_fetch_array($result2))
		{
			echo "<tr><td>".$row2['dateS']."</td><td>".$row2['reason']."</td></tr>";
		}
		echo "</table>";
	?>
</body>
</html>
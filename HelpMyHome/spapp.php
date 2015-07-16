<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
	<title>SP Approved Requests</title>
<link href="header_n.css" rel="stylesheet" type="text/css">


</head>
<body>
<?php require "header.php"; ?>
	<h1 style="color:#4a96ad; font-family:segoe UI; margin-left:38%;"> Welcome Service Provider </h1>
	<p style="color:white; font-family:segoe UI; margin-left:38%">
		The following list of requests have been approved by you:
	<br>
	</p>
	<?php
    $spid=$_GET['spid'];
	$db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
    mysql_select_db('project');
    $sql="SELECT * from requests WHERE spid='$spid' AND status='Approved'";
    $result = mysqli_query($db,$sql);
    echo "<table border=1 id='box-table-a'>"; // start a table tag in the HTML
    echo "<th>User ID</th><th>Date</th><th>Time</th><th>Service</th><th>Problem</th><th>User Address</th><th>User Contact</th><th>Cancel</th>";
    if(!$result)
    {
        echo "No such results found";
    }
    else
    {
        while($row = mysqli_fetch_array($result))
        {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['uid'] . "</td><td>" . $row['dateS'] . "</td><td>" . $row['time'] . "</td><td>" . $row['service'] . "</td>";
            echo "<td>".$row['problem']."</td><td>".$row['uid']."</td><td>".$row['uid']."</td>";
            $url="cancelreq.php?reqid=".$row['reqid']."&spid=".$spid;
            echo "<td><a href=$url>Cancel</a></td></tr>";
        }
    }
    $url="sphome.php?spid=".$spid;
	?>
    <a href=<?php echo "'$url'"; ?>><input style="width:300px; border-radius:7px; margin-left:38%;" type="submit" value="Home"></a>
</body>
</html>
<html>
<head>
	<title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link href="header_n.css" rel="stylesheet" type="text/css">

</head>
<body>
<?php require "header.php"; ?>
	<h1> WELCOME ADMIN </h1>
    <a href="logout.php"><input type="submit" value="Logout"></a>
	<p>
		The following list of service providers need your approval:
	<br>
	</p>
	<?php
    require 'core.inc.php';
    if(!loggedin())
          {
            header("location: Login/index.php");
           }
	$db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
    mysql_select_db('project');
    $sql="SELECT * from servicep_temp";
    $result = mysqli_query($db,$sql);
    echo "<table border=1 id='box-table-a'>"; // start a table tag in the HTML
    echo "<th>Name</th><th>Price</th><th>Email</th><th>Area</th><th>Type1</th><th>Type2</th><th>Type3</th><th>Approve</th><th>Reject</th>";
    if(!$result)
    {
        echo "No such results found";
    }
    else
    {
        while($row = mysqli_fetch_array($result))
        {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['username'] . "</td><td>" . $row['cost'] . "</td><td>" . $row['email'] . "</td><td>" . $row['area'] . "</td>";
            echo "<td>".$row['type1']."</td><td>".$row['type2']."</td><td>".$row['type3']."</td>";
            $url="approvesp.php?email=".$row['email'];
            $url2="rejectsp.php?email=".$row['email'];
            echo "<td><a href=$url>Approve</a></td><td><a href=$url2>Reject</td></tr>";
        }
    }
	?>

</body>
</html>
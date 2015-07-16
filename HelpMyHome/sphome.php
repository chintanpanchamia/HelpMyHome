<html>
<head>
<title>Service Provider Home</title>
<link href="header_n.css" rel="stylesheet" type="text/css">
<style>
#content
{
	margin-left:35%;
}

</style>

</head>
<body>

<?php require "header.php"; ?>

<div id="content">	
<?php
	require 'core.inc.php';
    if(!loggedin())
          {
            header("location: Login/index.php");
           }
	
		$spid=$_GET['spid'];
		$db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
        mysql_select_db('project');
        $sql = "SELECT * FROM servicep where id='".$spid."'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        echo '<p style="color:white; font-family:segoe UI;">Welcome dear Service Provider </p><p style="color:#4a96ad;">'.$row['name'].'</p>';
        $url="sppend.php?spid=".$spid;
        $url2="spapp.php?spid=".$spid;
        $url3="sprej.php?spid=".$spid;
        $url4="holiday.php?spid=".$spid;
	?>
	<br>
	<p style="color:white; font-family:segoe UI;">Here are your options:</p>
	<br>
	<a href = <?php echo "'$url'"; ?>><input style="width:300px; border-radius:5px;" type="submit" value="View Pending Requests"></a>
	<br>
	 <a href = <?php echo "'$url2'"; ?>><input style="width:300px; border-radius:5px;" type="submit" value="View Approved Requests"></a>
	<br>
	<a href = <?php echo "'$url3'"; ?>><input style="width:300px; border-radius:5px;" type="submit" value="View Rejected Requests"></a>
	<br>
	<a href = <?php echo "'$url4'"; ?>><input style="width:300px; border-radius:5px;" type="submit" value="Add a holiday"></a>
	<br>
	<a  href="logout.php"><input style="width:300px; border-radius:5px;" type="submit" value="Logout"></a>
</div>
</body>
</html>
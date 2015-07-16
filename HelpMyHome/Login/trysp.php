<html>
<head>
</head>
<body>
<?php
	$username_cust=$_POST['username_cust'];
	$pass_cust=$_POST['pass_cust'];
	$encr_pass=md5($pass_cust);
	$db=mysqli_connect('localhost', 'root', '','project') or die("I couldn't connect to your database, please make sure your info is correct!");
	mysql_select_db('project');
	$sql = "SELECT * from servicep WHERE email='$username_cust' AND password='$encr_pass'";
	$result=mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result);
	if($result)
	{
		if(mysqli_num_rows($result) > 0)
		{
			//Login Successful
			session_start();
			$_SESSION['testing']=Yes;
			header("location: ../sphome.php?spid=".$row['id']);
			//exit();
		}
		else 
		{
			//Login failed
			 //header("location: logincust.php");
			 	print '<script type="text/javascript"> alert("Request pending with Admin or Password incorrect")</script>'; 
				
				//exit();
		}
	}
?>
</body>
</html>
<html>
<head>
</head>
<body>
<?php
	
	$username_admin=$_POST['username_admin'];
	$pass_admin=$_POST['pass_admin'];
	$db=mysqli_connect('localhost', 'root', '','project') or die("I couldn't connect to your database, please make sure your info is correct!");
	mysql_select_db('project');
	$sql = "SELECT * from adminlogin WHERE username='$username_admin' AND password='$pass_admin'";
	$result=mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result);
	if($result)
	{
		if(mysqli_num_rows($result) > 0)
		{
			//Login Successful
			session_start();
			$_SESSION['testing']=Yes;
			header("location: ../adminpanel.php");
			//exit();
		}
		else 
		{
			//Login failed
			 //header("location: logincust.php");
			 	print '<script type="text/javascript"> alert("Password Incorrect")</script>'; 
				
				//exit();
		}
	}
?>
</body>
</html>
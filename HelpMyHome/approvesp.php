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
   		$sql="SELECT * from servicep_temp WHERE email='$email'";
    	$result = mysqli_query($db,$sql);
    	$row = mysqli_fetch_array($result);
    	$pwd=$row['password'];
    	$name=$row['username'];
    	$address=$row['work_address'];
    	$area=$row['area'];
    	$price=$row['cost'];
    	$type1=$row['type1'];
    	$type2=$row['type2'];
    	$type3=$row['type3'];
        $phone=$row['phone'];

        $sql2="INSERT into servicep(email,password,name,address,area,price,rating,descr,photo,type1,type2,type3,phone) 
        values('$email','$pwd','$name','$address','$area','$price','0','Please change your description','','$type1','$type2','$type3','$phone')";
    	$result2 = mysqli_query($db,$sql2);
    	if(!$result2)
        {
            echo "some error here inserting";
        }

        $sql3="DELETE from servicep_temp WHERE email='$email'";
        $result3 = mysqli_query($db,$sql3);
        if(!$result3)
        {
            echo "error deleteing";
        }
    	echo "Verification for : ";
		echo $email;
		echo " is done";
	?>
    <br>
    Click <a href="adminpanel.php"> here </a> to go back to the pending requests list.
</body>
</html>
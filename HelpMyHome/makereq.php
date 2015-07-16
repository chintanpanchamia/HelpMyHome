<html>

<head>
	<title>Create Request</title>
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
$id=$_GET['id'];
    $dateS=$_GET['dateS'];
    $uid=$_GET['uid'];
    $service=$_GET['service'];
    $db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
    mysql_select_db('project');
    $sql="SELECT * from servicep WHERE id='".$id."'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    $url="thanks.php?id=".$id."&dateS=".$dateS."&service=".$service."&uid=".$uid;
    ?>
    <font color="white">
	<h1 align="center"> BOOK A REQUEST </h1>
	<p>
	
            <h3 id="bill">Upload Pictures</h3>
            <form action=<?php echo "$url"; ?> method="POST" enctype="multipart/form-data">

                <input type="file" name="userfile" style="width:60%;" id="file"/><br /><br/>

		<h3>You have chosen the following service detials:</h3>
	   <br>
       <b>Service Provider Name:</b>
       <?php
        echo $row['name'];
        ?>
        <br>
        <b>Date of service:</b>
        <?php
        echo $dateS;
        ?>
        <br>
        <b>Type of Service:</b>
        <?php
        echo $service;
        //photo stuff
        define('UPLOADPATH', 'uploads/');
        define('MAXFILESIZE',32768000);
        ?>
        <br>
        <b>Enter suitable time:</b>
        <select name="time" id="time" required>
            <option value="7am">07:00 A.M.</option>
            <option value="8am">08:00 A.M.</option>
            <option value="9am">09:00 A.M.</option>
            <option value="10am">10:00 A.M.</option>
            <option value="11am">11:00 A.M.</option>
            <option value="12noon">12:00 Noon</option>
            <option value="1pm">01:00 P.M.</option>
            <option value="2pm">02:00 P.M.</option>
            <option value="3pm">03:00 P.M.</option>
            <option value="4pm">04:00 P.M.</option>
            <option value="5pm">05:00 P.M.</option>
            <option value="6pm">06:00 P.M.</option>
            <option value="7pm">07:00 P.M.</option>
            <option value="8pm">08:00 P.M.</option>
            <option value="9pm">09:00 P.M.</option>
        </select>	
        <br>
        <b>Enter the description of the problem:</b>
        <br>
        <textarea id="problem" name="problem" rows="10" cols="30"></textarea>
        <br>
        <br>
                        <input type="submit" value="Book" id="file_submit"name="submit"/>
            </form>
        
        <!--<form id="form-1" action=<?php echo $url ?> method="post">
		
    </form>-->
    </p>
	
</body>
</html>
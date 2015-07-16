<html>
<head>
<link href="header_n.css" rel="stylesheet" type="text/css">
	<title>Holiday Booking</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ minDate: 0, maxDate: "+1M +10D" });
  });
  </script>
</head>
<body>
<?php require "header.php"; ?>
<?php
require 'core.inc.php';
    if(!loggedin())
          {
            header("location: Login/index.php");
           }
	$spid=$_GET['spid'];
	$url="addhol.php?spid=".$spid;
	$url1="sphome.php?spid=".$spid;
?>

<form method="post" action=<?php echo "$url"; ?>>
<div style="margin-top:10%;">
<H3 style="margin-left:36%; font-family:segoe UI; color:#4a96ad;">Enter Your date of Leave and the Reason.</H3>

<input placeholder="Enter date" style="width:300px; border-radius:7px; margin-left:38%;" type="text" id="datepicker" name ="dateS"/><br/>

<input style="width:300px; border-radius:7px; margin-left:38%;" placeholder="Enter Reason" type="text" name="reason"><br/>
<a href=<?php echo "'$url'"; ?>><input style="width:300px; border-radius:7px; margin-left:38%;" type="submit" value="Add"></a>
</div>
</form>
<a href=<?php echo "'$url1'"; ?>><input style="width:300px; border-radius:7px; margin-left:38%;" type="submit" value="Home"></a>
</body>
</html>
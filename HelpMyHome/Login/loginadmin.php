<html>
<head>
<title>Login for the Administrator</title>
<link href="../header.css" rel="stylesheet" type="text/css" />
<style>
#form
{
	float:right;
	z-index:100;
}

</style>
</head>
<body>
	<?php require "header.php"; ?>
<div id="form">
<form id="form-1" action="tryadmin.php" method="post">
<fieldset style="color:white; font-family:Segoe UI;" >
	<legend>Login dear Administrator</legend>
	
	<input maxlength="100" style="width:350px; border-radius:6px;" type="text" placeholder="Email (anyname@example.com)" name="username_admin" required><br/><br/>
	
<input maxlength="20" style="width:350px; border-radius:6px;" type="password" placeholder="Password" name="pass_admin" required><br/><br/>
	<input type="submit" value="Login" style="font-family:segoe UI; background-color:#4a96ad; border:0px; border-radius:6px;">
</fieldset>
</div>
	<?php

	?>
</body>
</html>
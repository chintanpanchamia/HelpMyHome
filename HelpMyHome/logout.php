<html>
<head>
<title> Logged out Successfully </title>
<link href="header_n.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php require "header.php"; ?>
<?php
require 'core.inc.php';
    if(loggedin())
       {

          session_destroy();
            header("location: Login/index.php");
       } 


?>
You have been logged out successfully
</body>
</html>
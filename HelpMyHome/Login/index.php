<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style>
<link href="../header.css" rel="stylesheet" type="text/css"/>
</style>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Help My Home</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/vpb_script.js"></script>
</head>


<body background="back.jpg" style="
	background-size:100% 100%; 
	background-repeat: no-repeat;">
<?php require "header.php" ?>
	
<br clear="all">

<center>
<!--
<div style="font-family:Verdana, Geneva, sans-serif; font-size:25px;width:1000px;">Help My Home</div><br clear="all" />
<div style="font-family:Verdana, Geneva, sans-serif; font-size:11px;">Please click on the appropriate option.
<br>
Best viewed in Google Chrome</div>
<br clear="all">
-->
<!-- Sign-up and Login Links Starts Here -->
<center>
<div style=" float: right;width:700px; margin-top:50px;">
<p>
<a href="../Signup_Cust.php" id="vpb_general_button" >Sign Up Box for Customers</a><br></p>
<p><br><a href="../Signup_Servp.php" id="vpb_general_button" >Sign Up box for Service Providers</a></p>
<br>
</p>
<p><a href="logincust.php" id="vpb_general_button" onClick="vpb_show_login_box();">Login Box for Customers</a></p>
<br>
<p><a href="loginsp.php" id="vpb_general_button" onClick="vpb_show_login_box1();">Login Box for Service Providers</a><br></p>
<p><br><a href="loginadmin.php" id="vpb_general_button" onClick="vpb_show_login_box1();">Login Box for Admin</a></p>
</div>
</center>
<br clear="all" />
<!-- Sign-up and Login Links Ends Here -->
<!-- Code Begins -->

<div id="vpb_pop_up_background"></div><!-- General Pop-up Background -->

<!-- Sign Up Box Starts Here -->
<div id="vpb_signup_pop_up_box">
<div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:16px; font-weight:bold;">Sign Up Box</div><br clear="all">
<div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;">To exit this sign-up box, click on the cancel button or outside this box..</div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Fullname:</div>
<div style="width:300px;float:left;" align="left"><input type="text" id="fullnames" name="fullnames" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Username:</div>
<div style="width:300px;float:left;" align="left"><input type="text" id="usernames" name="usernames" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Email Address:</div>
<div style="width:300px;float:left;" align="left"><input type="text" id="emails" name="emails" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Password:</div>
<div style="width:300px;float:left;" align="left"><input type="password" id="passs" name="passs" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">&nbsp;</div>
<div style="width:300px;float:left;" align="left">
<a href="javascript:void(0);" class="vpb_general_button">Submit</a>
<a href="javascript:void(0);" class="vpb_general_button" onClick="vpb_hide_popup_boxes();">Cancel</a>
</div>

<br clear="all"><br clear="all">
</div>
<!-- Sign Up Box Ends Here -->








<!-- Login Box Starts Here -->

<div id="vpb_login_pop_up_box" class="vpb_signup_pop_up_box">
<form id="forms" method="post">
<div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:16px; font-weight:bold;">Customers Login Box</div><br clear="all">
<div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;">To exit this login box, click on the cancel button or outside this box..</div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Username:</div>
<div style="width:300px;float:left;" align="left"><input type="text" id="username_cust" name="username_cust" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Password:</div>
<div style="width:300px;float:left;" align="left"><input type="password" id="pass_cust" name="pass_cust" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">
<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">&nbsp;</div>
<div style="width:300px;float:left;" align="left">

<a href="try.php". class="vpb_general_button" >Login</a>

<a href="javascript:void(0);" class="vpb_general_button" onClick="vpb_hide_popup_boxes();">Cancel</a>
</div>

<br clear="all"><br clear="all">
</form>
</div>

<!-- Login Box Ends Here -->

<!-- Code Ends -->
<p style="margin-bottom:500px;"></p>
</center>
</body>
</html>
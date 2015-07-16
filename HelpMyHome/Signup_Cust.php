<html>
<head>
	<title>Signup</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="imagetoolbar" content="no" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<meta name="copyright" content="" />

		<link href="inc/css/style.css" rel="stylesheet" type="text/css" />
		<link href="inc/css/zurb_buttons.css" rel="stylesheet" type="text/css" />
		<link href="header.css" rel="stylesheet" type="text/css"/>


	

</head>
<body>

		<?php require "header.php"; ?>
		<?php

include_once 'inc/php/functions.php';

mysql_connect('localhost', 'root', '','project') or die("I couldn't connect to your database, please make sure your info is correct!");
mysql_select_db('project') or die("I couldn't find the database table ($table) make sure it's spelt right!");

//setup some variables/arrays
$action = array();
$action['result'] = null;

$text = array();

//check if the form has been submitted
	if(isset($_POST['signup'])){

		//cleanup the variables
		//prevent mysql injection
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$email = mysql_real_escape_string($_POST['email']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$address = mysql_real_escape_string($_POST['address']);
		?>

		<!--Account created. Click <a href="Login/logincust.php"> here </a>to login.-->
		<?php
		//quick/simple validation
		if(empty($username)){ $action['result'] = 'error'; array_push($text,'You forgot your username'); }
		if(empty($password)){ $action['result'] = 'error'; array_push($text,'You forgot your password'); }
		if(empty($email)){ $action['result'] = 'error'; array_push($text,'You forgot your email'); }
		if(empty($phone)){ $action['result'] = 'error'; array_push($text,'You forgot your phone'); }
		if(empty($address)){ $action['result'] = 'error'; array_push($text,'You forgot your address'); }

		if($action['result'] != 'error'){
					
			$password = md5($password);	
				
			//add to the database
			$add = mysql_query("INSERT INTO users VALUES(NULL,'$username','$email','$address','$phone','$password')");
			
			if(!$add){
			
				$action['result'] = 'error';
				array_push($text,'User could not be added to the database. Reason: ' . mysql_error());
			
			}
		
		}
		
		$action['text'] = $text;

	}

?>
		<div id="content">
		
		<h1>Signup Today!</h1>



<?php
//include 'inc/elements/header.php'; ?>

<?= show_errors($action); ?>
<?php

?>
<form name="reg" method="post" action="Signup_Cust.php">

    <fieldset>
    
    	<ul>
    		<li>
    			<label for="username">Username:</label>
    			<input type="text" name="username" />
    		</li>
    		<li>
    			<label for="password">Password:</label>
    			<input type="password" name="password" />
    		</li>
    		<li>
    			<label for="conf_password">Confirm Password:</label>
    			<input type="password" name="conf_password" />
    		</li>
    		<li>
    			<label for="email">Email:</label>
    			<input type="email" name="email" />	
    		</li>
    		<li>
    			<!--label for="choice" id="servp">Service Provider</label>
    			<input type="radio" name="choice" value="service_provider">
    			<label for="choice" id="cust">Customer</label>
    			<input type="radio" name="choice" value="customer"!-->
    		</li>
    		<li>
    			<label for="phone">Phone:</label>
    			<input type="tel" name="phone" title='Phone Number (Format: +99(999)999-9999)' pattern="[\+]\d{2}[\(]\d{3}[\)]\d{3}[\-]\d{4}"/>
    		</li>
    		<li id="addr">
    			<label for="address">Address:</label>
    			<input type="text" name="address" />	
    		</li>
    		
    		<li>
    			<input type="submit" value="Signup Now" class="large grey button" name="signup" />			
    		</li>
    	</ul>
    	
    </fieldset>
    
</form>			
		
		</div> <!-- content -->

	</body>

</html>
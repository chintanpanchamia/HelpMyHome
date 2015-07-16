<HTML>
<HEAD>
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

</HEAD>


<BODY>
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
		$conf_password = mysql_real_escape_string($_POST['conf_password']);
		$email = mysql_real_escape_string($_POST['email']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$work_address = mysql_real_escape_string($_POST['work_address']);
		$area = mysql_real_escape_string($_POST['area']);
		$cost = mysql_real_escape_string($_POST['cost']);
		
		
		$type = $_POST['type'];
		?>
			<!--Account created. Click <a href="Login/loginsp.php"> here </a>to login.-->
		

		<?php

		
		//quick/simple validation
		if(empty($username)){ $action['result'] = 'error'; array_push($text,'You forgot your username'); }
		if(empty($password)||$password != $conf_password){ $action['result'] = 'error'; array_push($text,'There appears to be some problem with the Password you entered!'); }
		if(empty($email)){ $action['result'] = 'error'; array_push($text,'You forgot your email'); }
		if(empty($phone)){ $action['result'] = 'error'; array_push($text,'You forgot your phone'); }
		if(empty($work_address)){ $action['result'] = 'error'; array_push($text,'You forgot your address'); }
		if(empty($type)||count($type) > 3){ $action['result'] = 'error'; array_push($text,'You forgot to mark your areas of expertise'); }


		if(count($type) == 1)
		{
			$type1 = $type[0]." ";
			$type2 = null;
			$type3 = null;
		}
		if(count($type) == 2)
		{	
			$type1 = $type[0]." ";
			$type2 = $type[1]." ";
			$type3 = null;
		}
		if(count($type) == 3) 
		{
			$type1 = $type[0]." ";
			$type2 = $type[1]." ";
			$type3 = $type[2]." ";
		}


		if($action['result'] != 'error'){
					
			$password = md5($password);	
				
			//add to the database
			$add = mysql_query("INSERT INTO servicep_temp VALUES('$username','$password','$email','$type1','$type2','$type3','$area','$cost','$phone','$work_address')");
			
			if(!$add){
			
				$action['result'] = 'error';
				array_push($text,' Reason: ' . mysql_error());
			
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



<form name="reg" method="post" action="Signup_Servp.php">

    <fieldset>
    
    	<ul>
    		<li>
    			<label for="username">Username:</label>
    			<input type="text" name="username"/>
    		</li>
    		<li>
    			<label for="password">Password:</label>
    			<input type="password" name="password"/>
    		</li>
    		<li>
    			<label for="conf_password">Confirm Password:</label>
    			<input type="password" name="conf_password"/>
    		</li>
    		<li>
    			<label for="email">Email:</label>
    			<input type="email" name="email"/>	
    		</li>
    		<li><p><h2>Please select Your area of Expertise and Your regions of operation</h2></p>
    			<!--select name="service" id="service" required!-->
    				<input type="checkbox" name="type[]" value="Plumber"/><label>Plumber</label>
    				<input type="checkbox" name="type[]" value="Electrician"><label>Electrician</label>
    				<input type="checkbox" name="type[]" value="Carpenter"><label>Carpenter</label>
    				<input type="checkbox" name="type[]" value="Technician"><label>Technician</label>
    				<input type="checkbox" name="type[]" value="Computer_engineer"><label>Computer Engineer</label>
    			<!--/select!-->
    			<select name="area" id="area">
    				<option value="Virar to Bhayander">Virar to Bhayander</option>
    				<option value="Mira Road to Borivali">Mira Road to Borivali</option>
    				<option value="Kandivali to Andheri">Kandivali to Andheri</option>
    				<option value="Vile Parle to Bandra">Vile Parle to Bandra</option>
    				<option value="Mahim to Dadar">Mahim to Dadar</option>
    				<option value="Elphinstone to Churchgate">Elphinstone to Churchgate</option>
    			</select>
    			<p><h2>How much would you charge as the Base Price?</h2></p>
    			<input type="text" name="cost" id="cost"/>
    		</li>
    		<li>
    			<label for="phone">Phone:</label>
    			<input type="tel" name="phone" title='Phone Number (Format: +99(999)999-9999)' pattern="[\+]\d{2}[\(]\d{3}[\)]\d{3}[\-]\d{4}">
    		</li>
    		<li id="address">
    			<label for="work_address">Work Address:</label>
    			<input type="text" title="Your office address" name="work_address" id="work_address" />	
    		</li>
    		
    		<li>
    			<input type="submit" value="Signup Now" class="large grey button" name="signup" />			
    		</li>
    	</ul>
    	
    </fieldset>
    
</form>			
		
		</div> <!-- content -->
</BODY>
</HTML>
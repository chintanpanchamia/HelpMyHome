<html>
<head>
<title>Edit Profile</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>


<?php
require 'core.inc.php';
    if(!loggedin())
          {
            header("location: Login/index.php");
           }
$db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
mysql_select_db('project');
$uid = $_GET['uid'];
$query = "SELECT * FROM users WHERE customer_id='$uid'";
$result = mysqli_query($db,$query);
$row = mysqli_fetch_array($result);




if(isset($_POST['savechanges'])){

		//cleanup the variables
		//prevent mysql injection
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$email = mysql_real_escape_string($_POST['email']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$address = mysql_real_escape_string($_POST['address']);

		
		//quick/simple validation
		if(empty($username)){ $action['result'] = 'error'; array_push($text,'You forgot your username'); }
		if(empty($password)){ $action['result'] = 'error'; array_push($text,'You forgot your password'); }
		if(empty($email)){ $action['result'] = 'error'; array_push($text,'You forgot your email'); }
		if(empty($phone)){ $action['result'] = 'error'; array_push($text,'You forgot your phone'); }
		if(empty($address)){ $action['result'] = 'error'; array_push($text,'You forgot your address'); }

		if($action['result'] != 'error'){
					
			$password = md5($password);	
				
			//add to the database
			$add = mysqli_query("UPDATE users SET name='$username', address='$address', phone='$phone', password='$password' WHERE customer_id='$uid';");
			
			
			if(!$add){
			
				$action['result'] = 'error';
				array_push($text,'User could not be added to the database. Reason: ' . mysql_error());
			
			}
		
		}
		
		$action['text'] = $text;

	}




?>


<?php
	$some="search.php?uid=".$uid;
?>

<form name="edit" method="post" action=<?php echo "$some"; ?>>

    <fieldset>
    
    	<ul>
    		<li>
    			<label for="username">Username:</label>
    			<input type="text" value="<?php echo $row['name']; ?>" name="username" />
    		</li>
    		<li>
			<?php 
					$decrypted = decryptIt( $row['password'] );
					function decryptIt( $q ) 
						{
							$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
							$qDecoded  = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
							return( $qDecoded );
						}
			?>
    			<label for="password">Password:</label>
    			<input type="password" value="<?php echo $decrypted; ?>" name="password" />
    		</li>
    		<li>
    		</li>
    		<li>
    			<label for="email">Email:</label>
    			<input disabled="true" type="email" value="<?php echo $row['email']; ?>" name="email"/>	
    		</li>
    		
    		<li>
    			<label for="phone">Phone:</label>
    			<input type="tel" name="phone" value="<?php echo $row['phone']; ?>" title='Phone Number (Format: +99(999)999-9999)' pattern="[\+]\d{2}[\(]\d{3}[\)]\d{3}[\-]\d{4}"/>
    		</li>
    		<li>
    			<label for="address">Address:</label>
    			<input type="text" value="<?php echo $row['address']; ?>" name="address" />	
    		</li>
    		
    		<li>
    			<input type="submit" value="Save Changes" class="large grey button" name="savechanges" />			
    		</li>
    	</ul>
    	
    </fieldset>
    
</form>






</body>

</html>
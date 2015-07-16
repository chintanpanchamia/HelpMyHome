<html>
<head>
	<title> Thank You </title>
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
	$time = $_POST['time'];
	$problem = $_POST['problem'];
	$spid = $_GET['id'];
	$service = $_GET['service'];
	$uid=$_GET['uid'];
	$dateS=$_GET['dateS'];
	$db = mysqli_connect( 'localhost' , 'root' ,'','project') or die("error");
    mysql_select_db('project');
    $url="search.php?uid=".$uid;

    define('UPLOADPATH', 'uploads/');      //make a folder in ur directory same as uploads as in ,inside same folder where ur rit.php exists

    
    
    define('MAXFILESIZE',32768000);
       
    // check if a file was submitted
    if (isset($_POST['submit'])) 
    {
    


        $directory = $uid.'/';

        $where = UPLOADPATH.$directory;

        if(!file_exists($where))
        {
            mkdir($where,0777);
        }
                
        $userfile = $_FILES['userfile']['name'];
                
        $userfile_type = $_FILES['userfile']['type'];
                
        $userfile_size = $_FILES['userfile']['size']; 

        if (!empty($userfile)) 
        {
            if ((($userfile_type == 'image/gif') || ($userfile_type == 'image/jpeg') || ($userfile_type == 'image/pjpeg') || ($userfile_type == 'image/png'))
                && ($userfile_size > 0) && ($userfile_size <= MAXFILESIZE)) 
            {
                        
                if ($_FILES['userfile']['error'] == 0) 
                {
                            // Move the file to the target upload folder
                    $target = UPLOADPATH .$directory. $userfile;
                    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $target)) 
                    {
                        // Connect to the database
                        //$dbc = mysqli_connect($host, $user, $pass, $db);

                        

                        // Write the data to the database
                        
                $sql="INSERT into requests(spid, uid, dateS, time, service, problem, photo, status) values ('$spid','$uid','$dateS','$time','$service','$problem','$userfile','Pending' )";
				$result = mysqli_query($db,$sql);

                                
                        $userfile = "";
                                //close database
                        //mysqli_close($dbc);
                        
                        //header('Location: php_exp_add.php');
                    }
                    else 
                    {
                        echo '<p class="error">Sorry, there was a problem uploading your image.</p>';
                    }
                }
            }
            else 
            {
                echo '<p class="error">The image must GIF, JPEG, or PNG image file no greater than ' . (MAXFILESIZE / 1024) . ' KB in size.</p>';
            }

            // Try to delete the temporary screen shot image file
            @unlink($_FILES['userfile']['tmp_name']);
        }
        else if(empty($userfile))
        {
            //no image uplaoded    
				$sql="INSERT into requests(spid, uid, dateS, time, service, problem, photo, status) values ('$spid','$uid','$dateS','$time','$service','$problem','','Pending' )";
				$result = mysqli_query($db,$sql);
            //echo 'No file inserted!';
            
        }
    }

 ?>
	<font color="white">
	<h1> Your appointment has been made. Kindly wait for confirmation.</h1>
	<h2>Check your log.</h2>
	<h2>Click <a href=<?php echo "'$url'"; ?>>here</a> to go home </h2>
</font>
</body>
</html>
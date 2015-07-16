<?php
ob_start();
session_start();
$current_file=$_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
{
	$http_referer=$_SERVER['HTTP_REFERER'];
}
function loggedin()
{
	if(isset($_SESSION['testing']) && !empty($_SESSION['testing']))
	{return true;}
	else
	{return false;}
}

?>
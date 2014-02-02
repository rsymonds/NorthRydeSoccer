<?php 

session_start();

$username = $_POST['UserName'];

$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];

$_POST['message'] = '';

$redirect = $_SESSION['redirect'];

// To be completed: 
//					Check the old password before change
//					Improve the design

if (($username != null) && ($newpassword != null)) {

	//connect to the database here

	$mysqlHostname = 'localhost';

	$mysqlUsername = 'northryd_admin';

	$mysqlPassword = 'n0rthryde';

	$mysqlDatabase = 'northryd_news';



	if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {

		die(mysql_errno().' : '.mysql_error());

	}



	if (!mysql_select_db($mysqlDatabase)) {

		die(mysql_errno().' : '.mysql_error());

	}
	
	$query = 'update Managers SET `password`=\''.$newpassword.'\', `changepw`=\' \' WHERE username = \''.$username.'\'';

	$result = mysql_query($query);
	
	mysql_close($link);
	header('Location:ManagerAdmin.php');
}
?>
	
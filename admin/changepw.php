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

	include 'PHP/database.php';
$dbObject = new database();
            $dbObject->getConnection();
	
	$query = 'update Managers SET `password`=\''.$newpassword.'\', `changepw`=\' \' WHERE username = \''.$username.'\'';

	$result = mysql_query($query);
	
	$dbObject->closeConnection();
	header('Location:ManagerAdmin.php');
}
?>
	
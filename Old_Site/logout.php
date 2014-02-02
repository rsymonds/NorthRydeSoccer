<?php 

session_start();

if (isset($_SESSION['ManagerLoggedIn'])) {
  unset($_SESSION['ManagerLoggedIn']);
  }
  
 if (isset($_SESSION['loggedin'])) {
  unset($_SESSION['loggedin']);
  }
  
session_destroy();



	header('Location:index.php');

?>
	
<?php 
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$message = $_POST['message'];
$_POST['message'] = "";
$redirect = $_SESSION["redirect"];


if (($username != null) && ($password != null)) {
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

	$query = 'SELECT * FROM Managers WHERE username = \''.$username.'\'';
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) < 1) //no such user exists
	{	
		//print 'No results found';
		$_POST['message'] = 'Username or password incorrect';
		//header('Location: login.php');
	}

	 $row = mysql_fetch_array($result, MYSQL_ASSOC);
	$sqlpassword = $row['password'];	$changepw = $row['changepw'];
	$age_group = $row['age_group'];	$division = $row['division'];	$editscore = $row['updatescores'];
	
	if($sqlpassword != $password) 
	{
		$message = 'Incorrect password';
		//print 'passwords do not match';
		
	}  
	else {
		$_SESSION['ManagerLoggedIn'] = 'X';		$_SESSION['UserName'] = $username;		$_SESSION['age_group'] = $age_group;		$_SESSION['division'] = $division;		$_SESSION['editscore'] = $editscore;				if ( $changepw == 'X' ) {			$_SESSION['oldpassword'] = $sqlpassword;			header('Location: changemanagerpw.php');			die();		} else {			$_SESSION['redirect'] = '';			
			if ( ( $redirect == 'managerlogin.php' ) || ( $redirect == null )) {
				//print 'redirect to home page by force';
				header('Location: ManagerAdmin.php');
				die();
					
			} else {
				//print $redirect;
				//print 'redirect by variable';
				header('Location: ' . $redirect );
				die();
			}		}
	}
}
?>

<?php readfile("../headerNSB.inc"); ?>
<!-- title -->

<div id="sitemenu-container">
						<div id="sitemenu">
	<h2 class="hidden">Site Navigation<a href="#page-content" rel="nofollow">[Skip]</a></h2>
	<div id="sitemenu-content">
		
	</div> <!-- /sitemenu-content -->
</div> <!-- /sitemenu -->
					</div> <!-- sitemenu-container -->
				</div> <!-- page-top -->
<div class="clear below-page-top"></div>
				<div id="page-content" class="no-navigation">
					
					<div id="main">
						<div id="main-top"></div>
                            						<div id="main-content">
							<h2 class="title"><span class="in">Team Manager Login</span></h2>
							<div class="article">
								<div class="article-content">
	<div class="RichTextElement">
		<div><p>

<form name="login" action="managerlogin.php" method="post">    
Username:</td><td> <input type="text" name="username" />   
<tr><td>Password:</td><td> <input type="password" name="password" />   

<input type="submit" value="Login" /></form>
<?php print $message;?>
</p>
		</div>
	</div>
</div> <!-- /article-content -->
								<div class="article-info">
								</div> <!-- /article-info -->
							</div> <!-- /article -->
							
						</div> <!-- main-content -->
						<div id="main-bottom"></div>
					</div> <!-- main -->
				</div> <!-- content -->
				
				
<?php readfile("../footer.inc"); ?>
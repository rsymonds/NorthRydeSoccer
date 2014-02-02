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
				header('Location: index.php');
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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>  <title>North Ryde Soccer - Administration</title>  
<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />  <meta name="keywords" content="north ryde soccer club" />  
<meta name="description" content="North Ryde Soccer Club" />  

<script type="text/javascript" src="javascript/nrs_scripts.js"></script>  
<link type="text/css" rel="stylesheet" href="stylesheets/nrs_styles.css" />  
<link type="image/x-icon" rel="icon" href="images/objects/favicon.ico" />  
<link type="image/x-icon" rel="shortcut icon" href="images/objects/favicon.ico" />  
</head>

<body>
<script type="text/javascript">function Go() {return;}</script>
<noscript>Your browser does not support JavaScript</noscript>

<table class="pagearea" cellspacing="0" cellpadding="0">
<!-- Top section -->
<tr class="bgblue">  
	<td>    
		<table class="fullwidth" cellspacing="0" cellpadding="0">    
		<!-- Logo and emblem -->    
		<tr>      
			<td>        
				<a href="">        <img class="noborder" src="images/objects/nrs_logo.gif" alt="Click for Front Page"></a>      </td>      
			<td rowspan="3">        
				<table align="right" cellspacing="0" cellpadding="0">        
					<tr>          
						<td><img class="noborder" src="images/objects/nrs_emblem.jpg"></td>        </tr>       
				</table>     
			</td>   
		</tr>    
		<!-- Site menu     <?php readfile("topmenu.inc"); ?>      Spacer -->   
		<tr><td class="spacermediumY"></td></tr>    
		</table>  
	</td>
</tr>
<tr>  
	<td>    
		<table cellspacing="0" cellpadding="0">    
			<tr>      <!-- Menu -->      
				<td class="menuarea"></td>      <!-- Main content -->      
				<td class="contentarea top">        
					<table class="fullwidth" cellspacing="0" cellpadding="0">        <!-- Page title and submenu -->       
						<tr>         
							<td class="titlearea">            
								<table class="fullwidth" cellspacing="0" cellpadding="0">            
									<tr>              <!-- Page title -->              
										<td class="title">Manager Login</td>           
									</tr>            
								</table>          
							</td>        
						</tr>         
						<tr>
							<td class="spacermediumY"></td>
						</tr>        
						<tr><td class="spacermediumY"></td></tr>        <!-- Page content --> 
						<tr>          
							<td>            
								<table align="center" class="contentwidth" cellspacing="0" cellpadding="0">             
									<tr>              
										<td>                
											<table class="fullwidth" cellspacing="0" cellpadding="0">                
												<tr>                  <!-- Left Column -->                  
													<td class="threefifths top">                    
														<table class="fullwidth" cellspacing="0" cellpadding="0">                    
															<tr>                    
																<td>						    
																	<table width="600">
						
																		<tr>
																			<td with="100">
<form name="login" action="managerlogin.php" method="post">    
Username:</td><td> <input type="text" name="username" />    </td></tr>
<tr><td>Password:</td><td> <input type="password" name="password" />    </td></tr>
<tr><td>
<input type="submit" value="Login" /></form>
<?php print $message;?></td></tr>

																	</table>						   						   
																</td>
															</tr>						   						  				        
														</table>      
													</td>   
												</tr>        
											</table>  
										</td>
									</tr>
								</table>    
							</body>
						</html>
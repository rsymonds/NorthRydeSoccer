<?php  session_start(); 
$loggedin = $_SESSION['loggedin'];
    if ($loggedin != 'X') {
    	$_SESSION['redirect'] = 'newsadmin.php';
    	header('Location:login.php');
    }?>

<html>
<head>
  <title>North Ryde Soccer - Administration</title>
  <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />
  <meta name="keywords" content="north ryde soccer club" />
  <meta name="description" content="North Ryde Soccer Club" />
  <script type="text/javascript" src="javascript/nrs_scripts.js"></script>
  <link type="text/css" rel="stylesheet" href="stylesheets/nrs_styles.css" />
  <link type="image/x-icon" rel="icon" href="images/objects/favicon.ico" />
  <link type="image/x-icon" rel="shortcut icon" href="images/objects/favicon.ico" />
  
</head>
<body>
<script type="text/javascript">function Go() {return;}</script>
<script type="text/javascript" src="javascript/menu_variables_admin.js"></script>
<script type="text/javascript" src="javascript/menu.js"></script>
<script type="text/javascript">
function submitForm(action) {
	form = document.messageform;	
	element = form.elements["action"];	
	element.value = action;

	form.submit();
}

</script>

<noscript>Your browser does not support JavaScript</noscript>
<table class="pagearea" cellspacing="0" cellpadding="0">
<!-- Top section -->
<tr class="bgblue">
  <td>
    <table class="fullwidth" cellspacing="0" cellpadding="0">
    <!-- Logo and emblem -->
    <tr>
      <td>
        <a href="">
        <img class="noborder" src="images/objects/nrs_logo.gif" alt="Click for Front Page"></a>
      </td>
      <td rowspan="3">
        <table align="right" cellspacing="0" cellpadding="0">
        <tr>
          <td><img class="noborder" src="images/objects/nrs_emblem.jpg"></td>
        </tr>
        </table>
      </td>
    </tr>
    <!-- Site menu 
    <?php readfile("topmenu.inc"); ?> 
     Spacer -->
    <tr><td class="spacermediumY"></td></tr>
    </table>
  </td>
</tr>
<tr>
  <td>
    <table cellspacing="0" cellpadding="0">
    <tr>
      <!-- Menu -->
      <td class="menuarea"></td>
      <!-- Main content -->
      <td class="contentarea top">
        <table class="fullwidth" cellspacing="0" cellpadding="0">
        <!-- Page title and submenu -->
        <tr>
          <td class="titlearea">
            <table class="fullwidth" cellspacing="0" cellpadding="0">
            <tr>
              <!-- Page title -->
              <td class="title">Home Page Administration</td>
            </tr>
            </table>
          </td>
        </tr>
         <tr><td class="spacermediumY"></td></tr>
        <tr><td class="spacermediumY"></td></tr>
        <!-- Page content -->
        
         <tr>
          <td>
            <table align="center" class="contentwidth" cellspacing="0" cellpadding="0">
             <tr>
              <td>
                <table class="fullwidth" cellspacing="0" cellpadding="0">
                <tr>
                  <!-- Left Column -->
                  <td class="threefifths top">
                    <table class="fullwidth" cellspacing="0" cellpadding="0">
                    <tr>
                    <td>
						    <form name="messageform" action="homeadmin.php" method="POST">
						    <input type=hidden name="action" />
						
						<?php 
						
						$action = $_POST["action"];						$infomessage = $_POST["comments"];
						$_POST["action"] = '';
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
						
						if ($action == 'clear') {
							$deletequery = 'Update `Message` SET `Message`=\'\' WHERE id = \'1\'';
							 if (!$results = mysql_query($deletequery)) {
							die(mysql_errno().' : '.mysql_error());
							}
							else {
								$message = 'The message has been cleared';
							} 
							
						}
						
						if ($action == 'update') {
							$query = 'Update `Message` SET `Message`=\''.$infomessage.'\' WHERE id = \'1\'';							$results = mysql_query($query);
							if (mysql_affected_rows() == 0) {										print 'Message not updated';										print 'Submitted update: '.$query.'<br>';								}
							else {
								$message = 'The message has been updated';
							}
								
						}
						
						$query = 'SELECT * FROM Message where id = \'1\'';
						
						if (!$result = mysql_query($query)) {
						die(mysql_errno().' : '.mysql_error());
						}
						
						$row = mysql_fetch_array($result, MYSQL_ASSOC);
						                          
						$infomessage = $row['Message'];
						
						
						?>
						
<textarea name="comments" cols="40" rows="5">
<?php print $infomessage; ?>
</textarea>
						
					<br>	
						
						<button type="button" onClick="Javascript:submitForm('update');">Update Message</button>
						<button type="button" onClick="Javascript:submitForm('clear');">Clear Message</button>
						</form>
						<?php print $message; 
						mysql_close($link);?>
						   </span>
						   
						   </td></tr>
						   
						  
				
        </table>
      </td>
    </tr>
    
    </table>
  </td>
</tr><?php include 'message.inc'; ?>
</table>
    </body>

</html>
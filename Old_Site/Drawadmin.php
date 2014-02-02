<?php  session_start(); 
$loggedin = $_SESSION['loggedin'];
    if ($loggedin != 'X') {
    	$_SESSION['redirect'] = 'Drawadmin.php';
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
function validate() {	alert('validate);	//form = document.fileform;	//year = form.elements['year'];	//file = form.elements['file'];	//if (year == null || year == '') {	//	alert("Year is a required field");	//	return null;	//}	//if (!IsNumeric(year.value()) ) {	//	alert("Enter a valid year");	//	return false;	//}	//if (file == null || file.value() == "" ) {	//	alert("File is a required field");	//	return false;	//}}function IsNumeric(sText){   var ValidChars = "0123456789.";   var IsNumber=true;   var Char;    for (i = 0; i < sText.length && IsNumber == true; i++)       {       Char = sText.charAt(i);       if (ValidChars.indexOf(Char) == -1)          {         IsNumber = false;         }      }   return IsNumber;      }
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
              <td class="title">Draw Upload Administration</td>
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
						    <table width="600"><form name="fileform" action="drawupload.php" method="post" enctype="multipart/form-data"><tr><td width="20%">Year</td><td><input type="text" name="year"/><tr><td width="20%">Select file</td><td width="80%"><input type="file" name="file" id="file" /></td></tr><tr><td>Submit</td><td><input type="submit" name="submit" onClick="validate();"/></td></tr></form></table>
						   
						   </td></tr>
						   
						  
				
        </table>
      </td>
    </tr>
    
    </table>
  </td>
</tr>
</table>
    </body>

</html>
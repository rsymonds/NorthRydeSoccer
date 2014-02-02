<?php 

session_start();

$username = $_SESSION['UserName'];

$redirect = $_SESSION['redirect'];

$oldpassword = $_SESSION['oldpassword'];
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

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

  <script type="text/javascript">
  
  <?php print 'var oldpassword = \''.$oldpassword.'\';'; ?>
  
  
function checkPass() {
   form = document.changepassword;
   newPass = form.elements["newpassword"];
   oldPass = form.elements["oldpassword"];
   confirmPass = form.elements["confirmpassword"];
   if (newPass.value != confirmPass.value) {
       alert("Passwords do not match.");
       return false;
   }

   if (newPass.value.length < 6) {
		alert('Please ensure the new password is at least 6 characters long');
		return false;
   }
   
   if (newPass.value == oldPass.value ) {
		alert('Please ensure the new password is different to the old password');
		return false;
		}
	if (oldPass.value != oldpassword ) {
		alert('Old Password is incorrect');
		return false;
		}	
		
   form.submit();
}
</script>
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

              <td class="title">Manager Login</td>

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

						    <table width="600">
							<tr><td>

<form name="changepassword" action="changepw.php" method="post">    
 
<input type="hidden" name="UserName" value="<?php print $username; ?>">
Old Password: <input type="password" name="oldpassword" />    
</td></tr>
<tr><td>
New Password: <input type="password" name="newpassword" />
</td></tr>
<tr><td>
Confirm Password: <input type="password" name="confirmpassword" />
</td></tr>
<tr><td>
<button type="button" onClick="Javascript:checkPass();">Change Password</button>

</td></tr>


</table>

						   

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

<?php 

session_start();

$username = $_SESSION['UserName'];

$redirect = $_SESSION['redirect'];

$oldpassword = $_SESSION['oldpassword'];
?>


<?php readfile("../headerNSB.inc"); ?>
<!-- title -->


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


<form name="changepassword" action="changepw.php" method="post">    
 
<input type="hidden" name="UserName" value="<?php print $username; ?>">
Old Password: <input type="password" name="oldpassword" />    <br/>
<br/>
New Password: <input type="password" name="newpassword" /><br/>

Confirm Password: <input type="password" name="confirmpassword" /><br/>
<br/>
<button type="button" onClick="Javascript:checkPass();">Change Password</button>


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
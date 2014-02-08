<?php  session_start(); 
$loggedin = $_SESSION['loggedin'];
    if ($loggedin != 'X') {
    	$_SESSION['redirect'] = 'newsadmin.php';
    	header('Location:login.php');
    }?>

<?php readfile("../headerNSB.inc"); ?>
<!-- title -->

<div id="sitemenu-container">
						<div id="sitemenu">
	<h2 class="hidden">Site Navigation<a href="#page-content" rel="nofollow">[Skip]</a></h2>
	<div id="sitemenu-content">
	<ul>
			<li class="i1 o"><span class="in"><a href="siteadmin.php" title="Logout"><span class="in">News</span></a></li>
			<li class="i2 e currentPage"><span class="in"><span class="in">Urgent Message</span></li>
			<li class="i3 o"><span class="in"><a href="logout.php" title="Logout"><span class="in">Logout</span></a></li>
			</li>
		</ul>
		
	</div> <!-- /sitemenu-content -->
</div> <!-- /sitemenu -->
					</div> <!-- sitemenu-container -->
				</div> <!-- page-top -->
<script type="text/javascript">
function submitForm(action) {
	form = document.messageform;	
	element = form.elements["action"];	
	element.value = action;

	form.submit();
}

</script>

<div class="clear below-page-top"></div>
				<div id="page-content" class="no-navigation">
					
					<div id="main">
						<div id="main-top"></div>
                            						<div id="main-content">
							<h2 class="title"><span class="in">Draw Upload</span></h2>
							<div class="article">
								<div class="article-content">
	<div class="RichTextElement">
	<div><p>
                    <table class="fullwidth" cellspacing="0" cellpadding="0">
                    <tr>
                    <td style="border:0;">
						    <form name="messageform" action="homeadmin.php" method="POST">
						    <input type=hidden name="action" />
						
						<?php 
						
						$action = $_POST["action"];						$infomessage = $_POST["comments"];
						$_POST["action"] = '';
						include 'PHP/database.php';
$dbObject = new database();
            $dbObject->getConnection();
						
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
						$dbObject->closeConnection();?>
						   </span>
						   
						   </td></tr>
						   
						  
				
        </table>
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
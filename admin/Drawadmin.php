<?php  session_start(); 
$loggedin = $_SESSION['loggedin'];
    if ($loggedin != 'X') {
    	$_SESSION['redirect'] = 'Drawadmin.php';
    	header('Location:login.php');
    }?>

<?php readfile("../headerNSB.inc"); ?>
<!-- title -->

<div id="sitemenu-container">
						<div id="sitemenu">
	<h2 class="hidden">Site Navigation<a href="#page-content" rel="nofollow">[Skip]</a></h2>
	<div id="sitemenu-content">
	<ul>
			<li class="i1 o currentPage"><span class="in"><span class="in">Draw Upload</span></li>
			<li class="i2 e"><a href="ResultsUpload.php" title="Logout"><span class="in"><span class="in">Results Upload</span></a></li>
			<li class="i3 o"><span class="in"><a href="logout.php" title="Logout"><span class="in">Logout</span></a></li>
			</li>
		</ul>
		
	</div> <!-- /sitemenu-content -->
</div> <!-- /sitemenu -->
					</div> <!-- sitemenu-container -->
				</div> <!-- page-top -->
<script type="text/javascript">
function validate() {	alert('validate);	//form = document.fileform;	//year = form.elements['year'];	//file = form.elements['file'];	//if (year == null || year == '') {	//	alert("Year is a required field");	//	return null;	//}	//if (!IsNumeric(year.value()) ) {	//	alert("Enter a valid year");	//	return false;	//}	//if (file == null || file.value() == "" ) {	//	alert("File is a required field");	//	return false;	//}}function IsNumeric(sText){   var ValidChars = "0123456789.";   var IsNumber=true;   var Char;    for (i = 0; i < sText.length && IsNumber == true; i++)       {       Char = sText.charAt(i);       if (ValidChars.indexOf(Char) == -1)          {         IsNumber = false;         }      }   return IsNumber;      }
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
                    
						    <table width="600"><form name="fileform" action="drawupload.php" method="post" enctype="multipart/form-data"><tr><td width="20%" style="border:0;">Year</td><td style="border:0;"><input type="text" name="year"/><tr><td width="20%" style="border:0;">Select file</td><td width="80%" style="border:0;"><input type="file" name="file" id="file" /></td></tr><tr><td style="border:0;">Submit</td><td style="border:0;"><input type="submit" name="submit" onClick="validate();"/></td></tr></form></table>
						   
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
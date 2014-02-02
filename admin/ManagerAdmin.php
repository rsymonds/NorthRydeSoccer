<?php  session_start(); 
$loggedin = $_SESSION['ManagerLoggedIn'];
    if ($loggedin != 'X') {
    	$_SESSION['redirect'] = 'ManagerAdmin.php';
    	header('Location:managerlogin.php');
    }		$age_group = $_SESSION['age_group'];	$division = $_SESSION['division'];	$username = $_SESSION['UserName'];	$editscore = $_SESSION['editscore'];	$year = date('Y');	//$round_query = 'SELECT round, date FROM `Draw` WHERE age_group = \''.$age_group.'\' AND division = \''.$division.'\' AND year = \''.$year.'\'';	?>

<?php readfile("../headerNSB.inc"); ?>
<!-- title -->

<div id="sitemenu-container">
						<div id="sitemenu">
	<h2 class="hidden">Site Navigation<a href="#page-content" rel="nofollow">[Skip]</a></h2>
	<div id="sitemenu-content">
	<ul>
			<li class="i1 o"><span class="in"><a href="logout.php" title="Logout"><span class="in">Logout</span></a></li>
			</li>
		</ul>
		
	</div> <!-- /sitemenu-content -->
</div> <!-- /sitemenu -->
					</div> <!-- sitemenu-container -->
				</div> <!-- page-top -->
				
<script type="text/javascript">
function checkSelected(obj) {		
	if(obj.checked){ 			
		for (var i = 0; i < document.managerform.elements.length; i++ ) {		        
			if (document.managerform.elements[i].type == 'checkbox') {		            
				if (document.managerform.elements[i].checked == true) {		            	
					document.managerform.elements[i].checked=false;		            
				}		        
			}							
		}			
		obj.checked=true; 	
	}else{ 					
	} 		
}

function edit(url) {	
	form = document.managerform;	
	for (var i = 0; i < form.elements.length; i++ ) {        
		if (form.elements[i].type == 'checkbox') {            
			if (form.elements[i].checked == true) {     			
				if (form.elements[i].value == null) {     				
					alert("Please select an item to edit.");         			
				}     			
				else {            		
					url = url + "?id=" + form.elements[i].value;            		
					popupWindow = window.open(url,'popUpWindow','height=400,width=800,left=100,top=100,resizable=no,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes')     			
				}            
			}        
		}
	}
}
</script>
<div class="clear below-page-top"></div>
				<div id="page-content" class="no-navigation">
					
					<div id="main">
						<div id="main-top"></div>
                            						<div id="main-content">
							<h2 class="title"><span class="in">Report Administration</span></h2>
							<div class="article">
								<div class="article-content">
	<div class="RichTextElement">
		<div><p>
                	<?php 			
                		$mysqlDatabase = 'northryd_news';			
                		if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {			
                			die(mysql_errno().' : '.mysql_error());			
                		}						
                		
                		if (!mysql_select_db($mysqlDatabase)) {				
                			die(mysql_errno().' : '.mysql_error());			
                		}		
                	?>							 
                	<form name="managerform" action="ManagerAdmin.php" method="POST">            			
                	<?php						
                	$query = 'SELECT * FROM Draw where age_group = \''.$age_group.'\' and division = \''.$division.'\' and year = \''.$year.'\' order by round';					 
  
                		if (!$results = mysql_query($query)) {						
                			die(mysql_errno().' : '.mysql_error());					 
                		}															 
                					
                	?>			
                								 
                	<table class="fullwidth results" cellspacing="0" cellpadding="0">								 
                	<tr>								 
                	<th>&nbsp;</td>								 
                	 <th>RND</td>								  
                	  <th>DATE</td>								   
                	  <th>TIME</td>								   
                	  <th>OPPOSITION</td>								   
                	  <th>GROUNDS</td>								  
                	   <th>GF</td>								   
                	   <th>GA</td>								  
                	    <th>RESULT</td>								  
                	     <th>REPORT</td>								
                	     </tr>			
                	     
                	 <?php										
                	 while ($fixturerow = mysql_fetch_assoc($results)) {							
                	 	$oDate = new DateTime($fixturerow['date']);							
                	 	$sDate = $oDate->format("d M Y");							
                	 	$Goalsfor = $fixturerow['goals_for'];							
                	 	$Goalsagainst = $fixturerow['goals_against'];							
                	 	$Report = $fixturerow['report'];														
                	 	if (($Goalsfor == '-1') and ($Goalsagainst == '-1')) {								
                	 		$Goalsfor = '&nbsp';								
                	 		$Goalsagainst = '&nbsp';								
                	 		$Result = '<td></nbsp></td>';							
                	 	} else{								
                	 		if ($Goalsfor > $Goalsagainst) {								
                	 			$Result = '<td class="win">Win</td>';								
                	 		} else{ 									
                	 			if ($Goalsfor < $Goalsagainst) {										
                	 				$Result = '<td class="lose">Loss</td>';									
                	 			} else{										
                	 				if ($Goalsfor = $Goalsagainst) {											
                	 					$Result = '<td class="draw">Draw</td>';										
                	 						} else {											
                	 							$Result = '<td></nbsp></td>';										
                	 						}									
                	 				}								
                	 			}							
                	 		}							
                	 		$ReportText = '<td></nbsp></td>';						
                	 		if ($Report == '1') {							
                	 			$ReportText = '<td><img class="noborder" src="/images/objects/envelope.gif"></td>';						
                	 		}													  
                	 		print '<tr class="bgyellow"><td><input type=checkbox name="current" value="'.$fixturerow['round'].'" onClick="Javascript:checkSelected(this);"></td><td>'.$fixturerow['round'].'</td><td>'.$sDate.'</td><td>'.$fixturerow['time'].'</td><td>'.$fixturerow['opposition'].'</td><td>'.$fixturerow['field'].'</td><td>'.$Goalsfor.'</td><td>'.$Goalsagainst.'</td>'.$Result.$ReportText.'</tr>';					 
                	 	}								
                	 	mysql_close($link)					
                	 	?>                        
                	 	</table>                      
                	 	</td>                    
                	 	</tr>
						   
						  
						</form>
		
        <?php if ($editscore == 'X' ) { ?>		
        	<button type="button" onClick="Javascript:edit('editscore.php');">Edit Score</button>		
        <?php } ?>		
        <button type="button" onClick="Javascript:edit('editreport.php');">Edit Report</button>
        <button type="button" onClick="Javascript:edit('uploadimage.php');">Add Image</button>
      
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
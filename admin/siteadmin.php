<?php  session_start(); 
$loggedin = $_SESSION['loggedin'];
    if ($loggedin != 'X') {
    	$_SESSION['redirect'] = 'siteadmin.php';
    	header('Location:login.php');
    }?>

<?php readfile("header.inc"); ?>

<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
	url,'popUpWindow','height=400,width=400,left=100,top=100,resizable=no,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');
}

function checkSelected(obj) {
		if(obj.checked){ 
			for (var i = 0; i < document.newsform.elements.length; i++ ) {
		        if (document.newsform.elements[i].type == 'checkbox') {
		            if (document.newsform.elements[i].checked == true) {
		            	document.newsform.elements[i].checked=false;
		            }
		        }
					
		}
			obj.checked=true; 
		}else{ 
			
		} 		
}

function submitForm(action) {
	form = document.newsform;
	element = form.elements["action"];
	idelement = form.elements["id"];
	element.value = action;

	for (var i = 0; i < form.elements.length; i++ ) {
        if (form.elements[i].type == 'checkbox') {
            if (form.elements[i].checked == true) {
                if ((action == "delete") && (form.elements[i].name == "current")) {
					alert("Only archived items can be deleted!");	
					idelement.value = "";
                } else {
            	idelement.value = form.elements[i].value;
                }
            }
        }
			
}
	if (idelement.value != "") {
	form.submit();
	}
}

function editItem(url) {
	form = document.newsform;
	idelement = form.elements["id"];
	for (var i = 0; i < form.elements.length; i++ ) {
        if (form.elements[i].type == 'checkbox') {
            if (form.elements[i].checked == true) {
            	idelement.value = form.elements[i].value;
     			if (form.elements[i].value == null) {
     				alert("Please select an item to edit.");
         			}
     			else {
            		url = url + "?id=" + form.elements[i].value;
            		popupWindow = window.open(
            			url,'popUpWindow','height=400,width=400,left=100,top=100,resizable=no,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes')
     			}
            }
        }
}
}
</script>
<!-- title -->
					<div id="sitemenu-container">
						<div id="sitemenu">
	<h2 class="hidden">Site Navigation<a href="#page-content" rel="nofollow">[Skip]</a></h2>
	<div id="sitemenu-content">
		<ul>
			<li class="i1 o currentPage"><span class="in"><span class="in">News</span></li>
			<li class="i2 e"><span class="in"><a href="homeadmin.php" title="Logout"><span class="in">Urgent Message</span></a></li>
			<li class="i3 o"><span class="in"><a href="logout.php" title="Logout"><span class="in">Logout</span></a></li>
		</ul>
	</div> <!-- /sitemenu-content -->
</div> <!-- /sitemenu -->
					</div> <!-- sitemenu-container -->
				</div> <!-- page-top -->
				<div class="clear below-page-top"></div>
				<div id="page-content" class="">
					<div id="sidebar-container">
	<div id="sidebar">
  		<div id="sidebar-top"></div>
		<div id="sidebar-content">
			<h3 class="hidden">Sidebar<a rel="nofollow" href="#main">[Skip]</a></h3>
	<div class="pagelet bordered titled i1 o last-item">
			
		<h4 class="title pagelet-title"><span class="in">Instructions</span></h4>
    <div class="pagelet-body">

<div class="RichTextElement">
    
		<div>
			<p>Any text entered here will be displayed on the main page as an urgent message. This is used to update members if last minute changes to locations and cancellations. The message should be deleted once the event it was pertaining to has passed.</p>

		</div>
</div>
    </div>
</div>
		</div> <!-- sidebar-content -->
		<div id="sidebar-bottom"></div>	
	</div> <!-- sidebar -->
</div> <!-- sidebar-container -->
					<div id="main">
						<div id="main-top"></div>
                            						<div id="main-content">
							<h2 class="title"><span class="in">Current News</span></h2>
							<div class="article">
								<div class="article-content">
	<div class="RichTextElement">
		<div><p>

						
						                        <table id="table" cellspacing="0" cellpadding="0">
						                        <tr>
						                          <th>&nbsp;</th>
						                          <th>Date</th>
						                          <th>Time</th>
												  <th>Text</th>
												  <th>Location</th>
						                        </tr>
						                        <tr>         
						<?php 
						
						$action = $_POST["action"];
						$id = $_POST["id"];
						$_POST["action"] = '';
						$_POST["id"] = '';
						include 'PHP/database.php';
$dbObject = new database();
            $dbObject->getConnection();
						
						if ($action == 'delete') {
							$deletequery = 'DELETE FROM `News` WHERE id = \'' . $id . '\'';
							 if (!$results = mysql_query($deletequery)) {
							die(mysql_errno().' : '.mysql_error());
							}
							else {
								$message = 'The selected item has been deleted';
							} 
							
						}
						
						if ($action == 'archive') {
							$deletequery = 'UPDATE `News` SET `archive`=\'X\' WHERE ID = \'' . $id . '\'';
							if (!$results = mysql_query($deletequery)) {
								die(mysql_errno().' : '.mysql_error());
							}
							else {
								$message = 'The selected item has been archived';
							}
						
						}
						
						
						
						$query = 'SELECT * FROM News where archive != \'X\'';
						
						if (!$results = mysql_query($query)) {
						die(mysql_errno().' : '.mysql_error());
						}
						
						print  '<tr>';
						                          
						while ($row = mysql_fetch_assoc($results)) {
							$oDate = new DateTime($row['Date']);
							
							$sDate = $oDate->format("d M Y");
							
							print '<td><input type=checkbox name="current" value="'.$row['Id'].'" onClick="Javascript:checkSelected(this);"></td>';
						    	print '<td>'.$sDate.'</td>';
						    	print '<td>'.$row['Time'].'</td>';
						    	print '<td>'.$row['Text'].'</td>';
						    	print '<td>'.$row['Location'].'</td></tr>';
						       
						
						    }
						
						
						?>
						
						 </tr>
						                        </table>
						                      </td>
						                    </tr>
						                    <!-- End Latest News -->
						                    </table>
						
						<button type="button" onClick="Javascript:newPopup('addnews.php');">Add News Item</button>
						<button type="button" onClick="Javascript:editItem('editnews.php');">Edit News Item</button>
						<button type="button" onClick="Javascript:submitForm('archive');">Archive Selected News Item</button>
						<br/><br/>
						<h2 class="title"><span class="in">Archived News</span></h2>
						                      </td>
						                    </tr>
						                    <tr><td></td></tr>
						                    <tr>
						                      <td>
						                        <table id="table" cellspacing="0" cellpadding="0">
						                        <tr>
						                          <th>&nbsp;</th>
						                          <th>Date</th>
						                          <th>Time</th>
												  <th>Text</th>
												  <th>Location</th>
						                        </tr>
						                        <tr>
						           
						    <?php
						
						
						$query = 'SELECT * FROM News where archive = \'X\'';
						
						if (!$results = mysql_query($query)) {
						die(mysql_errno().' : '.mysql_error());
						}
						
						print  '<tr>';
						                          
						while ($row = mysql_fetch_assoc($results)) {
							$oDate = new DateTime($row['Date']);
							
							$sDate = $oDate->format("d M Y");
							print '<td><input type=checkbox name="archived" value="'.$row['Id'].'" onClick="Javascript:checkSelected(this);"></td>';
						    	print '<td>'.$sDate.'</td>';
						    	print '<td>'.$row['Time'].'</td>';
						    	print '<td>'.$row['Text'].'</td>';
						    	print '<td>'.$row['Location'].'</td></tr>';
						
						    }
						
						
						?>
						
						 </tr>
						                        </table>
						                      </td>
						                    </tr>
						                    <!-- End Latest News -->
						                    </table>
						
						<button type="button" onClick="Javascript:submitForm('delete');">Delete News Item</button>
						</form>
						<?php print $message; 
						$dbObject->closeConnection();?>
						   </span>
						   
						   </td></tr>
						 
						   
						  
				
        </table>
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
<?php readfile("footer.inc"); ?>
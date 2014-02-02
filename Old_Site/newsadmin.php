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
  <style type="text/css">
.pagearea     {width:1138px;border:1px solid #003399}

table.tablehead { width:100%
			border:1px solid #cddeed
			}
			
.label1 { width:10%
			}
			
.label2 { width:15%
			}
			
.label3 { width:15%
			}

.label4 { width:40%
			}
			
.label4 { width:20%
			}
.labelrow {background-color: #cddeed}
table.tablehead td {padding:2px;line-height:16px;border:1px solid #cddeed}
			
</style>
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
</head>
<body>
<script type="text/javascript">function Go() {return;}</script>
<script type="text/javascript" src="javascript/menu_variables_admin.js"></script>
<script type="text/javascript" src="javascript/menu.js"></script>
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
              <td class="title">News Administration</td>
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
						    <form name="newsform" action="newsadmin.php" method="POST">
						    <input type=hidden name="action" />
						    <input type=hidden name="id" />
						<table class="width: 100%" cellspacing="0" cellpadding="0">
						                        <tr>
						                          <td>News Administration</td>
						                                                  </tr>
						                        </table>
						                      </td>
						                    </tr>
						                    <tr><td class="spacersmallY"></td></tr>
						                    <tr>
						                      <td>
						                        <table class="tablehead" cellspacing="0" cellpadding="0">
						                        <tr class="labelrow">
						                          <td class="label1">&nbsp;</td>
						                          <td class="label2">Date</td>
						                          <td class="label3">Time</td>
												  <td class="label4">Text</td>
												  <td class="label5">Location</td>
						                        </tr>
						                        <tr>         
						<?php 
						
						$action = $_POST["action"];
						$id = $_POST["id"];
						$_POST["action"] = '';
						$_POST["id"] = '';
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
						
						<table class="width: 100%" cellspacing="0" cellpadding="0">
						                        <tr>
						                          <td>Archived News</td>
						                                                  </tr>
						                        </table>
						                      </td>
						                    </tr>
						                    <tr><td class="spacersmallY"></td></tr>
						                    <tr>
						                      <td>
						                        <table class="tablehead" cellspacing="0" cellpadding="0">
						                        <tr class="labelrow">
						                          <td class="label1">&nbsp;</td>
						                          <td class="label2">Date</td>
						                          <td class="label3">Time</td>
												  <td class="label4">Text</td>
												  <td class="label5">Location</td>
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
						mysql_close($link);?>
						   </span>
						   
						   </td></tr>
						   <?php include 'news.inc'; ?>
						   
						  
				
        </table>
      </td>
    </tr>
    
    </table>
  </td>
</tr>
</table>
    </body>

</html>
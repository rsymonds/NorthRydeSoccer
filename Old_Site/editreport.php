<?php  session_start(); 
$loggedin = $_SESSION['ManagerLoggedIn'];
    if ($loggedin != 'X') {
    	$_SESSION['redirect'] = 'ManagerAdmin.php';
    	header('Location:managerlogin.php');
    }	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"><html><head>  <title>Edit Report</title>  <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />  <meta name="keywords" content="north ryde soccer club" />  <meta name="description" content="North Ryde Soccer Club" />  <script type="text/javascript" src="javascript/nrs_scripts.js"></script>  <link type="text/css" rel="stylesheet" href="stylesheets/nrs_styles.css" />  <link type="image/x-icon" rel="icon" href="images/objects/favicon.ico" />  <link type="image/x-icon" rel="shortcut icon" href="images/objects/favicon.ico" />
<script type="text/javascript">
function submitForm(action) {
	if (validate()) {
		form = document.editreport;
		element = form.elements["action"];
		element.value = action;
		
		document.editreport.submit();
	}

}

function validate() {
	if (document.editreport.elements["text"].value == "") {
		alert("Report text is a required field");
		document.editreport.elements["text"].focus();
		return false;
	}		if (document.editreport.elements["submitted_by"].value == "") {		alert("Submitted by is a required field");		document.editreport.elements["submitted_by"].focus();		return false;	}
	return true;
}

function refreshParent(action) {
	  window.opener.location.href = window.opener.location.href;
	  if (action == 'exit') { window.close(); }
	}
  
	
</script><style type="text/css">.pagearea     {width:1138px;border:1px solid #003399}table.tablehead { width:100%			border:1px solid #cddeed			}			.label1 { width:10%			}			.label2 { width:15%			}			.label3 { width:15%			}.label4 { width:40%			}			.label4 { width:20%			}.labelrow {background-color: #cddeed}table.tablehead td {padding:2px;line-height:16px;border:1px solid #cddeed}body{  margin:0px;  color:#003399;  background-color:#FFFFFF;  font-family:verdana,arial,helvetica,sans-serif}</style>
</head><body bgcolor="#FFFFFF"><script type="text/javascript">function Go() {return;}</script><noscript>Your browser does not support JavaScript</noscript><table class="pagearea" cellspacing="0" cellpadding="0">        <!-- Page content --> <tr >          <td>            <table align="center" class="contentwidth" cellspacing="0" cellpadding="0">             <tr>              <td>                <table class="fullwidth" cellspacing="0" cellpadding="0">                <tr>                  <!-- Left Column -->                  <td>                    <table class="fullwidth" cellspacing="0" cellpadding="0">                    <tr>                    <td>						    <table width="600">							<tr><td>
    <?php 
    $action = $_POST['action'];
    $mysqlDatabase = 'northryd_news';
    $id = $_GET['id'];		$age_group = $_SESSION['age_group'];	$division = $_SESSION['division'];	$username = $_SESSION['UserName'];	$year = date('Y');

    if (($action == 'save')) {
		$text = $_POST['text'];		$submitted_by = $_POST['submitted_by'];
	    if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {
	    	die(mysql_errno().' : '.mysql_error());
	    }
	    
	    if (!mysql_select_db($mysqlDatabase)) {
	    	die(mysql_errno().' : '.mysql_error());
	    }
	    $query = 'Select * from reports where year = \''.$year.'\' and age_group = \''.$age_group.'\' and division = \''.$division.'\' and round = \''.$id.'\'';
	    $result = mysql_query($query);		if(mysql_num_rows($result) < 1) {				$query = 'INSERT INTO `reports`(`year`, `age_group`, `division`, `round`, `text`, `submitted_by`) VALUES (\''.$year.'\',\''.$age_group.'\',\''.$division.'\',\''.$id.'\',\''.$text.'\',\''.$submitted_by.'\')';			$update_draw = 'UPDATE `Draw` SET `report` = \'1\'  WHERE year = \''.$year.'\' and age_group = \''.$age_group.'\' and division = \''.$division.'\' and round = \''.$id.'\'';			if (!$draw_results = mysql_query($update_draw)) {				die(mysql_errno().' : '.mysql_error());			}		} else {  			$query = 'UPDATE reports SET text= \''.$text.'\',submitted_by= \''.$submitted_by.'\' WHERE year = \''.$year.'\' and age_group = \''.$age_group.'\' and division = \''.$division.'\' and round = \''.$id.'\'';		} 				if (!$results = mysql_query($query)) {
	    	die(mysql_errno().' : '.mysql_error());
	    } else {
	    	$message = 'The report has been updated.';	
	    } 
	    mysql_close($link);
	    print '<script type="text/javascript">';
	    print 'refreshParent("exit");';
 	    print '</script>'; 
    }
     else {
    	if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {
    		die(mysql_errno().' : '.mysql_error());
    	}
    	 
    	if (!mysql_select_db($mysqlDatabase)) {
    		die(mysql_errno().' : '.mysql_error());
    	}
    	
    	$query = 'Select * from `reports` WHERE `year` = \''.$year.'\' and `age_group` = \''.$age_group.'\' and `division` = \''.$division.'\' and `round` = \''.$id.'\'';
    	if (!$result = mysql_query($query)) {
    		die(mysql_errno().' : '.mysql_error());
    	}
    	
    	$row = mysql_fetch_array($result, MYSQL_ASSOC);
    	$text = $row['text'];
    	$submitted_by = $row['submitted_by'];
    } 
    ?>
    
<form name="editreport" action="editreport.php?id=<?php print $id; ?>" method="POST">
<input type="hidden" name="action"/>
   Year: <?php print $year; ?>
    </td></tr>
      <tr><td>Age Group: <?php print $age_group; ?> </td></tr>	  <tr><td>Division: <?php print $division; ?> </td></tr>	  <tr><td>Round: <?php print $id; ?> </td></tr>	  <tr><td>Submitted By: <input name="submitted_by" type="text" value="<?php print $submitted_by; ?>"/> </td></tr>
       <tr><td>Report Text: <textarea name="text" rows="10" cols="100"><?php print $text; ?></textarea></td></tr>            
</td></tr><tr><td>
<button type="button" onClick="Javascript:submitForm('save');">Save</button>
   </form>
    
    <?php print $message; 
?>
</td></tr></table>						   						   </td></tr>						   						  				        </table>      </td>    </tr>        </table>  </td></tr></table>    </body></html>
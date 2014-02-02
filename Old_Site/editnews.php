<?php  session_start(); 
$loggedin = $_SESSION['loggedin'];
    if ($loggedin != 'X') {
    	$_SESSION['redirect'] = 'newsadmin.php';
    	header('Location:login.php');
    }?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<link rel="stylesheet" type="text/css" media="all" href="stylesheets/calendar-win2k-1.css"/>
<script type="text/javascript" src="javascript/calendar.js"></script>
<script type="text/javascript" src="javascript/calendar-en.js"></script>
<script type="text/javascript" src="javascript/calendar-setup.js"></script>

<script type="text/javascript">
function submitForm(action) {
	if (validate()) {
		form = document.editnews;
		element = form.elements["action"];
		element.value = action;
		
		document.editnews.submit();
	}

}

function validate() {
	if (document.editnews.elements["date"].value == "") {
		alert("Date is a required field");
		document.editnews.elements["date"].focus();
		return false;
	}
	if (document.editnews.elements["time"].value == "") {
		alert("Time is a required field");
		document.editnews.elements["time"].focus();
		return false;
	}
	if (document.editnews.elements["text"].value == "") {
		alert("Text is a required field");
		document.editnews.elements["text"].focus();
		return false;
	}
	return true;
}

function refreshParent(action) {
	  window.opener.location.href = window.opener.location.href;
	  if (action == 'exit') { window.close(); }
	}
  
	
</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Edit News Item</title>
</head>
    <body>
    <?php 
    $action = $_POST["action"];
    $mysqlDatabase = 'northryd_news';
    $id = $_GET["id"];

    if (($action == "save")) {
    	$date = $_POST["date"];
    	$time = $_POST["time"];
    	$text = $_POST["text"];
    	$location = $_POST["location"];

    	$oDate = new DateTime($date);
    	
    	$sDate = $oDate->format("Y-m-d");
	    if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {
	    	die(mysql_errno().' : '.mysql_error());
	    }
	    
	    if (!mysql_select_db($mysqlDatabase)) {
	    	die(mysql_errno().' : '.mysql_error());
	    }
	   
	    $query = 'UPDATE `News` SET `Date`=\''.$sDate.'\',`Time`=\''.$time.'\',`Text`=\''.$text.'\',`Location`=\''.$location.'\' WHERE id = '.$id;

	    if (!$results = mysql_query($query)) {
	    	die(mysql_errno().' : '.mysql_error());
	    } else {
	    	$message = 'The news item has been updated.';
	    	
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
    	
    	$query = 'Select * from `News` where id = '.$id;
    	if (!$result = mysql_query($query)) {
    		die(mysql_errno().' : '.mysql_error());
    	}
    	
    	$row = mysql_fetch_array($result, MYSQL_ASSOC);
    	
    	$oDate = new DateTime($row['Date']);
    		
    	$date = $oDate->format("d M Y");
    	print $date;
    	$time = $row['Time'];
    	$text = $row['Text'];
    	$location = $row['Location'];
    	
    }
    
    	
    
    ?>
    
<form name="editnews" action="editnews.php?id=<?php print $id ?>" method="POST">
<input type="hidden" name="action"/>

<table cellspacing="0" cellpadding="0">
   <tr><td>Date: <input name="date" type="text" readonly="readonly"/><button type="reset" id="f_trigger_b">...</button>
    </td></tr>
      <tr><td>Time: <input name="time" type="text" value="<?php print $time ?>"/> </td></tr>
       <tr><td>Text: <input name="text" type="text" value="<?php print $text ?>"/> </td></tr>
       <tr><td>Location: <input name="location" type="text" value="<?php print $location ?>"/> </td></tr>
                 
</table>
<button type="button" onClick="Javascript:submitForm('save');">Save</button>
   </form>
    </body>
    <script type="text/javascript">
    Calendar.setup({
        inputField     :    "date",           //*
        ifFormat       :    "%d %b %Y",
        showsTime      :    false,
        button         :    "f_trigger_b",        //*
        step           :    1
    });
    document.editnews.date.value = '<?php print $date; ?>';
</script>
    
    <?php print $message; 
?>

</html>
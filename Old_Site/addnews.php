<?php  session_start(); 
$loggedin = $_SESSION['loggedin'];
    if ($loggedin != 'X') {
    	$_SESSION['redirect'] = 'newsadmin.php';
    	header('Location:login.php');
    }?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
		<meta charset="UTF-8" />
		<title>News Admin | North Ryde Soccer Club</title>
		<meta name="robots" content="all" />
		<meta name="viewport" content="width=800" />
        <meta http-equiv="X-UA-Compatible" content="IE=100" />
		<link rel="Shortcut Icon" type="image/x-icon" href="favicon.ico" />
		<link rel="canonical" href="http://www.northrydesoccer.com.au/admin" />
		<link rel="stylesheet" type="text/css" href="stylesheets/main.css" /><!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="stylesheets/ie8.css" /><![endif]-->
		
		<script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.4.min.js"></script><script>
if (typeof jQuery === 'undefined') document.write('<script src="_Resources/jquery-1.6.4.min.js"><\/script>');
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/redmond/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
	</head>

<script type="text/javascript">
function submitForm(action) {
	if (validate()) {
		form = document.addnews;
		element = form.elements["action"];
		element.value = action;
		
		document.addnews.submit();
	}

}

function validate() {
	if (document.addnews.elements["date"].value == "") {
		alert("Date is a required field");
		document.addnews.elements["date"].focus();
		return false;
	}
	if (document.addnews.elements["time"].value == "") {
		alert("Time is a required field");
		document.addnews.elements["time"].focus();
		return false;
	}
	if (document.addnews.elements["text"].value == "") {
		alert("Text is a required field");
		document.addnews.elements["text"].focus();
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
<title>Add News Item</title>
</head>
    <body>
    <?php 
    $action = $_POST["action"];

    if (($action == "save") or ($action == "saveexit")) {
    	$date = $_POST["date"];
    	$time = $_POST["time"];
    	$text = $_POST["text"];
    	$location = $_POST["location"];
    	$mysqlDatabase = 'northryd_news';
    	
    	$oDate = new DateTime($date);
    	
    	$sDate = $oDate->format("Y-m-d");
	    if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {
	    	die(mysql_errno().' : '.mysql_error());
	    }
	    
	    if (!mysql_select_db($mysqlDatabase)) {
	    	die(mysql_errno().' : '.mysql_error());
	    }
	   
	    $query = 'INSERT INTO `News`( `Date`, `Time`, `Text`, `Location`, `archive`, `Enteredby`, `entereddate`) VALUES (\''.
	    $sDate.'\',\''.$time.'\',\''.$text.'\',\''.$location.'\',\'\',\'RSymonds\',\''.date('Y-m-d') .'\')';
	    
	    if (!$results = mysql_query($query)) {
	    	die(mysql_errno().' : '.mysql_error());
	    } else {
	    	$message = 'The news item has been added.';
	    	
	    }
	    mysql_close($link);
    }
    
    if ($action == "saveexit") {
    	print '<script type="text/javascript">';
    	print 'refreshParent("exit");';
    	print '</script>';
    } elseif ($action == "save") {
    	print '<script type="text/javascript">';
    	print 'refreshParent("noexit");';
    	print '</script>';
    }
    ?>
    
<form name="addnews" action="addnews.php" method="POST">
<input type="hidden" name="action"/>

<table cellspacing="0" cellpadding="0" align="center" width="400px">
   <tr><td width="80px">Date: <input type="text" id="datepicker" />
    </td></tr>
      <tr><td>Time: <input name="time" type="text"/> </td></tr>
       <tr><td>Text: <input name="text" type="text"/> </td></tr>
       <tr><td>Location: <input name="location" type="text"/> </td></tr>
                 
</table>
<button type="button" onClick="Javascript:submitForm('save');">Save</button>
<button type="button" onClick="Javascript:submitForm('saveexit');">Save and Exit</button>
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
</script>
    
    <?php print $message; 
?>

</html>

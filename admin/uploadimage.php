<?php  session_start(); 
$loggedin = $_SESSION['ManagerLoggedIn'];
    if ($loggedin != 'X') {
    	$_SESSION['redirect'] = 'ManagerAdmin.php';
    	header('Location:managerlogin.php');
    }
    
    $id = $_GET['id'];
    $age_group = $_SESSION['age_group'];	
    $division = $_SESSION['division'];	
    $username = $_SESSION['UserName'];	
    $year = date('Y');
    
    	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"><html><head>  <title>Upload Image</title>  <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />  <meta name="keywords" content="north ryde soccer club" />  <meta name="description" content="North Ryde Soccer Club" />   <link type="image/x-icon" rel="icon" href="images/objects/favicon.ico" />  <link type="image/x-icon" rel="shortcut icon" href="images/objects/favicon.ico" />
<script type="text/javascript">

function refreshParent(action) {
	  window.opener.location.href = window.opener.location.href;
	  if (action == 'exit') { window.close(); }
	}
  
	
</script><style type="text/css">
.pagearea     {
	width:1138px;
	border:1px solid #003399
}

table.tablehead { 
	width:100%			
	border:1px solid #cddeed			
}			
	
.label1 { 
	width:10%			
}			

.label2 { 
	width:15%			
}			

.label3 { 
	width:15%			
}

.label4 { 
	width:40%			
}			

.label4 { 
	width:20%			
}

.labelrow {background-color: #cddeed}table.tablehead td {padding:2px;line-height:16px;border:1px solid #cddeed}body{  margin:0px;  color:#003399;  background-color:#FFFFFF;  font-family:verdana,arial,helvetica,sans-serif}</style>
</head><body bgcolor="#FFFFFF"><script type="text/javascript">function Go() {return;}</script><noscript>Your browser does not support JavaScript</noscript><table class="pagearea" cellspacing="0" cellpadding="0">        <!-- Page content --> <tr >          <td>            <table align="center" class="contentwidth" cellspacing="0" cellpadding="0">             <tr>              <td>                <table class="fullwidth" cellspacing="0" cellpadding="0">                <tr>                  <!-- Left Column -->                  <td>                    <table class="fullwidth" cellspacing="0" cellpadding="0">                    <tr>                    <td>						    <table width="600">							<tr><td>
    
<form enctype="multipart/form-data" method="post" action="upload.php">
    <div class="row">
    	<input type="hidden" name="id" value="<?php print $id; ?>" />
    	<input type="hidden" name="age_group" value="<?php print $age_group; ?>" />
    	<input type="hidden" name="division" value="<?php print $division; ?>" />
    	<input type="hidden" name="Username" value="<?php print $username; ?>" />	
      <label for="fileToUpload">Select a File to Upload</label><br />
      <input type="file" name="fileToUpload" id="fileToUpload" />
    </div>
    <div class="row">
      <input type="submit" value="Upload" />
    </div>
  </form>
    
   
</td></tr></table>						   						   </td></tr>						   						  				        </table>      </td>    </tr>        </table>  </td></tr></table>    </body></html>
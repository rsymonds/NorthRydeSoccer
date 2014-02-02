<?php  session_start(); 
$loggedin = $_SESSION['ManagerLoggedIn'];
    if ($loggedin != 'X') {
    	$_SESSION['redirect'] = 'ManagerAdmin.php';
    	header('Location:managerlogin.php');
    }		$age_group = $_SESSION['age_group'];	$division = $_SESSION['division'];	$username = $_SESSION['UserName'];	$editscore = $_SESSION['editscore'];	$year = date('Y');	//$round_query = 'SELECT round, date FROM `Draw` WHERE age_group = \''.$age_group.'\' AND division = \''.$division.'\' AND year = \''.$year.'\'';	?>

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
			
</style><script type="text/javascript">function checkSelected(obj) {		if(obj.checked){ 			for (var i = 0; i < document.managerform.elements.length; i++ ) {		        if (document.managerform.elements[i].type == 'checkbox') {		            if (document.managerform.elements[i].checked == true) {		            	document.managerform.elements[i].checked=false;		            }		        }							}			obj.checked=true; 		}else{ 					} 		}function edit(url) {	form = document.managerform;	for (var i = 0; i < form.elements.length; i++ ) {        if (form.elements[i].type == 'checkbox') {            if (form.elements[i].checked == true) {     			if (form.elements[i].value == null) {     				alert("Please select an item to edit.");         			}     			else {            		url = url + "?id=" + form.elements[i].value;            		popupWindow = window.open(            			url,'popUpWindow','height=400,width=800,left=100,top=100,resizable=no,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes')     			}            }        }}}</script>
</head>
<body>
<script type="text/javascript">function Go() {return;}</script>
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
    <tr>      <td>        <table cellspacing="0" cellpadding="0">        <tr>          <td class="sitemenu"><a class="sitemenulink" href="logout.php">&nbsp;Log Out&nbsp;</a></td>        </tr>        </table>      </td>    </tr>
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
              <td class="title">Manager Administration</td>
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
						    
						Welcome to Manager Administration
						   
						   </td></tr>						<?php 			$mysqlDatabase = 'northryd_news';			if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {			die(mysql_errno().' : '.mysql_error());			}						if (!mysql_select_db($mysqlDatabase)) {				die(mysql_errno().' : '.mysql_error());			}		?>				<tr>          <td>            <table align="center" class="contentwidth" cellspacing="0" cellpadding="0">			 <form name="managerform" action="ManagerAdmin.php" method="POST">            			<?php						$query = 'SELECT * FROM Draw where age_group = \''.$age_group.'\' and division = \''.$division.'\' and year = \''.$year.'\' order by round';					 if (!$results = mysql_query($query)) {						die(mysql_errno().' : '.mysql_error());					 }															 print '<tr><td class="spacersmallY"></td></tr>';					 print '<tr>';					 print '<td class="forte"><a name="div'.$division.'">'.$age_group.' Div '.$division.'</a></td>';			?>			</tr>							 <tr><td class="spacersmallY"></td></tr>							 <tr>							   <td>								 <table class="fullwidth results" cellspacing="0" cellpadding="0">								 <tr>								 <td class="tablesubheader resultsc1">&nbsp;</td>								  <td class="tablesubheader resultsc1">RND</td>								   <td class="tablesubheader resultsc2">DATE</td>								   <td class="tablesubheader resultsc3">TIME</td>								   <td class="tablesubheader resultsc4">OPPOSITION</td>								   <td class="tablesubheader resultsc5">GROUNDS</td>								   <td class="tablesubheader resultsc6">GF</td>								   <td class="tablesubheader resultsc7">GA</td>								   <td class="tablesubheader resultsc8">RESULT</td>								   <td class="tablesubheader resultsc9">REPORT</td>								</tr>			<?php										while ($fixturerow = mysql_fetch_assoc($results)) {							$oDate = new DateTime($fixturerow['date']);							$sDate = $oDate->format("d M Y");							$Goalsfor = $fixturerow['goals_for'];							$Goalsagainst = $fixturerow['goals_against'];							$Report = $fixturerow['report'];														if (($Goalsfor == '-1') and ($Goalsagainst == '-1')) {								$Goalsfor = '&nbsp';								$Goalsagainst = '&nbsp';								$Result = '<td></nbsp></td>';							} else{								if ($Goalsfor > $Goalsagainst) {									$Result = '<td class="win">Win</td>';								} else{ 									if ($Goalsfor < $Goalsagainst) {										$Result = '<td class="lose">Loss</td>';									} else{										if ($Goalsfor = $Goalsagainst) {											$Result = '<td class="draw">Draw</td>';										} else {											$Result = '<td></nbsp></td>';										}									}								}							}							$ReportText = '<td></nbsp></td>';						if ($Report == '1') {							$ReportText = '<td><img class="noborder" src="images/objects/envelope.gif"></td>';						}													  print '<tr class="bgyellow"><td><input type=checkbox name="current" value="'.$fixturerow['round'].'" onClick="Javascript:checkSelected(this);"></td><td>'.$fixturerow['round'].'</td><td>'.$sDate.'</td><td>'.$fixturerow['time'].'</td><td>'.$fixturerow['opposition'].'</td><td>'.$fixturerow['field'].'</td><td>'.$Goalsfor.'</td><td>'.$Goalsagainst.'</td>'.$Result.$ReportText.'</tr>';					 }								mysql_close($link)					?>                        </table>                      </td>                    </tr>
						   
						  
						</form>
        </table>		<?php if ($editscore == 'X' ) { ?>		<button type="button" onClick="Javascript:edit('editscore.php');">Edit Score</button>		<?php } ?>		<button type="button" onClick="Javascript:edit('editreport.php');">Edit Report</button>
      </td>
    </tr>
    
    </table>
  </td>
</tr>
</table>
    </body>

</html>
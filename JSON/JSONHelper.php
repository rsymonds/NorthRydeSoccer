<?php ob_start(); ?>
<?php		
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: text/javascript');
		
		$callback = $_REQUEST['callback'];

                $function = $_GET['function'];

                if ($function == 'getGames') {
		
		$agegroup = $_GET['age_group'];			
		$division = $_GET['division'];			
		$date = $_GET['date'];			
			$mysqlDatabase = 'northryd_news';
			if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {
			die(mysql_errno().' : '.mysql_error());
			}
			if (!mysql_select_db($mysqlDatabase)) {
				die(mysql_errno().' : '.mysql_error());
			}			
			$query = 'SELECT * FROM Draw where year = \'2012\' and age_group = \''.$agegroup.'\' and division = \''.$division.'\'';			

if (!$results = mysql_query($query)) {			
    die(mysql_errno().' : '.mysql_error());			
}		

$index = 0;				
$JSONString = '([';
while ($row = mysql_fetch_assoc($results)) {
	$urlQuery = 'SELECT url from Grounds where ground_name =\''.$row['field'].'\'';
	$urlResult = mysql_query($urlQuery);
	$urlRow = mysql_fetch_array($urlResult, MYSQL_ASSOC);
	
	if ($index > 0 ) {
		$JSONString = $JSONString.',';
	}
	$JSONString = $JSONString.'{year:"2012",age_group:"O35",division:"5",round:"'.$row['round'].'",date:"'.$row['date'].'",time:"'.$row['time'].'",opposition:"'.$row['opposition'].'",field:"'.$row['field'].'",goals_for:"'.$row['goals_for'].'",goals_against:"'.$row['goals_against'].'",map_url:"'.$urlRow['url'].'"}';		
	$index++;
}
}
if ($function == 'getTeams') {
$username = $_GET['username'];			
				
			$mysqlDatabase = 'northryd_news';
			if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {
			die(mysql_errno().' : '.mysql_error());
			}
			if (!mysql_select_db($mysqlDatabase)) {
				die(mysql_errno().' : '.mysql_error());
			}			
			$query = 'SELECT * FROM Team_Subscriptions where username = \''.$username.'\'';			

if (!$results = mysql_query($query)) {			
    die(mysql_errno().' : '.mysql_error());			
}		

$index = 0;				
$JSONString = '([';
while ($row = mysql_fetch_assoc($results)) {
	
	if ($index > 0 ) {
		$JSONString = $JSONString.',';
	}
	$JSONString = $JSONString.'{age_group:"'.$row['age_group'].'",division:"'.$row['division'].'"}';		
	$index++;
}
}

$JSONString = $JSONString.'])';
	echo $callback.$JSONString;								
mysql_close($link);	
ob_end_flush();		
?>
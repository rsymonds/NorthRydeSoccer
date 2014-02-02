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

						    <table width="600">
	
<?php
$year = $_POST["year"];
$index = 1;
$errorcount = 0;
if ( isset($_POST["submit"]) ) {

   if ( isset($_FILES["file"])) {

            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"];

        }
        else {

			 $mysqlDatabase = 'northryd_news';
			 
				if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {

				die(mysql_errno().' : '.mysql_error());

				}

				

				if (!mysql_select_db($mysqlDatabase)) {

					die(mysql_errno().' : '.mysql_error());

				}
               $f = fopen($_FILES["file"]["tmp_name"], 'r');
				if ($f) {
					while ($line = fgetcsv($f)) {  // You might need to specify more parameters
						// deal with $line.
						if ( $index > 1 ) {
							
							//$temp = trim( $line[0] , '\xA0 ');
							//$temp = $line[0];
							//print $temp.$line[1].$line[2].'<br>';
							$array = explode( '/' , $line[3] );
							$agegroup = $array[0];
							$division = trim( $array[1] , '\xA0 ');
							//add case statement to check for division and age group variations. eg Under 6 South or division Gre
							switch ($division) {
							    case 'Gre':
							        $division = 'Green';
							        break;
							    case 'Pur':
							        $division = 'Purple';
							        break;
							    case 'Whi':
							        $division = 'White';
							        break;
							    case 'Yel':
							        $division = 'Yellow';
							        break;
							    case 'Bro':
							        $division = 'Brown';
							        break;
							    case 'Blu':
							        $division = 'Blue';
							        break;
							}
							switch ($agegroup) {
							    case 'Under 6 South':
							        $agegroup = 'Under 6';
							        break;
							    case 'Under 7 South':
							        $agegroup = 'Under 7';
							        break;
							}
							
							
							$round = $line[0];
							$date =  $line[1];
							$time = trim( $line[2] , "\xA0 ");
							
							$hometeam = trim( $line[4] , "\xA0 ");
							$awayteam = trim( $line[5] , "\xA0 ");
							
							
							$substring = substr($awayteam,13);
							$awaysub = trim( $substring , " ");
							
							$substring = substr($hometeam,13);
							$homesub = trim( $substring , " ");
							
							$homesearch = strchr( $hometeam , "North Ryde SC" );
							$awaysearch = strchr( $awayteam , "North Ryde SC" );
							
							$derby = '';
							
							echo $homesearch.'<br/>';
							echo $awaysearch.'<br/>';
							
							if ( ( !empty($homesearch) ) && ( !empty($awaysearch) ) ) {
								$opposition = $awayteam;
								$altdivision = $division.$awaysub;
								$division = $division.$homesub;
								$derby = 'X';
							}
							elseif ( !empty($awaysearch) ) {
								$opposition = $hometeam;
								$division = $division.$awaysub;
							}
							else {
								$opposition = $awayteam;
								$division = $division.$homesub;
							}
						
							
							$ground = trim( $line[6] , "\xA0 ");
							$date = trim($date, "\xA0 ");
							list($d,$m,$y)=explode("/",$date);
							$date = $m.'/'.$d.'/'.$y;
							$date = trim($date);
							$oDate = date('Y-m-d', strtotime($date));
							$agegroup = trim($agegroup , "\xA0 ");
							$round = trim($round , "\xA0 ");
							
							
							if ($agegroup !== '') {
								$query = 'INSERT INTO `Draw`(`year`, `age_group`, `division`, `round`, `date`, `time`, `opposition`, `field`, `goals_for`, `goals_against`, `report`) 
								VALUES (\''.$year.'\',\''.$agegroup.'\',\''.$division.'\',\''.$round.'\',\''.$oDate.'\',\''.$time.'\',\''.$opposition.'\',\''.$ground.'\',\'\',\'\',\'\')';
								 
								 print $query.'<br>';
								 if (!$results = mysql_query($query)) {
									print 'Age Group '.$agegroup.' Div'.$division.' Round '.$round.' Failed to load: '.mysql_error().'<br>';
									$errorcount++;

								} else {
									print 'Age Group '.$agegroup.' Div'.$division.' Round '.$round.' Entry loaded <br>';
								}
								
								if ( $derby == 'X' ) {
									$opposition = $hometeam;
									$division = $altdivision;
									$query = 'INSERT INTO `Draw`(`year`, `age_group`, `division`, `round`, `date`, `time`, `opposition`, `field`, `goals_for`, `goals_against`, `report`) 
									VALUES (\''.$year.'\',\''.$agegroup.'\',\''.$division.'\',\''.$round.'\',\''.$oDate.'\',\''.$time.'\',\''.$opposition.'\',\''.$ground.'\',\'\',\'\',\'\')';
								 
								 	print $query.'<br>';
								 	if (!$results = mysql_query($query)) {
										print 'Age Group '.$agegroup.' Div'.$division.' Round '.$round.' Failed to load: '.mysql_error().'<br>';
										$errorcount++;

									} else {
										print 'Age Group '.$agegroup.' Div'.$division.' Round '.$round.' Entry loaded <br>';
									}
								}
							}
							
							
						}
						// $line[1] is the second cokumn
						// ...
						$index++;
					}
					if ($errorcount == 0 ) {
						print 'Draw loaded without errors';
					}
					fclose($f);
					mysql_close($link);
					
				} else {
					// error
				}
        }
     } else {
             echo "No file selected";
     }
}
?>

</table>

						   
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
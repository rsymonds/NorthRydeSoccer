<?php  session_start(); 

$loggedin = $_SESSION['loggedin'];

    if ($loggedin != 'X') {

    	$_SESSION['redirect'] = 'ResultsUpload.php';

    	header('Location:login.php');

    }?>
	<?php readfile("../headerNSB.inc"); ?>
<!-- title -->

<div id="sitemenu-container">
						<div id="sitemenu">
	<h2 class="hidden">Site Navigation<a href="#page-content" rel="nofollow">[Skip]</a></h2>
	<div id="sitemenu-content">
	<ul>
			<li class="i1 o"><span class="in"><a href="Drawadmin.php" title="Logout"><span class="in">Draw Upload</span></a></li>
			<li class="i2 e currentPage"><span class="in"><span class="in">Results Upload</span></li>
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
							<h2 class="title"><span class="in">Result Upload</span></h2>
							<div class="article">
								<div class="article-content">
	<div class="RichTextElement">
	<div><p>

                    <table class="fullwidth" cellspacing="0" cellpadding="0">

                    <tr>

                    <td style="border:0;">

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

			 include 'PHP/database.php';
$dbObject = new database();
            $dbObject->getConnection();
               $f = fopen($_FILES["file"]["tmp_name"], 'r');
				if ($f) {
					while ($line = fgetcsv($f)) {  // You might need to specify more parameters
						// deal with $line.
						if ( $index > 1 ) {
							$temp = trim( $line[2] , "\xA0 ");
							$array = explode( '/' , $temp );
							$agegroup = $array[0];
							$division = trim( $array[1] , "\xA0 ");
							$hometeam = substr(strstr($line[3]," "), 1);
							$hometeam_goals =  $line[4];
							$awayteam_goals =  $line[5];
							$awayteam = substr(strstr($line[6]," "), 1);
							$date = $line[1];
							
							
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
								$goalsfor = trim( $hometeam_goals, "\xA0 ");
								$goalsagainst = trim( $awayteam_goals, "\xA0 ");
							}
							elseif ( !empty($awaysearch) ) {
								$opposition = $hometeam;
								$division = $division.$awaysub;
								$goalsfor = trim( $awayteam_goals, "\xA0 ");
								$goalsagainst = trim( $hometeam_goals, "\xA0 ");
							}
							else {
								$opposition = $awayteam;
								$division = $division.$homesub;
								$goalsfor = trim( $hometeam_goals, "\xA0 ");
								$goalsagainst = trim( $awayteam_goals, "\xA0 ");
							}
							
				
							$date = trim($date, "\xA0 ");
							list($d,$m,$y)=explode("/",$date);
							$date = $m.'/'.$d.'/'.$y;
							$date = trim($date);
							$oDate = date('Y-m-d', strtotime($date));
							$agegroup = trim($agegroup , "\xA0 ");
							
							if ($agegroup !== '') {
								$query = 'UPDATE `Draw` SET `goals_for`=\''.$goalsfor.'\',`goals_against`=\''.$goalsagainst.'\' WHERE year = \''.$year.'\' AND age_group = \''.$agegroup.'\' AND division = \''.$division.'\' AND date = \''.$oDate.'\'';
								echo $query.'<br/>';
								if (!$results = mysql_query($query)) {
									print 'Age Group '.$agegroup.' Div'.$division.' Round '.$round.' Failed to update: '.mysql_error().'<br>';
									$errorcount++;
								} 
								if (mysql_affected_rows() == 0) {
									print 'Age Group '.$agegroup.' Div'.$division.' Date '.$oDate.' Failed to update <br>';
									print 'Submitted update: '.$query.'<br>';
								}
								if ( $derby == 'X' ) {
									$division = $altdivision;
									
									$query = 'UPDATE `Draw` SET `goals_for`=\''.$goalsagainst.'\',`goals_against`=\''.$goalsfor.'\' WHERE year = \''.$year.'\' AND age_group = \''.$agegroup.'\' AND division = \''.$division.'\' AND date = \''.$oDate.'\'';
									echo $query.'<br/>';
									if (!$results = mysql_query($query)) {
										print 'Age Group '.$agegroup.' Div'.$division.' Round '.$round.' Failed to update: '.mysql_error().'<br>';
										$errorcount++;
									} 
									if (mysql_affected_rows() == 0) {
										print 'Age Group '.$agegroup.' Div'.$division.' Date '.$oDate.' Failed to update <br>';
										print 'Submitted update: '.$query.'<br>';
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
					$dbObject->closeConnection();;
					
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

						   

						   </td></tr>

						   

						  

				

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
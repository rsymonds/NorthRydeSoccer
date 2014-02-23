<?php readfile("headerNSB.inc"); ?>
<!-- title -->
<?php include_once 'PHP/database.php'; ?>
<?php $currentPage = 'RESULTS'; 
include "sitemenu.inc";?>
<div class="clear below-page-top"></div>
				<div id="page-content" class="no-navigation">
					
					<div id="main">
						<div id="main-top"></div>
                            						<div id="main-content">
							<h2 class="title"><span class="in">Latest Results</span></h2>
							<div class="article">
								<div class="article-content">
									<div class="RichTextElement">
										<div>
											<?php 			
			$dbObject = new database();
            $dbObject->getConnection();
			
			
			$lowerdate = '2013-07-27';
			$upperdate = '2013-07-28';
			$year = '2013';
			$fixturesQuery = 'SELECT * FROM Draw where year = \''.$year.'\' and date >= \''.$lowerdate.'\' and date <= \''.$upperdate.'\' and `age_group` in (\'9\', \'10\', \'11\',\'12\',\'13\',\'15\',\'17\',\'16\',\'O35\',\'O45\',\'AA\')  order by age_group ASC';
			print $fixtureQuery;
			if (!$fixtureResults = mysql_query($fixturesQuery)) {			
				die(mysql_errno().' : '.mysql_error());			
			}
		?>
		<div class="CSSTableGenerator" >
		<table>
                <tr>
                  <td>Age Group</td>
                  <td>Division</td>	
                  <td>Round</td>
                  <td>Date</td>
                  <td>Time</td>
                  <td>Opposition</td>
                  <td>Ground</td>
                  <td>GF</td>
                  <td>GA</td>
                </tr>
                
						
		<?php										
			while ($fixturerow = mysql_fetch_assoc($fixtureResults)) {
										
				$oDate = new DateTime($fixturerow['date']);							
				$sDate = $oDate->format("d M Y");							
				$Goalsfor = $fixturerow['goals_for'];							
				$Goalsagainst = $fixturerow['goals_against'];							
				$Report = $fixturerow['report'];														
				if (($Goalsfor == '-1') and ($Goalsagainst == '-1')) {								
					$Goalsfor = '&nbsp';								
					$Goalsagainst = '&nbsp';								
					$Result = '<td>&nbsp</td>';							
				} else{								
					if ($Goalsfor > $Goalsagainst) {									
						$Result = '<td class="win">Win</td>';								
					} else{ 									
						if ($Goalsfor < $Goalsagainst) {										
							$Result = '<td class="lose">Loss</td>';									
						} else{										
							if ($Goalsfor = $Goalsagainst) {											
								$Result = '<td class="draw">Draw</td>';										
							} else {											
								$Result = '<td>&nbsp</td>';										
							}									
						}								
					}							
				}							
				$ReportText = '<td>&nbsp</td>';							
				if ($Report == '1') {								
					$ReportText = '<td><a href="reports.php"><img class="noborder" src="images/objects/envelope.gif"></a></td>';							
				}													  
				print '<tr><td>'.$fixturerow['age_group'].'</td><td>'.$fixturerow['division'].'</td><td>'.$fixturerow['round'].'</td><td nowrap>'.$sDate.'</td><td>'.$fixturerow['time'].'</td><td>'.$fixturerow['opposition'].'</td><td>'.$fixturerow['field'].'</td><td>'.$Goalsfor.'</td><td>'.$Goalsagainst.'</td></tr>';					 
			}												
		$dbObject->closeConnection();					
		?>
                        </table>
                                            </div>
                        
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
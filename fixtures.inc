		<?php 			
			
			include 'PHP/database.php';
$dbObject = new database();
            $dbObject->getConnection();
			$fixturesQuery = 'SELECT * FROM Draw where year = \''.$year.'\' and age_group = \''.$agegroup.'\' and division = \''.$division.'\' order by date';
			if (!$fixtureResults = mysql_query($fixturesQuery)) {			
				die(mysql_errno().' : '.mysql_error());			
			}
		?>
		
		<table style="width:100%;" cellspacing="0" cellpadding="0">
                <tr>
                  <th>Round</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Opposition</th>
                  <th>Ground</th>
                  <th>GF</th>
                  <th>GA</th>
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
				print '<tr class="bgyellow"><td>'.$fixturerow['round'].'</td><td>'.$sDate.'</td><td>'.$fixturerow['time'].'</td><td>'.$fixturerow['opposition'].'</td><td>'.$fixturerow['field'].'</td><td>'.$Goalsfor.'</td><td>'.$Goalsagainst.'</td></tr>';					 
			}												
		$dbObject->closeConnection();				
		?>
                        </table>
 
		<?php 			$round = '17';			$date = '11 August 2012';			$ReportDate = '20120811';
			$mysqlDatabase = 'northryd_news';
			if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {
			die(mysql_errno().' : '.mysql_error());
			}
			
			if (!mysql_select_db($mysqlDatabase)) {
				die(mysql_errno().' : '.mysql_error());
			}			
			$JuniorQuery = 'SELECT * FROM `Draw` WHERE year = \'2012\' and `round` = \''.$round.'\' and `age_group` in (\'09\', \'10\', \'11\',\'12\',\'13\',\'14\',\'15\',\'16\') order by age_group, division';			
			$AAQuery = 'SELECT * FROM `Draw` WHERE year = \'2012\' and `round` = \''.$round.'\' and `age_group` = \'AA\' order by age_group,  division+0';			
			$O35Query = 'SELECT * FROM `Draw` WHERE year = \'2012\' and `round` = \''.$round.'\' and `age_group` = \'O35\' order by age_group,  division+0';
			if (!$JuniorResults = mysql_query($JuniorQuery)) {				
			die(mysql_errno().' : '.mysql_error());			
			}						
			if (!$AAResults = mysql_query($AAQuery)) {				
			die(mysql_errno().' : '.mysql_error());			
			}						
			if (!$O35Results = mysql_query($O35Query)) {				
			die(mysql_errno().' : '.mysql_error());			
			}

		?>				
		<tr>                     
		<td>                       
		<table class="fullwidth" cellspacing="0" cellpadding="0">                       
		<tr>                          
		<td class="forte">Weekend Results - <?php print $date; ?></td>                          
		<td>                            
		<table align="right" cellspacing="0" cellpadding="0">                            
		<tr>                             
		<td class="small italic">                               
		<a href="results.php">more results</a>                             
		</td>                           
		</tr>                           
		</table>                        
		</td>                       
		</tr>                        
		</table>                     
		</td>                   
		</tr>                   
		<tr><td class="spacersmallY"></td></tr>                   
		<tr>                     
		<td>                       
		<table class="fullwidth fpresults" cellspacing="0" cellpadding="0">                       
		<tr>                          
		<td class="tablesubheader fprestable1">JUNIORS</td>                          
		<td class="tablesubheader fprestable2">Opposition</td>                        
		<td class="tablesubheader fprestable3">GF</td>                        
		<td class="tablesubheader fprestable4">GA</td>                       
		<td class="tablesubheader fprestable5">Result</td>                   
		<td class="tablesubheader fprestable6">Report</td>                   
		</tr>										
		<?php						
		while ($row = mysql_fetch_assoc($JuniorResults)) {		
		$agegroup = $row['age_group'];						
		$division = $row['division'];						
		$agegroup = ltrim($agegroup , "0");					
		$Goalsfor = $row['goals_for'];						
		$Goalsagainst = $row['goals_against'];						
		$Report = $row['report'];									
		if (($Goalsfor == '-1') and ($Goalsagainst == '-1')) {							
		$Goalsfor = '&nbsp';							
		$Goalsagainst = '&nbsp';							
		$Result = '<td></nbsp></td>';						
		} else{							
		if ($Goalsfor > $Goalsagainst) {							
		$Result = '<td class="win">Win</td>';							
		} else{ 								
		if ($Goalsfor < $Goalsagainst) {				
		$Result = '<td class="lose">Loss</td>';				
		} else{								
		if ($Goalsfor == $Goalsagainst) {				
		$Result = '<td class="draw">Draw</td>';				
		} else {								
		$Result = '<td></nbsp></td>';				
		}							
		}							
		}						
		}			
		$ReportText = '<td></nbsp></td>';
		if ($Report == '1') {		
		$ReportText = '<td><a href="reports_'.$ReportDate.'.php"><img class="noborder" src="images/objects/envelope.gif"></a></td>';	
		}						                       
		print '<tr>';                         
		print '<td class="small"><a class="tablelink" href="results_u'.$agegroup.'.php#div'.$division.'">U'.$agegroup.' Div '.$division.'</a></td>';     
		print '<td class="small">'.$row['opposition'].'</td>';                       
		print '<td class="small">'.$Goalsfor.'</td>';                         
		print '<td class="small">'.$Goalsagainst.'</td>';                     
		print $Result;                       
		print $ReportText;                  
		print '</tr>';				
		}                       
		?>                      
		</table>                 
		</td>                   
		</tr>                   
		<tr><td class="spacersmallY"></td></tr>      
		<tr>                    
		<td>                     
		<table class="fullwidth fpresults" cellspacing="0" cellpadding="0">     
		<tr>                         
		<td class="tablesubheader fprestable1">ALL AGE</td>     
		<td class="tablesubheader fprestable2">Opposition</td>  
		<td class="tablesubheader fprestable3">GF</td>          
		<td class="tablesubheader fprestable4">GA</td>          
		<td class="tablesubheader fprestable5">Result</td>      
		<td class="tablesubheader fprestable6">Report</td>      
		</tr>                        
		<?php			
		while ($row = mysql_fetch_assoc($AAResults)) {		
		$agegroup = $row['age_group'];						
		$division = $row['division'];					
		$agegroup = ltrim($agegroup , "0");		
		$Goalsfor = $row['goals_for'];			
		$Goalsagainst = $row['goals_against'];	
		$Report = $row['report'];
		if (($Goalsfor == '-1') and ($Goalsagainst == '-1')) {	
		$Goalsfor = '&nbsp';				
		$Goalsagainst = '&nbsp';		
		$Result = '<td></nbsp></td>';		
		} else{					
		if ($Goalsfor > $Goalsagainst) {	
		$Result = '<td class="win">Win</td>';		
		} else{ 				
		if ($Goalsfor < $Goalsagainst) {	
		$Result = '<td class="lose">Loss</td>';	
		} else{					
		if ($Goalsfor == $Goalsagainst) {		
		$Result = '<td class="draw">Draw</td>';		
		} else {				
		$Result = '<td></nbsp></td>';		
		}					
		}					
		}					
		}					
		$ReportText = '<td></nbsp></td>';						
		if ($Report == '1') {					
		$ReportText = '<td><a href="reports_'.$ReportDate.'.php"><img class="noborder" src="images/objects/envelope.gif"></a></td>';	
		}						                     
		print '<tr>';                        
		print '<td class="small"><a class="tablelink" href="results_aa.php#div'.$division.'">All Age Div '.$division.'</a></td>';    
		print '<td class="small">'.$row['opposition'].'</td>';                     
		print '<td class="small">'.$Goalsfor.'</td>';                        
		print '<td class="small">'.$Goalsagainst.'</td>';                     
		print $Result;                         
		print $ReportText;                      
		print '</tr>';				
		}                      
		?>						                    
		</table>                     
		</td>                  
		</tr>                 
		<tr><td class="spacersmallY"></td></tr> 
		<tr>                    
		<td>                    
		<table class="fullwidth fpresults" cellspacing="0" cellpadding="0">    
		<tr>                        
		<td class="tablesubheader fprestable1">SENIORS</td>           
		<td class="tablesubheader fprestable2">Opposition</td> 
		<td class="tablesubheader fprestable3">GF</td>          
		<td class="tablesubheader fprestable4">GA</td>       
		<td class="tablesubheader fprestable5">Result</td>   
		<td class="tablesubheader fprestable6">Report</td>     
		</tr>							
		<?php					
		while ($row = mysql_fetch_assoc($O35Results)) {		
		$agegroup = $row['age_group'];		
		$division = $row['division'];		
		$agegroup = ltrim($agegroup , "0");
		$Goalsfor = $row['goals_for'];		
		$Goalsagainst = $row['goals_against'];
		$Report = $row['report'];
		if (($Goalsfor == '-1') and ($Goalsagainst == '-1')) {	
		$Goalsfor = '&nbsp';			
		$Goalsagainst = '&nbsp';		
		$Result = '<td></nbsp></td>';	
		} else{				
		if ($Goalsfor > $Goalsagainst) {
		$Result = '<td class="win">Win</td>';
		} else{ 			
		if ($Goalsfor < $Goalsagainst) {
		$Result = '<td class="lose">Loss</td>';	
		} else{					
		if ($Goalsfor == $Goalsagainst) {	
		$Result = '<td class="draw">Draw</td>';	
		} else {					
		$Result = '<td></nbsp></td>';		
		}					
		}					
		}					
		}					
		$ReportText = '<td></nbsp></td>';	
		if ($Report == '1') {		
		$ReportText = '<td><a href="reports_'.$ReportDate.'.php"><img class="noborder" src="images/objects/envelope.gif"></a></td>';		
		}						                  
		print '<tr>';                       
		print '<td class="small"><a class="tablelink" href="results_o35.php#div'.$division.'">Over 35 Div '.$division.'</a></td>';             
		print '<td class="small">'.$row['opposition'].'</td>';                         
		print '<td class="small">'.$Goalsfor.'</td>';                        
		print '<td class="small">'.$Goalsagainst.'</td>';                        
		print $Result;                        
		print $ReportText;                    
		print '</tr>';					
		}                        ?>	
		</table>                     
		</td>                 
		</tr>			
		<?php				
		mysql_close($link)			
		?>
                      




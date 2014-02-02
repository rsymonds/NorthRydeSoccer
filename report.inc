<?php 

$mysqlDatabase = 'northryd_news';

			if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {
				die(mysql_errno().' : '.mysql_error());
			}

			if (!mysql_select_db($mysqlDatabase)) {
				die(mysql_errno().' : '.mysql_error());
			}
			
			$reportquery = 'SELECT * FROM `reports` WHERE year = \''.$year.'\' and age_group = \''.$agegroup.'\' and division = \''.$division.'\' order by round DESC';		

			if (!$reportresult = mysql_query($reportquery)) {
				die(mysql_errno().' : '.mysql_error());
			}
			
			
		
?>

					
							<div class="article">
								<div class="article-content">
									<div class="RichTextElement">
										<div><p><br /></p>
											<div class="first graphic-container wide center">
												<div style="" class="general-index graphic">
													<div class="figure-content"><!-- sandvox.GeneralIndex -->
														
														<?php 
										  while ($row = mysql_fetch_assoc($reportresult)) {
												  ?>
								            <div class="article i1 o">
															<h3 class="index-title"><span class="in">
											  <?php
											  $age_group = $row['age_group'];
												  $division = $row['division'];
												  $round = $row['round'];
												  $key = $age_group.$division;
												  
												  
												$display_text = 'Round '.$round;
												  
								                print  $display_text;
												
												?>
								              </span></h3>
															<div class="article-info">
																<div>
											  <?php 
								
											  print nl2br($row['text']);
											  ?>
								                 <br/><br/>
								                - <?php 
											  print $row['submitted_by'];
											  
											  $query = 'SELECT * FROM `report_images` WHERE year = \''.$year.'\' and round = \''.$round.'\' and `age_group` = \''.$age_group.'\' and division = \''.$division.'\' ';
											  
											  if (!$result_images = mysql_query($query)) {
													die(mysql_errno().' : '.mysql_error());
											  }
											  
											  if (mysql_num_rows($result_images) > 0) {
											  	print '<div class="tab"><div>';
												print '<ul class="gallery clearfix"> ';
												
												while ($row_image = mysql_fetch_assoc($result_images)) {
													//print '<img class="noborder imgleft" src="'.$row_image['path'].'"><br>';
													print '<li>';
													print '<a href="'.$row_image['largepath'].'" rel="prettyPhoto[Round'.$round.'_gal]">';
													print '<img src="'.$row_image['thumbpath'].'" width="72" height="72" alt="" />';
									                            	print '</a></li>';
												
											  	}
											  	
											  	print '</ul>';
											  }
											   
											  ?>
								            
																	
								                	
								                        	
								                            	
								                    
								                    
								                 
								                
								</div>
																</div>
															</div>
											<?php } ?>
														
								
															
															
														
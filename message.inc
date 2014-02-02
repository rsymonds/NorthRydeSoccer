		<?php 
			$mysqlDatabase = 'northryd_news';
			if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {
			die(mysql_errno().' : '.mysql_error());
			}
			
			if (!mysql_select_db($mysqlDatabase)) {
				die(mysql_errno().' : '.mysql_error());
			}

			$query = 'SELECT * FROM Message where id = \'1\'';
						
			if (!$result = mysql_query($query)) {
				die(mysql_errno().' : '.mysql_error());
			}					
			
			$row = mysql_fetch_array($result, MYSQL_ASSOC);						
			$Message = $row['Message'];			
			
			$output = str_replace("\n", "<br>", $Message);
		?>
		<!-- Important Messages 
		<?php if ($Message != '') {					
		print '-->'; 					
		}?>	
		<div class="pagelet bordered titled i1 o">
			
			<h4 class="title pagelet-title" style="color: red;"><span class="in">Urgent Message</span></h4>
			    <div class="pagelet-body">
			
				<div class="RichTextElement">
				    
						<div><p><?php print $output; ?>
							</p>
						</div>
				</div>
			    </div>
			</div>
			          
		<?php if ($Message == '') { 
		print '-->';
		} 
		mysql_close($link);?>
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
			}					$row = mysql_fetch_array($result, MYSQL_ASSOC);						$Message = $row['Message'];			$output = str_replace("\n", "<br>", $Message);
		?>
		<!-- Important Messages <?php if ($Message != '') {					print '-->'; 					}?>					            <tr>              <td>                <table class="fullwidth border bgred" cellspacing="4" cellpadding="4">                <tr>                  <td class="textcenter bold white"><?php print $output; ?></td>                </tr>                </table>              </td>            </tr>            <tr><td class="spacerlargeY"></td></tr>            <!-- End Important Messages -->			<?php mysql_close($link);?>
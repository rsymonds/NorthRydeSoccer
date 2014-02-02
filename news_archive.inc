		<?php 
			$mysqlDatabase = 'northryd_news';
			if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {
			die(mysql_errno().' : '.mysql_error());
			}
			
			if (!mysql_select_db($mysqlDatabase)) {
				die(mysql_errno().' : '.mysql_error());
			}

			$query = 'SELECT * FROM News where archive = \'X\'';
						
			if (!$results = mysql_query($query)) {
			die(mysql_errno().' : '.mysql_error());
			}

			$query2 = 'SELECT * FROM News where archive != \'X\'';
						
			if (!$results2 = mysql_query($query2)) {
			die(mysql_errno().' : '.mysql_error());
			}


		?>
		
			<?php
			while ($row = mysql_fetch_assoc($results)) {
				$oDate = new DateTime($row['Date']);
				
				$sDate = $oDate->format("d M Y");
				
				print '<tr>';
				print '<td class="grey">'.$sDate.'</td>';
				print '<td class="grey">'.$row['Text'].'</td>';
				print '<td class="grey">'.$row['Time'].'</td>';
				print '<td class="grey">'.$row['Location'].'</td>';
				print '</tr>';	       
						
			}

			while ($row = mysql_fetch_assoc($results2)) {
				$oDate = new DateTime($row['Date']);
				
				$sDate = $oDate->format("d M Y");
				
				print '<tr>';
				print '<td>'.$sDate.'</td>';
				print '<td>'.$row['Text'].'</td>';
				print '<td>'.$row['Time'].'</td>';
				print '<td>'.$row['Location'].'</td>';
				print '</tr>';	       
						
			}
			mysql_close($link);
			?>
                       
                        </table>
                      </td>
                    </tr>
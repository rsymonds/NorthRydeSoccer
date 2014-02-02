		<?php 
			$mysqlDatabase = 'northryd_news';
			if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {
			die(mysql_errno().' : '.mysql_error());
			}
			
			if (!mysql_select_db($mysqlDatabase)) {
				die(mysql_errno().' : '.mysql_error());
			}

			$query = 'SELECT * FROM News where archive != \'X\' ORDER BY Date ASC';
						
			if (!$results = mysql_query($query)) {
			die(mysql_errno().' : '.mysql_error());
			}


		?>
		<tr>
                      <td>
                        <table class="fullwidth" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="forte">Latest News</td>
                          <td>
                            <table align="right" cellspacing="0" cellpadding="0">
                            <tr>
                              <td class="small italic">
                                <a href="news.php">more news</a>
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
                        <table class="fullwidth news" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="tablesubheader fpnewsc1">DATE</td>
                          <td class="tablesubheader fpnewsc2">TIME</td>
                          <td class="tablesubheader fpnewsc3">ITEM</td>
                        </tr>
			<?php
			while ($row = mysql_fetch_assoc($results)) {
				$oDate = new DateTime($row['Date']);
				
				$sDate = $oDate->format("d M Y");
				
				print '<tr><td>'.$sDate.'</td>';
				print '<td>'.$row['Time'].'</td>';
				print '<td>'.$row['Text'].'</td></tr>';		       
						
						    }
			?>
                       
                        </table>
                      </td>
                    </tr>
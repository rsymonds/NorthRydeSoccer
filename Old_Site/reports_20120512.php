<?php 
$round = '5';
$minirnd = '4';
$year = '2012';
$datestring = '12 May 2012';
$mysqlDatabase = 'northryd_news';

			if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {

			die(mysql_errno().' : '.mysql_error());

			}

			

			if (!mysql_select_db($mysqlDatabase)) {

				die(mysql_errno().' : '.mysql_error());

			}


			$query = 'SELECT * FROM `Draw` WHERE year = \''.$year.'\' and round = \''.$round.'\' and `age_group` not like \'Under%\' and report = \'1\' ';		
			if (!$result = mysql_query($query)) {

			die(mysql_errno().' : '.mysql_error());

			}
			
			$query2 = 'SELECT * FROM `reports` WHERE year = \''.$year.'\' and round = \''.$round.'\' and `age_group` not like \'Under%\' ';		

			if (!$reportresult = mysql_query($query2)) {

			die(mysql_errno().' : '.mysql_error());

			}
			
			$query_mini = 'SELECT * FROM `Draw` WHERE year = \''.$year.'\' and round = \''.$minirnd.'\' and `age_group` like \'Under%\' and report = \'1\' ';		
			if (!$result_mini = mysql_query($query_mini)) {

			die(mysql_errno().' : '.mysql_error());

			}
			
			$query2_mini = 'SELECT * FROM `reports` WHERE year = \''.$year.'\' and round = \''.$minirnd.'\' and `age_group` like \'Under%\' ';		

			if (!$reportresult_mini = mysql_query($query2_mini)) {

			die(mysql_errno().' : '.mysql_error());

			}
			
			
		
?>

<html>
<head>
  <title>North Ryde Soccer - Match Reports - <?php print $datestring; ?></title>
  <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />
  <meta name="keywords" content="north ryde soccer club" />
  <meta name="description" content="North Ryde Soccer Club" />
  <link type="text/css" rel="stylesheet" href="stylesheets/nrs_styles.css" />
  <link type="image/x-icon" rel="icon" href="images/objects/favicon.ico" />
  <link type="image/x-icon" rel="shortcut icon" href="images/objects/favicon.ico" />
</head>
<body>
<script type="text/javascript">function Go() {return;}</script>
<script type="text/javascript" src="javascript/menu_variables.js"></script>
<script type="text/javascript" src="javascript/menu.js"></script>
<noscript>Your browser does not support JavaScript</noscript>
<table class="pagearea" cellspacing="0" cellpadding="0">
<!-- Top section -->
<tr class="bgblue">
  <td>
    <table class="fullwidth" cellspacing="0" cellpadding="0">
    <!-- Logo and emblem -->
    <tr>
      <td>
        <a href="index.php">
        <img class="noborder" src="images/objects/nrs_logo.gif" alt="Click for Front Page"></a>
      </td>
      <td rowspan="3">
        <table align="right" cellspacing="0" cellpadding="0">
        <tr>
          <td><img class="noborder" src="images/objects/nrs_emblem.jpg"></td>
        </tr>
        </table>
      </td>
    </tr>
     <!-- Site menu -->
    <?php readfile("topmenu.inc"); ?> 
    <!-- Spacer -->
    <tr><td class="spacermediumY"></td></tr>
    </table>
  </td>
</tr>
<!-- Menu and main content -->
<tr>
  <td>
    <table cellspacing="0" cellpadding="0">
    <tr>
      <!-- Menu -->
      <td class="menuarea"></td>
      <!-- Main content -->
      <td class="contentarea top">
        <table class="fullwidth" cellspacing="0" cellpadding="0">
        <!-- Page title and submenu -->
        <tr>
          <td class="titlearea">
            <table class="fullwidth" cellspacing="0" cellpadding="0">
            <tr>
              <!-- Page title -->
              <td>
                <table cellspacing="0" cellpadding="0">
                <tr>
                  <td class="title"><a class="titlelink" href="reports.php">&nbsp;MATCH REPORTS&nbsp;</a></td>
                  <td>></td>
                  <td class="titleclear">&nbsp;<?php print $datestring; ?>&nbsp;</td>
                </tr>
                </table>
              </td>
            </tr>
            </table>
          </td>
        </tr>
        <!-- Spacer -->
        <tr><td class="spacermediumY"></td></tr>
        <tr><td class="spacermediumY"></td></tr>
        <!-- Page content -->
        <tr>
          <td>
            <table align="center" class="contentwidth" cellspacing="0" cellpadding="0">
            <tr>
              <td>
                <table class="fullwidth" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="forte">Match Report - <?php print $datestring; ?></td>
                  <td>
                    <table class="right" cellspacing="0" cellpadding="0">
                    <tr>
                      <form>
                      <td>
					  &nbsp;
                        <!--select size="1" name="reportList" onchange="openReportList();"></select-->
                      </td>
                      </form>
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
                <table cellspacing="0" cellpadding="0">
                <tr>
                  <td class="small">On this page:</td>
                  <td class="spacersmallX"></td>
				  <?php 
				  $scores_array = array();
				  while ($row = mysql_fetch_assoc($result_mini)) {
					  $age_group = $row['age_group'];
					  $division = $row['division'];
					  
					  $scores_array[$age_group.$division.'for'] = $row['goals_for'];
					  $scores_array[$age_group.$division.'against'] = $row['goals_against'];
					
					  $display_text = $age_group.' '.$division;
									  
					  print '<td class="pagemenu"><a class="pagemenulink" href="#'.$row['age_group'].$row['division'].'">&nbsp;'.$display_text.'</a></td>';
				  }
				  
				  while ($row = mysql_fetch_assoc($result)) {
					  $age_group = $row['age_group'];
					  $division = $row['division'];
					  $scores_array[$age_group.$division.'for'] = $row['goals_for'];
					  $scores_array[$age_group.$division.'against'] = $row['goals_against'];
					  
					  if (($age_group == 'O35') or ($age_group == 'AA')) { 
						$display_text = $age_group.' Div '.$division;
					  }
					  else {
						$age_group = ltrim($age_group , "0");
						$display_text = 'U'.$age_group.' Div '.$division;
					  }
					  
					  print '<td class="pagemenu"><a class="pagemenulink" href="#'.$row['age_group'].$row['division'].'">&nbsp;'.$display_text.'</a></td>';
				  }
				  ?>
				</tr>
                </table>
              </td>
            </tr>
            <tr><td class="spacersmallY"></td></tr>

		   <?php 
		  while ($row2 = mysql_fetch_assoc($reportresult_mini)) {
				  ?>
            <tr><td><hr/></td></tr>
            <tr>
              <td class="forte">
			  <?php
			  $age_group = $row2['age_group'];
				  $division = $row2['division'];
				  $key = $age_group.$division;
				  
				  
				$display_text = $age_group.' '.$division;
				  
                print  '<a name="'.$row2['age_group'].$row2['division'].'">'.$display_text.'</a>';
				$goals_for = $scores_array[$key.'for'];
				if ($goals_for !== '-1') {
					print '<span class="green">&nbsp;&nbsp;'.$scores_array[$key.'for'].' - '.$scores_array[$key.'against'].'</span>';
				}
				?>
              </td>
            </tr>
            <tr><td class="spacermediumY"></td></tr>
            <tr>
              <td class="reporttext">
			  <?php 

			  print nl2br($row2['text']);
			  ?>
                 <br/><br/>
                - <?php 
			  print $row2['submitted_by'];
			  
			  $query = 'SELECT * FROM `report_images` WHERE year = \''.$year.'\' and round = \''.$minirnd.'\' and `age_group` = \''.$age_group.'\' and division = \''.$division.'\' ';
			  
			  if (!$result_images = mysql_query($query)) {
					die(mysql_errno().' : '.mysql_error());
			  }
			  
			  while ($row_image = mysql_fetch_assoc($result_images)) {
				print '<img class="noborder imgleft" src="'.$row_image['path'].'"><br>';
			  }
			  ?>
              </td>
            </tr>
            <tr><td class="spacerlargeY"></td></tr>
			<?php } ?>
		   
          <?php 
		  while ($row2 = mysql_fetch_assoc($reportresult)) {
				  ?>
            <tr><td><hr/></td></tr>
            <tr>
              <td class="forte">
			  <?php
			  $age_group = $row2['age_group'];
				  $division = $row2['division'];
				  $key = $age_group.$division;
				  
				  if (($age_group == 'O35') or ($age_group == 'AA')) { 
					$display_text = $age_group.' Div '.$division;
				  }
				  else {
					$age_group = ltrim($age_group , "0");
					$display_text = 'U'.$age_group.' Div '.$division;
				  }
                print  '<a name="'.$row2['age_group'].$row2['division'].'">'.$display_text.'</a>';
                $goals_for = $scores_array[$key.'for'];
				if ($goals_for !== '-1') {
					print '<span class="green">&nbsp;&nbsp;'.$scores_array[$key.'for'].' - '.$scores_array[$key.'against'].'</span>';
				}
				?>
              </td>
            </tr>
            <tr><td class="spacermediumY"></td></tr>
            <tr>
              <td class="reporttext">
			  <?php 

			  print nl2br($row2['text']);
			  ?>
                 <br/><br/>
                - <?php 
			  print $row2['submitted_by'];
			  
			  $query = 'SELECT * FROM `report_images` WHERE year = \''.$year.'\' and round = \''.$round.'\' and `age_group` = \''.$age_group.'\' and division = \''.$division.'\' ';
			  
			  if (!$result_images = mysql_query($query)) {
					die(mysql_errno().' : '.mysql_error());
			  }
			  
			  while ($row_image = mysql_fetch_assoc($result_images)) {
				print '<img class="noborder imgleft" src="'.$row_image['path'].'"><br>';
			  }
			  ?>
              </td>
            </tr>
            <tr><td class="spacerlargeY"></td></tr>
			<?php } ?>
            </table>
          </td>
        </tr>
        <!-- Spacer -->
        <tr><td class="spacerlargeY"></td></tr>
        <tr><td class="spacerlargeY"></td></tr>
        <!-- Copyright -->
        <?php readfile("copyright.inc"); ?>
        <!-- Spacer -->
        <tr><td class="spacersmallY"></td></tr>
        </table>
      </td>
    </tr>
    </table>
  </td>
</tr>
</table>
<!-- Spacer -->
<br/><br/>
</body>
</html>
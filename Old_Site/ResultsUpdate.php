<?php  session_start(); 

$loggedin = $_SESSION['loggedin'];

    if ($loggedin != 'X') {

    	$_SESSION['redirect'] = 'ResultsUpload.php';

    	header('Location:login.php');

    }?>
	
	<html>

<head>

  <title>North Ryde Soccer - Administration</title>

  <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />

  <meta name="keywords" content="north ryde soccer club" />

  <meta name="description" content="North Ryde Soccer Club" />

  <script type="text/javascript" src="javascript/nrs_scripts.js"></script>

  <link type="text/css" rel="stylesheet" href="stylesheets/nrs_styles.css" />

  <link type="image/x-icon" rel="icon" href="images/objects/favicon.ico" />

  <link type="image/x-icon" rel="shortcut icon" href="images/objects/favicon.ico" />

  

</head>

<body>

<script type="text/javascript">function Go() {return;}</script>

<script type="text/javascript" src="javascript/menu_variables_admin.js"></script>

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

        <a href="">

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

    <!-- Site menu 

    <?php readfile("topmenu.inc"); ?> 

     Spacer -->

    <tr><td class="spacermediumY"></td></tr>

    </table>

  </td>

</tr>

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

              <td class="title">Results Upload Administration</td>

            </tr>

            </table>

          </td>

        </tr>

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

                  <!-- Left Column -->

                  <td class="threefifths top">

                    <table class="fullwidth" cellspacing="0" cellpadding="0">

                    <tr>

                    <td>

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

			 $mysqlDatabase = 'northryd_news';
			 
				if (!$link = mysql_connect('localhost','northryd_admin','n0rthryde')) {

				die(mysql_errno().' : '.mysql_error());

				}

				

				if (!mysql_select_db($mysqlDatabase)) {

					die(mysql_errno().' : '.mysql_error());

				}
               $f = fopen($_FILES["file"]["tmp_name"], 'r');
				if ($f) {
					while ($line = fgetcsv($f)) {  // You might need to specify more parameters
						// deal with $line.
						if ( $index > 5 ) {
							$temp = trim( $line[0] , "\xA0 ");
							$array = explode( '/' , $temp );
							$agegroup = $array[0];
							$division = trim( $array[1] , "\xA0 ");
							$hometeam = $line[1];
							$hometeam_goals =  $line[2];
							$awayteam_goals =  $line[3];
							$awayteam = $line[4];
							$date = $line[6];
							if ( trim( $hometeam , "\xA0 ") == "North Ryde SC") {
								$goalsfor = trim( $hometeam_goals, "\xA0 ");
								$goalsagainst = trim( $awayteam_goals, "\xA0 ");
							} else {
								$goalsfor = trim( $awayteam_goals, "\xA0 ");
								$goalsagainst = trim( $hometeam_goals, "\xA0 ");
							}
				
							$date = trim($date, "\xA0 ");
							list($d,$m,$y)=explode("/",$date);
							$date = $m.'/'.$d.'/'.$y;
							$date = trim($date);
							$oDate = date('Y-m-d', strtotime($date));
							$agegroup = trim($agegroup , "\xA0 ");
							
							if ($agegroup !== '') {
								$query = 'UPDATE `Draw` SET `goals_for`=\''.$goalsfor.'\',`goals_against`=\''.$goalsagainst.'\' WHERE year = \''.$year.'\' AND age_group = \''.$agegroup.'\' AND division = \''.$division.'\' AND date = \''.$oDate.'\'';
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
						// $line[1] is the second cokumn
						// ...
						$index++;
					}
					if ($errorcount == 0 ) {
						print 'Draw loaded without errors';
					}
					fclose($f);
					mysql_close($link);
					
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

      </td>

    </tr>

    

    </table>

  </td>

</tr>

</table>

    </body>



</html>

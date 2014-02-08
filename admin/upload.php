<?php
// include ImageManipulator class
require_once('ImageManipulator.php');

    $id = $_POST['id'];	
    $age_group = $_POST['age_group'];	
    $division = $_POST['division'];	
    $username = $_POST['UserName'];	
    $year = date('Y');
    
    include 'PHP/database.php';
    $dbObject = new database();
    $dbObject->getConnection();
	
	$query = 'SELECT MAX(imageNo) AS maxIndex FROM `report_images` WHERE year = \''.$year.'\' and age_group = \''.$age_group.'\' and division = \''.$division.'\'';
	
	if (!$result = mysql_query($query)) {
		die(mysql_errno().' : '.mysql_error());
	}

    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $index = $row['maxIndex'];	
    print $index;
    $index++;
    
    $path = '../images/photos/'.$age_group.'/'.$year.'/'.$division.'/';
    $dbpath = '/images/photos/'.$age_group.'/'.$year.'/'.$division.'/';
    $thumbfilename = $age_group.$division.'Round'.$id.$index.'Thumb.jpg';
    $largefilename = $age_group.$division.'Round'.$id.$index.'Large.jpg';
   
 
if ($_FILES['fileToUpload']['error'] > 0) {
    echo "Error: " . $_FILES['fileToUpload']['error'] . "<br />";
} else {
    // array of valid extensions
    $validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension = strrchr($_FILES['fileToUpload']['name'], ".");
    $fileExtension = strtolower ( $fileExtension );
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension, $validExtensions)) {
        $newNamePrefix = time() . '_';
        $manipulator = new ImageManipulator($_FILES['fileToUpload']['tmp_name']);
        $width  = $manipulator->getWidth();
        $height = $manipulator->getHeight();
        $centreX = round($width / 2);
        $centreY = round($height / 2);

 
        // center cropping to 200x130
        $newImage = $manipulator->resample(750,500, true);
        // saving file to uploads folder
        
        $manipulator->save($path . $largefilename);
        $newImage = $manipulator->resample(72,50, true);
        // saving file to uploads folder
        
        $manipulator->save($path . $thumbfilename);
        $query = 'INSERT INTO `report_images`(`year`, `age_group`, `division`, `round`, `ImageNo`, `thumbpath`, `largepath`) VALUES (\''.$year.'\',\''.$age_group.'\',\''.$division.'\',\''.$id.'\',\''.$index.'\',\''.$dbpath.$thumbfilename.'\',\''.$dbpath.$largefilename.'\')';
        echo $query;
        $results = mysql_query($query);
        echo 'Done ...';
    } else {
        echo 'You must upload an image...';
    }
}
$dbObject->closeConnection();
?>
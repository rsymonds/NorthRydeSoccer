<?php
if ($_GET['randomId'] != "lQn24rUlbcWJCVn4660PCGd6pBW_ekt6oCDm64GGPvx2YLz7Vyrjdmv8HdAAbgfM") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  

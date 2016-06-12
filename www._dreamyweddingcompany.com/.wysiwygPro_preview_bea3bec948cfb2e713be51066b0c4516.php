<?php
if ($_GET['randomId'] != "dMV9ucFvTO5bmzOb7XiFkqDeN673aWFxkDRv5CeNFDQJCQEBypXW5UZHcFEznnAm") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  

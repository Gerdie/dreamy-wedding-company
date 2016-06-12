<?php
if ($_GET['randomId'] != "1CMoKUxuvqEgRDQTpPgV25Nwn6iDgKpUCTPpbc5LbQ_2ShtOBvFFLUAyj6pz0cMP") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  

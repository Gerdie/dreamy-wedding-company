<?php
if ($_GET['randomId'] != "kVug3gznra2DbnjUBLQDzmYo5z4XA6CcM9XJskUKAJ2JN_fKBdiu4ql4rXg4tW3T") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  

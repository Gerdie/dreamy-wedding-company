<?php
if ($_GET['randomId'] != "Msm29YPrko4sjE2G_bRvRt4yoZMxCNvLB7n7lwPWlfudbLta2eExRP0XTIixW_nd") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  

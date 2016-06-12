<?php
if ($_GET['randomId'] != "NKcfJeWZpanS4ykGWl8ZAldKS0sEXCiiVcc3VFMNG5SjfbY10sA_Lb1rGIqoRAac") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  

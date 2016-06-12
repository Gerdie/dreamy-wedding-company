<?php
if ($_GET['randomId'] != "QDd0CIdUmg8ijSwokfzuzmaouHpRE1b_Z0tTGb33_gwNzHZCa3BaUjMGuAASeNso") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  

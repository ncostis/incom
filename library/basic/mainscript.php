<?php
if (getparamvalue("ID") == "") {
    require $path . "library/main.php";
}

if (getparamvalue("ID") <> "") {
    // Check Authorized Users
    if ($Page_Authorized == 1 && $_SESSION['user']['Access_Level'] >= $Page_MemAccess && !isset($_SESSION['user']['Customer_ID'])) {
        echo $showAuthorizedText;
    } else {
        if (getparamvalue("Rec_ID") < 1) {
            require $path . "views/lists.php"; // For Lists (library-->default_lists,forms)
        } else {
            require $path . "views/records.php";  // For records (library-->pg)
        }
    } //Authorized
}
?>

<?php
$GetPages_Sel = "SELECT * FROM pages WHERE Page_Section = 'general' ";
$GetPages_Query = q($GetPages_Sel);
$numpages = nr($GetPages_Query);

require_once($routes["records_view.php"]);
?>


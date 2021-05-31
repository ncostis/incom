<?php
$path = "../../";
require "../init.php";
$Page = getparamvalue('Page');
$Rec_ID = getparamvalue('Rec_ID');
$Lang = getparamvalue('Lang');
$width = getparamvalue('w');
$height = getparamvalue('h');
$PageURL = $rootURL . "library/eshop/" . $Page . "?Rec_ID=" . $Rec_ID . "&Lang=" . $Lang . "&width=" . $width;
?>
<iframe src="<?php echo $PageURL; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" frameborder=0
        scrolling=auto></iframe>




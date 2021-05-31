<?php
$ednum = 1;
$Rec_ID = $GetRec['Rec_ID'];
if ($RecMod_ID <> "") {
    $Rec_ID = $RecMod_ID;
} //Display Dynamic Module (dynamic appearance)

$imgExpand = $rootURL . "js/text_openclose/textopen.png";
$imgCollapse = $rootURL . "js/text_openclose/textclose.png";
?>

<div style="width:<?php echo $GetVar["Rec_Field29"]; ?>px;">
    <div align="right">
        <a href="#" rel="toggle[showInside]" data-openimage="<?php echo $imgCollapse; ?>"
           data-closedimage="<?php echo $imgExpand; ?>"><img src="<?php echo $imgCollapse; ?>" border="0" alt=''></a>
    </div>

    <div id="showInside" class="insideContAcc">
        <div class="top20"
             style="padding-left:30px;"><?php getEditor($Rec_ID, $Path_Texts, $ednum, $style, $path); ?></div>
    </div>
</div>
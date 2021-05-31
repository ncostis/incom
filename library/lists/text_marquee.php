<?php
$textmarquee = $GetRec['Rec_Title'];

$ModPageID = getModPageID($ModPageID, $Lang);
if (($RecMod_ID <> "") OR ($ModPageID <> "")) {
    if ($RecMod_ID <> "") {
        $GetModRec_Sel = "SELECT * FROM records WHERE Rec_ID = $RecMod_ID";
    } // Get content from module Dynamically
    if ($ModPageID <> "") {
        $GetModRec_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $ModPageID";
    } // Get content directly from module

    $GetModRec_Query = q($GetModRec_Sel);
    $GetModRec = f($GetModRec_Query);
    $textmarquee = $GetModRec['Rec_Title'];
}
?>

<div class="dmarquee bodytext">
    <div>
        <div><?php echo $textmarquee; ?></div>
    </div>
</div>

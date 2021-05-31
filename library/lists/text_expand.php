<?php
$ModPageID = getModPageID($ModPageID, $Lang);
if ($ModPageID == "") {
    $ModPageID = $Page_ID;
    if (($RecMod_ID <> "") OR ($ModPageID <> "")) {
        if ($RecMod_ID <> "") {
            $GetModRec_Sel = "SELECT * FROM records WHERE Rec_ID = $RecMod_ID AND Rec_Active = 0 AND Rec_Page_Content = $modHeadCont";
        } elseif ($ModPageID <> "") {
            $GetModRec_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $ModPageID AND Rec_Active = 0 AND Rec_Page_Content = $modHeadCont";
        }
        $GetModRec_Query = q($GetModRec_Sel);
        $GetModRec = f($GetModRec_Query);
    }
    
} else {
    $GetModRec_Sel   = "SELECT * FROM records WHERE Rec_Page_ID = $ModPageID AND Rec_Active = 0 AND Rec_Page_Content = $modHeadCont";
    $GetModRec_Query = q($GetModRec_Sel);
    $GetModRec       = f($GetModRec_Query);
}
?>
<?php //change $GetModRec to $GetRec for internal pages
    $filePath =$Path_Texts.$GetModRec['Rec_Text2'].".htm";
    $editorSize= filesize($filePath);
    if($editorSize >0) {  ?>
<div class="moreButton">
<a href="#links\" class="more">
<?php echo $showmore; ?></a>
</div>
<div class="moreText" style="display:none">
    <?php //for home page or for dynamic call
        getEditor($GetModRec['Rec_ID'], $Path_Texts, 2, $style, $path); ?>
    <?php //for internal Pages
    //getEditor($Rec_ID,$Path_Texts,2,$style,$path); ?>
<div class="showLessButton">
<a href="#links\" class="more">
<?php echo $showless; ?>
</a>
    </div>
</div>
<?php } ?>
<?php
$stringSelRecs = $GetRec['Rat_MultipleSel1'];
$muNum = 0;

$GetRatRecs_Sel = "SELECT * FROM recs_att_tables WHERE Rat_SubCat = 'MultTable1' AND Rat_ID in ($stringSelRecs)";
$GetRatRecs_Query = q($GetRatRecs_Sel);
while ($GetRatRec = f($GetRatRecs_Query)) {
    if ($muNum == 0) $leftMu = "left"; else $leftMu = "left7";
    print "<div class=\"$leftMu\"><input type='radio' name='MultipleSel1' value='".$GetRatRec["Rat_Title"]."'>".$GetRatRec["Rat_Title"]."</div>";
    $muNum = 1;
} // end of while
print "<div style=\"clear:both;\"></div>";
?>


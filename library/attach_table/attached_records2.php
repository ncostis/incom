<?php
$muNum = 0;

$GetRatRecs_Sel = "SELECT * FROM recs_att_tables WHERE Rat_SubCat = 'List_Rat2' AND Rat_Rec_ID = $Rec_ID";
$GetRatRecs_Query = q($GetRatRecs_Sel);
while ($GetRatRec = f($GetRatRecs_Query)) {
    if ($muNum == 0) $leftMu = "left"; else $leftMu = "left7";
    print "<div class=\"$leftMu\">".$GetRatRec["Rat_Title"]."</div>";
    $muNum = 1;
} // end of while
print "<div style=\"clear:both;\"></div>";
?>


<?php
$stringSelRecs = $GetRec['Rat_MultipleSel1'];
$muNum = 0;

$GetRatRecs_Sel = "SELECT * FROM recs_att_tables WHERE Rat_SubCat = 'MultTable1' AND Rat_ID in ($stringSelRecs)";
$GetRatRecs_Query = q($GetRatRecs_Sel);
while ($GetRatRec = f($GetRatRecs_Query)) {
    // PRINT CONTENT FROM RAT RECORD
    print "<div class='top10'>";
    print "<div class='left' style='width:120px;'>".$GetRatRec["Rat_Title"]."</div>";
    print "<div class='left15' style='width:150px;'>".$GetRatRec["Rat_Desc"]."</div>";
    print "<div class='left15'>";
    $pathfile = $Path_File_Rat . $GetRatRec['Rat_File1'];
    $fileCheck = $Path_FileRatCheck . $GetRatRec['Rat_File1'];

    if ((file_exists($fileCheck)) AND ($GetRatRec['Rat_File1'] <> "")) {
        print "<img src=\"$pathfile\" border=0>";
    }
    print "</div>";
    print "</div>";
    print "<div style='clear:both;'></div>";
} // end of while
?>


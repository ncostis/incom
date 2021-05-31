<?php
$GetRatRec_Query = q("SELECT * FROM recs_att_tables WHERE Rat_SubCat = 'List_Rat1' AND Rat_Rec_ID = $Rec_ID Order by Rat_Order,Rat_ID");
    while ($GetRatRec = f($GetRatRec_Query)) {
        $Rat_ID = $GetRatRec['Rat_ID'];
        $Rat_ListID = $GetRatRec['Rat_List_ID'];
        $RatTempID = $GetRatRec['Rat_View'];
        
        require $path . "views/module_rat_templates.php";
        
    }
?>
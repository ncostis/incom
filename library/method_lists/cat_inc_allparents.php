<?php
$ID = $pView;
$GetRoutePage_Sel = "SELECT * FROM pages WHERE Page_View = '$ID'";
$GetRoutePage_Query = q($GetRoutePage_Sel);
$GetRoutePage = f($GetRoutePage_Query);
if ($GetRoutePage["Page_OrderBy"] == "") {
    $orderString = "Order by Page_Order";
} else {
    $orderString = "order by " . $GetRoutePage["Page_OrderBy"] . " " . $GetRoutePage["Page_SortBy"];
}

$GetAllPages_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = ".$GetRoutePage["Page_ID"]." $orderString";
$GetAllPages_Query = q($GetAllPages_Sel);

$num = 0;
while ($GetAllPages = f($GetAllPages_Query)) {
    $Page_ID = $GetAllPages['Page_ID'];
    $pView = $GetAllPages['Page_View'];
    $ID = $pView;
    require $path . "_cm_admin/settingsvars.php";

    $Page_Sel = "SELECT * FROM pages WHERE Page_View = '$ID'";
    $qPageResults = q($Page_Sel);
    $PageResults = f($qPageResults);

    $CatCont_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $Page_ID AND Rec_Page_Content = 1 AND Rec_Active = 0 ";
    $CatCont_Query = q($CatCont_Sel);
    $CatCont = f($CatCont_Query);

    $GetRecs_Sel = "SELECT FROM pages, records WHERE Page_ID = $Page_ID AND Rec_Page_ID = $Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0";
    $GetRecs_Query = q($GetRecs_Sel);

    $GetPages_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = $Page_ID";
    $GetPages_Query = q($GetPages_Sel);

    $ednum = 1; // editor number
    $Page_Type = $GetAllPages['Page_Type'];
    if ($mobileMode == 1) $Page_Type = $GetAllPages['Page_Type_Mob']; // Mobile Version
    $Page_Rec_Temp = $GetAllPages['Page_Rec_Temp'];

    if ($mobileMode == 1) $Page_Rec_Temp = $GetAllPages['Page_Rec_Mob']; // Mobile Version
    $Page_List_ID = $GetAllPages["Page_List_ID"];

    $Page_Lists_Temp = $GetAllPages["Page_Lists_Temp"];
    if ($GetAllPages["Page_Lists_Temp2"] > 0) $Page_Lists_Temp2 = $GetAllPages["Page_Lists_Temp2"]; else $Page_Lists_Temp2 = $GetAllPages["Page_Lists_Temp"];

    if ($mobileMode == 1) {
        $Page_Lists_Temp = $GetAllPages["Page_Lists_Mob"];
        if ($GetAllPages["Page_Lists_Mob2"] > 0) $Page_Lists_Temp2 = $GetAllPages["Page_Lists_Mob2"]; else $Page_Lists_Temp2 = $GetAllPages["Page_Lists_Mob"];

    }

    // Show Dynamic Method Lists
    // =========================
    require $path . "views/lists.php";

} // while


?>

<?php
if (getparamvalue('ID') == "") {
    $Page_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = 0 AND Page_Section = 'general' AND Page_Lang = '$Lang' Order by Page_Order Asc Limit 0,1";
} else {
    $ID = getparamvalue('ID');
    $Page_Sel = "SELECT * FROM pages WHERE Page_View = '$ID' AND Page_Lang = '$Lang'";
}

$qPageResults = q($Page_Sel);
$PageResults = f($qPageResults);
$Page_ID = $PageResults["Page_ID"];
$pView = $PageResults["Page_View"];
// Mobile Version
if (isset($mobileMode) && $mobileMode == 1) {
    $Page_Type = $PageResults["Page_Type_Mob"];
    $Page_HeadLists_Temp = $PageResults["Page_HeadLists_Mob"];
    $Page_Lists_Temp = $PageResults["Page_Lists_Mob"];
    $Page_Rec_Temp = $PageResults["Page_Rec_Mob"];
} else { // Desktop Version
    $Page_Type = $PageResults["Page_Type"];
    $Page_HeadLists_Temp = $PageResults["Page_HeadLists_Temp"];
    $Page_Lists_Temp = $PageResults["Page_Lists_Temp"];
    $Page_Rec_Temp = $PageResults["Page_Rec_Temp"];
}

$Page_HeadLists_Flag = $PageResults["Page_HeadLists_Flag"];
$PageNoIndex = $PageResults['Page_No_Index'];
$PageNoFollow = $PageResults['Page_No_Follow'];
$Parent_Page_ID = $PageResults["Parent_Page_ID"];
$Page_GenVar = $PageResults["Page_GenVar"];
$BanAreaTop = $PageResults['Page_BanArea1'];
$BanAreaLeft = $PageResults['Page_BanArea2'];
$BanAreaRight = $PageResults['Page_BanArea3'];
$BanAreaBottom = $PageResults['Page_BanArea4'];
$Page_GetFromSection = $PageResults["Page_GetFromSection"];
$Page_List_ID = $PageResults["Page_List_ID"];
$Page_Section = $PageResults["Page_Section"];
$Page_Authorized = $PageResults["Page_Authorized"];
$Page_MemAccess = $PageResults['Page_MemAccess'];
$Page_Header_Flag = $PageResults["Page_Header_Flag"];

if (($Page_Header_Flag == 1) OR ($Parent_Page_ID == 0)) {
    $pageHeader = pageHeader($Page_ID);
    $headerPageID = $Page_ID;
} else {
    $headerPageID = headerPageID($Page_ID);
    $pageHeader = pageHeader($headerPageID);
}

$Settings_Sel = "SELECT * FROM pages WHERE Page_ID = $headerPageID";
$Settings_Query = q($Settings_Sel);
$GetSettings = f($Settings_Query);

// Mobile Version
if (isset($mobileMode) && $mobileMode == 1) {
    $LayoutID = $GetSettings['Page_Temp_ID_Mob'];
    $SetPageID = $GetSettings['Page_ID'];
    $headerPageLayoutID = $GetSettings['Page_Style_ID_Mob'];
    $headerPageStylesLinksID = $GetSettings["Page_Styles_Links_Mob"];
} else { // Desktop Version
    $LayoutID = $GetSettings['Page_Temp_ID'];
    $SetPageID = $GetSettings['Page_ID'];
    $headerPageLayoutID = $GetSettings['Page_Style_ID'];
    $headerPageStylesLinksID = $GetSettings["Page_Styles_Links"];
}


if ((getparamvalue('Rec_ID') > 0) AND ($mobileMode == 0)) { // Show Record Custom Template
    $LayoutID = $GetSettings['Page_RecTemp_ID'];
    $headerPageLayoutID = $GetSettings['Page_RecStyle_ID'];
}

require $routes["settingsvars.php"];
require $path . "library/queries.php";
require $path . "library/metatags.php";

if (($PageNoIndex == 0) AND ($PageNoFollow == 0)) $metaCont = "all";
if ($PageNoIndex == 1) $metaCont = "noindex, follow";
if ($PageNoFollow == 1) $metaCont = "index, nofollow";
if (($PageNoIndex == 1) AND ($PageNoFollow == 1)) $metaCont = "noindex, nofollow";



?>
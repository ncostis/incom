<?php
$Page_ID = $PageResults["Page_ID"]; // Initialize $Page_ID
$Get1stPar_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = $Page_ID Order by Page_Order LIMIT 0,1";
$Get1stPar_Query = q($Get1stPar_Sel);
$Get1stPar = f($Get1stPar_Query);
$num = 0;

$Page_ID = $Get1stPar['Page_ID'];
$pView = $Get1stPar['Page_View'];
$ID = $Get1stPar['Page_View'];

$CatCont_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $Page_ID AND Rec_Page_Content = 1 AND Rec_Active = 0 ";
$CatCont_Query = q($CatCont_Sel);
$CatCont = f($CatCont_Query);

$GetTitle_Sel = "SELECT * FROM pages WHERE Page_ID = $Page_ID";
$GetTitle_Query = q($GetTitle_Sel);
$GetTitle = f($GetTitle_Query);

$GetRecs_Sel = "SELECT * FROM pages, records WHERE Page_ID = $Page_ID AND Rec_Page_ID = $Page_ID AND Rec_Page_Content = 0  AND Rec_Active = 0 Order by Rec_Order Asc";
$GetRecs_Query = q($GetRecs_Sel);

$GetPages_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = $Page_ID";
$GetPages_Query = q($GetPages_Sel);

$ednum = 1; // editor number
$Page_Type = $Get1stPar['Page_Type'];
if ($mobileMode == 1) $Page_Type = $Get1stPar['Page_Type_Mob']; // If Mobile Version
$Page_Rec_Temp = $Get1stPar['Page_Rec_Temp'];
if ($mobileMode == 1) $Page_Rec_Temp = $Get1stPar['Page_Rec_Mob']; // If Mobile Version
$Page_List_ID = $Get1stPar["Page_List_ID"];

$pagepath = $path . "library/method_" . $Page_Type . ".php";
require "$pagepath"; // display page type
?>
<?php
// This page is valid only when no list is selected (at show by list field)

// Get $ModPageID by current Lang
if (($ModPageID == "") AND ($dModPageID <> "")) $ModPageID = $dModPageID; // if var comes from att dynamic (module_att_templates)
$ModPageID = getModPageID($ModPageID, $Lang);
if ($ModPageID == "") $ModPageID = $Page_ID;

// Show Category Title as Header above all records
$PageModID_Sel = "SELECT * FROM pages WHERE Page_ID = $ModPageID";
$PageModID_Query = q($PageModID_Sel);
$PageModID = f($PageModID_Query);
if ($ModShowPageTitle == 1) {
    print "<div style='padding-bottom:6px;'><h3>".$PageModID["Page_Name"]."</h3></div>";
}

if ($PageModID["Page_OrderBy"] == "") {
    $orderString = "Order by Rec_DateStart Desc";
} else {
    $orderString = "order by " . $PageModID["Page_OrderBy"] . " " . $PageModID["Page_SortBy"];
}

// Get records per page
$PageMod_Sel = "SELECT * FROM pages, records WHERE Parent_Page_ID = $ModPageID AND Page_ID = Rec_Page_ID AND Rec_Page_Content = $modHeadCont AND Rec_Active = 0 $orderString LIMIT $StartAt,$limitRecs";
$PageMod_Query = q($PageMod_Sel);

// Calculate the number of records per page
$step = $stepsize;
$numpages = (nr($PageMod_Query) / $step);
$intpages = (int)$numpages;
if ($intpages < $numpages) {
    $numpages = $intpages + 1;
}

$nodivMenu = 0;
$numTD = 0;
$numRec = 0;
$nodivTab = 0;
?>

<?php
//Display Dynamic Module (dynamic appearance)
$flagModList = 1; // When display is through list, it is possible to carry out temporarily another Module for example image1. This second module should be according to ModPageID and not to reset ModPageΙD (meaning module_page)
require $path . "library/method_lists/module_list.php";
$flagModList = 0;
?>
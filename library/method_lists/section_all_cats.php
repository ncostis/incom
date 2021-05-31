<?php
$ID = $pView;
$GetRoutePage_Sel = "SELECT * FROM pages WHERE Page_View = '$ID'";
$GetRoutePage_Query = q($GetRoutePage_Sel);
$GetRoutePage = f($GetRoutePage_Query);
$Page_GetFromSection = $GetRoutePage['Page_GetFromSection'];
if ($GetRoutePage["Page_OrderBy"] == "") {
    $orderString = "Order by Page_Order";
} else {
    $orderString = "order by " . $GetRoutePage["Page_OrderBy"] . " " . $GetRoutePage["Page_SortBy"];
}

// find Cat Content from general section with Page_GetFromSection = current section
$SectCont_Sel = "SELECT * FROM sections_headers WHERE Section_Name = '$Page_GetFromSection'";
$SectCont_Query = q($SectCont_Sel);
$SectCont = f($SectCont_Query);
$SecHead_Desc = stripslashes($SectCont['SecHead_Desc']);
if (nr($SectCont_Query) > 0) {
    print "<div class='bottom20'>";
    print "<h1>".$SectCont["SecHead_Title"]."</h1>";
    if ($SectCont['SecHead_Image'] == "") {
        print "<div class='top20'>$SecHead_Desc</div>";
    } else {
        $imageSection = $Path_Image_Sections . $SectCont['SecHead_Image'];
        print "<div class='top20'>";
        print "<div class='left'><img src=\"$imageSection\" alt=''></div>";
        print "<div class='left20' style='width:530px;'>$SecHead_Desc</div>";
        print "<div style=\"clear:both;\"></div>";
        print "</div>";
    }
    print "</div>";
}
?>

<?php
$GetAllPages_Sel = "SELECT * FROM pages WHERE Page_Section = '$Page_GetFromSection' AND Page_Lang = '$Lang' $orderString";
$GetAllPages_Query = q($GetAllPages_Sel);

$num = 0;
while ($GetAllPages = f($GetAllPages_Query)) {
    $Page_ID = $GetAllPages['Page_ID'];
    $pView = $GetAllPages['Page_View'];

    $CatCont_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $Page_ID AND Rec_Page_Content = 1 AND Rec_Active = 0 ";
    $CatCont_Query = q($CatCont_Sel);
    $CatCont = f($CatCont_Query);

    $GetTitle_Sel = "SELECT * FROM pages WHERE Page_ID = $Page_ID";
    $GetTitle_Query = q($GetTitle_Sel);
    $GetTitle = f($GetTitle_Query);

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

    // check if record has different Lists View
    $Page_Lists_Temp = $GetAllPages["Page_Lists_Temp"];
    if ($GetAllPages["Page_Lists_Temp2"] > 0) $Page_Lists_Temp2 = $GetAllPages["Page_Lists_Temp2"]; else $Page_Lists_Temp2 = $GetAllPages["Page_Lists_Temp2"];

    if ($mobileMode == 1) {
        $Page_Lists_Temp = $GetAllPages["Page_Lists_Mob"];
        if ($GetAllPages["Page_Lists_Mob2"] > 0) $Page_Lists_Temp2 = $GetAllPages["Page_Lists_Mob2"]; else $Page_Lists_Temp2 = $GetAllPages["Page_Lists_Mob"];

    }

    $Page_Enable = $GetPage["Page_Enable"];
    $ID = $pView;
    ?>

    <h2><?php echo $GetTitle['Page_Name']; ?></h2>
    <div class="top10">
        <?php
        $pagepath = $path . "library/method_" . $Page_Type . ".php";
        require "$pagepath"; // display page type
        ?>
    </div>
    <div class="top20">&nbsp;</div>
<?php } ?>

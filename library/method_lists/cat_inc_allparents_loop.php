<?php
$Page_ID = $PageResults["Page_ID"]; // Initialize $Page_ID
$GetALoopPages_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = $Page_ID";
$GetALoopPages_Query = q($GetALoopPages_Sel);

$num = 0;
while ($GetALoopPages = f($GetALoopPages_Query)) {
    $Page_ID = $GetALoopPages['Page_ID'];
    require $path . "_cm_admin/settingsvars.php";
    $pView = $GetALoopPages['Page_View'];
    $Page_Rec_Temp = $GetALoopPages["Page_Rec_Temp"];
    if ($mobileMode == 1) $Page_Rec_Temp = $GetALoopPages['Page_Rec_Mob']; // If Mobile Version
    $op = $GetALoopPages["Page_ImgOP"];  // Open Page Style of Images

    $CatCont_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $Page_ID AND Rec_Page_Content = 1 AND Rec_Active = 0";
    $CatCont_Query = q($CatCont_Sel);
    $CatCont = f($CatCont_Query);

    $GetTitle_Sel = "SELECT * FROM pages WHERE Page_ID = $Page_ID";
    $GetTitle_Query = q($GetTitle_Sel);
    $GetTitle = f($GetTitle_Query);

    $GetRecs_Sel = "SELECT FROM pages, records WHERE Page_ID = $Page_ID AND Rec_Page_ID = $Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 ";
    $GetRecs_Query = q($GetRecs_Sel);

    $GetPages_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = $Page_ID";
    $GetPages_Query = q($GetPages_Sel);

    $ednum = 1; // editor number
    $Page_Type = $GetALoopPages['Page_Type'];
    if ($mobileMode == 1) $Page_Type = $GetALoopPages['Page_Type_Mob']; // If Mobile Version
    ?>

    <div class="incParentsTitle"><?php echo $GetTitle['Page_Name']; ?></div>
    <div style="padding-top:18px; padding-bottom:20px;">
        <?php
        $pagepath = $path . "library/method_" . $Page_Type . ".php";
        require "$pagepath"; // display page type
        ?>
    </div>


<?php } ?>
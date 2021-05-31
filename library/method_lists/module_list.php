<?php
$routRecMod_ID = $RecMod_ID; // keep rour RecMod_ID before change through the below query
$num = 0;
if ($mobileMode == 1) $numModColumns = $numModColumnsMob; // Mobile Version
// when a module_page include another module page, hold the $modListTemp var
$curModListTemp = $modListTemp;
$curModListTemp2 = $modListTemp2;
$changeTemp = 0;

while ($GetRecMod = f($PageMod_Query)) {

if (($numRec == 0) AND ($modPagingNums == 1)) { ?>
<div id="divPaging<?php echo $nodivTab; ?>" <?php if ($nodivTab == 0) {
    print "style='display:block; position:relative;'";
} else {
    print "style='display:none; position:relative;'";
} ?>>
    <?php $nodivTab = $nodivTab + 1;
    }
    $numRec = $numRec + 1;
    $num = $num + 1;

    $RecMod_ID = $GetRecMod['Rec_ID'];
    $RecView = $GetRecMod['Rec_View'];
    $recImCat = $GetRecMod['Rec_Img_Cat_ID'];
    $Page_Rec_Temp = $GetRecMod['Page_Rec_Temp'];
    if ($mobileMode == 1) $Page_Rec_Temp = $GetRecMod['Page_Rec_Mob']; // If Mobile Version
    $recImCatNR = $GetRecMod['Rec_NoResImg_Cat_ID'];
    $startat = $GetRec['StartAt_Photos'];
    $repeatrow = $GetRec['RepeatRow_Photos'];
    $ednum = 1; // editor number

    // RESPONSIVE DESIGN
    if ($modListsDivClass <> "") {
        print "\n<div class=\"$modListsDivClass\">\n";
        if ($modItemDivClass <> "") print "\n<div class=\"$modItemDivClass\">\n";
    }

    if ($modListTemp <> $curModListTemp) $modListTemp = $curModListTemp;
	if (($curModListTemp2 > 0) AND ($modListTemp <> $curModListTemp)) $modListTemp2 = $curModListTemp2;

	// check if exist a second List Temp
    if (($curModListTemp2 <> $curModListTemp) AND ($curModListTemp2 > 0)) {
        if ($changeLTemp == 0) {
            $changeLTemp++;
        } else {
            $modListTemp = $curModListTemp2;
            $changeLTemp = 0;
        }
    }
	
    $pagename = $path . "views/module_list_page.php";
    require "$pagename";


    if ($modListsDivClass <> "") print "\n</div>\n";
    if ($modItemDivClass <> "") print "\n</div>";

    if (($numRec == $step) AND ($modPagingNums == 1)) {
        $numRec = 0;
        print "\n</div>\n"; // close <div id="divPaging"
    }

    } // end of while

    print "\n<div style=\"clear:both;\"></div>\n";
    if (($numRec < $step) AND ($numRec > 0) AND ($modPagingNums == 1)) print "</div>";

    /*** SHOW PAGING NUMBERS ***/
    if ($modPagingNums == 1) {
        print "\n<div class=\"top15\">\n";
        require $path . "library/method_lists/down_search_results_preload.php";
        print "\n</div>\n";
    }
	
$RecMod_ID = $routRecMod_ID;
$GetRecMod_Sel = "SELECT * FROM records,pages WHERE Rec_ID = $RecMod_ID AND Page_ID = Rec_Page_ID";
$GetRecMod_Query = q($GetRecMod_Sel);
$GetRecMod = f($GetRecMod_Query);
?>
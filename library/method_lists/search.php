<?php
if ($Lang == "el") {
    $SearchResults = "Αποτελέσματα Αναζήτησης:";
    $kranazitisis = "κριτήριo αναζήτησης";
    $epistrofi = "επιστροφή";
    $error = "παρακαλώ συμπληρώστε το πεδίο αναζήτησης";
    $nofound = "Δεν βρέθηκαν εγγραφές!";
} else {
    $SearchResults = "Search Results:";
    $kranazitisis = "Search by";
    $epistrofi = "back";
    $error = "Please retype the keyword";
    $nofound = "No records found!";
}

$numTD = 1;
$TextResultsArray = array();
$PageIDArray = array();
$findme = strip_tags(getparamvalue('findme'));
$oldPageID = "";
$string = "AND (";
if (($findme <> "Σύνθετη Αναζήτηση...") AND ($findme <> "Keywords...")) {

    if (!isset($findme)) {
        print "<strong>$error</strong>";
    } else {
        print "<span class=searchTitle>$kranazitisis > <b>$findme</b><br><br>";
        $find_array = explode(' ', $findme);
        $number_of_words = count($find_array) - 1;
        for ($x = 0; $x < $number_of_words; $x++) {
            $string .= " Stext1 like '%" . $find_array[$x] . "%' OR ";
        }
        $string .= "Stext1 like '%" . $find_array[$x] . "%' )";

        // SEARCH 
        $AllRecs_Sel = "SELECT * FROM searchtext WHERE SActive = 0 $string Order by SPage_ID,SRec_ID Desc";
//		$AllRecs_Sel = "SELECT * FROM searchtext WHERE SText1 like '%$findme%' AND SActive = 0 Order by SPage_ID,SRec_ID Desc";
        $AllRecs_Query = q($AllRecs_Sel);

        // BUILD ARRAY
        while ($AllRecs = f($AllRecs_Query)) {
            $flagfound = 0;

            $Page_ID = $AllRecs['SPage_ID'];
            $Rec_ID = $AllRecs['SRec_ID'];
            $Rec_Title = $AllRecs['STitle'];
            $Rec_Desc = $AllRecs['SDesc'];
            $GetPage_Sel = "SELECT * FROM pages WHERE Page_ID = $Page_ID";
            $GetPage_Query = q($GetPage_Sel);
            $GetPage = f($GetPage_Query);
            $Page_Name = $GetPage['Page_Name'];
            $Page_View = $GetPage['Page_View'];

            $TextResultsArray[] = "$Page_View,$Rec_ID,$Rec_Title,$Rec_Desc";
            // Build Page ID Array
            if ($Page_ID <> $oldPageID) {
                $PageIDArray[] = "$Page_View,$Page_Name";
                $oldPageID = $Page_ID;
            }
            $flagfound = 1;

        } // end of WHILE

        $numitemsArr = count($TextResultsArray);
        $numPageIDArr = count($PageIDArray);
        ?>


        <div>
            <?php
            // PRINT RECS FROM ARRAY
            $numdivs = $numPageIDArr;
            $nodiv = 0;

            for ($np = 0; $np < $numPageIDArr; $np++) {
                $PagesArray = $PageIDArray[$np];
                $varPages = explode(',', $PagesArray);
                $PageView = $varPages[0];
                $PageName = $varPages[1];
                $numRecs = 0;

                print "<div style='padding-top:14px; padding-bottom:6px;'>
				   <div class=\"searchResultsTitle\">&raquo; $PageName</div>
				   </div>";
                for ($i = 0; $i < $numitemsArr; $i++) {
                    $RecArray = $TextResultsArray[$i];
                    $varRecID = explode(',', $RecArray);
                    $arrPageView = $varRecID[0];
                    $arrRecID = $varRecID[1];
                    $arrTitle = $varRecID[2];
                    $arrRecDesc = $varRecID[3];
                    $friendly = friendly($arrTitle);
                    $href = $siteURL . $arrPageView . "/" . $arrRecID . "/" . $friendly . "/";

                    if ($PageView == $arrPageView) {
                        print "<div style='padding-top:8px; padding-bottom:8px;'>";
                        print "<a href=\"$href\" class='searchlink'>";
                        print "$arrTitle</a>";
                        print "<br>$arrRecDesc</div>";
                    }
                }

                $nodiv = $nodiv + 1;
            }// for
            ?>
        </div>

        <?php
    } //!isset($findme)
} //$findme
?>
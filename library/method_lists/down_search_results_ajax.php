<?php
/*** SHOW DOWDN PANEL ***/
if ($DownNavig == 1) {

    print "<div style='padding-top:10px;'>";
    print "<table align=right>";
    print "<tr>";

    // NUMBERS PAGES
    //
    $i = 1;
    $tmpPagesCount = 0;
    $change_tr = 15; // Change Line
    while ($i <= $intnumpages) {

        $tmpPagesCount++;
        $pathPage = $rootURL . "library/method_lists/recs_list_ajax_content.php$pagePath&startAt=$i";
        print "<td>";
        if ($i <> $page) {
            print "<a href=\"$pathPage\" class='pagingAjaxSel'>$i</a>";
        } else {
            print "<a href=\"$pathPage\" class='pagingAjax'>$i</a>";
        }
        print "&nbsp;</td>";
        //print "</FORM>";

        if ($tmpPagesCount / $change_tr == 1) {
            print "</tr><tr>";
            $tmpPagesCount = 0;
        }
        $i++;
    }

    print "</tr>";
    print "</table>";
    print "</div>";
}
?>
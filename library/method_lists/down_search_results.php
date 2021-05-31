<?php
/*** SHOW DOWDN PANEL ***/
if ($DownNavig == 1) {

    print"<table align=center><tr>";
    // PREVIOUS PAGE
    //
    print "<td style='padding:5px;'>";
    if ($page > 1) {
        $prev = $page - 1;
        if ($Lang != $StartLang)
            print "<FORM action=\"$rootURL$Lang/"$_GET["ID"]."/0/$prev\" method=post>";
        else
            print "<FORM action=\"$rootURL."$_GET["ID"]."/0/$prev\" method=post>";
        print "<INPUT type=submit value=$proigoumeni name=navigate class=pagingNum>";
        print "</FORM>";
    }
    print "</td>";

    // NUMBERS PAGES
    //
    print "<td style='padding:4px;'>";
    // NUMBERS PAGES
    //
    print "<table><tr>";
    $i = 1;
    $tmpPagesCount = 0;
    $change_tr = 15; // Change Line
    while ($i <= $intnumpages) {

        $tmpPagesCount++;
        if ($Lang != $StartLang)
            print "<FORM action=\"$rootURL$Lang/".$_GET["ID"]."/0/$i\" method=post>";
        else
            print "<FORM action=\"$rootURL".$_GET["ID"]."/0/$i\" method=post>";
        print "<td style='padding:1px;'>";
        if ($i <> $page) {
            print "<INPUT type=submit value=$i name=navigate class=pagingNum>";
        } else {
            print "<INPUT type=submit value=$i name=navigate class=pagingNumSel>";
        }
        print "</td>";
        print "</FORM>";

        if ($tmpPagesCount / $change_tr == 1) {
            print "</tr><tr>";
            $tmpPagesCount = 0;
        }
        $i++;
    }
    print "</td></tr></table>";
    print "</td>";

    // NEXT PAGE
    //
    print "<td style='padding:5px;' align=right>";
    if ($page <= $numpages) {
        $next = $page + 1;
        if ($Lang != $StartLang)
            print "<FORM action=\"$rootURL$Lang/".$_GET["ID"]."/0/$next\" method=post>";
        else
            print "<FORM action=\"$rootURL".$_GET["ID"]."/0/$next\" method=post>";
        print "<INPUT type=submit value=$epomeni name=navigate class=pagingNum>";
        print "</FORM>";
    }
    print "</td>";
    print"</tr></table>";
}

?>
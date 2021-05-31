<?php require $path . "library/basic/category_name.php";

$GetRec_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $Page_ID  AND Rec_Page_Content = 0";
$GetRec_Query = q($GetRec_Sel);
$GetRec = f($GetRec_Query);

$cp = $cp . "px";
$step = "32";
$recImCat = $GetRec['Rec_Img_Cat_ID'];
$ntd = "4";

$GetAll_Sel = "Select * FROM images WHERE Img_Cat_ID = $recImCat Order by Img_Order Asc";
$GetAll_Query = q($GetAll_Sel);
// η $step και η $ntd έρχεται από setting vars
$numpages = (nr($GetAll_Query) / $step);

$intnumpages = (int)$numpages;
if ($intnumpages < $numpages) {
    $intnumpages = $intnumpages + 1;
}
if ($numpages > $intnumpages) {
    $numpages = $intnumpages + 1;
} else {
    $numpages = $intnumpages;
}
$numpages = $numpages - 1; // Επειδή το $pages ξεκινάει από 0 και η τέταρτη σελίδα είναι οισιαστικά η $page=3 σιορθώνει αυτό το πρόβλημα

// ean epilegontas katigoria emfanizei to 1o records ap euthias sti selida Limit 0,1
$page = getparamvalue('var1');
if ($page == "") {
    $page = 1;
}
$start = ($page * $step) - $step; // Fix the issue that variable  $start starts from 1st page meaning 0

// ΦΕΡΝΕΙ ΟΛΑ ΤΑ RECORDS ΤΗΣ ΚΑΤΗΓΟΡΙΑΣ
$GetPages_Sel = "SELECT * FROM images WHERE Img_Cat_ID = $recImCat Order by Img_Order Asc Limit $start,$step";
$GetPages_Query = q($GetPages_Sel);

if ($ShowTopRes == 1) {
    $curpage = $page + 1;
    //print "<div style='padding-bottom:12px;'>$selida $curpage $apo $intnumpages</div>";
}

print"<table><tr>";
$num = 0;
while ($GetRec = f($GetPages_Query)) {
    $num = $num + 1;
    $imgmob = $Path_Photo_mobile.$GetRec["Img_Ext"];
    $imgzoom = $Path_Photo.$GetRec["Img_Ext"];

    print "<td style=\"padding-right:25px;\" valign=top>";
    if ($Lang == 'el') {
        $title = $GetRec["Img_Field1"];
    } else {
        $title = $GetRec["Img_Name"];
    }

    print"<a class=\"zoombox zgallery1\" title=\"$title\" href=\"$imgzoom\">";
    print"<div class=shadow><img src=\"$imgmob\" class=\"bordered\" border=0 style=\"width:208px; height:130px; padding-left:4px;\" /></div>";
    print"<div style=\"margin-top:15px; margin-bottom:27px;\" align=center>$title</div>";
    print"</a>";


    print "</td>";
    if ($num == $ntd) {
        print "</tr><tr>";
        $num = 0;
    }
} // end of while

if ($num <> $ntd) print "</tr>";
print"</table>";

// NAVIGATION BUTTONS (next-previous)
print"<table style='width:100%;'><tr>";
if ($page > 1) {
    $prev = $page - 1;
    print "<td align='left'><a href=\"" . $siteURL . $_GET["ID"]."/0/$prev/\" class=bodylinks>&laquo; $proigoumeni_selida</a></td>";
}
if ($page <= $numpages) {
    $next = $page + 1;
    print "<td align='right'><a href=\"" . $siteURL . $_GET["ID"]."/0/$next/\" class=bodylinks>$epomeni_selida &raquo;</a></td>";
}
print"</tr></table>";
?>

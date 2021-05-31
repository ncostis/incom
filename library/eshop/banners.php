<?php
// ICONS E-SHOP
$flagBS = 0;
$leftBS = "left";
if ($GetRec['Rec_HotPrice'] == 1) {
    $flagBS = 1;
    print "<div class=\"left\"><img src=\"$elements/eshop/hotprice.png\" alt='Hot Price'></div>";
}
if ($GetRec['Rec_BestSeller'] == 1) {
    if ($flagBS == 1) $leftBS = "left5";
    $flagBS = 1;
    print "<div class=\"$leftBS\"><img src=\"$elements/eshop/bestseller.png\" alt='Best Seller'></div>";
}
if ($GetRec['Rec_BestPrice'] == 1) {
    if ($flagBS == 1) $leftBS = "left5";
    $flagBS = 1;
    print "<div class=\"$leftBS\"><img src=\"$elements/eshop/bestprice.png\" alt='Best Price'></div>";
}
if ($GetRec['Rec_BestChoice'] == 1) {
    if ($flagBS == 1) $leftBS = "left5";
    $flagBS = 1;
    print "<div class=\"$leftBS\"><img src=\"$elements/eshop/bestchoice.png\" alt='Best Choice'></div>";
}

if ($flagBS == 1) print "<div style=\"clear:both;\"></div>";
?>
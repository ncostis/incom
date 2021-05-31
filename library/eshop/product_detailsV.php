<?php
//Ότι δεν χρειαζόμαστε το αφαιρούμε
print "<div class='eshop_message'>Τιμή προϊόντος: " . number_format($price, 2, ',', '.') . " " . $ToCurrency . "</div>";
if ($product_discount > 0)
    print "<div class='eshop_message'>Έκπτωση προϊόντος: " . $product_discount . "%</div>";
if ($user_discount > 0)
    print "<div class='eshop_message'>Έκπτωση πελάτη: " . $user_discount . "%</div>";
if ($weight > 0)
    print "<div class='eshop_message'>Βάρος προϊόντος: " . $weight . " γραμμάρια</div>";

// EXTRAS
if ($GetRec['Rec_HotPrice'] == 1) print "<img src=\"$elements/eshop/hotprice.png\" alt='Hot Price'>";
if ($GetRec['Rec_BestSeller'] == 1) print "<img src=\"$elements/eshop/bestseller.png\" alt='Best Seller'>";
if ($GetRec['Rec_BestPrice'] == 1) print "<img src=\"$elements/eshop/bestprice.png\" alt='Best Price'>";
if ($GetRec['Rec_BestChoice'] == 1) print "<img src=\"$elements/eshop/bestchoice.png\" alt='Best Choice'>";
?>


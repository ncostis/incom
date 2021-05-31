<?php
$ProdUniqueID = "prodUID" . $Rec_ID;
//Παιρνουμε την κατηγορία του ΦΠΑ
$fpa_category = $GetRec['Rec_Vat'];

//Παίρνουμε το $link  
$friendly_title = friendly($GetRec['Rec_Title']);
$link = $siteURL . getparamvalue('ID') . "/" . $GetRec['Rec_ID'] . "/" . $friendly_title . "/";

if (getparamvalue('Rec_ID') <> "") $Rec_ID = getparamvalue('Rec_ID');

$title = $GetRec['Rec_Title'];

$stock = $GetRec['Rec_Stock'];

$product_discount = $GetRec['Rec_Discount'];

$weight = $GetRec['Rec_Weight'];

$user_discount = $_SESSION['user']['Discount'];


if (isset($_POST[$ProdUniqueID])) {
    $amount = getparamvalue('amount');

    if (isset($_POST['rel_price'])) {
        $rel_price = getparamvalue('rel_price');
        $pieces = explode(";", $rel_price);
        $title .= " - " . $pieces[0];
        $price = $pieces[1];
    } else $price = getparamvalue('price');

    if (isset($_POST['add_price']) && strlen($_POST['add_price']) > 1) {
        $rel_price = getparamvalue('add_price');
        $pieces = explode(";", $rel_price);
        $title .= " - " . $pieces[0];
        $price = $price + $pieces[1];
    }

    if (isset($_POST['MultipleSel1'])) $title .= " - " . getparamvalue('MultipleSel1');
    if (isset($_POST['MultipleSel2'])) $title .= " - " . getparamvalue('MultipleSel2');

    if ($doseis < 1) $doseis = 1;

    if ($amount < 1) $amount = 1;

    $error_message = addProductToCart($stock, $link, $doseis, $title, $price, $amount, $weight, $Rec_ID);
    if ($error_message == "none")
        print "<div class='eshop_message'>Το προϊόν προστέθηκε στο καλάθι σας.<br>Μπορείτε να συνεχίσετε τις αγορές σας, να πάτε στο <a id=\"register\" href=\"" . $rootURL . "library/eshop/popup.php?Page=view_cart_popup.php&Lang=$Lang&w=880&h=600\" class=\"bodylinks\">'Καλάθι Αγορών'</a> ή στο <a id=\"register\" href=\"" . $rootURL . "library/eshop/popup.php?Page=add_order_popup.php&Lang=$Lang&w=880&h=600\" class=\"bodylinks\">'Ταμείο'</a> για να ολοκληρώσετε την παραγγελία σας</div>";
    else
        print "<div class='error_message'>" . $error_message . "</div>";
}
?>
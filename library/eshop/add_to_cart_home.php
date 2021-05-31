<style type="text/css"><!--
    input.basket {
        width: 21px;
        height: 18px;
        margin-top: 6px;
        background-image: url(<?php echo $rootURL; ?>elements/kalathi.png);
        background-color: transparent;
        cursor: pointer;
        border: 0px;
    }

    --></style>
<?php
//Παιρνουμε την κατηγορία του ΦΠΑ

$fpa_category = $GetRecMod['Rec_Scroll1'];


//Κάποιος από τους δύο παρακάτω τρόπους που παίρνουμε το link πρέπει να καταργηθεί και να επιλεγεί μόνο ένας (friendly URL ή όχι)

//Παίρνουμε το $link σε περίπτωση που δεν είναι friendly URL
//$link = $HTTP_SERVER_VARS['PHP_SELF'];
//if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
// $link .= "?" . $HTTP_SERVER_VARS['QUERY_STRING'];
//}

//Παίρνουμε το $link σε περίπτωση που είναι friendly URL 
$friendly_title = friendly($GetRecMod['Rec_Title']);
$link = $siteURL . getparamvalue('ID') . "/" . $GetRecMod['Rec_ID'] . "/" . $friendly_title . "/";

//Παίρνουμε την ποσότητα
$amount = getparamvalue('amount');

//Παιρνουμε το Rec_ID
if (getparamvalue('Rec_ID') <> "") $Rec_ID = getparamvalue('Rec_ID');
else $Rec_ID = $GetRecMod['Rec_ID'];
//Παίρνουμε τον τίτλο
$title = $GetRecMod['Rec_Title'];

//Παίρνουμε την τιμή
$price = $GetRecMod['Rec_Price'];

//Παίρνουμε τυχών έκπτωση
$product_discount = $GetRecMod['Rec_Discount'];

//Παίρνουμε το βάρος
$weight = $GetRecMod['Rec_Weight'];
//Διαμορφώνουμε τη τιμή
$user_discount = $_SESSION['user']['Discount'];
$price = Get_Adjusted_Price($price, $product_discount, $user_discount, $fpa_category);

$ProdUniqueID = "prodUID" . $Rec_ID;

//Αν έχει κάνει post κάνουμε κάποιους ελέγχους και αν είμαστε ok προσθέτουμε το προϊόν στο καλάθι μας.
if (isset($_POST[$ProdUniqueID])) {
//Πρέπει να υπάρχει τουλάχιστον μία δόση στην πληρωμή. Αν δεν την έχουμε πάρει κάπως, πρέπει να την ορίσουμε καρφωτή στο 1
    if ($doseis < 1) $doseis = 1;

//Αναλόγως πρέπει να υπάρχει τουλάχιστον 1 στο amount. 
    if ($amount < 1) $amount = 1;
//Τέλος, αφού τα πήραμε όλα αυτά, στέλνουμε το προϊόν στο καλάθι
    if (addProductToCart($link, $doseis, $title, $price, $amount, $weight, $Rec_ID))
        print "<div class='eshop_message'>Το προϊόν προστέθηκε στο καλάθι σας.<br>Μπορείτε να συνεχίσετε τις αγορές σας<br>ή να πάτε στο <a href=\"" . $siteURL . "view_cart\">'Καλάθι Αγορών'</a> για να<br>ολοκληρώσετε την παραγγελία σας</div>";
    else
        print "<div class='eshop_message'>Αυτό το προϊόν υπάρχει ήδη στο καλάθι σας</div>";
}
//Στοιχεία του προϊόντος
//include "product_detailsV.php";
//print $link. "<br>" .$doseis. "<br>" .$title. "<br>" .$price. "<br>" .$amount. "<br>" .$weight. "<br>" .$Rec_ID;
?>

<form action="<?php echo $link; ?>" method="post">
    <input type="hidden" name="amount" value="1">
    <input type="submit" name="addprod<?php echo $Rec_ID; ?>" value="" class="basket">
    <input type="hidden" name="<?php echo $ProdUniqueID; ?>" value="1"/>
</form>


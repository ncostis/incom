<?php
$voucher = getparamvalue('voucher');
$comments = getparamvalue('comments');
$payment = getparamvalue('payment');


if (isset($_POST['add_order'])) {
    if (!isset ($_SESSION['order'])) {
        $comments = str_replace("\n", "<br />", $comments);
        $Order_ID = PlaceOrder($voucher, $comments, $payment);
        $_SESSION['order'] = $Order_ID;
    } else $Order_ID = $_SESSION['order'];


    //Τα κείμενα που θα εμφανίσουμε σε κάθε περίπτωση, ανάλογα με το τι θα επιλέξει ο πελάτης.

    switch ($payment) {
        case "Μέσω τραπέζης":
            print "Συνεργαζόμενες τράπεζες<br>
			   ΤΡΑΠΕΖΑ ΠΕΙΡΑΙΩΣ: 5047026934871<br>
			   IBAN : GR06 0172 0470 0050 4702 6934 871<br><br>
		   
			   EUROBANK EFG: 0026 0471 72 0200090097<br>
			   IBAN : GR32 0260 4710 0007 2020 0090 097<br><br>
					 
			   ALPHA BANK: 146002101231629<br>
			   IBAN : GR57 0140 1460 1460 0210 1231 629<br><br>
		  
			   Παρακαλούμε ενημερώστε μας τηλεφωνικά ή μέσω email για την επιβεβαίωση της κατάθεσης<br>";
            print "Παρακαλούμε να αναφέρετε τον αριθμό παραγγελίας σας (" . $Order_ID . ")";
            clean_cart();
            unset ($_SESSION['order']);
            unset ($_SESSION['Order_ID']);
            break;

        case "Αντικαταβολή":
            print "H μέθοδος της αντικαταβολής ισχύει για τις πόλεις Αθήνα, Θεσσαλονίκη, Πάτρα, Ηράκλειο Κρήτης, Λάρισα ενώ για την υπόλοιπη Ελλάδα ισχύει μόνο όταν το δέμα σας είναι κάτω από 6kg). ";
            clean_cart();
            unset ($_SESSION['order']);
            unset ($_SESSION['Order_ID']);
            break;

        case "Παραλαβή από το κατάστημα":
            print "Θα σας ενημερώσουμε για να παραλάβετε την παραγγελία σας από το κατάστημά μας";
            clean_cart();
            unset ($_SESSION['order']);
            unset ($_SESSION['Order_ID']);
            break;

        case "Πιστωτική":
            print "Για να ολοκληρώσετε την πληρωμή της παραγγελίας σας παρακαλώ πατήστε το κουμπί.<br><br><center>";
            pay();
            print "</center>";
            clean_cart();
            unset ($_SESSION['order']);
            unset ($_SESSION['Order_ID']);
            break;
    }

} else {

    if (isset($_SESSION['cart'])) {
        $userid = $_SESSION['user']['Customer_ID'];
        $Get_User_Details = "SELECT * FROM members WHERE Mem_ID = $userid LIMIT 0,1";
        $User_Details = q($Get_User_Details);
        $Details = f($User_Details);
        $name = $Details['Mem_Name'];
        $company = $Details['Mem_Company'];
        $afm = $Details['Mem_AFM'];
        $doy = $Details['Mem_Doy'];
        $address = $Details['Mem_Address'];
        $city = $Details['Mem_City'];
        $area = $Details['Mem_Area'];
        $tk = $Details['Mem_TK'];
        $tel = $Details['Mem_Tel'];
        $fax = $Details['Mem_Fax'];

//Εμφάνιση της καρτέλας των στοιχείων του πελάτη

        print "<h3>Στοιχεία - Λογαριασμός Τιμολόγησης</h3><hr>";
        print "<div class='padd'>Όνομα: " . $name . "</div>";
        if ($company != '' && $afm != '' && $doy != '') print "<div class='padd'>" . $company . " - ΑΦΜ: " . $afm . " - ΔΟΥ: " . $doy . "</div>";
        print "<div class='padd'>Διεύθυνση: " . $address . "  " . $city . "  " . $area . "  " . $tk . "</div>";
        if ($tel != '') print "<div class='padd'>Τηλέφωνο επικοινωνίας: " . $tel . "</div>";
        if ($fax != '') print "<div class='padd'>Fax επικοινωνίας: " . $fax . "</div>";
        ?>

        <div class="top15">&nbsp;</div>
        <form action="" method="post">
            <h3>Επιλέξτε απόδειξη ή έκδοση τιμολογίου</h3>
            <hr/>
            <div class="left padd"><input type="radio" name="voucher" value="Απόδειξη" checked> Απόδειξη</div>
            <div class="left10 padd"><input type="radio" name="voucher" value="Τιμολόγιο"> Τιμολόγιο</div>
            <div style="clear:both;"></div>

            <?php
            $telikes_doseis = 1;
            foreach ($_SESSION['cart'] as $data) {
                list($link, $doseis, $title, $unit_price, $amount, $weight) = array_values($data);
                if ($doseis > $telikes_doseis) $telikes_doseis = $doseis;
            }

            //Αν είναι με δόσεις δεν μπορεί να αγοράσει μέσω αντικαταβολής ή μέσω τραπέζης, οπότε η πληρωμή γίνεται αυτόματα μέσω κάρτας
            if ($telikes_doseis > 1) { ?>
                <input type="hidden" name="payment" value="Πιστωτική">
            <?php } else { ?>

                <div class="top15">&nbsp;</div>
                <h3>Επιλέξτε τρόπο πληρωμής</h3>
                <hr/>
                <div class="left padd"><input type="radio" name="payment" value="Μέσω τραπέζης" checked> Μέσω τραπέζης
                </div>
                <div class="left10 padd"><input type="radio" name="payment" value="Αντικαταβολή"> Με αντικαταβολή</div>
                <div class="left10 padd"><input type="radio" name="payment" value="Πιστωτική"> Με πιστωτική κάρτα</div>
                <div style="clear:both;"></div>
            <?php } ?>


            <div class="top15">&nbsp;</div>
            <h3>Αν θέλετε να σταλεί η παραγγελία σε άλλη διεύθυνση ή να γράψετε κάποια σχόλια σχετικά με την παραγγελία,
                παρακαλώ συμπληρώστε παρακάτω.</h3>
            <hr/>
            <textarea name="comments" cols="55" rows="3"></textarea><br/><br/>
            <input type="submit" name="add_order" value="<?php echo $Translation['Checkout']; ?>" class="formsubmit">
        </form>

    <?php }
} ?>
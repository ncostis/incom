<?php
//Ελέγχουμε αν υπάρχουν γεύσεις
$get_flavours_query = "SELECT Rat_Title FROM recs_att_tables WHERE Rat_Rec_ID = '$Rec_ID' AND Rat_SubCat = 'Γεύσεις'";
$get_flavours = q($get_flavours_query);
$number_of_flavours = nr($get_flavours);

//Αν υπάρχουν δημιουργούμε το radio box
if ($number_of_flavours > 0) {
    $geuseis = 1;
    echo "Παρακαλώ επιλέξτε γεύση:";
    $flavours = f($get_flavours);
    print "<input type='radio' name='geusi' value='".$flavours["Rat_Title"]."' checked>".$flavours["Rat_Title"];
    while ($flavours = f($get_flavours)) {
        $geuseis++;
        if ($geuseis > 3) {
            $geuseis = 1;
            print "</tr><tr>";
        }
        print "<input type='radio' name='geusi' value='".$flavours["Rat_Title"]."'>".$flavours["Rat_Title"];
    }

}

//Αφού γίνει post το βάζουμε στον τίτλο του προϊόντος
if (isset($_POST['geusi']))
    $title = $title . " - Γεύση: " . getparamvalue('geusi');
?>
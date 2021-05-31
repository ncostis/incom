<?php
require_once("../init.php");
require_once($routes["popup_header_scripts.php"]);

$Rec_ID = $_GET['Rec_ID'];
$SubCat = $_GET['SubCat'];
$LID = $_GET['LID'];
$List_ID = $_GET['List_ID'];
$Name = $_GET['Name'];
if ($SubCat == "MultTable1") $Rat_MultipleSel = "Rat_MultipleSel1";
if ($SubCat == "MultTable2") $Rat_MultipleSel = "Rat_MultipleSel2";
if ($SubCat == "MultTable3") $Rat_MultipleSel = "Rat_MultipleSel3";
if ($SubCat == "MultTable4") $Rat_MultipleSel = "Rat_MultipleSel4";
if ($SubCat == "MultTable5") $Rat_MultipleSel = "Rat_MultipleSel5";
if ($SubCat == "MultTable6") $Rat_MultipleSel = "Rat_MultipleSel6";
if ($SubCat == "MultTable7") $Rat_MultipleSel = "Rat_MultipleSel7";
if ($SubCat == "MultTable8") $Rat_MultipleSel = "Rat_MultipleSel8";
if ($SubCat == "MultTable9") $Rat_MultipleSel = "Rat_MultipleSel9";
if ($SubCat == "MultTable10") $Rat_MultipleSel = "Rat_MultipleSel10";
if ($SubCat == "MultTable11") $Rat_MultipleSel = "Rat_MultipleSel11";
if ($SubCat == "MultTable12") $Rat_MultipleSel = "Rat_MultipleSel12";
if ($SubCat == "MultTable13") $Rat_MultipleSel = "Rat_MultipleSel13";
if ($SubCat == "MultTable14") $Rat_MultipleSel = "Rat_MultipleSel14";
if ($SubCat == "MultTable15") $Rat_MultipleSel = "Rat_MultipleSel15";
?>

<?php
$msn = 0;
if (getparamvalue("submitaccess") == 'OK') {

    $Rat_ID = $_POST['Rat_ID'];
    $msnums = $_POST['msnums'];
    $Rec_ID = $_POST['Rec_ID'];

    // First delete all previous access for the recs with ID=Rat_ID
    //$dq = "DELETE FROM recs_att_tables WHERE Rat_ID = \"$Rat_ID\"";
    //q($dq);

    $selections_array = array();
    $msn = 1;
    while ($msn <= $msnums) {
        $namems = "ms" . $msn;
        if (isset($_POST[$namems])) {
            $Rat_ID = $_POST[$namems]; // To onoma tou type="Checkbox"
            if ($Rat_ID <> "") {
                $selections_array[] = $Rat_ID;
            }
        } else {
            $namems = 0;
        }

        $msn++;
    } //while
    $stringRatID = implode(',', $selections_array);

    if (strlen($stringRatID) > 0) $stringRatID = "0," . $stringRatID . ",0";

    // UPDATE
    $upd = "
        UPDATE `records` SET `$Rat_MultipleSel` = '$stringRatID' WHERE `records`.`Rec_ID` = '$Rec_ID' LIMIT 1 ;
    ";
    q($upd);

    ?>

<?php } ?>


<?php
$GetRec_Sel = "SELECT * FROM records WHERE Rec_ID = $Rec_ID";
$GetRec_Query = q($GetRec_Sel);
$GetRec = f($GetRec_Query);

//Build array from Rat_MultipleSel1,2,3
if ($SubCat == "MultTable1") $stringSelRecs = $GetRec['Rat_MultipleSel1'];
if ($SubCat == "MultTable2") $stringSelRecs = $GetRec['Rat_MultipleSel2'];
if ($SubCat == "MultTable3") $stringSelRecs = $GetRec['Rat_MultipleSel3'];
if ($SubCat == "MultTable4") $stringSelRecs = $GetRec['Rat_MultipleSel4'];
if ($SubCat == "MultTable5") $stringSelRecs = $GetRec['Rat_MultipleSel5'];
if ($SubCat == "MultTable6") $stringSelRecs = $GetRec['Rat_MultipleSel6'];
if ($SubCat == "MultTable7") $stringSelRecs = $GetRec['Rat_MultipleSel7'];
if ($SubCat == "MultTable8") $stringSelRecs = $GetRec['Rat_MultipleSel8'];
if ($SubCat == "MultTable9") $stringSelRecs = $GetRec['Rat_MultipleSel9'];
if ($SubCat == "MultTable10") $stringSelRecs = $GetRec['Rat_MultipleSel10'];
if ($SubCat == "MultTable11") $stringSelRecs = $GetRec['Rat_MultipleSel11'];
if ($SubCat == "MultTable12") $stringSelRecs = $GetRec['Rat_MultipleSel12'];
if ($SubCat == "MultTable13") $stringSelRecs = $GetRec['Rat_MultipleSel13'];
if ($SubCat == "MultTable14") $stringSelRecs = $GetRec['Rat_MultipleSel14'];
if ($SubCat == "MultTable15") $stringSelRecs = $GetRec['Rat_MultipleSel15'];

$selectedArray = array();
if (isset($stringSelRecs)) {
    $selectedArray = explode(",", $stringSelRecs);
    $count = count($selectedArray);
}


headerTitleInternal ("$Name");
?>
<div class="marginPopupInt bottom20 top3">
<form action="" method="post">
    <?php
    $numvar = 0;
    $GetRatRecs_Sel = "SELECT * FROM recs_att_tables WHERE Rat_SubCat = '$SubCat' AND Rat_List_ID = $LID AND Rat_Lang = '".$_SESSION["AdminLang"]."'";
    $GetRatRecs_Query = q($GetRatRecs_Sel);
    while ($GetRatRec = f($GetRatRecs_Query)) {
    ?>
    <div class="maingrayline cssPopupCont">
        <div class="leftCols1">
            <?php echo $GetRatRec['Rat_Title']; ?>
        </div>
        <div class="rightCols1">
           <?php
            $flag = 0;
            //if (count($selectedArray) > 0) {
                $numvar = $numvar + 1;
                $name = "ms" . $numvar;
                $namecb = "ms" . $msn;

                $numitemsArr = count($selectedArray);
                for ($i = 0; $i < $numitemsArr; $i++) {
                    $arrRecRatID = $selectedArray[$i];
                    if ($arrRecRatID == $GetRatRec['Rat_ID']) {
                        $flag = 1;
                    }
                }
            //}
            ?>
            <div class="top2"><input type="Checkbox" name="<?php echo $name; ?>" value="<?php echo $GetRatRec['Rat_ID']; ?>" <?php if ($flag == '1') echo "checked=\"checked\""; ?>></div>
        </div>
        <div class="clear"></div>
    </div>
    <?php } ?>
    <div class="top30 bottom30 width100">
        <input type="hidden" name="Rat_ID" value="<?php echo $Rat_ID; ?>">
        <input type="hidden" name="Rec_ID" value="<?php echo $Rec_ID; ?>">
        <input type="hidden" name="msnums" value="<?php echo $numvar; ?>">
        <input type="hidden" name="submitaccess" value="OK">
        <div class="center"><input type="submit" class="publishSubmitSm" name="save_rec" value="Publish"></div>
    </div>
</form>
</div>
</div>
</html>
<?php
require_once("../init.php");
require_once($routes["popup_header_scripts.php"]);

$SubCat = $_GET['SubCat'];
$LID = $_GET['LID'];
$List_ID = $_GET['List_ID'];
$Name = $_GET['Name'];

$inr = "INSERT INTO recs_att_tables (Rat_List_ID,Rat_SubCat,Rat_Lang) VALUES ('$LID','$SubCat','".$_SESSION["AdminLang"]."')";
q($inr);
$Select_Rat = "SELECT * FROM recs_att_tables WHERE Rat_SubCat = '$SubCat' AND Rat_List_ID = $LID AND Rat_Lang = '".$_SESSION["AdminLang"]."' ORDER BY Rat_ID DESC";
$Select_Rat_q = q($Select_Rat);
$GetRatRow = f($Select_Rat_q);
?>
<script language="JavaScript">
    window.location = "multiple_sel_table_edit.php?Rat_ID=<?php echo $GetRatRow['Rat_ID']; ?>&LID=<?php echo $LID; ?>&List_ID=<?php echo $List_ID; ?>&SubCat=<?php echo $SubCat; ?>&Name=<?php echo $Name;?>";
</script>

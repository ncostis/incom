<?php
require_once("../init.php");

if ((getparamvalue("submitdelete") == 'deleterec') && ($GetRecs['Rat_ID'] == $_POST["idDel"])) {

    $Rat_ID = $_POST['idDel'];
    $Rat_Sel = "SELECT * FROM recs_att_tables WHERE Rat_ID = $Rat_ID";
    $Rat_Query = q($Rat_Sel);
    $DelRat = f($Rat_Query);

    $myFile1 = $Path_File_Rat_Admin .$DelRat['Rat_File1'];
    if (file_exists($myFile1)) unlink($myFile1);

    $myFile2 = $Path_File_Rat2_Admin .$DelRat['Rat_File2'];
    if (file_exists($myFile2)) unlink($myFile2);

    $delr = "DELETE FROM recs_att_tables WHERE Rat_ID = $Rat_ID";
    q($delr);
    ?>
    <script language="JavaScript">
        window.location = "multiple_sel_table_view.php?LID=<?php echo $LID; ?>&List_ID=<?php echo $List_ID; ?>&SubCat=<?php echo $SubCat; ?>&Name=<?php echo $Name;?>";
    </script>
<?php } ?>


<div class="marginPopupInt bottom20">
<form name="deleterecord<?php echo $GetRecs['Rat_Title']; ?>" action="" method="post">
    <div class="inlinediv5 cDefault">Are you sure you want to delete ?</div>
    <div class="inlinediv10">
        <input type="hidden" name="idDel" value="<?php echo $GetRecs['Rat_ID']; ?>">
        <input type="hidden" name="submitdelete" value="deleterec">
        <input type="submit" name="del_rec" value="Delete" class="cLight buttonLink bgRed">
    </div>
</form>
</div>
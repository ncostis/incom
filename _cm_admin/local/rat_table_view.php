<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once("../init.php");
require_once($routes["initvars.php"]);

$Rec_ID  = getparamvalue("Rec_ID");
$List_ID = getparamvalue("List_ID");
$SubCat = getparamvalue("SubCat");
$ListCat_ID = getparamvalue("ListCat_ID");
$RatPageID = getparamvalue("RatPageID");
$RatCont = 0;


$GetRec = f(q("SELECT * FROM records WHERE Rec_ID = $Rec_ID"));

if(getparamvalue('addParagraph')=="add"){
    $Rat_Title = getparamvalue("Rat_Title");
    q("INSERT INTO recs_att_tables
                    (Rat_Rec_ID, Rat_Page_ID, Rat_List_ID, Rat_Page_Content, Rat_Title, Rat_SubCat, Rat_Order)
            VALUES  ('$Rec_ID', '$RatPageID', '$List_ID', '$RatCont', '$Rat_Title', '$SubCat', '9999')
        ");
}
if(getparamvalue('deleteparagraph')=="delete"){
    $Rat_ID = getparamvalue("Rat_ID");
    q("DELETE FROM recs_att_tables WHERE Rat_ID = $Rat_ID LIMIT 1");
}

require_once($routes["popup_header_scripts.php"]);
?>
<?php headerTitlePopup('Attached Records')?>

<div class="marginPopupInt bottom20 top3">
    <a href="#add" onclick="toggle_layer('addR')" class="addNewTemp cDefault"><i class="fas fa-plus-square"></i><span> Add New Record</span></a>
    <div id="addR" class="borderΤoggle bgLighter borderLight" style="display: none;">
        <div class="marginPopupInt bottom20">
            <form action="" method="post">
                <div class="admGrid2Cols">
                    <div>
                        <div class="form-group">
                            <label class="formLabel">Name</label>
                            <div class="colInput">
                                <input type="text" name="Rat_Title" value="" class="formField">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label class="formLabel"></label>
                            <div class="colInput">
                                <input type="hidden" name="addParagraph" value="add">
                                <input type="submit" name="save_rec" value="Create" class="textBigger bgGreen cLight buttonLink">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="top20">
        <div class="cssListCont">
		<div class="top25 sortableContainerRatRecords" style="width:100%;">
            <?php
            $GetRats_Query = q("SELECT * FROM recs_att_tables WHERE Rat_Rec_ID = $Rec_ID AND Rat_SubCat = '$SubCat' AND Rat_Page_Content = 0 Order by Rat_Order Asc");
            $i = 0;
            while ($GetRats = f($GetRats_Query)) { $i++;?>
            	<span data-pageid="<?=$GetRats['Rat_ID']?>" class="recordRowContainer rowRecord bgLighter">
                <div class="sortable-handler bgLight cMedium ui-sortable-handle">
                    <i class="fas fa-arrows-alt-v"></i>
                </div>
                <div class="cssCont rowRecord bgLighter" style="width:100%">
                    <div class="cssName">
                        <a href="rat_table_edit.php?Rat_ID=<?=$GetRats['Rat_ID']?>&Rec_ID=<?=$Rec_ID?>&List_ID=<?=$List_ID?>&ListCat_ID=<?=$ListCat_ID?>&SubCat=<?=$SubCat?>&RatPageID=<?=$RatPageID?>" class="recordLink cDefault" title='edit<?php echo $GetRats['Rat_ID'];?>'><span class="cMedium">Paragraph <?=$i?>.</span> <?php echo $GetRats['Rat_Title']; ?></a>
                    </div>
                    <div class="actionBtn">
                        <a href="rat_table_edit.php?Rat_ID=<?php echo $GetRats['Rat_ID']; ?>&Rec_ID=<?php echo $Rec_ID; ?>&List_ID=<?php echo $List_ID; ?>&ListCat_ID=<?php echo $ListCat_ID; ?>&SubCat=<?=$SubCat?>&RatPageID=<?=$RatPageID?>" class="cColor" title='edit<?php echo $GetRats['Rat_ID'];?>'><i class="fas fa-edit" title='Edit'></i></a>
                    </div>
                    <div class="actionBtn">
                        <a href="#delete" onclick="toggle_layer('deleteR<?php echo $GetRats['Rat_ID']; ?>')" class="cRed" title='Delete'><i class="fas fa-trash-alt"></i></a>
                    </div>
                    <div class="actionBtn">
                        <?php if ($GetRats['Rat_View'] > 0) {?>
                            <a class="popUpWindow cDefault" href="../core/module_rat_row_fields_edit.php?RAT_Temp_ID=<?php echo $GetRats['Rat_View']; ?>&ListID=<?php echo $GetRats['Rat_List_ID']; ?>" data-width="92%" data-height="94%"><i class="fas fa-list"></i></a><?php } ?>
                    </div>
                


                    <!-- DELETE -->
                    <div id="deleteR<?php echo $GetRats['Rat_ID']; ?>" class="borderΤoggle bgLighter borderLight" style="display: none;">
                        <div class="marginPopupInt bottom20">
                        <form action="" method="post">
                            <div class="inlinediv5 cDefault">Are you sure you want to delete this paragraph?</div>
                            <div class="inlinediv10">
                                <input type="hidden" name="Rat_ID" value="<?=$GetRats['Rat_ID']?>">
                                <input type="hidden" name="deleteparagraph" value="delete">
                                <input type="submit" name="del_rec" value="Delete" class="cLight buttonLink bgRed">
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </span>
            <?php } ?>
        </div>
    </div>
    </div>
</div>
</div>
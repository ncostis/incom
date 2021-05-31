<?php
require_once("../init.php");
require_once($routes["popup_header_scripts.php"]);
$SubCat = $_GET['SubCat'];
$LID = $_GET['LID'];
$List_ID = $_GET['List_ID'];
$Name = $_GET['Name'];

headerTitlePopup ("Attached Table: <strong>$Name</strong>");
?>

<div class="marginPopupInt bottom20 top3">
    <div>
        <?php if ($Name <> "") { ?>
        <a href="multiple_sel_table_add.php?LID=<?php echo $LID; ?>&List_ID=<?php echo $List_ID; ?>&SubCat=<?php echo $SubCat; ?>&Name=<?php echo $Name; ?>" class="addNewTemp cDefault"><i class="fas fa-plus-square"></i><span> Add Record</span></a>
    <?php } ?>
    </div>

    <div class="top20">
        <div class="cssListCont">
            <?php
            $GetRecs_Query = q("SELECT * FROM recs_att_tables WHERE Rat_SubCat = '$SubCat' AND Rat_List_ID = $LID AND Rat_Lang = '".$_SESSION["AdminLang"]."' Order by Rat_Order,Rat_Title");
            $num = 0;
            while ($GetRecs = f($GetRecs_Query)) {
                $num ++;
                ?>
                <div class="cssCont rowRecord bgLighter">
                    <div class="cssName"><a href="multiple_sel_table_edit.php?Rat_ID=<?php echo $GetRecs['Rat_ID']; ?>&LID=<?php echo $LID; ?>&List_ID=<?php echo $List_ID; ?>&SubCat=<?php echo $SubCat; ?>&Name=<?php echo $Name; ?>" class="recordLink cDefault"><?php echo $GetRecs["Rat_Title"]; ?>
                    </a>
                    </div>
                    <div class="actionBtn">
                        <a href="multiple_sel_table_edit.php?Rat_ID=<?php echo $GetRecs['Rat_ID']; ?>&LID=<?php echo $LID; ?>&List_ID=<?php echo $List_ID; ?>&SubCat=<?php echo $SubCat; ?>&Name=<?php echo $Name; ?>" class="cColor"><i class="fas fa-edit" title='Edit'></i></a>
                    </div>
                    <div class="actionBtn">
                        <a href="#delete" onclick="toggle_layer('deleteR<?php echo $GetRecs['Rat_ID']; ?>')" class="cRed" title='Delete'><i class="fas fa-trash-alt"></i></a>
                    </div>
                    <div class="clear"></div>

                    <!-- DELETE -->
                    <div id="deleteR<?php echo $GetRecs['Rat_ID']; ?>" class="borderΤoggle bgLighter borderLight" style="display: none;">
                        <?php require_once($routes["multiple_sel_table_delete.php"]); ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
</html>
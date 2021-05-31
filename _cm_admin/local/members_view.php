<?php
require_once("init.php");
?>

<div class="width100">
    <?php headerTitle ("Website Members"); ?>
    <div class="top30"></div>
    <a href="index.php?ID=members_add" class="addNewTemp cDefault"><i class="fas fa-plus-square"></i><span> Add New Member</span></a>
    <div class="top30"></div>

    <?php
    $GetRec_Query = q("SELECT * FROM members Order by Mem_Level");
    while ($GetRecs = f($GetRec_Query)) { ?>

        <div class="recordRowContainer rowRecord bgLighter">
            <div class="recordColumns">
                <div></div>
                <div></div>
                <div>
                    <a href="index.php?ID=members_edit&Mem_ID=<?php echo($GetRecs["Mem_ID"]); ?>" class="recordLink cDefault"><?php echo $GetRecs["Mem_Usn"]." (".$GetRecs["Mem_Level"].")"; ?></a>
                </div>
            </div>
            <div class="actionBtn">
                <a href="index.php?ID=members_edit&Mem_ID=<?php echo($GetRecs["Mem_ID"]); ?>" class="cColor"><i class="fas fa-edit" title='Edit'></i></a>
            </div>
            <div class="actionBtn">
                <a href="#delete" onclick="toggle_layer('deleteR<?php echo $GetRecs['Mem_ID']; ?>')" class="cRed" title='Delete'><i class="fas fa-trash-alt"></i></a>
            </div>
            <!-- DELETE -->
            <div id="deleteR<?php echo $GetRecs['Mem_ID']; ?>" class="borderΤoggle bgLighter borderLight" style="display: none;">
                <?php require "core/members_delete.php"; ?>
            </div>
        </div>
    <?php } // while ?>
</div>
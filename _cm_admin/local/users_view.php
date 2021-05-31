<?php
require_once("init.php");

if ($_SESSION['UserAccess'] == 0) {
    $SelPasLev = "WHERE Pas_Usn <> 'logadm7&'";
} else {
    $SelPasLev = "WHERE Pas_Level = 1 AND Pas_Usn <> 'logadm7&'";
}
?>

<div class="width100">
    <?php headerTitle ("Website Admin Users"); ?>
    <div class="top30"></div>
    <a href="index.php?ID=users_add" class="addNewTemp cDefault"><i class="fas fa-plus-square"></i><span> Add New User</span></a>
    <div class="top30"></div>

    <?php
    $GetRec_Query = q("SELECT * FROM passwords $SelPasLev Order by Pas_Level");
    while ($GetRecs = f($GetRec_Query)) { ?>

        <div class="recordRowContainer rowRecord bgLighter">
            <div class="recordColumns">
                <div></div>
                <div></div>
                <div>
                    <a href="index.php?ID=users_edit&Pas_ID=<?php echo($GetRecs["Pas_ID"]); ?>" class="recordLink cDefault"><?php echo $GetRecs["Pas_Usn"]?></a> | <span class='textSmaller'><?php echo $GetRecs["Pas_Name"]." (Level: ".$GetRecs["Pas_Level"].")"; ?></span>
                    <?php if ($GetRecs['Pas_Fails'] > 2) print " <span class=\"textSmaller cRed\">Deactiveted account</span>"; ?>
                </div>

            </div>
            <div class="actionBtn">
                <a href="index.php?ID=users_edit&Pas_ID=<?php echo($GetRecs["Pas_ID"]); ?>" class="cColor"><i class="fas fa-edit" title='Edit'></i></a>
            </div>
            <div class="actionBtn">
                <a href="#delete" onclick="toggle_layer('deleteR<?php echo $GetRecs['Pas_ID']; ?>')" class="cRed" title='Delete'><i class="fas fa-trash-alt"></i></a>
            </div>
            <div id="deleteR<?php echo $GetRecs['Pas_ID']; ?>" class="borderΤoggle bgLighter borderLight" style="display: none;">
                <?php require "core/users_delete.php"; ?>
            </div>
        </div>
    <?php } // while ?>
</div>
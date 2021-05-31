<?php
require_once("init.php");

if (isset($_POST["saved"]) && $_POST["saved"] == 'ok') {

    $Sel_Lists_View = "SELECT * FROM lists ORDER BY List_ID";
    $GetLists_View = q($Sel_Lists_View);
    while ($GetLists = f($GetLists_View)) {

        $List_ID = $GetLists['List_ID'];
        $varList = "List_Active" . "_" . $List_ID;
        $List_Active = $_POST["$varList"];
        if ($List_Active == "") $List_Active = 0;

        $uql = "
			UPDATE lists 
			SET 
				List_Active = '$List_Active'
			WHERE List_ID = \"$List_ID\"
			";
        q($uql);

    }
}
?>

<div class="width100">
    <?php headerTitle ("Field Lists"); ?>
    <div class="top30"></div>
    <a href="index.php?ID=lists_add" class="addNewTemp cDefault"><i class="fas fa-plus-square"></i><span> Add New List</span></a>
    <div class="top30"></div>
    
    <div class="cssListCont">
    <?php
    $Sel_Lists_View = "SELECT * FROM lists ORDER BY List_ID";
    $GetLists_View = q($Sel_Lists_View);
    while ($GetList = f($GetLists_View)) { ?>

        <div class="cssCont rowRecord bgLighter">
            <div class="cssName">
                <a href="index.php?ID=lists_edit&List_ID=<?php echo($GetList['List_ID']); ?>" class="recordLink cDefault"><?php echo $GetList['List_Name']; ?></a></span>
            </div>
            <div class="actionBtn">
                <a href="index.php?ID=lists_edit&List_ID=<?php echo($GetList['List_ID']); ?>" class="cColor"><i class="fas fa-edit" title='Edit'></i></a>
            </div>
            <div class="actionBtn">
                <a href="index.php?ID=lists_delete&List_ID=<?php echo($GetList['List_ID']); ?>" class="cRed"  onclick="toggle_layer('deleteR<?php echo($GetList['List_ID']); ?>');return false;"><i class="fas fa-trash-alt"></i></a>
            </div>
            <div class="clear"></div>
            <div id="deleteR<?php echo($GetList['List_ID']); ?>" class="borderΤoggle bgLighter borderLight" style="display: none;">
                <div class="marginPopupInt bottom20">
                <form name="deletepage<?php echo($GetList['List_ID'])?>" action="index.php?ID=lists_delete&List_ID=<?php echo($GetList['Rec_ID'])?>" method="post">
                    <div class="inlinediv5">Are you sure you want to delete this field list?</div>
                    <div class="inlinediv10">
                        <input type="Hidden" name="List_ID" value="<?php echo($GetList['List_ID'])?>">
                        <input type="hidden" name="saved" value="ok">
                        <input type="submit" name="save_rec" value="YES" class="cLight buttonLink bgRed">
                    </div>
                </form>
                </div>
            </div>
        </div>
    <?php } // while ?>
    </div>
</div>
<div class="top10"></div>

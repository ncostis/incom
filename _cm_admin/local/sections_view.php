<?php
require_once "init.php";
?>
<div class="width100">
    <?php headerTitle ($textSectionTheme)?>
    <div class="top20"></div>

    <a href="index.php?ID=sections_add" class="cDefault addNewTemp"><i class="fas fa-plus-square"></i> <span><?php print $textAddNewSect; ?></span></a>

    <div class="top40 sectionRowContainer sortableContainerSections">
        <?php
        $sel = "SELECT * FROM sections WHERE Section_Name <> 'optimized' AND Section_Name <> 'settings' AND Parent_Section_ID = 0 Order by Section_Order";
        $re = q($sel);
        while ($getSections = f($re)) { ?>

            <div data-pageid="<?=$getSections['Section_ID']?>" class="rowCategory bgLighter">
                <div class="categoriesSitemap">

                    <div class="sortable-handler bgLight cMedium ui-sortable-handle"><i class="fas fa-arrows-alt-v"></i></div>

                    <a href="index.php?ID=sections_add_sc&Section_ID=<?php echo($getSections['Section_ID']); ?>" class="addCategory cGreen"><i class="fas fa-plus-square"></i></a>

                    <?php
                    // check if there are parent pages under this category (to show active layer arrow)
                    $CheckSS_Sel = "SELECT * FROM sections WHERE Parent_Section_ID = ".$getSections["Section_ID"];
                    $CheckSS_Q = q($CheckSS_Sel);
                    if (nr($CheckSS_Q) > 0) {
                        print "<span  class='showSubCategories cMedium'\><i class=\"fas fa-level-up-alt fa-rotate-180 fa-xs\" style='font-size:0.8em'></i></span>";
                    }
                    ?>

                    <div class="categoriesSitemapTWidth">
                        <a href="index.php?Section=<?php echo $getSections['Section_Name']; ?>"
                           class="categoryLink cDefault"><?php print $getSections["Section_Title"]." <span class='cDefault textSmaller'>| ".$getSections["Section_Name"]."</span>"; ?></a>
                    </div>

                    <div class="actionBtn">
                        <a href="index.php?ID=sections_edit&Section_ID=<?php echo $getSections['Section_ID']; ?>" class="cColor"><i class="fas fa-edit"></i></a>
                    </div>

                    <div class="actionBtn">
                        <a href="#" class="cRed" title="Delete Category" onclick="toggle_layer('deleteS<?php echo $getSections['Section_ID']; ?>');return false;"><i class="fas fa-trash-alt"></i></a>
                    </div>
                    <div id="deleteS<?php echo $getSections['Section_ID']; ?>" class="borderΤoggle bgLighter borderLight" style="display: none;">
                        <div class="marginPopupInt bottom20">
                        <form name="deletesection<?php echo $getSections['Section_ID']; ?>" action="" method="post">
                            <div class="inlinediv5 cDefault">Are you sure you want to delete this section?</div>
                            <div class="inlinediv10">
                                <?php
                                include("core/sections_delete.php")?>
                                <!-- <input type="submit" name="delete_rec" value="Delete" class="cLight buttonLink bgRed"> -->
                            </div>
                        </form>
                        </div>
                    </div>

                    <div class="clear"></div>
                </div>
                <!-- SUB SECTIONS -->
                <!-- ------------ -->
                <?php
                if (nr($CheckSS_Q) > 0) {
                ?>
                <div width="100%" class="subCategoriesGroup">
                     <?php getSubSections($getSections['Section_ID']); ?>
                </div>
                <?php } ?>
            </div>
        <?php } // while ?>
    </div>
</div>

<div class="top40"></div>


<?php
function getSubSections($S_id){

    $sel = "SELECT * FROM sections WHERE Parent_Section_ID = $S_id Order by Section_Order";
    $re = q($sel);
    while ($getSections = f($re)) {
    ?>

        <div data-pageid="<?=$getSections['Section_ID']?>">
            <div class="rowSubcategory borderLight bgLight">
                <div class="listcategoriesback categoriesSitemapTWidth">
                    <a href="index.php?Section=<?php echo $getSections['Section_Name']; ?>" class="categoryLink cDefault"><?php print $getSections["Section_Title"]." <span class='cDefault textSmaller'>| ".$getSections["Section_Name"]."</span>"; ?></a>
                </div>
                <div class="actionBtn">
                    <a href="index.php?ID=sections_edit&Section_ID=<?php echo $getSections['Section_ID']; ?>" class="cColor"><i class="fas fa-edit"></i></a>
                </div>
                <div class="actionBtn">
                    <a href="index.php?ID=sections_delete&Section_ID=<?php echo $getSections['Section_ID']; ?>" class="cRed" onclick="toggle_layer('deleteSS<?php echo $getSections['Section_ID']; ?>');return false;"><i class="fas fa-trash-alt"></i></a>
                </div>
                <div id="deleteSS<?php echo $getSections['Section_ID']; ?>" class="borderΤoggle bgLighter borderLight" style="display: none;">
                    <div class="marginPopupInt bottom20">
                    <form name="deletesection<?php echo $getSections['Section_ID']; ?>" action="" method="post">
                        <div class="inlinediv5 cDefault">Are you sure you want to delete this section?</div>
                        <div class="inlinediv10">
                            <?php
                            include("core/sections_delete.php")?>
                            <!-- <input type="submit" name="delete_rec" value="Delete" class="cLight buttonLink bgRed"> -->
                        </div>
                    </form>
                    </div>
                </div>
                <div class="clear"></div>

            </div>
        </div>
    <?php } // while
}
?>

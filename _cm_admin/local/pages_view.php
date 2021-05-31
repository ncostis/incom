<?php
require_once("init.php");
$GetSection_Sel = "SELECT * FROM sections WHERE Section_Name = '".$_SESSION["AdminSection"]."'";
$GetSection_Query = q($GetSection_Sel);
$GetSection = f($GetSection_Query);

// <!--    ************************  -->
// <!--      DELETE SUB CATEGORIES   -->
// <!--    ************************  -->

// DELETE ALL SUB CATEGORIES
global $delArray;

if (getparamvalue("saved") == 'ok') {
    $Page_ID = $_POST["Page_ID"];
    selectSubCategories($Page_ID);

    $numitems = count($delArray);
    for ($i = 0; $i < $numitems; $i++) {
        $delID = $delArray[$i];
        deleterecords($delID);

        //delete Page Settings
        $delPS = "DELETE FROM pages_settings WHERE Set_Page_ID = \"$delID\"";
        q($delPS);

        $del = "DELETE FROM pages WHERE Page_ID = \"$delID\"";
        q($del);
    }

    // DELETE MAIN CATEGORY
    $Page_ID = $_POST["Page_ID"];
    deleterecords($Page_ID);

    //delete Page Settings
    $delPS = "DELETE FROM pages_settings WHERE Set_Page_ID = \"$Page_ID\"";
    q($delPS);

    $del = "DELETE FROM pages WHERE Page_ID = \"$Page_ID\"";
    q($del);
}


function getCatCambRecursesion($F_id, $F_echoSpaces){

    global $GetUserAccess;
    $qu = "SELECT * FROM pages WHERE Parent_Page_ID = $F_id AND Page_Lang = '".$_SESSION["AdminLang"]."' AND Page_Header_Flag = 1 AND Page_Section = '".$_SESSION["AdminSection"]."' Order by Page_Order, Page_ID";
    $re = q($qu);
    while ($re_set = f($re)){

    $pID = $re_set["Page_ID"];
    $num_records = nr(q("SELECT Rec_ID FROM records WHERE Rec_Page_ID = $pID"));

    checkuseraccess($pID);
    if ($GetUserAccess > 0) { // CHECK ACCESS

        ?>
        <span data-pageid='<?=$pID?>' class='rowCategory bgLighter'>
        <?php
        global $hiddenLayerFlag;
        $hiddenLayerFlag = $re_set['Page_ID'];
        ?>

        <?php if ($F_id == 0) {
    // Emfanizei mono tis kantrikes katigorias opou Parent_Page_ID = 0, den emfanizei ta Page_Header_Flag = 1 opou anikoun kato apo mia kentriki katigoria //
            ?>
            <div class="categoriesSitemap">

                <div class='sortable-handler bgLight cMedium'><i class="fas fa-arrows-alt-v"></i></div>

                    <a href="index.php?ID=pages_add_sc&Page_ID=<?php echo($re_set['Page_ID']); ?>" class='addCategory cGreen'><i class="fas fa-plus-square"></i></a>

                    <?php
                    // check if there are parent pages under this category (to show active layer arrow)
                    $spp = "SELECT * FROM pages WHERE Parent_Page_ID = $hiddenLayerFlag";
                    $rpp = q($spp);
                    $numpp = nr($rpp);
                    if ($numpp > 0) {
                        print "<span  class='showSubCategories cMedium'\><i class=\"fas fa-level-up-alt fa-rotate-180 fa-xs\" style='font-size:0.8em'></i></span>";
                    }
                    ?>

                    <div class="categoriesSitemapTWidth">

                        <?php //print "<a name=\"{$re_set['Page_ID']}\"></a>"; ?>
                        <?php if ($re_set['Parent_Page_ID'] == 0) {
                            //echo str_repeat("&nbsp;", $F_echoSpaces);
                            echo "<a href=\"index.php?ID=pages_edit&Page_ID=".$re_set["Page_ID"]."\" class=\"categoryLink cDefault\">".$re_set["Page_Name"]."</a>";
                        } else {
                            //echo str_repeat("&nbsp;", $F_echoSpaces);
                            echo "<a href=\"index.php?ID=lists_edit&List_ID=\" class=\"categoryLink cDefault\">".$re_set["Page_Name"]."</a>";
                        }



                        // ΕΜΦΑΝΙΣΕ ΤΑ Details
                        print "<div class='categoryDetails'>
                        <ul>
                            <li><b>URL:</b> ".$re_set["Page_View"]."</li>
                            <li><b>Records:</b> $num_records</li>
                            <li><b>Page Active:</b> ";
                            echo $re_set['Page_Active'] ? 'yes' : 'no';
                        echo "</li>
                        </ul>
                        </div>";
                        ?>
                    </div>
                    <?php if ($GetUserAccess > 0) {?>
                        <!--	edit	-->
                        <div  class="actionBtn">
                            <a href="index.php?ID=pages_edit&Page_ID=<?php echo($re_set['Page_ID']); ?>"  class="cColor" title='Edit Category Settings'><i class="fas fa-edit"></i></a>
                        </div>
                        <!--	delete	-->
                        <div  class="actionBtn">
                            <a href="#" class="cRed" title='Delete Category' onclick="toggle_layer('deleteP<?php echo($re_set['Page_ID']); ?>');return false;"><i class="fas fa-trash-alt"></i></a>
                        </div>
                        <?php if (Auth::accessLevel() < 2) { ?>
                            <div class="actionBtn">
                                <?php if ($re_set['Page_List_ID'] <> 0) { ?>
                                    <?php print "<a href=\"index.php?ID=record_view&Page_ID=".$re_set["Page_ID"]."\" class='cDefault' title='Go to Category Records'><i class=\"fas fa-list\"></i></a>"; ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <div id="deleteP<?php echo($re_set['Page_ID']); ?>" class="borderΤoggle bgLighter borderLight" style="display: none;">
                            <div class="marginPopupInt bottom20">
                            <form name="deletepage<?php echo($re_set['Page_ID']); ?>" action="" method="post">
                                <div class="inlinediv5 cDefault">Are you sure you want to delete ?</div>
                                <div class="inlinediv10">
                                    <input type="hidden" name="Page_ID" value="<?php echo($re_set['Page_ID']); ?>">
                                    <input type="hidden" name="saved" value="ok">
                                    <input type="submit" name="delete_rec" value="Delete" class="cLight buttonLink bgRed">
                                </div>
                            </form>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        <?php } // end of if ($F_id == 0)
    } // end of CHECK ACCESS
    ?>

    <?php if ($numpp > 0) {?>
    <!--    ***************************  -->
    <!--	  PAGES UNDER HEADER PAGE	 -->
    <!--    ***************************  -->
        <div width="100%" class='subCategoriesGroup'>

                    <?php global $hiddenLayerFlag;
                    if (isset($_GET['LayerFlag']) && $_GET['LayerFlag'] <> $hiddenLayerFlag) {
                        print "<div id='mylayer_$hiddenLayerFlag' style='display: none;'>";
                    }
                    ?>
                    <div width="100%" class="sortableContainerSubPages">
                        <?php echo getCatSubCambRecursesion($hiddenLayerFlag, 2); ?>
                    </div>
        </div>
    <?php }?>
        <?php if ($GetUserAccess > 0) {?>
        </span>
        <?php }?>


        <?php $qu1 = "select * from pages where Parent_Page_ID=".$re_set["Page_ID"];

        $re1 = q($qu1);
        if (nr($re1) > 0) {
            $echoSpaces = $F_echoSpaces + 6;
            getCatCambRecursesion($re_set['Page_ID'], $echoSpaces);
        }
        ?>
        <?php
        }//end of while
}//end of function getCatCambRecursesion()
?>
<?php
// FUNCTION getCatSubCambRecursesion
function getCatSubCambRecursesion($F_id, $F_echoSpaces){


    global $GetUserAccess, $hiddenLayerFlag;

    $qu = "SELECT * FROM pages WHERE Parent_Page_ID = $F_id AND Page_Lang = '".$_SESSION["AdminLang"]."' AND Page_Section = '".$_SESSION["AdminSection"]."' Order by Page_Order, Page_ID";
    $re = q($qu);

    while ($re_set = f($re)){

    $pID = $re_set["Page_ID"];
    $num_records = nr(q("SELECT Rec_ID FROM records WHERE Rec_Page_ID = $pID"));

    checkuseraccess($pID);
    if ($GetUserAccess > 0) { // CHECK ACCESS
        ?>
        <div data-pageid='<?=$pID?>' >
        <div class="rowSubcategory borderLight bgLight">
            <div class='sortable-handler bgLight cMedium'><i class="fas fa-arrows-alt-v"></i></div>

            <a href="index.php?ID=pages_add_sc&Page_ID=<?php echo($re_set['Page_ID']); ?>" class="addCategory cGreen"><i class="fas fa-plus-square"></i></a>

            <?php
            // check if there are parent pages under this category (to show active layer arrow)
            $spp = "SELECT * FROM pages WHERE Parent_Page_ID = {$re_set['Page_ID']}";
            $rpp = q($spp);
            $numpp = nr($rpp);
            if ($numpp > 0) {
                print "<span  class='showSubCategories cMedium'\><i class=\"fas fa-level-up-alt fa-rotate-180 fa-xs\" style='font-size:0.8em'></i></span>";
            }
            ?>

            <div class="listcategoriesback categoriesSitemapTWidth">


                <?php //print "<a name=\"{$re_set['Page_ID']}\"></a>"; ?>
                <?php if ($re_set['Parent_Page_ID'] == 0) {
                    // echo str_repeat("&nbsp;", $F_echoSpaces);
                    echo "<a href=\"index.php?ID=pages_edit&Page_ID=".$re_set["Page_ID"]."\" class=\"categoryLink cDefault\">".$re_set["Page_Name"]."</a>";
                } else {
                    if ($re_set['Page_Header_Flag'] <> 1) {
                        // echo str_repeat("&nbsp;", $F_echoSpaces);
                        echo "<a href=\"index.php?ID=pages_edit&Page_ID=".$re_set["Page_ID"]."\" class=\"categoryLink cDefault\">".$re_set["Page_Name"]."</a>";
                    } else {
                        // echo str_repeat("&nbsp;", $F_echoSpaces);
                        echo "<a href=\"index.php?ID=pages_edit&Page_ID=".$re_set["Page_ID"]."\" class=\"categoryLink cDefault\">".$re_set["Page_Name"]."</a>";
                    }
                }
                // ΕΜΦΑΝΙΣΕ ΤΑ Details
                print "<div class='categoryDetails'>
                <ul>
                    <li><b>URL:</b> ".$re_set["Page_View"]."</li>
                    <li><b>Records:</b> $num_records</li>
                    <li><b>Page Active:</b> ";
                    echo $re_set['Page_Active'] ? 'yes' : 'no';
                echo "</li>
                </ul>
                </div>";
                ?>
            </div>
            <?php if ($GetUserAccess > 0) {?>
                <!--	edit	-->
                <div class="actionBtn">
                    <a href="index.php?ID=pages_edit&Page_ID=<?php echo($re_set['Page_ID']); ?>" class="cColor"><i class="fas fa-edit"></i></a>
                </div>
                <!--	delete	-->
                <div class="actionBtn">
                    <a href="#" class="cRed" onclick="toggle_layer('deleteP<?php echo($re_set['Page_ID']); ?>');return false;"><i class="fas fa-trash-alt"></i></a>
                </div>
                <div class="actionBtn">
                <?php if ($re_set['Page_List_ID'] <> 0) { ?>
                        <?php print "<a href=\"index.php?ID=record_view&Page_ID=".$re_set["Page_ID"]."\" class='cDefault' title='Go to Records'><i class=\"fas fa-list\"></i></a>"; ?>
                <?php }?>
                </div>

                <div id="deleteP<?php echo($re_set['Page_ID']); ?>" class="borderΤoggle bgLighter borderLight" style="display: none;">
                    <div class="marginPopupInt bottom20">
                    <form name="deletepage<?php echo($re_set['Page_ID']); ?>" action="" method="post">
                        <div class="inlinediv5 cDefault">Are you sure you want to delete ?</div>
                        <div class="inlinediv10">
                            <input type="hidden" name="Page_ID" value="<?php echo($re_set['Page_ID']); ?>">
                            <input type="hidden" name="saved" value="ok">
                            <input type="submit" name="delete_rec" value="Delete" class="cLight buttonLink bgRed">
                        </div>
                    </form>
                    </div>
                </div>
            <?php }?>
        </div>

    <?php
    } // end of if $GetUserAcc
    ?>

    <?php $qu1 = "select * from pages where Parent_Page_ID=".$re_set["Page_ID"];

    $re1 = q($qu1);
    if (nr($re1) > 0) {
        echo "<div class='sortableContainerSubPages subCategoriesGroup'>";
        //$echoSpaces = $F_echoSpaces + 6;
        getCatSubCambRecursesion($re_set["Page_ID"], $echoSpaces);
        echo '</div>';
    }

    if ($GetUserAccess > 0) {
        echo '</div>';
    }

    }//end of while

}//end of function getSubCatCambRecursesion()
?>


<?php
// Έλεγχος Αν υπάρχουν κατηγορίες (για να εμφανιστεί το κουμπί ΑΥΤΟΜΑΤΗ ΠΡΟΣΘΗΚΗ ΚΑΤΗΓΟΡΙΩΝ
$GetPages_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = 0 AND Page_Lang = '".$_SESSION["AdminLang"]."' AND Page_Header_Flag = 1 AND Page_Section = '".$_SESSION["AdminSection"]."' Order by Page_Order, Page_ID";
$GetPages_Query = q($GetPages_Sel);
$numpages = nr($GetPages_Query);
//echo '<body>';
?>


<div class="topInternalTitle bgLighter">
    <h2 class="cDefault"><span class="cMedium"><i class="fas fa-pen"></i></span> <span class="cMedium"><small><?php echo $GetSection['Section_Title'];?> ></small></span> Categories</h2>
    <div class="gridTitleRight">
        <?php
        if (Auth::accessLevel() == 0) {
            if ($numpages == 0) {
                print "<a href=\"index.php?ID=pages_add_auto_all\" title='$textInfoCatDefault' class='categoriesLink cDefault'>$textAutoAddCateg</a>";
            } else {
                print "<a href=\"index.php?ID=pages_add_auto\" title='$textInfoCatDefault' class='categoriesLink cDefault'>$textAutoAddCateg1</a>";
            }

            print "<a href='#' class='categoriesLink cDefault showCatDetails'>Show/Hide Details</a>";
        } ?>
    </div>
</div>

<div class="top30 clear"></div>

<a href="index.php?ID=pages_add" class=" cDefault addNewTemp"><i class="fas fa-plus-square"></i> <span><?php print $textAddHomeCateg; ?></span></a>
<div class="top30 sortableContainerPages" style="display: -webkit-flex;display: flex;-webkit-flex-direction: column;flex-direction: column;">
     <?php echo getCatCambRecursesion(0, 2); ?>
</div>
<?php //echo "</body>";?>
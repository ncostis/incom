<?php
require_once("init.php");
require_once($routes["record_upload_functions.php"]);

$GetSection_Sel = "SELECT * FROM sections WHERE Section_Name = '".$_SESSION["AdminSection"]."'";
$GetSection_Query = q($GetSection_Sel);
$GetSection = f($GetSection_Query);

function getCatCambRecursesion($F_id)
{

    $qu = "SELECT * FROM pages WHERE Parent_Page_ID = $F_id AND Page_Lang = '".$_SESSION["AdminLang"]."' AND Page_Section = '".$_SESSION["AdminSection"]."'  Order by Page_Order";
    $re = q($qu);
    while ($re_set = f($re)) {
        // ΕΛΕΓΧΟΣ ΔΙΑΚΑΙΩΜΑΤΩΝ ΧΡΗΣΤΩΝ
        if ((Auth::accessLevel() == 0) || (Auth::fullAccess() == 1)) {
            $GetUserAcc = 1; //Εαν είναι Super Admin ή έχει πλήρη διακαιώματα τα εκτελεί όλα
        } else {
            $GetUserAcc_Select = "SELECT * FROM users WHERE Users_Pas_ID = ".$_SESSION["UserID"]." AND Users_Page_ID = ".$re_set["Page_ID"];
            $GetUserAcc_Query = q($GetUserAcc_Select);
            $GetUserAcc = nr($GetUserAcc_Query);
        }

        if ($GetUserAcc > 0) {

            $nameLink = "recordLinkList cDefault";
            $class = "bgLighter";
            if($re_set["Parent_Page_ID"]<>0) $class = "bgLight borderLight";
            ?>
            <div class="rowRecord bgLighter <?php echo $class?>">
                <div class="recordRowContainer <?php echo $class?>">
                    <div class="recordsSitemapTWidth" >
                        <?php if ($re_set['Page_List_ID'] == 0) {
                            echo "<span class='recordLinkList cRed'><i class='svg-inline--fa'></i> ".$re_set["Page_Name"]."</span>";
                        } else {
                            if ($re_set['Page_Num_Recs'] > 1) {
                                echo "<a href=\"index.php?ID=record_view&Page_ID=" . $re_set['Page_ID'] . "\" class=\"$nameLink\"><i class='fas fa-angle-double-right'></i> " . $re_set['Page_Name'] . " </a>";
                            } else {
                                // Εαν το Page_Num_Recs = 1, Παίρνει το Rec_ID από το 1ο Record της κατηγορίας για να πάει απ' ευθείας.
                                // Εαν το nr = 0 τότε σημαίνει ότι δεν υπάρχει record οποτε πάει στη record_view για να γίνει add το record
                                $qr = "SELECT * FROM records WHERE Rec_Page_ID = ".$re_set["Page_ID"]." AND Rec_Page_Content = 0";
                                $re_rec = q($qr);
                                $grec = f($re_rec);
                                $nrecs = nr($re_rec);
                                if ($nrecs <> 0) {
                                    echo "<a href=\"index.php?ID=record_edit&Page_ID=" . $re_set['Page_ID'] . "&Rec_ID=" . $grec['Rec_ID'] . "\" class=\"$nameLink\"><i class='fas fa-angle-double-right'></i> " . $re_set['Page_Name'] . "</a>";
                                } else {
                                    echo "<a href=\"index.php?ID=record_view&Page_ID=" . $re_set['Page_ID'] . "\" class=\"$nameLink\"> <i class='fas fa-angle-double-right'></i>" . $re_set['Page_Name'] . "</a>";
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="actionBtn text">
                        <?php
                        //     Check for Synchronize Data from distance server
                        // ****************************************************
                        // First Delete Rec from Synchronize delete_records
                        if ($re_set['Page_Synchronize'] == 1) {
                            deleteRecs($re_set['Page_ID']);
                        }

                        //Category Content
                        $GetSynchrDomain_Sel = "SELECT Page_Name FROM pages WHERE Page_Section = 'hidden' AND Page_View = 'synchronize-data' Limit 0,1";
                        $GetSynchrDomain_Query = q($GetSynchrDomain_Sel);
                        if ((nr($GetSynchrDomain_Query) > 0) AND ($re_set['Page_Synchronize'] == 1)) {
                            // check if synchronize records exists to this category
                            // Read Records from Database and check the Modify_Date of record with Folder Name Date (347_2018-07-08) Rec_ID = 347
                            $countRecFolders = checkSynchronizeRecs($re_set["Page_ID"]);
                            if ($countRecFolders > 0) {
                                ?>
                                <a href="index.php?ID=record_upload&Page_ID=<?php echo $re_set['Page_ID']; ?>" class="cColor">Sync (<?php echo $countRecFolders; ?>)</a>
                                <?php
                            }
                            ?>

                            <?php
                        }?>
                    </div>

                    <div class="actionBtn text">
                        <?php
                        //Category Content
                        if ($re_set['Page_Content'] > 0) {
                            $qrH = "SELECT * FROM records WHERE Rec_Page_ID = ".$re_set["Page_ID"]." AND Rec_Page_Content = 1";
                            $reH_rec = q($qrH);
                            $grecH = f($reH_rec);
                            ?>
                            <a href="index.php?ID=record_Cat_edit&Page_ID=<?php echo $re_set['Page_ID']; ?>&Rec_ID=<?php echo $grecH['Rec_ID']; ?>"
                               class="cDefault">Header</a>
                            <?php
                        }?>
                    </div>

                    <?php if (Auth::accessLevel() < 2) { ?>
                        <div class="actionBtn text small">
                            <?php print "<a href=\"index.php?ID=pages_edit&Page_ID=".$re_set["Page_ID"]."\" class='cDefault'><i class='fas fa-sitemap'></i></a>"; ?>
                        </div>
                    <?php } ?>
                </div>

                <?php
                    $qu1 = "select * from pages where Parent_Page_ID=".$re_set["Page_ID"];
                    $re1 = q($qu1);
                    if (nr($re1) > 0) {
                        echo "<div class='subRecordsGroup'>";
                        getCatCambRecursesion($re_set['Page_ID']);
                        echo "</div>";
                    }
                ?>
            </div>
        <?php } // end of if (nr($GetUserAcc_Query)



    }//end of while
}//end of function getCatCambRecursesion()
?>


<?php headerTitle($GetSection['Section_Title'], $textRecList)?>

<div class="top30"></div>

    <div width="100%" style="display: -webkit-flex;display: flex;-webkit-flex-direction: column;flex-direction: column;">
        <?php
        if (isset($_GET['Page_ID']) && $_GET['Page_ID'] > 0) {
            echo getCatCambRecursesion($_GET["Page_ID"]);
        } else {
            echo getCatCambRecursesion(0);
        }
        ?>
    </div>


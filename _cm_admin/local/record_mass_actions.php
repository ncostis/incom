<?php
require_once "init.php";

if($_POST['selectedCheckboxes']<> '' || $_POST["update"] == "form1"){
	$selectedCheckboxes=explode(",",$_POST['selectedCheckboxes']);

    //Mass de-activate records
    if(getparamvalue('massDeactivate')=='massDeactivate'){
    	foreach ($selectedCheckboxes as $checkbox) {
    		$upr = "UPDATE records SET Rec_Active = '1' WHERE Rec_ID = \"$checkbox\"";
        	q($upr);
    	}
        ?>
        <script language="JavaScript">
           window.location = "index.php?ID=record_view&Page_ID=<?php echo $_GET["Page_ID"]; ?>";
        </script>
        <?php
    }//end if mass de-activate

    //Mass activate records
	if(getparamvalue('massΑctivate')=='massΑctivate'){
		foreach ($selectedCheckboxes as $checkbox) {
	       $upr = "UPDATE records SET Rec_Active = '0' WHERE Rec_ID = \"$checkbox\"";
	       q($upr);
        }
        ?>
        <script language="JavaScript">
           window.location = "index.php?ID=record_view&Page_ID=<?php echo $_GET["Page_ID"]; ?>";
        </script>
        <?php
    }//end if Mass activate records

    //Mass delete records
    if(getparamvalue('massDeleteRecs')=='massDelete'){
        foreach ($selectedCheckboxes as $checkbox){
            require_once $routes["folder_paths.php"];

            $Rec_Sel = "SELECT * FROM records WHERE Rec_ID = $checkbox";
            $Rec_Query = q($Rec_Sel);
            $DelRec = f($Rec_Query);

            $Rec_ID = $DelRec['Rec_ID'];

            include $routes["record_delete_files.php"];
        }
        ?>
        <script language="JavaScript">
           window.location = "index.php?ID=record_view&Page_ID=<?php echo $_GET["Page_ID"]; ?>";
        </script>
        <?php
    }//end if Mass delete records

    //Mass add to multiple categories records
    if(getparamvalue('massAddtoMultiple')=='massAddtoMultiple' || isset($_POST['add_related']) || $_POST["update"] == "form1"){

        if ((isset($_POST["update"])) && ($_POST["update"] == "form1")) {
            $size = count($_POST['id']);
            $i = 0;

            while ($i < $size) {
                $ID = $_POST['id'][$i];
                $delete = $_POST['delete_me'][$i];

                if (isset($delete)) {
                    $delete_query = "DELETE FROM `related_pages` WHERE `related_pages`.`ID` =$delete LIMIT 1";
                    $delete_selected = q($delete_query);
                }
                ++$i;
            }
        }
        ?>

        <?php headerTitle ($textSelCategory)?>
        <script type="text/javascript" src="js/multiselect/multiselect.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#multiSelect").multiselect({
                    keepRenderingSort: true,
                    search: {
                        left: '<input type="text" name="q" class="formField" placeholder="Search..." />',
                        right: '<input type="text" name="q" class="formField" placeholder="Search..." />',
                    },
                    fireSearch: function(value) {
                        return value.length > 1;
                    },
                });
                $("#multiSelect_rightSelected").click();
            });
        </script>
        <div class="top30"></div>
        <table style="width:100%; height:80px" border="0" cellspacing="10" cellpadding="0">
            <tr>
                <td class="main-border" valign="top">
                    <table width="100%" border="0" cellspacing="4" cellpadding="0">
                        <tr>
                            <td height="30">

                                <?php
                                print "<table align='center'>";
                                $i = 0;
                                //Εμφάνιση του τίτλου
                                foreach ($selectedCheckboxes as $checkbox) {
                                    $GetTitle_Sel = "SELECT * FROM records WHERE Rec_ID = $checkbox";
                                    $GetTitle_Query = q($GetTitle_Sel);
                                    $GetTitle = f($GetTitle_Query);
                                    $Title = $GetTitle['Rec_Title'];
                                    print "<tr><td coldpan=2 class=\"cDefault\" align='center'><strong>" . $Title . "</strong></td></tr>";

                                    if (isset($_POST['add_related'])) {
                                        $addCategories = $_POST['to'];
                                        foreach($addCategories as $newCategoryID) {
                                            $found = nr(q("SELECT * FROM related_pages WHERE Related_Rec_ID = $checkbox AND Related_Page_ID = $newCategoryID LIMIT 1"));
                                            if($found==0){
                                                q("INSERT INTO related_pages (Related_Rec_ID,Related_Page_ID) VALUES ($checkbox,$newCategoryID)");
                                            }
                                        }
                                    }

                                    $SelRel_Rec = "SELECT * FROM related_pages WHERE Related_Rec_ID = $checkbox";
                                    $GetRel_Query = q($SelRel_Rec);
                                    $found_related = nr($GetRel_Query);

                                    print "<form name='form1' method='post' action=''>";
                                    print"<input type=\"hidden\" name=\"selectedCheckboxes\" value=\"".$_POST["selectedCheckboxes"]."\" />";

                                    //Εμφάνιση των σχετικών εγγραφών
                                    while ($GetRel = f($GetRel_Query)) {
                                        $Rel_Rec_ID = $GetRel['Related_Page_ID'];
                                        $Get_Related_Query = "Select * FROM pages WHERE Page_ID= $Rel_Rec_ID LIMIT 1";
                                        $Get_Related = q($Get_Related_Query);
                                        $Related_Info = f($Get_Related);

                                        $HeadRelated_Sel = "Select * FROM pages WHERE Page_ID= ".$Related_Info["Parent_Page_ID"];
                                        $HeadRelated_Query = q($HeadRelated_Sel);
                                        $HeadRelated = f($HeadRelated_Query);

                                        print "<tr><td>".$HeadRelated["Page_Name"];
                                        if ($HeadRelated["Page_Name"] <> "") print " : ";
                                        print $Related_Info["Page_Name"]." &nbsp;&nbsp;&nbsp;</td>";
                                        print "<input type='hidden' name='id[$i]' value='{$GetRel['ID']}' />";
                                        print "<td>Remove</td><td><input type='checkbox' name=delete_me[$i] value='{$GetRel['ID']}' /></td></tr>";
                                        ++$i;
                                    }
                                }//FOR EACH END
                                print "<input type='hidden' name='update' value='form1'>";
                                if ($found_related > 0)
                                    print "<tr><td colspan='2' align='center'><input type='submit' value='Delete Selected' class=\"cLight buttonLink bgRed\" /></td></tr>";

                                print "</form>";
                                print "</table>";
                                ?>

                                <div class="top30"></div>
                                <form action="" method="post" name="add_new">
                                    <div class="admGrid3Cols ADMjustFlex">
                                        <div style='flex:5'>
                                            <select name="from[]" class="formField multiSelectDropDown" id="multiSelect" size="12" multiple="multiple">
                                                <?php
                                                $GetSections_Query = q("SELECT * FROM sections WHERE Section_Name <> 'hidden' Order by Section_Order Asc");
                                                while ($GetSections = f($GetSections_Query)) {
                                                    $Section = $GetSections['Section_Name'];
                                                    ?>
                                                    <optgroup label="<?php echo $GetSections['Section_Title']; ?>">
                                                    <?php
                                                    echo getCatCambRecursesion(0, 1, $Section);
                                                }
                                                ?>
                                                </optgroup>
                                            </select>
                                        </div>

                                        <div style='flex:1;align-items:center;display:flex;justify-content: center;'>
                                            <div>
                                                <a href="::return false;" type="button" id="multiSelect_rightSelected" class="btn bgLighter admLink cDefault">></a>
                                                <a href="::return false;" type="button" id="multiSelect_leftSelected" class="btn bgLighter admLink cDefault"><</a>
                                            </div>
                                        </div>

                                        <div style='flex:5'>
                                            <select name="to[]" id="multiSelect_to" class="formField multiSelectDropDown" size="12" multiple="multiple">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="top30"></div>
                                    <div class="right">
                                        <input type="hidden" name="selectedCheckboxes" value="<?=$_POST['selectedCheckboxes']?>" />
                                        <input type="submit" name="add_related" class="textBigger bgGreen cLight buttonLink" value="Apply Changes"/>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom:5px;">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
        <a href="index.php?ID=record_view&Page_ID=<?php echo $_GET["Page_ID"]; ?>" class="cDefault buttonLink"><i class="fas fa-reply"></i> Back</a>

        <?php
    }
}else{
    ?>
        <script language="JavaScript">
        window.location = "index.php?ID=record_view&Page_ID=<?php echo $_GET["Page_ID"]; ?>";
        </script>
    <?php
} //end if there are checked records

function getCatCambRecursesion($F_id, $F_echoSpaces, $Section)
{
    $qu = "SELECT * FROM pages WHERE Parent_Page_ID = $F_id AND Page_Lang = '".$_SESSION["AdminLang"]."' AND Page_Section = '$Section' Order by Page_Order";
    $re = q($qu);
    while ($re_set = f($re)) {

        if ($re_set['Parent_Page_ID'] == 0) $diaxor = str_repeat("- ", $F_echoSpaces);
        else $diaxor = str_repeat("&nbsp;&nbsp;", $F_echoSpaces);
        $sPageID = $re_set['Page_ID'];
        $sPageName = $re_set['Page_Name'];
        $ParPageID = $re_set['Parent_Page_ID']; ?>
        <option
            value="<?php echo $sPageID; ?>"><?php echo $diaxor . $sPageName; ?></option>
        <?php
        $qu1 = "select * from pages where Parent_Page_ID=".$re_set["Page_ID"];
        $re1 = q($qu1);
        if (nr($re1) > 0) {
            $echoSpaces = $F_echoSpaces + 2;
            getCatCambRecursesion($re_set["Page_ID"], $echoSpaces, $Section);
        }
    }//end of while
}//end of function getCatCambRecursesion()
?>
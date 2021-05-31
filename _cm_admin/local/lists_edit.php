<?php
require_once("init.php");
require_once($routes["functions_fields.php"]);

if (isset($_POST["saved"]) && $_POST["saved"] == 'ok') {

    $GetListFields_Sel = "SHOW COLUMNS FROM lists WHERE (Field NOT LIKE '%Order%' OR Field='List_Order')";
    $GetListFields_Query = q($GetListFields_Sel);
        $numFields = nr($GetListFields_Query);
        while ($GetListFields = f($GetListFields_Query)) {
            $i = $i + 1;
            $colName = $GetListFields['Field'];
            $value = mysqli_real_escape_string($db, $_POST[$colName]);
            if ($colName == "List_Active") $value = 1;
            if ($colName <> "List_ID") {
                $uql = $uql.$colName." = '".$value;
                if ($i < $numFields) $uql = $uql."', ";
            }
        }

    $uql = "UPDATE lists SET ".$uql."' WHERE List_ID = ".$_POST['List_ID'];
    q($uql);
}

$List_ID = $_GET["List_ID"];
$GetList_Query = q("SELECT * FROM lists WHERE List_ID = $List_ID");
$GetList = f($GetList_Query);
?>


<?php headerTitle("Edit Field List", $GetList['List_Name']); ?>
<div class="width100 fieldLists">
    <div class="top20"></div>

    <form action="" method="post">
        <input type="Hidden" name="List_ID" value="<?php echo $GetList['List_ID']; ?>">
        <input type="Hidden" name="saved" value="ok">

        <div class="admGridFlexCont">
            <div class="admGridListL">
                <!--	Name	-->
                <?php
                listTextField("List_Name",$GetList['List_Name'],"List Name","");
                listTextField("List_Title",$GetList['List_Title'],"Title","");
                listTextField("List_Desc",$GetList['List_Desc'],"Description","(text field)");
                listTextField("List_Order",$GetList['List_Order'],"Order","");
                listTextField("List_ShowHome",$GetList['List_ShowHome'],"Show on Home Page","");
                ?>
                <div class="form-group">
                    <div class="colInput top15">
                        <a href="javascript:return false;" onclick="toggle_layer('showfieldsSet1')" class="cColor">[+] More Fields</a>
                    </div>
                </div>
                <div id="showfieldsSet1" style="display: none; padding:10px;">
                    <?php
                    listTextField("List_HomeRotator",$GetList['List_HomeRotator'],"Home Rotator","");
                    listTextField("List_Rec_ShowMore",$GetList['List_Rec_ShowMore'],"Show More in List","");
                    listTextField("List_Title_Meta",$GetList['List_Title_Meta'],"Meta Tag Title","");
                    listTextField("List_Desc_Meta",$GetList['List_Desc_Meta'],"Meta Tag Description","");
                    ?>
                </div>
                <!--	TextArea	-->
                <!-- -------------- -->
                <div class="clear top10"></div>
                <fieldset class="borderLight">
                    <legend><b>Texts</b></legend>
                    <?php
                        listTextField("List_TextArea1",$GetList['List_TextArea1'],"Text Area 1","(text field)");
                        listTextField("List_TextArea2",$GetList['List_TextArea2'],"Text Area 2","(text field)");
                        listTextField("List_TextArea3",$GetList['List_TextArea3'],"Text Area 3","(editor)");
                        listTextField("List_TextArea4",$GetList['List_TextArea4'],"Text Area 4","(editor)");
                    ?>
                </fieldset>
                <!--	Fields		-->
                <!-- -------------- -->
                <div class="clear top10"></div>
                <fieldset class="borderLight">
                    <legend><b><?php print $textTextFields; ?></b></legend>
                    <?php
                    $GetColumnField_Query = q("show COLUMNS from lists WHERE Field LIKE '%Field%' AND Field NOT LIKE '%Order%'");
                    $sumListFields = nr($GetColumnField_Query);

                    for ($i = 1; $i <= 10; $i++) {
                        listTextField("List_Field$i",$GetList["List_Field".$i],"Field $i","");
                    }
                    ?>
                    <div class="form-group">
                        <div class="colInput top15">
                            <a href="javascript:return false;" onclick="toggle_layer('showfieldsSet2')" class="cColor">[+] More Fields</a>
                        </div>
                    </div>
                    <div id="showfieldsSet2" style="display: none; padding:10px;">
                    <?php
                    for ($i = 11; $i <= $sumListFields; $i++) {
                        listTextField("List_Field$i",$GetList["List_Field".$i],"Field $i","");
                    }
                    ?>
                    </div>
                </fieldset>

                <!--	E-SHOP   -->
                <!-- ----------- -->
                <div class="clear top10"></div>
                <fieldset class="borderLight">
                    <legend><b>E-Shop</b></legend>
                    <?php
                    listTextField("List_Price",$GetList['List_Price'],"Price","");
                    listTextField("List_Price2",$GetList['List_Price2'],"Price 2","");
                    ?>
                    <div class="form-group">
                        <div class="colInput top15">
                            <a href="javascript:return false;" onclick="toggle_layer('showfieldsShop')" class="cColor">[+] More E-Shop Fields</a>
                        </div>
                    </div>
                    <div id="showfieldsShop" style="display: none;">
                        <div class="top20"></div>
                        <?php
                        listTextField("List_Price3",$GetList['List_Price3'],"Price 3","");
                        listTextField("List_Discount",$GetList['List_Discount'],"Discount","");
                        listTextField("List_Weight",$GetList['List_Weight'],"Weight","");
                        listTextField("List_Stock",$GetList['List_Stock'],"Stock","");
                        listTextField("List_Vat",$GetList['List_Vat'],"Vat Category","");
                        listTextField("List_Availability",$GetList['List_Availability'],"Availability","");
                        listTextField("List_Brand",$GetList['List_Brand'],"Brand","");
                        listTextField("List_Supplier",$GetList['List_Supplier'],"Supplier","");
                        listTextField("List_CatProduct",$GetList['List_CatProduct'],"Category Product","");
                        listTextField("List_HotPrice",$GetList['List_HotPrice'],"Hot Price","");
                        listTextField("List_BestSeller",$GetList['List_BestSeller'],"Best Seller","");
                        listTextField("List_BestPrice",$GetList['List_BestPrice'],"Best Price","");
                        listTextField("List_BestChoice",$GetList['List_BestChoice'],"Best Choice","");
                        ?>
                    </div>
                </fieldset>

                <!--	CheckBoxes	  -->
                <!-- ---------------- -->
                <div class="clear top10"></div>
                <fieldset class="borderLight">
                    <legend><b>Check Boxes</b></legend>
                    <?php
                    $GetColumnCheck_Query = q("show COLUMNS from lists WHERE Field LIKE 'List_Check%' AND Field NOT LIKE '%Order'");
                    $sumListCheck = nr($GetColumnCheck_Query);
                    for ($i = 1; $i <= 5; $i++) {
                        listTextField("List_Check$i",$GetList["List_Check".$i],"Check Box $i","");
                    }
                    ?>
                    <div class="form-group">
                        <div class="colInput top15">
                            <a href="javascript:return false;" onclick="toggle_layer('showfieldsCheck')" class="cColor">[+] More Check Boxes</a>
                        </div>
                    </div>
                    <div id="showfieldsCheck" style="display: none; padding:10px;">
                        <?php
                        for ($i = 6; $i <= $sumListCheck; $i++) {
                            listTextField("List_Check$i",$GetList["List_Check".$i],"Check Box $i","");
                        }
                        ?>
                    </div>
                </fieldset>

                <!--	Scrolling	 -->
                <!-- --------------- -->
                <div class="clear top10"></div>
                <fieldset class="borderLight">
                    <legend><b>Scrolling Fields</b></legend>
                    <?php
                    $GetColumnScroll_Query = q("show COLUMNS from lists WHERE Field LIKE 'List_Scroll%' AND Field NOT LIKE '%Order' AND Field NOT LIKE '%Att' AND Field NOT LIKE '%Section'");
                    $sumListScroll = nr($GetColumnScroll_Query);

                    for ($i = 1; $i <= 3; $i++) {
                        $ListScrollAtt = "List_Scroll".$i."_Att";
                        $ListScrollSection = "List_Scroll".$i."_Section";
                        listScrollDownField("Scrolling $i","List_Scroll$i",$GetList['List_Scroll'.$i],$ListScrollAtt,$GetList['List_Scroll'.$i.'_Att'],$ListScrollSection,$GetList['List_Scroll'.$i.'_Section']);
                    }
                    ?>
                    <div class="form-group">
                        <div class="colInput top15">
                            <a href="javascript:return false;" onclick="toggle_layer('showfieldsScr')" class="cColor">[+] More Scrolling Fields</a>
                        </div>
                    </div>
                    <div id="showfieldsScr" style="display: none;">
                        <?php
                            for ($i = 4; $i <= $sumListScroll; $i++) {
                                $ListScrollAtt = "List_Scroll".$i."_Att";
                                $ListScrollSection = "List_Scroll".$i."_Section";
                                listScrollDownField("Scrolling $i","List_Scroll$i",$GetList["List_Scroll".$i],$ListScrollAtt,$GetList["List_Scroll".$i."_Att"],$ListScrollSection,$GetList["List_Scroll".$i."_Section"]);
                            }
                        ?>
                    </div> <!-- showfields2 -->
                </fieldset>


                <!--	Record View	--><!--	Record View --><!--	Record View	-->
                <!-- ------------------------------------------------------ -->
                <div class="clear top10"></div>
                <fieldset class="borderLight">
                    <legend><b><?php print $textRecordView; ?></b></legend>
                    <?php
                    listTextField("List_Rec_View",$GetList['List_Rec_View'],"Record View","");
                    listTextField("List_Rec_View_Mob",$GetList['List_Rec_View_Mob'],"Record View Mobile","");
                    listTextField("List_Rec_Lists_View",$GetList['List_Rec_Lists_View'],"Lists View of Record","");
                    listTextField("List_Rec_Lists_View_Mob",$GetList['List_Rec_Lists_View_Mob'],"Lists View of Record Mobile","");
                    ?>
                </fieldset>

                <!--	Editors		-->
                <!-- -------------------------------------------------- -->
                <div class="clear top10"></div>
                <fieldset class="borderLight">
                    <legend><b><?php print $textEditTextT; ?></b></legend>
                    <?php
                    listTextField("List_Editor1",$GetList['List_Editor1'],"Text Editor 1","");
                    listTextField("List_Editor2",$GetList['List_Editor2'],"Text Editor 2","");
                    listTextField("List_EditorMob",$GetList['List_EditorMob'],"Mobile Text Editor","");
                    ?>
                </fieldset>

                <div class="clear top20"></div>

                <!-- Attached Files -->
                <!-- -------------- -->
                <div class="blueBox">
                    <div class="title">Attached Files</div>
                    <?php
                    listTextField("List_Images",$GetList['List_Images'],"Photo Gallery","");
                    listTextField("List_NoRes_Images",$GetList['List_NoRes_Images'],"Header Gallery","");
                    listTextField("List_Docs",$GetList['List_Docs'],"Doc Gallery 1","");
                    listTextField("List_Docs2",$GetList['List_Docs2'],"Doc Gallery 2","");
                    listTextField("List_Logo",$GetList['List_Logo'],"Logo","");
                    listTextField("List_Logo_Bottom",$GetList['List_Logo_Bottom'],"Logo Bottom","");
                    // Images
                    $GetColumnImage_Query = q("show COLUMNS from lists WHERE Field LIKE 'List_Image%' AND Field NOT LIKE '%Order' AND Field NOT LIKE '%Social' AND Field NOT LIKE '%Images'");
                    while ($GetColumnImage = f($GetColumnImage_Query)) {
                        $ic = $ic + 1;
                        listTextField("List_Image$ic",$GetList["List_Image".$ic],"Image $ic","");
                    }

                    listTextField("List_Image_Social",$GetList['List_Image_Social'],"Social Media Image","");
                    listTextField("List_File1",$GetList['List_File1'],"File 1","");
                    listTextField("List_File2",$GetList['List_File2'],"File 2","");
                    ?>
                </div><!-- blueBox -->
                <div class="top20"></div>

                <!-- Attached Tables -->
                <!-- --------------- -->
                <div class="orangeBox">
                    <div class="title">Attached Tables <i class="fas fa-question-circle admInfo cGreen" title="Add multiple choice options or options for scrolling fields (drop down selections)"></i></div>

                    <!------	Attached Table 1 - Multiple Choises ------>
                    <?php
                    for ($i = 1; $i <= 15; $i++) {
                        $ListMultTableOrder = "List_MultTable".$i."_Order";
                        $ListMultTableType = "List_MultTable".$i."_Type";
                        $ListMultTableID = "List_MultTable".$i."_ID";
                        listAttachTable("Attach Table ($i)","List_MultTable$i",$GetList["List_MultTable".$i],$ListMultTableOrder,$GetList["List_MultTable".$i."_Order"],"$ListMultTableType",$GetList["List_MultTable".$i."_Type"],$ListMultTableID,$GetList["List_MultTable".$i."_ID"],$List_ID);
                    }
                    ?>

                    <!------	Related Records		------>
                    <div class="clear top20 bottom20 redTextS2b" align="center">Attach Related Records</div>
                    <?php
                    listTextField("List_RA1",$GetList['List_RA1'],"Related Records (1)","");
                    listTextField("List_RA2",$GetList['List_RA2'],"Related Records (2)","");
                    ?>

                    <!------	Attached Recs TABLES    	------>
                    <?php
                    for ($i = 1; $i <= 6; $i++) {
                        $ListRatOrder = "List_Rat".$i."_Order";
                        $ListRatID = "List_Rat".$i."_ID";
                        listAttachRecTable("Attached Records (".$i.")","List_Rat".$i,$GetList["List_Rat".$i],$ListRatOrder,$GetList["List_Rat".$i."_Order"],$ListRatID,$GetList["List_Rat".$i."_ID"]);
                    }
                    ?>
                </div><!-- orangeBox -->


                <!--	Dates & More -->
                <!-- ----------------------------------------------------- -->
                <div class="clear top10"></div>

                <!------	DateStart		------>
                <?php
                listTextField("List_StartDate",$GetList['List_StartDate'],"Start Date","");
                listTextField("List_EndDate",$GetList['List_EndDate'],"End Date","");
                listTextField("List_GeoLocation",$GetList['List_GeoLocation'],"Geo Location","");
                listTextField("List_Keywords",$GetList['List_Keywords'],"Keywords Field","");
                listTextField("List_Active_Rec",$GetList['List_Active_Rec'],"Active Record","");
                ?>

                <!--RecPage		-->
                <!-- declare different record_edit.php page (record_ggka_edit.php) for this List Type -->
                <!-- --------------- -->
                <div class="top10"></div>

                <div class="form-group">
                    <div class="yellowBox">
                        <div class="top10"></div>
                        <?php listTextField("List_RecPage",$GetList['List_RecPage'],"Page View",""); ?>
                        <div class="clear top10"></div>
                    </div>
                </div>

            </div> <!-- admGridListL -->

            <div class="admGridListR">
                <!-- Box Element for order of fields -->
                <div class="fieldListOrderWrapper blueBox">
                    <div class="title">Fields Display Order</div>
                    <div data-listID="<?php echo $List_ID; ?>" class="sortableContainerFieldLists">

                        <?php
                        $GetColumnField_Query = q("show COLUMNS from lists WHERE (Field NOT LIKE '%Order%' OR Field='List_Order') AND Field NOT LIKE '%_ID' AND Field NOT LIKE 'List_Name' AND Field NOT LIKE 'List_Active' AND Field NOT LIKE 'List_RecPage' AND Field NOT LIKE '%_Section' AND Field NOT LIKE '%_Att' AND Field NOT LIKE '%_Type'");
                        $activeFields = [];
                        $unmovableFields=[];
                        $fieldRow = f(q("SELECT * FROM lists WHERE List_ID=$List_ID"));
                            while ($GetFullList=f($GetColumnField_Query)) {

                                $field = $GetFullList['Field'];
                                if($fieldRow[$field]<>""){
                                    if($fieldRow[$field."_Order"]==""){
                                        $unmovableFields[$field] = $fieldRow[$field];
                                    }else{
                                        $activeFields[$field] = array("Field_Name"=>$fieldRow[$field], "Field_Order"=>$fieldRow[$field."_Order"]);
                                    }
                                }

                            }
                                $column_field_name  = array_column($activeFields, 'Field_Name');
                                $column_field_order = array_column($activeFields, 'Field_Order');
                                array_multisort($column_field_order, SORT_ASC, $activeFields);

                                foreach ($activeFields as $FieldName => $value) {
                                    print"<div data-fieldName='$FieldName'><div class=\"fieldListRowContainer\"> ".$value["Field_Name"]."</div></div>";
                                }

                        ?>
                    </div>
                    <div style="border-top:1px solid #ddd;padding:10px 20px;">
                       <?php foreach ($unmovableFields as $FieldName => $value) { print"<div class=\"fieldListUnmovable cMedium\"> $value</div>";} ?>
                    </div>
                </div>
            </div>

        </div>

        <div class="adminNav bgLighter borderLight adminNavAbsolute">
            <div class="left" style="width:51%; text-align:right;">
                <input type="submit" class="textBigger bgColor cLight buttonLink" name="save_rec" value="Save">
            </div>
            <div class="left top8" style="text-align:right;width:49%;">
                <a href="index.php?ID=lists_view" class="textBigger  cDefault buttonLink"><i class="fas fa-reply"></i> Back</a>
            </div>
            <div style="clear:both;"></div>
        </div>

    </form>
    <div class="top25 clear"></div>



    <script type="text/javascript">
        $(document).ready(function() {
            var el = $('.fieldListOrderWrapper');
            var stickyNavTop = el.first().offset().top;
            var stickyNav = function(){
                var scrollTop = $(window).scrollTop();

                if (scrollTop > stickyNavTop-20) {
                    el.first().css("top", scrollTop-stickyNavTop+20);
                } else {
                    el.first().css("top", "");
                }
            }
            stickyNav();
            $(window).scroll(function() {
                stickyNav();
            })
        });
    </script>


</div>
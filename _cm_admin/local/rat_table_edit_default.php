<?php
    $GetColumnField_Query = q("show COLUMNS from lists WHERE (Field NOT LIKE '%Order%' OR Field='List_Order') AND Field NOT LIKE '%_ID' AND Field NOT LIKE 'List_Name' AND Field NOT LIKE 'List_Active' AND Field NOT LIKE 'List_RecPage' AND Field NOT LIKE '%_Section' AND Field NOT LIKE '%_Att' AND Field NOT LIKE '%_Type'");
    $activeFields = [];
    $unmovableFields=[];
    $mediaSortedFields=[];

    $mediaFields= ["Rat_Image1","Rat_Image2","Rat_Image_Resize1","Rat_Image_Resize2","Rat_Image_Resize3","Rat_Image_Resize4","Rat_Image_Resize5","Rat_Image_Resize6"];
    $plainTextField = ["Rat_Title"];
    $sizedTextField = ["Rat_Order","Rat_Discount","Rat_Weight","Rat_Stock","Rat_Price"];
    $textAreaField = ["Rat_Desc"];
    $textAreaDBField = ["Rat_TextArea1","Rat_TextArea2","Rat_TextArea3","Rat_TextArea4"];
    $checkBoxField = [];
    $scrollField = [];

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

    $GetSection_Sel = "SELECT Section_Title FROM sections WHERE Section_Name = '".$_SESSION["AdminSection"]."'";
    $GetSection_Query = q($GetSection_Sel);
    $GetSection = f($GetSection_Query);

    $showMediaColumn = false;
    foreach ($activeFields as $FieldName => $value) {
        $recField=str_replace("List_","Rat_",$FieldName);
        if($showMediaColumn) break;
        if (in_array($recField,$mediaFields) || (strpos($recField, 'Rat_Image') !== false) || (strpos($recField, 'Rat_File') !== false) ||  (strpos($recField, 'Rat_Images') !== false) || (strpos($recField, 'Rat_NoRes_Images') !== false)  || (strpos($recField, 'Rat_Docs') !== false) || (strpos($recField, 'Rat_Docs2') !== false)) { // All Media fields
            $showMediaColumn = true;
        }
    }

?>


<div class="topInternalTitle bgLighter">
    <h2>
        <span class="cMedium"><i class="fas fa-pen"></i></span> <span class="cMedium"><small><?php echo $GetSection['Section_Title'];?> > <?php echo $GetRec['Page_Name']; ?> > <?php echo $GetRec['Rec_Title']; ?> ></small></span> <?php echo $GetRat['Rat_Title']?>
    </h2>
</div>

<div class="top30"></div>
<form action="" method="post" class="form-horizontal" name="recSubmit">
    <input type="Hidden" name="selectString" value="<?php echo getparamvalue("selectString"); ?>">
    <input type="Hidden" name="Rat_ID" value="<?php echo $Rat_ID; ?>">
    <input type="Hidden" name="Rat_Rat_ID" value="<?php echo $Rat_Rat_ID; ?>">
    <input type="Hidden" name="Rat_SubCat" value="<?php echo $Rat_SubCat; ?>">
    <input type="Hidden" name="saved" value="ok">

    <input id="relLangRec" type="hidden" /> <!-- Για την Επισύναπση related lang rec -->
    <!-- main page -->
<div class="admGridFlexCont">
    <div class="admGridRecL editPanel bgContent <?php if(!$showMediaColumn) echo 'full'?>">

        <?php
        // print_r($activeFields);
        foreach ($activeFields as $FieldName => $value) {

            $recField=str_replace("List_","Rat_",$FieldName);
            // echo "$recField";
            // echo $GetRat[$recField];

            if(in_array($recField,$plainTextField) || (strpos($recField, 'Rat_Field') !== false)){ //Plain Text Fields
                editRecField($value['Field_Name'],$recField,$GetRat[$recField],$size,$max,"formField",$info);
            }elseif (in_array($recField,$sizedTextField)) { //Plain Text Fields with custom field size
                editRecField($value['Field_Name'],$recField,$GetRat[$recField],4,4,"formField",$info);
            }elseif (in_array($recField,$textAreaField)) { //Text Areas
                editRecTextArea($value['Field_Name'],$recField,$GetRat[$recField]);
            }elseif (in_array($recField,$textAreaDBField)) { //Text Editors that are stored in DB
                editRecTextEditor($value['Field_Name'],$recField,$GetRat[$recField]);
            }elseif (in_array($recField,$checkBoxField) || (strpos($recField, 'Rat_Check') !== false)) { //Checkboxes
                editRecCheck($value['Field_Name'],$recField,$GetRat[$recField]);
            }elseif (in_array($recField,$scrollField) || (strpos($recField, 'Rat_Scroll') !== false)) { //Scroll Down Fields
                editScrollDown($value['Field_Name'],$recField,$GetRat[$recField],$scrollAttVar,$scrollSectionVar);
            }elseif ((strpos($recField, 'Editor1') !== false)) {//Text Editor 1
                editRecEditor($value['Field_Name'],"Rat_Text1",$GetRat["Rat_Text1"],$curRatText1);
            }elseif ((strpos($recField, 'Editor2') !== false)) {//Text Editor 2
                editRecEditor($value['Field_Name'],"Rat_Text2",$GetRat["Rat_Text2"],$curRatText2);
            }elseif ((strpos($recField, 'EditorMob') !== false)) {//Text Editor Mobile
                editRecEditor($value['Field_Name'],"Rat_TextMob",$GetRat["Rat_TextMob"],$curRecTextMob);
            }elseif ((strpos($recField, 'MultTable') !== false)) { //Attached Tables (MultTable)
                $trimmedField=str_replace("Rat_", "", $recField);
                $multID="List_".$trimmedField."_ID";
                $multName="List_".$trimmedField;
                $multTableID= $GetList[$multID];
                $multTableName= $GetList[$multName];
                editMultTableEditor($value['Field_Name'],$recField,$GetRat[$recField],$trimmedField,$tmpRat_ID,$List_ID,$multTableID,$multTableName);
            }elseif ((strpos($recField, 'Date') !== false)) {//Attached Record Tables
                editDateField($value['Field_Name'],$recField,$GetRat[$recField]);
            }elseif (in_array($recField,$mediaFields) || (strpos($recField, 'Rat_Image') !== false) || (strpos($recField, 'Rat_File') !== false) ||  (strpos($recField, 'Rat_Images') !== false) || (strpos($recField, 'Rat_NoRes_Images') !== false)  || (strpos($recField, 'Rat_Docs') !== false) || (strpos($recField, 'Rat_Docs2') !== false)) { // All Media fields
                $mediaSortedFields[$FieldName]=$value;
            }

        }
        ?>

        <!-- ----------------------------------- -->
        <!-- RELATE RECORD WITH DEFAULT LANG REC -->
        <!-- ----------------------------------- -->
        <?php if (($defaultLang <> $_SESSION["AdminLang"]) && ($_GET['SubCat'] == "")){
        ?>
        <div class="top20 clear"></div>
        <div class="form-group">
            <label class="formLabel"><?php echo $textRelateRecLang; ?></label>
                <a href="../core/related_lang_record.php?Page_Section=<?php echo $Page_Section; ?>&Page_Lang_ID=<?php echo $GetPage['Page_Lang_ID']; ?>&Lang=<?php echo $Lang; ?>" class="popUpWindow cLight bgColor buttonLink" data-width="840" data-height="85%">Select Record</a>
                <?php if ($GetRat['Rat_Rel_LangID'] <> "") { ?>
                <span >[ Exist Rec ID = <strong><?php echo $GetRat['Rat_Rel_LangID']; ?></strong> ]</span>
                <span ><a href="index.php?ID=record_edit&Page_ID=<?php echo $_GET["Page_ID"]; ?>&Rat_ID=<?php echo $_GET["Rat_ID"]; ?>&Lang=<?php echo $Lang; ?>&delRelR=1" class="cLight bgColor buttonLink" title="Unrelate Record">Clear</a></span>
                <?php } ?>
        </div>
        <?php } ?>

        <!-- ------------------ -->
        <!-- META TAGS RECORD -->
        <!-- ------------------ -->
        <div style="clear:both"></div>
        <div class="top20"></div>

        <?php if ($GetList['List_Desc_Meta'] <> "" || $GetList['List_Title_Meta'] <> "") { ?>
            <div class="yellowBox">
                <div class="title">Meta Tags</div>
        <?php }?>
        <?php if ($GetList['List_Title_Meta'] <> "")
        {
        ?>
                <!--    Meta Title  -->
                <div class="form-group">
                    <label class="formLabel"><?php echo $GetList['List_Title_Meta']; ?> <small>characters: <span id="charNumTitle"></span> <em>(70 characters or fewer)</em></small></label>
                    <div class="colInput">
                        <input onkeyup="countCharTitle(this)" type="text" name="Rat_Title_Meta" value="<?php echo htmlspecialchars($GetRat['Rat_Title_Meta']); ?>" class="formField">
                    </div>
                </div>
        <?php } ?>

        <!--    Meta Desc   -->
        <?php if ($GetList['List_Desc_Meta'] <> "")
        {
        ?>
            <!--    Meta Title  -->
            <div class="form-group">
                <label class="formLabel"><?php echo $GetList['List_Desc_Meta']; ?> <small>characters: <span id="charNum"></span> <em>(160 characters or fewer)</em></small></label>
                <div class="colInput">
                    <textarea onkeyup="countChar(this)" name="Rat_Desc_Meta" rows="3" class="formField"><?php echo htmlspecialchars($GetRat['Rat_Desc_Meta']); ?></textarea>
                </div>
            </div>
        <?php } ?>

        <?php if ($GetList['List_Desc_Meta'] <> "" || $GetList['List_Title_Meta'] <> "")
            {
        ?>
            <!--    Canonical   -->
            <div class="form-group">
                <label class="formLabel">Canonical URL</label>
                <div class="colInput">
                    <input type="Text" name="Rat_Canonical_URL" value="<?php echo $GetRat['Rat_Canonical_URL']; ?>" class="formField">
                </div>
            </div>


        <div class="top15 clear"></div>

        <?php } ?>
        <?php if ($GetList['List_Desc_Meta'] <> "" || $GetList['List_Title_Meta'] <> "") { ?>
            </div> <!-- yellow box -->
        <?php }?>





        <div class="clear"></div>
    </div>

    <?php if(!empty($mediaSortedFields)){?>
    <div class="admGridRecR editPanel bgContent">
            <div class="title bgLight borderLight"><h2><i class="fas fa-folder-open"></i> Media Files</h2></div>
            <div class="top20"></div>

        <!-- ------------------ -->
        <!-- SET UP RECORD VIEW -->
        <!-- ------------------ -->
            <div class="blueBox">
            <div class="title">Record View Settings</div>

            <div>
                <div>
                    <div class="form-group">
                        <label class="formLabel">Select & Edit Template</label>
                        <div class="colInput">
                            <?Php
                            //find ListID
                            $GetRatTempListID_Query = q("SELECT * FROM module_rat_templates WHERE RATemp_ID = ".$GetRat["Rat_View"]);
                            $GetRatTempListID = f($GetRatTempListID_Query);

                            $RatTemp_Sel = "SELECT * FROM module_rat_templates Order by RATemp_Name";
                            $RatTemp_Query = q($RatTemp_Sel);

                            ?>
                            <select name="Rat_View" class="formField ">
                                    <option value="1" <?php if ($GetRat['Rat_View'] == '1') echo 'selected'; ?>>-- <?php echo $textSelect; ?> --</option>
                                    <?php while($RatTemp = f( $RatTemp_Query )){ ?>
                                    <option value="<?php echo $RatTemp['RATemp_ID']; ?>" <?php if ($GetRat['Rat_View'] == $RatTemp['RATemp_ID']) echo 'selected'; ?>><?php echo $RatTemp['RATemp_Name']; ?></option>
                                    <?php } ?>
                            </select>
                                <a class="popUpWindow cDefault editBtn"
                            <?php if ($GetRatTempListID['RATemp_ListID'] <> "") { ?>
                                href="../core/module_rat_row_fields_edit.php?RAT_Temp_ID=<?php echo $GetRat['Rat_View']; ?>&ListID=<?php echo $GetRatTempListID['RATemp_ListID']; ?>"
                            <?php } else { ?>
                                href="../core/module_rat_templates_view.php"
                            <?php } ?>
                            data-width="92%" data-height="94%">
                            <i class="fas fa-layer-group"></i> Edit
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            </div>


            <div class="flex">
            <?php
                $sourcePage=array();
                foreach ($mediaSortedFields as $FieldName => $value) {
                    $recField=str_replace("List_","Rat_",$FieldName);
                    $recField=str_replace("Rat_Image","Rat_Image_Resize",$recField);
                    // echo "$recField";
                    if(in_array($recField,$mediaFields)){
                        $trimmedField=str_replace("Rat_Image_Resize", "ResizeRat", $recField);
                        editImageField($value['Field_Name'],$recField,$GetRat[$recField],$trimmedField,$tmpRat_ID);
                        array_push($sourcePage, $trimmedField);
                    }elseif ((strpos($recField, 'Rat_File') !== false)) { //Rec File
                        $trimmedField=str_replace("Rat_", "", $recField);
                        editFileField($value['Field_Name'],$recField,$GetRat[$recField],$trimmedField,$tmpRat_ID);
                        array_push($sourcePage, $trimmedField);
                    }elseif ((strpos($recField, 'Rat_Images') !== false)) { //Photo Gallery
                        editPhotoGalleryField($value['Field_Name'],$recField,$GetRat[$recField],$GetPage,$GetRat,$tmpPageID,$tmpRat_ID);
                    }
                }
            ?>

            </div>
    </div>
<?php }?>
</div>

<!--    buttons -->
<div class="top15 clear"></div>

<div class="adminNav bgLighter borderLight">
    <div class="left" style="width:51%; text-align:right;">
        <input type="submit" name="publish_rec" value="Publish & Exit" class="textBigger bgGreen cLight buttonLink ">
    </div>
    <div class="left" style="width:20%; margin-left:2%;">
        <input type="submit" name="save_rec" value="Save" class="textBigger bgColor cLight buttonLink ">
    </div>

    <?php // Build Preview URL
    $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
    $CheckRecs_Sel = "SELECT * FROM records WHERE Rat_Page_ID = ".$GetRat["Rat_Page_ID"];
    $CheckRecs_Query = q($CheckRecs_Sel);
    if (nr($CheckRecs_Query) == 1) {
        $prevURL = $protocol.$domain."/".$GetVar['Rat_Title'].$GetPage['Page_View']."/preview";
    } else {
        $prevURL = $protocol.$domain."/".$GetVar['Rat_Title'].$GetPage['Page_View']."/".$GetRat['Rat_ID']."/preview";
    }
    ?>

    <!-- <div class="left" style="width:17%; text-align:right;">
        <a href="<?php echo $prevURL; ?>" target="_blank" class="preview">Preview <i class="fas fa-eye"></i></a>
    </div> -->
    <div class="left top8" style="text-align:right;width:27%;">
        <a href="javascript:history.go(-1);" class="cDefault buttonLink"><i class="fas fa-reply"></i> Back</a>
    </div>
    <div style="clear:both;"></div>
</div>

<!-- end of main page -->
</form>

<?php function getCatCambRecursesion($F_id, $F_echoSpaces, $StrGetPageID,$Section){
    $qu = "SELECT * FROM pages WHERE Parent_Page_ID = $F_id AND Page_Lang = '".$_SESSION["AdminLang"]."' AND Page_Section = '$Section' Order by Page_Order";
    $re = q($qu) ;
    while($re_set = f($re)){

    if ($re_set['Parent_Page_ID']==0) {
        $diaxor = str_repeat("&bull; ",$F_echoSpaces);
    } else {
        $diaxor = str_repeat("&nbsp;&nbsp;",$F_echoSpaces);
    }

        $sPageID = $re_set['Page_ID'];
        $sPageName = $re_set['Page_Name'];
        $ParPageID = $re_set['Parent_Page_ID'];
        ?>
        <option value="<?php echo $sPageID;?>" <?php if (isset($sPPageID) && $sPPageID == $sPageID) echo "Selected";?>><?php echo $diaxor.$sPageName; ?></option>
        <?php $qu1 = "select * from pages where Parent_Page_ID=".$re_set["Page_ID"];
        $re1 = q($qu1) ;
        if(nr($re1)>0){
             $echoSpaces =  $F_echoSpaces + 2;
             getCatCambRecursesion($re_set["Page_ID"],$echoSpaces, $StrGetPageID,$Section);
        }
}//end of while
}//end of function getCatCambRecursesion()
?>
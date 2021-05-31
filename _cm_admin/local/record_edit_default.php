<?php
    $GetColumnField_Query = q("show COLUMNS from lists WHERE (Field NOT LIKE '%Order%' OR Field='List_Order') AND Field NOT LIKE '%_ID' AND Field NOT LIKE 'List_Name' AND Field NOT LIKE 'List_Active' AND Field NOT LIKE 'List_RecPage' AND Field NOT LIKE '%_Section' AND Field NOT LIKE '%_Att' AND Field NOT LIKE '%_Type'");
    $activeFields = [];
    $unmovableFields=[];
    $mediaSortedFields=[];

    $mediaFields= ["Rec_Logo","Rec_Logo_Bottom","Rec_Image_Social"];
    $plainTextField = ["Rec_Title","Rec_GeoLocation"];
    $sizedTextField = ["Rec_Order","Rec_Discount","Rec_Weight","Rec_Stock","Rec_Price","Rec_Price2","Rec_Price3"];
    $textAreaField = ["Rec_Desc","Rec_TextArea1","Rec_TextArea2"];
    $textAreaDBField = ["Rec_TextArea3","Rec_TextArea4"];
    $checkBoxField = ["Rec_ShowHome","Rec_HomeRotator","Rec_ShowMore","Rec_HotPrice","Rec_BestSeller","Rec_BestPrice","Rec_BestChoice"];
    $scrollField = ["Rec_Vat","Rec_Availability","Rec_Brand","Rec_Supplier","Rec_CatProduct"];

    $fieldRow = f(q("SELECT * FROM lists WHERE List_ID=$tmpList_ID"));
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
        $recField=str_replace("List_","Rec_",$FieldName);
        if($showMediaColumn) break;
        if (in_array($recField,$mediaFields) || (strpos($recField, 'Rec_Image') !== false) || (strpos($recField, 'Rec_File') !== false) ||  (strpos($recField, 'Rec_Images') !== false) || (strpos($recField, 'Rec_NoRes_Images') !== false)  || (strpos($recField, 'Rec_Docs') !== false) || (strpos($recField, 'Rec_Docs2') !== false)) { // All Media fields
            $showMediaColumn = true;
        }
    }
?>


<div class="topInternalTitle bgLighter <?php if($GetRec['Rec_Active']=='1') echo 'bgInactive'?>">
    <?php headerTitleWithSubCategories()?>
    <div class="gridTitleRight">

        <!--    Enable  -->
        <?php if($GetRec['Rec_Active']=='0'){ ?>
            <a href="index.php?ID=record_edit&Rec_ID=<?php echo($GetRec['Rec_ID']); ?>&Page_ID=<?php echo($GetRec['Rec_Page_ID']); ?>&deactivateRec=deactivate&redirect=false" class='categoriesLink cGreen'><i class="fas fa-toggle-on" title="Deactivate Record"></i> Active</a>
        <?php }else{ ?>
            <a href="index.php?ID=record_edit&Rec_ID=<?php echo($GetRec['Rec_ID']); ?>&Page_ID=<?php echo($GetRec['Rec_Page_ID']); ?>&deactivateRec=activate&redirect=false" title="Activate Record" class='categoriesLink cRed'><i class="fas fa-toggle-off"></i> Inactive</a>
        <?php } ?>

        <?php if (($accAdm['Acc_TempRec'] == 1) OR (Auth::accessLevel() == 0)) { ?>
            <a class="popUpWindow categoriesLink cDefault" href="core/row_fields_edit.php?RTR_Temp_ID=<?php echo $Page_Rec_Temp; ?>&ListID=<?php echo $tmpList_ID; ?>" data-width="92%" data-height="94%"><i class="fas fa-layer-group"></i> Edit Template</a>
        <?php } ?>

        <?php if (($accAdm['Acc_Categories'] == 1) OR (Auth::accessLevel() == 0)) { ?>
            <a href="index.php?ID=pages_edit&Page_ID=<?php echo $tmpPageID; ?>"
               class='categoriesLink cDefault'><i class="fas fa-share"></i> Edit Category</a>
        <?php } ?>

        <?php if (($accAdm['Acc_FieldLists'] == 1) OR (Auth::accessLevel() == 0)) { ?>
            <a href="index.php?ID=lists_edit&List_ID=<?php echo $tmpList_ID; ?>" class='categoriesLink cDefault'><i class="fas fa-share"></i> Edit Field List</a>
        <?php } ?>

        <?php if (($accAdm['Acc_Categories'] == 1) OR (Auth::accessLevel() == 0)) { ?>
            <a href="#" class='categoriesLink cDefault moreToggleBtn'><i class="fas fa-ellipsis-v"></i> More</a>
            <section style="display:none" class="bgLight">
                <ul>
                    <li>
                        <a class="popUpWindow admLink cDefault btn bgLight" href="core/rel_pages_view.php?Rec_ID=<?php echo $GetRec['Rec_ID']; ?>" data-width="92%" data-height="94%">
                        Add to Μultiple Categories</a>
                    </li>
                    <li>
                        <a href="#anch1" onclick="toggle_layer('mylayer_cats2')" class='admLink cDefault btn bgLight'>Change Category</a>
                        <div id="mylayer_cats2" style="display:none;padding:10px 5px;">
                            <!--    Αλλαγή Κατηγορίας που Ανήκει    -->
                            <?php $sPPageID = $tmpPageID; ?>
                            <select name="CatPageID2" class="formField" onchange="$('form.form-horizontal input[name=Page_ID]').val($(this).val());">
                                <option value="0" selected>Move to</option>
                                <?php $GetSections_Sel = "SELECT * FROM sections WHERE Section_Name <> 'socialmedia' AND Section_Name <> 'banners' AND Section_Name <> 'bookonline' AND Section_Name <> 'settings' Order by Section_Order Asc";
                                $GetSections_Query = q($GetSections_Sel);
                                while ($GetSections = f($GetSections_Query)) {
                                    $Section = $GetSections['Section_Name'];
                                    ?>
                                    <option value></option>
                                    <option value class="emphasised cLight bgColor textBigger">&raquo; <?php echo $GetSections['Section_Title']; ?></option>
                                    <?php echo getCatCambRecursesion(0,1,$sPPageID,$Section);
                                }
                                ?>
                            </select>
                            <div class="top10 textCenter">
                            <input type="submit" onclick="$('form.form-horizontal input[name=save_rec]').click()" class="bgGreen cLight buttonLink" value="Move">
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
        <?php }?>


    </div>
</div>

<div class="top30"></div>
<form action="" method="post" class="form-horizontal" name="recSubmit">
    <input type="Hidden" name="selectString" value="<?php echo getparamvalue("selectString"); ?>">
    <input type="Hidden" name="Rec_ID" value="<?php echo $tmpRec_ID; ?>">
    <input type="Hidden" name="Page_ID" value="<?php echo getparamvalue('Page_ID'); ?>">
    <input id="relLangRec" type="hidden" /> <!-- Για την Επισύναπση related lang rec -->
    <!-- main page -->
<div class="admGridFlexCont">
    <div class="admGridRecL editPanel bgContent <?php if(!$showMediaColumn) echo 'full'?>">

        <!--    Enable  -->
        <input type="hidden" name="Rec_Active" value="<?php echo $GetRec['Rec_Active']?>">

        <?php
        foreach ($activeFields as $FieldName => $value) {

            $recField=str_replace("List_","Rec_",$FieldName);
            if($recField=="Rec_Rec_ShowMore")$recField="Rec_ShowMore";

            if(in_array($recField,$plainTextField) || (strpos($recField, 'Rec_Field') !== false)){ //Plain Text Fields
                editRecField($value['Field_Name'],$recField,$GetRec[$recField],$size,$max,"formField",$info);
            }elseif (in_array($recField,$sizedTextField)) { //Plain Text Fields with custom field size
                editRecField($value['Field_Name'],$recField,$GetRec[$recField],4,4,"formField",$info);
            }elseif (in_array($recField,$textAreaField)) { //Text Areas
                editRecTextArea($value['Field_Name'],$recField,$GetRec[$recField]);
            }elseif (in_array($recField,$textAreaDBField)) { //Text Editors that are stored in DB
                editRecTextEditor($value['Field_Name'],$recField,$GetRec[$recField]);
            }elseif (in_array($recField,$checkBoxField) || (strpos($recField, 'Rec_Check') !== false)) { //Checkboxes
                editRecCheck($value['Field_Name'],$recField,$GetRec[$recField]);
            }elseif (in_array($recField,$scrollField) || (strpos($recField, 'Rec_Scroll') !== false)) { //Scroll Down Fields
                $scrollAttVar = $fieldRow[$FieldName."_Att"];
                $scrollSectionVar = $fieldRow[$FieldName."_Section"];
                editScrollDown($value['Field_Name'],$recField,$GetRec[$recField],$scrollAttVar,$scrollSectionVar);
            }elseif ((strpos($recField, 'Editor1') !== false)) {//Text Editor 1
                editRecEditor($value['Field_Name'],"Rec_Text1",$GetRec["Rec_Text1"],$curRecText1);
            }elseif ((strpos($recField, 'Editor2') !== false)) {//Text Editor 2
                editRecEditor($value['Field_Name'],"Rec_Text2",$GetRec["Rec_Text2"],$curRecText2);
            }elseif ((strpos($recField, 'EditorMob') !== false)) {//Text Editor Mobile
                editRecEditor($value['Field_Name'],"Rec_TextMob",$GetRec["Rec_TextMob"],$curRecTextMob);
            }elseif ((strpos($recField, 'MultTable') !== false)) { //Attached Tables (MultTable)
                $trimmedField=str_replace("Rec_", "", $recField);
                $multID="List_".$trimmedField."_ID";
                $multName="List_".$trimmedField;
                $multTableID= $GetList[$multID];
                $multTableName= $GetList[$multName];
                editMultTableEditor($value['Field_Name'],$recField,$GetRec[$recField],$trimmedField,$tmpRec_ID,$tmpList_ID,$multTableID,$multTableName);
            }elseif ((strpos($recField, 'RA') !== false)) { //Attached Records
                $trimmedField=str_replace("Rec_", "", $recField);
                editAttachedRecsEditor($value['Field_Name'],$recField,$GetRec[$recField],$trimmedField,$tmpRec_ID);
            }elseif ((strpos($recField, 'Rat') !== false)) {//Attached Record Tables
                $trimmedField=str_replace("Rec_", "", $recField);
                $ratID="List_".$trimmedField."_ID";
                $ratTableID= $GetList[$ratID];
                editAttachedRecsTableEditor($value['Field_Name'],$recField,$GetRec[$recField],$trimmedField,$tmpRec_ID,$ratTableID);
            }elseif ((strpos($recField, 'Date') !== false)) {//Attached Record Tables
                if($recField=="Rec_StartDate") $recField = "Rec_DateStart";
                if($recField=="Rec_EndDate") $recField = "Rec_DateStop";
                editDateField($value['Field_Name'],$recField,$GetRec[$recField]);
            }elseif (in_array($recField,$mediaFields) || (strpos($recField, 'Rec_Image') !== false) || (strpos($recField, 'Rec_File') !== false) ||  (strpos($recField, 'Rec_Images') !== false) || (strpos($recField, 'Rec_NoRes_Images') !== false)  || (strpos($recField, 'Rec_Docs') !== false) || (strpos($recField, 'Rec_Docs2') !== false)) { // All Media fields
                $mediaSortedFields[$FieldName]=$value;
            }

        }
        ?>

        <!-- ----------------------------------- -->
        <!-- RELATE RECORD WITH DEFAULT LANG REC -->
        <!-- ----------------------------------- -->
        <?php if ($GetVar['Rec_Scroll1'] <> $_SESSION["AdminLang"]){
        ?>
        <div class="top40 clear"></div>
        <div class="form-group">
            <label class="formLabel"><?php echo $textRelateRecLang; ?></label>
                <a href="core/related_lang_record.php?Page_Section=<?php echo $Page_Section; ?>&Page_Lang_ID=<?php echo $GetPage['Page_Lang_ID']; ?>&Lang=<?php echo $Lang; ?>&Rec_ID=<?php echo $_GET["Rec_ID"]; ?>" class="popUpWindow cLight bgColor buttonLink" data-width="840" data-height="85%">Select Record</a>
                <?php if ($GetRec['Rec_Rel_LangID'] <> "") { ?>
                <span >[ Exist Rec ID = <strong><?php echo $GetRec['Rec_Rel_LangID']; ?></strong> ]</span>
                <span ><a href="index.php?ID=record_edit&Page_ID=<?php echo $_GET["Page_ID"]; ?>&Rec_ID=<?php echo $_GET["Rec_ID"]; ?>&Lang=<?php echo $Lang; ?>&delRelR=1" class="cLight bgColor buttonLink" title="Unrelate Record">Clear</a></span>
                <?php } ?>
        </div>
        <?php } ?>

        <!-- ------------------ -->
        <!-- SET UP RECORD VIEW -->
        <!-- ------------------ -->
        <?php if (($GetList['List_Rec_View'] <> "") OR ($GetList['List_Rec_Lists_View'] <> ""))
        {
        ?>
        <div class="top30 clear"></div>
        <div class="blueBox">
            <div class="title"><?php print $textDescrLayout; ?></div>

            <div class="admGrid2Cols">
                <div>
                    <!--    List_Rec_View   -->
                    <?php if ($GetList['List_Rec_View'] <> "")
                        {
                    ?>
                    <div class="form-group">
                        <label class="formLabel"><?php echo $GetList['List_Rec_View']; ?></label>
                        <div class="colInput">
                            <?Php
                            //find ListID
                            $GetRecTempListID_Sel = "SELECT * FROM rec_templates WHERE RTemp_ID = ".$GetRec["Rec_View"];
                            $GetRecTempListID_Query = q($GetRecTempListID_Sel);
                            $GetRecTempListID = f($GetRecTempListID_Query);

                            $RecTemp_Sel = "SELECT * FROM rec_templates Order by RTemp_Name";
                            $RecTemp_Query = q($RecTemp_Sel);
                            ?>
                            <select name="Rec_View" class="formField ">
                                    <option value="1" <?php if ($GetRec['Rec_View'] == '1') echo 'selected'; ?>>-- <?php echo $textSelect; ?> --</option>
                                    <?php while($RecTemp = f( $RecTemp_Query )){ ?>
                                    <option value="<?php echo $RecTemp['RTemp_ID']; ?>" <?php if ($GetRec['Rec_View'] == $RecTemp['RTemp_ID']) echo 'selected'; ?>><?php echo $RecTemp['RTemp_Name']?></option>
                                    <?php } ?>
                            </select>
                                <a class="popUpWindow cDefault editBtn"
                            <?php if ($GetRecTempListID['RTemp_ListID'] <> "") { ?>
                                href="core/row_fields_edit.php?RTR_Temp_ID=<?php echo $GetRec['Rec_View']; ?>&ListID=<?php echo $GetRecTempListID['RTemp_ListID']; ?>"
                            <?php } else { ?>
                                href="rec_templates_view"
                            <?php } ?>
                            data-width="92%" data-height="94%">
                            <i class="fas fa-layer-group"></i> Edit
                            </a>
                        </div>
                    </div>

                    <?php } else { ?>
                    <input type="Hidden" name="Rec_View" value="<?php echo $GetRec['Rec_View']; ?>">
                    <?php } ?>
                </div>

                <div>
                    <!--    List_Rec_View_Mob   -->
                    <?php if ($GetList['List_Rec_View_Mob'] <> "")
                        {
                    ?>
                    <div class="form-group">
                        <label class="formLabel"><?php echo $GetList['List_Rec_View_Mob']; ?></label>
                        <div class="colInput">
                            <?Php

                            //find ListID
                            $GetRecTempListID_Sel = "SELECT * FROM rec_templates WHERE RTemp_ID = ".$GetRec["Rec_View_Mob"];
                            $GetRecTempListID_Query = q($GetRecTempListID_Sel);
                            $GetRecTempListID = f($GetRecTempListID_Query);

                            $RecTemp_Sel = "SELECT * FROM rec_templates Order by RTemp_Name";
                            $RecTemp_Query = q($RecTemp_Sel);
                            ?>
                            <select name="Rec_View_Mob" class="formField ">
                                    <option value="1" <?php if ($GetRec['Rec_View_Mob'] == '1') echo 'selected'; ?>>-- <?php echo $textSelect; ?> --</option>
                                    <?php while($RecTemp = f( $RecTemp_Query )){ ?>
                                    <option value="<?php echo $RecTemp['RTemp_ID']; ?>" <?php if ($GetRec['Rec_View_Mob'] == $RecTemp['RTemp_ID']) echo 'selected'; ?>><?php echo $RecTemp['RTemp_Name']?></option>
                                    <?php } ?>
                            </select>
                                <a class="popUpWindow cDefault editBtn"
                            <?php if ($GetRecTempListID['RTemp_ListID'] <> "") { ?>
                                href="core/row_fields_edit.php?RTR_Temp_ID=<?php echo $GetRec['Rec_View_Mob']; ?>&ListID=<?php echo $GetRecTempListID['RTemp_ListID']; ?>"
                            <?php } else { ?>
                                href="core/rec_templates_view.php"
                            <?php } ?>
                             data-width="92%" data-height="94%">
                            <i class="fas fa-layer-group"></i> Edit</a>
                        </div>
                    </div>

                    <?php } else { ?>
                    <input type="Hidden" name="Rec_View_Mob" value="<?php echo $GetRec['Rec_View_Mob']; ?>">
                    <?php } ?>
                </div>

                <div>
                    <!--    List_Rec_Lists_View -->
                    <?php if ($GetList['List_Rec_Lists_View'] <> "")
                        {
                    ?>
                    <div class="form-group">
                        <label class="formLabel"><?php echo $GetList['List_Rec_Lists_View']; ?></label>
                        <div class="colInput">
                            <?Php
                            $RecListsTemp_Sel = "SELECT * FROM lists_templates Order by LTemp_Name Asc";
                            $RecListsTemp_Query = q($RecListsTemp_Sel);
                            ?>
                            <select name="Rec_Lists_View" class="formField ">
                                <option value="0" selected>Select a different Lists View &nbsp;</option>
                                <?php
                                while($RecListsTemp = f($RecListsTemp_Query)){ ?>
                                <option value="<?php echo $RecListsTemp['LTemp_ID']; ?>" <?php if ($GetRec['Rec_Lists_View'] == $RecListsTemp['LTemp_ID']) echo 'selected'; ?>><?php echo $RecListsTemp['LTemp_Name']; ?></option>
                                <?php } ?>
                            </select>
                            <a class="popUpWindow cDefault editBtn" href="core/lists_row_fields_edit.php?LTR_Temp_ID=<?php echo $GetRec['Rec_Lists_View']; ?>&ListID=<?php echo $tmpList_ID; ?>" data-width="92%" data-height="94%">
                            <i class="fas fa-layer-group"></i> Edit</a>
                        </div>
                    </div>
                    <?php } else { ?>
                        <input type="Hidden" name="Rec_Lists_View" value="<?php echo $GetRec['Rec_Lists_View']; ?>">
                    <?php } ?>
                </div>

                <div>
                    <!--    List_Rec_Lists_View_Mob -->
                    <?php if ($GetList['List_Rec_Lists_View_Mob'] <> "")
                        {
                    ?>
                    <div class="form-group">
                        <label class="formLabel"><?php echo $GetList['List_Rec_Lists_View_Mob']; ?></label>
                        <div class="colInput">
                            <?Php
                            $RecListsTemp_Sel = "SELECT * FROM lists_templates Order by LTemp_Name Asc";
                            $RecListsTemp_Query = q($RecListsTemp_Sel);
                            ?>
                            <select name="Rec_Lists_View_Mob" class="formField ">
                                <option value="0" selected>Select a different Lists View &nbsp;</option>
                                <?php
                                while($RecListsTemp = f($RecListsTemp_Query)){ ?>
                                <option value="<?php echo $RecListsTemp['LTemp_ID']; ?>" <?php if ($GetRec['Rec_Lists_View_Mob'] == $RecListsTemp['LTemp_ID']) echo 'selected'; ?>><?php echo $RecListsTemp['LTemp_Name']; ?></option>
                                <?php } ?>
                            </select>
                            <a class="popUpWindow cDefault editBtn" href="core/lists_row_fields_edit.php?LTR_Temp_ID=<?php echo $GetRec['Rec_Lists_View_Mob']; ?>&ListID=<?php echo $tmpList_ID; ?>" data-width="92%" data-height="94%">
                            <i class="fas fa-layer-group"></i> Edit</a>
                        </div>
                    </div>
                    <?php } else { ?>
                    <input type="Hidden" name="Rec_Lists_View_Mob" value="<?php echo $GetRec['Rec_Lists_View_Mob']; ?>">
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php } else { ?>
            <input type="Hidden" name="Rec_View" value="<?php echo $GetRec['Rec_View']; ?>">
            <input type="Hidden" name="Rec_Lists_View" value="<?php echo $GetRec['Rec_Lists_View']; ?>">
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
                        <input onkeyup="countCharTitle(this)" type="text" name="Rec_Title_Meta" value="<?php echo htmlspecialchars($GetRec['Rec_Title_Meta']); ?>" class="formField">
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
                    <textarea onkeyup="countChar(this)" name="Rec_Desc_Meta" rows="3" class="formField"><?php echo htmlspecialchars($GetRec['Rec_Desc_Meta']); ?></textarea>
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
                    <input type="Text" name="Rec_Canonical_URL" value="<?php echo $GetRec['Rec_Canonical_URL']; ?>" class="formField">
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
            <div class="flex">
            <?php
                $sourcePage=array();
                foreach ($mediaSortedFields as $FieldName => $value) {
                    $recField=str_replace("List_","Rec_",$FieldName);
                    if(in_array($recField,$mediaFields)){ //Logo,Logo_Bottom,Social Image
                        $trimmedField=str_replace("Rec_", "", $recField);
                        editImageField($value['Field_Name'],$recField,$GetRec[$recField],$trimmedField,$tmpRec_ID);
                        if($trimmedField=="Logo_Bottom") $trimmedField="LogoFooter";
                        if($trimmedField=="Image_Social") $trimmedField="Social";
                        array_push($sourcePage, $trimmedField);
                    }elseif ((strpos($recField, 'Rec_Image') !== false) && $recField!="Rec_Images") { // Rec Image1-6
                        $trimmedField=str_replace("Rec_", "", $recField);
                        editImageField($value['Field_Name'],$recField,$GetRec[$recField],$trimmedField,$tmpRec_ID);
                        array_push($sourcePage, $trimmedField);
                    }elseif ((strpos($recField, 'Rec_File') !== false)) { //Rec File
                        $trimmedField=str_replace("Rec_", "", $recField);
                        editFileField($value['Field_Name'],$recField,$GetRec[$recField],$trimmedField,$tmpRec_ID);
                        array_push($sourcePage, $trimmedField);
                    }elseif ((strpos($recField, 'Rec_Docs') !== false)) { // Doc Gallery
                        $trimmedField=str_replace("Rec_", "", $recField);
                        editDocGalleryField($value['Field_Name'],$recField,$GetRec[$recField],$trimmedField,$tmpRec_ID);
                    }elseif ((strpos($recField, 'Rec_Images') !== false)) { //Photo Gallery
                        editPhotoGalleryField($value['Field_Name'],$recField,$GetRec[$recField],$GetPage,$GetRec,$tmpPageID,$tmpRec_ID);
                    }elseif ((strpos($recField, 'Rec_NoRes_Images') !== false)) { //Photo Gallery NR
                        editNRPhotoGalleryField($value['Field_Name'],$recField,$GetRec[$recField],$GetPage,$GetRec,$tmpPageID,$Page_Section,$tmpRec_ID);
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
    $CheckRecs_Sel = "SELECT * FROM records WHERE Rec_Page_ID = ".$GetRec["Rec_Page_ID"];
    $CheckRecs_Query = q($CheckRecs_Sel);
    if (nr($CheckRecs_Query) == 1) {
        $prevURL = $protocol.$domain."/".$GetVar['Rec_Title'].$GetPage['Page_View']."/preview";
    } else {
        $prevURL = $protocol.$domain."/".$GetVar['Rec_Title'].$GetPage['Page_View']."/".$GetRec['Rec_ID']."/preview";
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
        <?php $qu1 = "select * from pages where Parent_Page_ID=".$re_set["Page_ID"] ;
        $re1 = q($qu1) ;
        if(nr($re1)>0){
             $echoSpaces =  $F_echoSpaces + 2;
             getCatCambRecursesion($re_set["Page_ID"],$echoSpaces, $StrGetPageID,$Section);
        }
}//end of while
}//end of function getCatCambRecursesion()
?>
<script>
    function countCharTitle(val) {
        var len = val.value.length;
        $('#charNumTitle').text(len);
    }
    ;
    function countChar(val) {
        var len = val.value.length;
        $('#charNum').text(len);
    }
    ;
</script>

<?php

require_once("init.php");
require_once($routes["convert_case_text.php"]);
require_once($routes["functions_fields.php"]);

$Page_ID = $_GET["Page_ID"];
$Page_Section = $_SESSION['AdminSection'];

$GetSection_Sel = "SELECT Section_Title FROM sections WHERE Section_Name = '".$_SESSION["AdminSection"]."'";
$GetSection_Query = q($GetSection_Sel);
$GetSection = f($GetSection_Query);

$sel = "SELECT * FROM pages_settings WHERE SET_Page_ID = $Page_ID";
$re = q($sel);
$Page_Settings_Rec = f($re);

$global_settings_sel = "SELECT * FROM pages_settings WHERE PS_ID = 1";
$global_settings_re = q($global_settings_sel);
$Global_Settings_Rec = f($global_settings_re);


if (getparamvalue("writeform") == 'write_ok') {
    // CHANGE CATEGORY
    // ***************
    // Ean mia subcategories tin orisoume os kentriki tha prepei to Page_Header_Flag = 1 alios tha exfanistei apo tin emfanisi
    // check if Parent_Page_ID is numeric
    $Parent_Page_ID = getparamvalue("Parent_Page_ID");
    if (is_numeric($Parent_Page_ID)) {
        // Find Section
        if ($Parent_Page_ID > 0) $ppID = $Parent_Page_ID; else $ppID = $Page_ID;
        $GetSectionFromPage_Sel = "SELECT * FROM pages WHERE Page_ID = $ppID";
        $GetSectionFromPage_Query = q($GetSectionFromPage_Sel);
        $GetSectionFromPage = f($GetSectionFromPage_Query);
        $NewPage_Section = $GetSectionFromPage['Page_Section'];
        // Check if Section has change
        if ($_SESSION['AdminSection'] <> $NewPage_Section) {
            $Page_Section = $NewPage_Section;
        }
        // Change all sub categories section name
        $upp = "
		UPDATE pages SET
			Page_Section = '$Page_Section'
			WHERE Parent_Page_ID = \"$Page_ID\"
		";
        q($upp);

    } else {
        $Page_Section = $Parent_Page_ID; // select Section from drop down categories
        $Parent_Page_ID = 0;
        // Change all sub categories section name
        $upp = "
		UPDATE pages SET
			Page_Section = '$Page_Section'
			WHERE Parent_Page_ID = \"$Page_ID\"
		";
        q($upp);
    }

    if (getparamvalue("Parent_Page_ID") == 0) {
        $Page_Header_Flag = 1;
        if (getparamvalue("Page_Header") == "") $_POST["Page_Header"] = "default"; //Ean apo mesa level pao mia katigoria level 0 (header) tote orizoume to page_header = default
        //$Page_Header = "default";
    } else {
        if (getparamvalue("headerflag") <> '')
            $Page_Header_Flag = '1';
    }

    // END OF Parent_Page_ID

    $Page_Name = str_replace("'", "&acute;", getparamvalue('Page_Name'));
    $Page_Name = str_replace('"', "&#8221;", $Page_Name);

    $Page_Name_Print = str_replace("'", "&acute;", getparamvalue('Page_Name_Print'));
    $Page_Name_Print = str_replace('"', "&#8221;", $Page_Name_Print);

    $Page_Meta_Title = str_replace("'", "&acute;", getparamvalue('Page_Meta_Title'));
    $Page_Meta_Title = str_replace('"', "&#8221;", $Page_Meta_Title);

    $Page_Meta_Desc = str_replace("'", "&acute;", getparamvalue('Page_Meta_Desc'));
    $Page_Meta_Desc = str_replace('"', "&#8221;", $Page_Meta_Desc);

    $Page_ID = getparamvalue("Page_ID");
    //$Parent_Page_ID = getparamvalue("Parent_Page_ID");
    //$Page_Section = $_SESSION['AdminSection'];
    $Page_Lang = getparamvalue("Page_Lang");
    $Page_Lang_ID = getparamvalue("Page_Lang_ID");
    $Page_List_ID = getparamvalue("Page_List_ID");
    $Page_View = getparamvalue("Page_View");
    $Page_Canonical_URL = getparamvalue("Page_Canonical_URL");
    $Page_No_Index = getparamvalue("Page_No_Index");
    $Page_No_Follow = getparamvalue("Page_No_Follow");
    $Page_HeadLists_Flag = getparamvalue("Page_HeadLists_Flag");
    $Page_Show_TopLinks = getparamvalue("Page_Show_TopLinks");
    $Page_Authorized = getparamvalue("Page_Authorized");
    $Page_MemAccess = getparamvalue("Page_MemAccess");
    $Page_Synchronize = getparamvalue("Page_Synchronize");
    $Page_Order = getparamvalue("Page_Order");
    $Page_Num_Recs = getparamvalue("Page_Num_Recs");
    if($Page_Num_Recs=="1") $Page_Num_Recs = "999";
    $Page_Content = getparamvalue("Page_Content");
    $Page_Type = getparamvalue("Page_Type");
    $Page_HeadLists_Temp = getparamvalue("Page_HeadLists_Temp");
    $Page_Lists_Temp = getparamvalue("Page_Lists_Temp");
    $Page_Lists_Temp2 = getparamvalue("Page_Lists_Temp2");
    $Page_Rec_Temp = getparamvalue("Page_Rec_Temp");
    $Page_Html = getparamvalue("Page_Html");
    $Page_Meta_Keywords = getparamvalue("Page_Meta_Keywords");
    $Page_Meta_SocialDesc = getparamvalue("Page_Meta_SocialDesc");
    $Page_SMPriority = getparamvalue("Page_SMPriority");
    $Page_GenVar = getparamvalue("Page_GenVar");
    $Page_GenVar2 = getparamvalue("Page_GenVar2");
    $Page_GenVar3 = getparamvalue("Page_GenVar3");
    $Page_Special_Group = getparamvalue("Page_Special_Group");
    $Page_StartLangID = getparamvalue("Page_StartLangID");
    $Page_GetFromSection = getparamvalue("Page_GetFromSection");
    $Page_OrderBy = getparamvalue("Page_OrderBy");
    $Page_SortBy = getparamvalue("Page_SortBy");
    $Page_MenuLines = getparamvalue("Page_MenuLines");
    $Page_Header = getparamvalue("Page_Header");
    $Page_ImgCat_Hid = getparamvalue("Page_ImgCat_Hid");
    $Page_Style_ID = getparamvalue("Page_Style_ID");
    $Page_Styles_Links = getparamvalue("Page_Styles_Links");
    $Page_Temp_ID = getparamvalue("Page_Temp_ID");
    $Page_RecTemp_ID = getparamvalue("Page_RecTemp_ID");
    $Page_RecStyle_ID = getparamvalue("Page_RecStyle_ID");
    $Page_Type_Mob = getparamvalue("Page_Type_Mob");
    $Page_Order_Mob = getparamvalue("Page_Order_Mob");
    $Page_Lists_Mob = getparamvalue("Page_Lists_Mob");
    $Page_Lists_Mob2 = getparamvalue("Page_Lists_Mob2");
    $Page_HeadLists_Mob = getparamvalue("Page_HeadLists_Mob");
    $Page_Rec_Mob = getparamvalue("Page_Rec_Mob");
    $Page_Style_ID_Mob = getparamvalue("Page_Style_ID_Mob");
    $Page_Styles_Links_Mob = getparamvalue("Page_Styles_Links_Mob");
    $Page_Temp_ID_Mob = getparamvalue("Page_Temp_ID_Mob");
    $Page_BanArea1 = getparamvalue("Page_BanArea1");
    $Page_BanArea2 = getparamvalue("Page_BanArea2");
    $Page_BanArea3 = getparamvalue("Page_BanArea3");
    $Page_BanArea4 = getparamvalue("Page_BanArea4");
    $Page_BanArea5 = getparamvalue("Page_BanArea5");

    if (getparamvalue("Page_HeadLists_Flag") <> '')
        $Page_HeadLists_Flag = '1';
    if (getparamvalue("enable") <> '')
        $Page_Enable = '1';
    if (getparamvalue("Page_Show_SubMenu") <> '')
        $Page_Show_SubMenu = '1';
    if (getparamvalue("Page_Show_TopLinks") <> '')
        $Page_Show_TopLinks = '1';
    if (getparamvalue("Page_Show_Bottom") <> '')
        $Page_Show_Bottom = '1';
    if (getparamvalue("Page_Special_Group") <> '')
        $Page_Special_Group = '1';
    if (getparamvalue("active") <> '')
        $Page_Active = '1';
    if (getparamvalue("mobenable") <> '')
        $Page_Mob_Enable = '1';
    if (getparamvalue("Page_XMLSiteMap") <> '')
        $Page_XMLSiteMap = '1';
    if (getparamvalue("Page_Authorized") <> '')
        $Page_Authorized = '1';
    if (getparamvalue("Page_Synchronize") <> '')
        $Page_Synchronize = '1';
    if (getparamvalue("Page_No_Index") <> '')
        $Page_No_Index = '1';
    if (getparamvalue("Page_No_Follow") <> '')
        $Page_No_Follow = '1';

    // Ελέγχει αν έχει αλλάξει το Record View - Αν ναι to αλλάζει σε όλα τα records AND check box BulkPageRecTemp =  1
    if (getparamvalue('BulkPageRecTemp') == 1) {
        $upr = "
				UPDATE records
				SET Rec_View = getparamvalue(Page_Rec_Temp)
				WHERE Rec_Page_ID = $Page_ID
			";
        q($upr);
    }

    $upp = "
			UPDATE pages
				SET
				Parent_Page_ID = '$Parent_Page_ID',
				Page_Section = '$Page_Section',
				Page_Lang = '$Page_Lang',
				Page_Lang_ID = '$Page_Lang_ID',
				Page_Name = '$Page_Name',
				Page_Name_Print = '$Page_Name_Print',
				Page_List_ID = '$Page_List_ID',
				Page_View = '$Page_View',
				Page_Canonical_URL = '$Page_Canonical_URL',
				Page_No_Index = '$Page_No_Index',
				Page_No_Follow = '$Page_No_Follow',
				Page_Order = '$Page_Order',
				Page_Num_Recs = '$Page_Num_Recs',
				Page_Content = '$Page_Content',
				Page_Type = '$Page_Type',
				Page_HeadLists_Temp = '$Page_HeadLists_Temp',
				Page_HeadLists_Flag = '$Page_HeadLists_Flag',
				Page_Lists_Temp = '$Page_Lists_Temp',
				Page_Lists_Temp2 = '$Page_Lists_Temp2',
				Page_Rec_Temp = '$Page_Rec_Temp',
				Page_Html = '$Page_Html',
				Page_Meta_Title = '$Page_Meta_Title',
				Page_Meta_Desc = '$Page_Meta_Desc',
				Page_Meta_Keywords = '$Page_Meta_Keywords',
				Page_Meta_SocialDesc = '$Page_Meta_SocialDesc',
				Page_XMLSiteMap = '$Page_XMLSiteMap',
				Page_SMPriority = '$Page_SMPriority',
				Page_GenVar = '$Page_GenVar',
				Page_GenVar2 = '$Page_GenVar2',
				Page_GenVar3 = '$Page_GenVar3',
				Page_Special_Group = '$Page_Special_Group',
				Page_StartLangID = '$Page_StartLangID',
				Page_GetFromSection = '$Page_GetFromSection',
				Page_OrderBy = '$Page_OrderBy',
				Page_SortBy = '$Page_SortBy',
				Page_MenuLines = '$Page_MenuLines',
				Page_Enable = '$Page_Enable',
				Page_Show_SubMenu = '$Page_Show_SubMenu',
				Page_Show_TopLinks = '$Page_Show_TopLinks',
				Page_Show_Bottom = '$Page_Show_Bottom',
				Page_Active = '$Page_Active',
				Page_Header_Flag = '$Page_Header_Flag',
				Page_Header = '$Page_Header',
				Page_ImgCat_Hid = '$Page_ImgCat_Hid',
				Page_Style_ID = '$Page_Style_ID',
				Page_Styles_Links = '$Page_Styles_Links',
				Page_Temp_ID = '$Page_Temp_ID',
				Page_RecTemp_ID = '$Page_RecTemp_ID',
				Page_RecStyle_ID = '$Page_RecStyle_ID',
				Page_Mob_Enable = '$Page_Mob_Enable',
				Page_Type_Mob = '$Page_Type_Mob',
				Page_Order_Mob = '$Page_Order_Mob',
				Page_Lists_Mob = '$Page_Lists_Mob',
				Page_Lists_Mob2 = '$Page_Lists_Mob2',
				Page_HeadLists_Mob = '$Page_HeadLists_Mob',
				Page_Rec_Mob = '$Page_Rec_Mob',
				Page_Style_ID_Mob = '$Page_Style_ID_Mob',
				Page_Styles_Links_Mob = '$Page_Styles_Links_Mob',
				Page_Temp_ID_Mob = '$Page_Temp_ID_Mob',
				Page_Authorized = '$Page_Authorized',
                Page_MemAccess = '$Page_MemAccess',
                Page_Synchronize = '$Page_Synchronize',
				Page_BanArea1 = '$Page_BanArea1',
				Page_BanArea2 = '$Page_BanArea2',
				Page_BanArea3 = '$Page_BanArea3',
				Page_BanArea4 = '$Page_BanArea4',
				Page_BanArea5 = '$Page_BanArea5'
			WHERE Page_ID = \"$Page_ID\"
		";
    q($upp);


    //ΠΡΟΣΘΗΚΗ ΠΟΛΛΑΠΛΩΝ ΚΑΤΗΓΟΡΙΩΝ
    for ($i = 1; $i <= 10; $i++) {
        $PageName = "Page_Name" . $i;
        $PageOrder = $Page_Order + $i;
        if (getparamvalue($PageName) <> "") {
            $NewPageName = str_replace("'", "&#39;", getparamvalue($PageName));
            $string = generateString($numAlpha = 8, $numNonAlpha = 8);

            $GetLP_Sel = "SELECT * FROM pages WHERE Page_ID = $Page_ID";
            $GetLP_Query = q($GetLP_Sel);
            $GetLP = f($GetLP_Query);

            $mulPageFields_Sel = "SHOW COLUMNS FROM pages";
            $mulPageFields_Query = q($mulPageFields_Sel);
            $fci = 0;
            while ($mulPageFields = f($mulPageFields_Query)) {
                $colName = $mulPageFields['Field'];
                $value = $GetLP[$colName];

                if ($colName == "Page_Name") $value = $NewPageName;
                if ($colName == "Page_Order") $value = $PageOrder;
                if ($colName == "Page_View") $value = $string;
                if ($colName == "Page_Section") $value = $_SESSION["AdminSection"];
                if ($colName == "Page_Lang") $value = $_SESSION["AdminLang"];

                if ($fci <> (nr($mulPageFields_Query)-1)) $comma = ","; else $comma = "";
                $insertStr .= "`".$colName."`".$comma;
                if ($fci == 0) $valueStr .= "'',"; else $valueStr .= "'".$value."'".$comma;
                $fci ++;
            }

            $qu = "INSERT INTO `pages` ( $insertStr )
                VALUES ( $valueStr
                )";
            q($qu);
            $insertStr = "";
            $valueStr = "";
        }
    } // FOR


    //category settings
    $Set_List_DivClass = getparamvalue("Set_List_DivClass");
    $Set_Item_DivClass = getparamvalue("Set_Item_DivClass");
    $Set_List_NumRecs = getparamvalue("Set_List_NumRecs");
    $Set_Site_Name = getparamvalue("Set_Site_Name");
    $Set_Div_GridGallery = getparamvalue("Set_Div_GridGallery");
    $Set_Div_GridGalleryItem = getparamvalue("Set_Div_GridGalleryItem");
    $Set_MaxPhotos = getparamvalue("Set_MaxPhotos");
    $Set_MobMaxPhotos = getparamvalue("Set_MobMaxPhotos");
    $PS_ID = $Page_Settings_Rec['PS_ID'];

    $all_page_settings = $Set_List_DivClass.$Set_Item_DivClass.$Set_List_NumRecs.$Set_Site_Name.$Set_Div_GridGallery.$Set_Div_GridGalleryItem.$Set_MaxPhotos.$Set_MobMaxPhotos;
    $updated_page_settings = false;

    if($all_page_settings!="" && !is_null($Page_Settings_Rec)){
        //update settings

        $upd = "
             UPDATE `pages_settings` SET `Set_Page_ID` = '$Page_ID',
             `Set_Site_Name` = '$Set_Site_Name',
             `Set_List_DivClass` = '$Set_List_DivClass',
             `Set_Item_DivClass` = '$Set_Item_DivClass',
             `Set_Div_GridGallery` = '$Set_Div_GridGallery',
             `Set_Div_GridGalleryItem` = '$Set_Div_GridGalleryItem',
             `Set_MaxPhotos` = '$Set_MaxPhotos',
             `Set_MobMaxPhotos` = '$Set_MobMaxPhotos',
             `Set_List_NumRecs` = '$Set_List_NumRecs'
             WHERE `pages_settings`.`PS_ID` = $PS_ID LIMIT 1 ;";

        q($upd);

        $updated_page_settings = true;

    }else if($all_page_settings!="" && is_null($Page_Settings_Rec)){
        //create settings

        if(empty($Set_MaxPhotos)) $Set_MaxPhotos = $Global_Settings_Rec['Set_MaxPhotos'];
        if(empty($Set_MobMaxPhotos)) $Set_MobMaxPhotos = $Global_Settings_Rec['Set_MobMaxPhotos'];
        if(empty($Set_List_NumRecs)) $Set_List_NumRecs = $Global_Settings_Rec['Set_List_NumRecs'];

        $qu = "INSERT INTO pages_settings (`Set_Page_ID` ,`Set_Site_Name`,`Set_List_DivClass` ,`Set_Item_DivClass` , `Set_List_NumRecs` ,`Set_Div_GridGallery`,`Set_Div_GridGalleryItem`,`Set_MaxPhotos`,`Set_MobMaxPhotos` )
            VALUES ('$Page_ID', '$Set_Site_Name', '$Set_List_DivClass', '$Set_Item_DivClass', '$Set_List_NumRecs','$Set_Div_GridGallery','$Set_Div_GridGalleryItem','$Set_MaxPhotos','$Set_MobMaxPhotos')";

        q($qu);

        $updated_page_settings = true;

    }else if($all_page_settings=="" && !is_null($Page_Settings_Rec)){
        //delete settings

        $qu = "DELETE FROM pages_settings WHERE PS_ID = $PS_ID LIMIT 1";
        q($qu);

        $updated_page_settings = true;

    }

    if($updated_page_settings){
        //update page settings var with new values
        $sel = "SELECT * FROM pages_settings WHERE SET_Page_ID = $Page_ID";
        $re = q($sel);
        $Page_Settings_Rec = f($re); 
    }

    // end category settings



    if(getparamvalue('publish_rec') <> ""){ //if publish & exit
    ?>
    <script language="JavaScript">
         window.location = "index.php?ID=pages_view";
    </script>
<?php
    }//end if publish & exit
} ?>

<?php
$GetPage_Sel = "SELECT * FROM pages WHERE Page_ID = \"$Page_ID\"";
$GetPage_Query = q($GetPage_Sel);
$GetPage = f($GetPage_Query);

$Select_List = "SELECT * FROM lists WHERE List_Active = 1 ORDER BY List_Name";
$Select_List_q = q($Select_List);

$Select_List_Page = "SELECT * FROM lists ORDER BY List_Name";
$Select_List_Page_q = q($Select_List_Page);

$Select_Lang = "SELECT * FROM lang";
$Select_Lang_q = q($Select_Lang);

$CurList_Sel = "SELECT * FROM pages WHERE Page_ID = $Page_ID";
$CurList_Query = q($CurList_Sel);
$CurList = f($CurList_Query);
?>


<div class="width100">
    <div class="topInternalTitle bgLighter">
        <h2><span class="cMedium"><i class="fas fa-pen"></i></span> <span class="cMedium"><small><?php echo $GetSection['Section_Title'];?> ></small></span> <?php echo $textEditCateg; ?></h2>
        <div class="gridTitleRight">
            <?php if((Auth::accessLevel() == 0)){?>
                <a href="index.php?ID=record_view&Page_ID=<?php echo $_GET['Page_ID']; ?>" class="categoriesLink cDefault"><i class="fas fa-share"></i> Records</a>
                <a href="index.php?ID=lists_edit&List_ID=<?php echo $CurList['Page_List_ID']; ?>" class="categoriesLink cDefault"><i class="fas fa-share"></i> Edit Field List</a>
            <?php }?>
        </div>
    </div>

    <div class="top30 clear"></div>

    <form action="" name="editForm" method="post">
        <input type="Hidden" name="Page_ID" value="<?php echo $GetPage["Page_ID"]; ?>">
        <input type="Hidden" name="writeform" value="write_ok">
        <input type="Hidden" name="Page_Order" value="<?php echo $GetPage['Page_Order']; ?>">

        <div class='admGridFlexCont'>

            <div class='admGridCatL'>

                <div class="form-group">
                    <label class="formLabel"><?php print $textTitle; ?></label>
                    <div class="colInput">
                        <input type="text" name="Page_Name" value="<?php echo $GetPage['Page_Name']; ?>" class="formField" size="48" maxlength="255">
                    </div>
                </div>

                <!--    ADD MULTIPLE    -->
                <?php if ($GetPage['Page_Name'] == "New Category") { ?>
                    <div class="form-group">
                        <label class="formLabel"><a href="#anch2" onclick="toggle_layer('showfields')" class="cColor">[+] <?php print $textAddMultCateg; ?></a></label>
                        <div class="colInput">
                            <div id="showfields" style="display: none; padding:10px;width: 100%;">
                                <div class="blueBox">
                                    <div style="padding:15px 0px 15px 10px;">
                                        <?php print $textTypeCategTitle; ?>
                                        <div class="form-group"><input type="text" name="Page_Name1" class="formField"></div>
                                        <div class="form-group"><input type="text" name="Page_Name2" class="formField"></div>
                                        <div class="form-group"><input type="text" name="Page_Name3" class="formField"></div>
                                        <div class="form-group"><input type="text" name="Page_Name4" class="formField"></div>
                                        <div class="form-group"><input type="text" name="Page_Name5" class="formField"></div>
                                        <div class="form-group"><input type="text" name="Page_Name6" class="formField"></div>
                                        <div class="form-group"><input type="text" name="Page_Name7" class="formField"></div>
                                        <div class="form-group"><input type="text" name="Page_Name8" class="formField"></div>
                                        <div class="form-group"><input type="text" name="Page_Name9" class="formField"></div>
                                        <div class="form-group"><input type="text" name="Page_Name10" class="formField"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                        <!--    Tίτλος Για Τύπωμα   -->
                        <div class="form-group">
                            <label class="formLabel"><?php print $textTitleAppear; ?> <i class="fas fa-question-circle admInfo cGreen" title="<?php echo $textTitleInfo; ?>"></i></label>

                            <div class="colInput">
                                <input type="text" name="Page_Name_Print" size="48" maxlength="255"
                                       value="<?php echo $GetPage['Page_Name_Print']; ?>" class="formField">
                            </div>
                        </div>
                        <!--    Page View   -->
                        <div class="form-group">
                            <label class="formLabel">Page URL <i class="fas fa-link"></i> <i class="fas fa-question-circle admInfo cGreen" title="<?php echo $textURLinfo; ?>"></i></label>
                            <div class="colInput">
                                <input type="text" name="Page_View" value="<?php echo $GetPage['Page_View']; ?>" maxlength="70" class="formField">
                            </div>
                        </div>

                        <div class="top10"></div>

                        <div class="admGrid3Cols">
                            <div>
                                <!--    Category Order   -->
                                <div class="form-group">
                                    <label class="formLabel"><?php echo $textordercat; ?></label>

                                    <div class="colInput">
                                        <input type="text" name="Page_Order" size="3" maxlength="4"
                                               value="<?php echo $GetPage['Page_Order']; ?>" class="formField noConvertCase">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <!--   Order Category By  -->
                                <div class="form-group">
                                    <label class="formLabel"><?php echo $textorderpgrec; ?></label>

                                    <div class="colInput">
                                        <select name="Page_OrderBy" class="formField">
                                            <option value="" selected>------ <?php echo $textselectdropdown; ?> ------</option>
                                            <option
                                                value="Rec_DateStart" <?php if ($GetPage['Page_OrderBy'] == 'Rec_DateStart') echo 'selected'; ?>><?php echo $textrecdateorder; ?></option>
                                            <option
                                                value="Rec_Order" <?php if ($GetPage['Page_OrderBy'] == 'Rec_Order') echo 'selected'; ?>><?php echo $textrecordfieldorder; ?></option>
                                            <option
                                                value="Rec_Title" <?php if ($GetPage['Page_OrderBy'] == 'Rec_Title') echo 'selected'; ?>><?php echo $textrectitleorder; ?></option>
                                            <option
                                                value="Page_Order" <?php if ($GetPage['Page_OrderBy'] == 'Page_Order') echo 'selected'; ?>><?php echo $textpagefieldorder; ?></option>
                                            <option
                                                value="Page_Name" <?php if ($GetPage['Page_OrderBy'] == 'Page_Name') echo 'selected'; ?>><?php echo $textpagenameorder; ?></option>
                                        </select>
                                    </div> <!-- colInput -->
                                </div> <!-- form-field -->
                            </div>
                            <div>
                                <div class="form-group">
                                    <label class="formLabel"><?php echo $textsortascdesc; ?></label>
                                    <div class="colInput">
                                        <select name="Page_SortBy" class="formField">
                                            <option
                                                value="Asc" <?php if ($GetPage['Page_SortBy'] == 'Asc') echo 'selected'; ?>><?php echo $textrecorderAsc; ?></option>
                                            <option
                                                value="Desc" <?php if ($GetPage['Page_SortBy'] == 'Desc') echo 'selected'; ?>><?php echo $textrecorderDesc; ?></option>
                                        </select>
                                    </div>
                                </div> <!-- form-field -->
                            </div>
                        </div>

                        <!--    Related Category from dublicated Lang -->
                        <input type="Hidden" name="Page_Lang_ID" value="<?php echo $GetPage['Page_Lang_ID']; ?>">

                        <div class="top10"></div>

                        <div class="admGrid2Cols">

                            <div> <!-- first column -->
                                <!--    Lists   -->
                                <div class="form-group">
                                    <label class="formLabel"><?php print $textFielList; ?></label>

                                    <div class="colInput">
                                        <select name="Page_List_ID" class="formField">
                                            <option value="0">--- <?php print $textChooseList; ?> ---</option>
                                            <?php
                                            while ($Select_List_row = f($Select_List_q)) {
                                                ?>
                                                <option
                                                    value="<?php echo $Select_List_row['List_ID']; ?>" <?php if ($Select_List_row['List_ID'] == $GetPage['Page_List_ID']) echo "selected"; ?>><?php echo $Select_List_row['List_Name']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div><!-- second column -->
                                <!-- header content -->
                                <div class="form-group">
                                    <label class="formLabel">Header <?php print $textContent; ?> Field List</label>

                                    <div class="colInput">
                                        <select name="Page_Content" class="formField">
                                            <option value="0">--- <?php print $textChooseList; ?> ---</option>
                                            <?php
                                            while ($Select_List_Page_row = f($Select_List_Page_q)) {
                                                ?>
                                                <option
                                                    value="<?php echo $Select_List_Page_row['List_ID']; ?>" <?php if ($Select_List_Page_row['List_ID'] == $GetPage['Page_Content']) echo "selected"; ?>><?php echo $Select_List_Page_row['List_Name']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="top15"></div>

                        <div class="admGrid2Cols">
                            <div>
                                <!--    max records     -->
                                <div class="form-group">
                                    <label class="formLabel"><input type="checkbox" class="formField" name="Page_Num_Recs" <?php if ($GetPage['Page_Num_Recs'] == '999') echo 'checked'; ?> value="1"> <?php print $textMultipleRecords; ?></label>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <?php editRecCheck($textListActive,"active",$GetPage['Page_Active'],$textActiveCategr)?>
                                </div>
                            </div>
                        </div>

                        <fieldset>
                            <legend>Menu Settings</legend>

                            <div class="admGrid2Cols">
                                <div><!--    top menu     -->
                                	<?php editRecCheck($textMenuBottom,"enable",$GetPage['Page_Enable'],$textMenuView)?>
                                </div>
                                <div>
                                    <!-- Show on Mobile -->
                                    <?php editRecCheck("Show on Mobile","mobenable",$GetPage['Page_Mob_Enable'])?>
                                </div>
                                <div> <!-- Page_Show_TopLinks -->
                                    <?php editRecCheck($textMenuTopMenu,"Page_Show_TopLinks",$GetPage['Page_Show_TopLinks'],$textMenuTopMenuH)?>
                                </div>
                                <div> <!-- Show on Footer Links -->
                                    <?php editRecCheck($textShowBottom,"Page_Show_Bottom",$GetPage['Page_Show_Bottom'],$textShowBottomH)?>
                                </div>
                                <div> <!-- Show Menu Subcategories -->
                                    <?php editRecCheck($textMenuSubCats,"Page_Show_SubMenu",$GetPage['Page_Show_SubMenu'])?>
                                </div>

                                <div>
                                    <div class="form-group" style="position:relative;top:-6px">
                                        <!-- Change Line -->
                                        <label class="formLabel"><?php print $textLineChange; ?> <i class="fas fa-question-circle admInfo cGreen" title="<?php echo $textLineChInfo; ?>"></i></label>

                                        <div class="colInput" style="display:inline">
                                            <input type="text" name="Page_MenuLines" size="1" maxlength="1" class="formField noConvertCase" value="<?php echo $GetPage['Page_MenuLines']; ?>" style="width:initial">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>



            </div><!-- admGridCatL -->

            <div class='admGridCatR'>
                <?php if ((Auth::accessLevel() == 0) OR ($accAdm['Acc_PageEditSettings'] == 1)) { ?>
                    <div class="orangeBox menuTabs categorySettingsTabs">
                        <a href="#" class="title categorySettingsTab cDefault active" data-tab="desktop"><i class="fas fa-desktop"></i> Desktop Settings</a>
                        <a href="#" class="title categorySettingsTab cDefault" data-tab="mobile"><i class="fas fa-mobile-alt"></i> Mobile Settings</a>
                    </div>
                <?php }?>

                <div class="menuTabsCont">

                <div class="orangeBox menuTabCont" data-tabname="desktop">
                    <?php if ((Auth::accessLevel() == 0) OR ($accAdm['Acc_PageEditSettings'] == 1)) { ?>
                        <!--    Page Type   -->
                        <div class="form-group">
                            <label class="formLabel"><?php print $textPageType; ?></label>

                            <div class="colInput">
                                <?php
                                $Page_Type = $GetPage["Page_Type"];

                                $MethTempDefault_Sel = "SELECT * FROM method_lists_templates WHERE MLTemp_Name = 'Default'";
                                $MethTempDefault_Query = q($MethTempDefault_Sel);
                                $MethTempDefault = f($MethTempDefault_Query);

                                $MethTemp_Sel = "SELECT * FROM method_lists_templates WHERE MLTemp_Name <> 'Default' Order by MLTemp_Name";
                                $MethTemp_Query = q($MethTemp_Sel);
                                ?>

                                <select name="Page_Type" class="formField">
                                    <?php if ($MethTempDefault['MLTemp_Name'] == "Default") print "<option value='".$MethTempDefault['MLTemp_ID']."' selected>Default</option>";
                                    while ($MethTemp = f($MethTemp_Query)) { ?>
                                        <option
                                            value="<?php echo $MethTemp['MLTemp_ID']; ?>" <?php if ($Page_Type == $MethTemp['MLTemp_ID']) echo 'selected'; ?>><?php echo $MethTemp['MLTemp_Name'] ?></option>
                                    <?php } ?>
                                </select>
                                <a class="popUpWindow cDefault editBtn" href="core/method_lists_row_fields_edit.php?MLR_Temp_ID=<?php echo $Page_Type; ?>" data-width="92%" data-height="94%">
                                    <i class="fas fa-layer-group" title="<?php print $textEditRecViewCat; ?>"></i> Edit</a>
                            </div>
                        </div>

                        <fieldset class="borderLight">
                            <legend>Templates/Views of Records</legend>

                            <div class="admGrid2Cols">
                                <div>
                                    <!--    Page Lists Temp     -->
                                    <div class="form-group">
                                        <label class="formLabel"><?php print $textCatListView; ?></label>

                                        <div class="colInput">
                                            <?php
                                            if (($GetPage['Page_Header_Flag'] == 1) OR ($GetPage['Parent_Page_ID'] == 0)) {
                                                $pageHeader = pageHeader($Page_ID);
                                            } else {
                                                $headerPageID = headerPageID($Page_ID);
                                                $pageHeader = pageHeader($headerPageID);
                                            }
                                            ?>
                                            <?php
                                            $Page_Lists_Temp = $GetPage["Page_Lists_Temp"];

                                            //find ListID
                                            $GetListsTempListID_Sel = "SELECT * FROM lists_templates WHERE LTemp_ID = $Page_Lists_Temp";
                                            $GetListsTempListID_Query = q($GetListsTempListID_Sel);
                                            $GetListsTempListID = f($GetListsTempListID_Query);

                                            $ListsTemp_Select = "SELECT * FROM lists_templates Order by LTemp_Name";
                                            $ListsTemp_Query = q($ListsTemp_Select);
                                            ?>

                                            <select name="Page_Lists_Temp" class="formField">
                                                <?php while ($ListsTemp = f($ListsTemp_Query)) { ?>
                                                    <option
                                                        value="<?php echo $ListsTemp['LTemp_ID']; ?>" <?php if ($Page_Lists_Temp == $ListsTemp['LTemp_ID']) {
                                                        $LTR_Temp_ID = $ListsTemp['LTemp_ID'];
                                                        echo 'selected';
                                                    } ?>><?php echo $ListsTemp['LTemp_Name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <a class="popUpWindow cDefault editBtn" href="core/lists_row_fields_edit.php?LTR_Temp_ID=<?php echo $LTR_Temp_ID; ?>&ListID=<?php echo $GetListsTempListID['LTemp_ListID']; ?>" data-width="92%" data-height="94%"><i class="fas fa-layer-group" title="<?php print $textEditPageView; ?>"></i> Edit</a>

                                        </div>
                                    </div>
                                </div>


                                <!--    Page Lists Temp 2   -->
                                <!--    *****************   -->
                                <div>
                                    <div class="form-group">
                                    <label class="formLabel"><?php print $textCatListView; ?> (Alternative)</label>
                                    <div class="colInput">
                                            <?php
                                            if (($GetPage['Page_Header_Flag'] == 1) OR ($GetPage['Parent_Page_ID'] == 0)) {
                                                $pageHeader = pageHeader($Page_ID);
                                            } else {
                                                $headerPageID = headerPageID($Page_ID);
                                                $pageHeader = pageHeader($headerPageID);
                                            }
                                            ?>
                                            <?php
                                            $Page_Lists_Temp2 = $GetPage["Page_Lists_Temp2"];

                                            //find ListID
                                            $GetListsTempListID_Sel = "SELECT * FROM lists_templates WHERE LTemp_ID = $Page_Lists_Temp2";
                                            $GetListsTempListID_Query = q($GetListsTempListID_Sel);
                                            $GetListsTempListID = f($GetListsTempListID_Query);

                                            $ListsTemp_Select = "SELECT * FROM lists_templates Order by LTemp_Name";
                                            $ListsTemp_Query = q($ListsTemp_Select);
                                            ?>

                                            <select name="Page_Lists_Temp2" class="formField">
                                                <option value="0" selected="selected">Select a different Lists View</option>
                                                <?php while ($ListsTemp = f($ListsTemp_Query)) { ?>
                                                    <option
                                                        value="<?php echo $ListsTemp['LTemp_ID']; ?>" <?php if ($Page_Lists_Temp2 == $ListsTemp['LTemp_ID']) {
                                                        $LTR_Temp_ID = $ListsTemp['LTemp_ID'];
                                                        echo 'selected';
                                                    } ?>><?php echo $ListsTemp['LTemp_Name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <a class="popUpWindow cDefault editBtn" href="core/lists_row_fields_edit.php?LTR_Temp_ID=<?php echo $LTR_Temp_ID; ?>&ListID=<?php echo $GetListsTempListID['LTemp_ListID']; ?>" data-width="92%" data-height="94%"><i class="fas fa-layer-group" title="<?php print $textEditPageView; ?>"></i> Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- admGrid2Cols -->

                            <div class="admGrid2Cols">
                                <div>
                                    <!--    Page Rec View   -->
                                    <div class="form-group">
                                        <label class="formLabel"><?php print $textRecView; ?></label>

                                        <div class="colInput">
                                            <?php
                                            $Page_Rec_Temp = $GetPage["Page_Rec_Temp"];

                                            //find ListID
                                            $GetRecTempListID_Sel = "SELECT * FROM rec_templates WHERE RTemp_ID = $Page_Rec_Temp";
                                            $GetRecTempListID_Query = q($GetRecTempListID_Sel);
                                            $GetRecTempListID = f($GetRecTempListID_Query);

                                            $RecTempDefault_Sel = "SELECT * FROM rec_templates WHERE RTemp_Name = 'Default'";
                                            $RecTempDefault_Query = q($RecTempDefault_Sel);
                                            $RecTempDefault = f($RecTempDefault_Query);

                                            $RecTemp_Sel = "SELECT * FROM rec_templates WHERE RTemp_Name <> 'Default' Order by RTemp_Name";
                                            $RecTemp_Query = q($RecTemp_Sel);
                                            ?>

                                            <select name="Page_Rec_Temp" class="formField">
                                                <?php if ($RecTempDefault['RTemp_Name'] == "Default") print "<option value='".$RecTempDefault["RTemp_ID"]."' selected>Default</option>";
                                                while ($RecTemp = f($RecTemp_Query)) { ?>
                                                    <option
                                                        value="<?php echo $RecTemp['RTemp_ID']; ?>" <?php if ($Page_Rec_Temp == $RecTemp['RTemp_ID']) echo 'selected'; ?>><?php echo $RecTemp['RTemp_Name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php if ($GetRecTempListID['RTemp_ListID'] <> "") { ?>
                                                <a class="popUpWindow cDefault editBtn" href="core/row_fields_edit.php?RTR_Temp_ID=<?php echo $Page_Rec_Temp; ?>&ListID=<?php echo $GetRecTempListID['RTemp_ListID']; ?>" data-width="92%" data-height="94%">
                                            <?php } else { ?>
                                                <a class="popUpWindow cDefault editBtn" href="core/rec_templates_view.php" data-width="92%" data-height="94%">
                                            <?php } ?>
                                                <i class="fas fa-layer-group" title="<?php print $textEditRecViewCat; ?>"></i> Edit
                                                </a>
                                        </div> <!-- colInput -->
                                    </div> <!-- form-group -->
                                </div> <!-- column -->
                                <div>
                                    <div class="top25"></div>
                                    <?php editRecCheck($textBulkPageRecTemp,"BulkPageRecTemp","0")?>
                                </div><!-- column -->
                            </div> <!-- admGrid2Cols -->


                            <div class="admGrid2Cols">
                                <!--    Page Header Lists Temp  -->
                                <?php if ($GetPage['Page_Content'] <> 0) { ?>
                                <div>
                                    <div class="form-group">
                                        <label
                                            class="formLabel"><?php print $textHeaderCateg; ?></label>

                                        <div class="colInput">
                                            <?php
                                            $Page_HeadLists_Temp = $GetPage['Page_HeadLists_Temp'];

                                            //find ListID
                                            $GetHeadTempListID_Sel = "SELECT * FROM listshead_templates WHERE LHTemp_ID = $Page_HeadLists_Temp";
                                            $GetHeadTempListID_Query = q($GetHeadTempListID_Sel);
                                            $GetHeadTempListID = f($GetHeadTempListID_Query);

                                            $ListsTemp_Select = "SELECT * FROM listshead_templates Order by LHTemp_Name";
                                            $ListsTemp_Query = q($ListsTemp_Select);
                                            ?>
                                            <select name="Page_HeadLists_Temp" class="formField">
                                                <?php while ($ListsTemp = f($ListsTemp_Query)) { ?>
                                                    <option
                                                        value="<?php echo $ListsTemp['LHTemp_ID']; ?>" <?php if ($Page_HeadLists_Temp == $ListsTemp['LHTemp_ID']) echo 'selected'; ?>><?php echo $ListsTemp['LHTemp_Name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <a class="popUpWindow cDefault editBtn" href="core/listshead_row_fields_edit.php?LHTR_Temp_ID=<?php echo $Page_HeadLists_Temp; ?>&ListID=<?php echo $GetHeadTempListID['LHTemp_ListID']; ?>" data-width="92%" data-height="94%"><i class="fas fa-layer-group" title="<?php print $textEditHContView; ?>"></i> Edit</a>
                                        </div>
                                    </div> <!-- form-group -->
                                </div>
                                <div>
                                    <div class="top25"></div>
                                    <?php editRecCheck($textHeaderFlag,"Page_HeadLists_Flag",$GetPage['Page_HeadLists_Flag'])?>
                                </div>
                                <?php } else { ?>
                                    <!-- Ean = 0 -->
                                    <input type="Hidden" name="Page_HeadLists_Temp"
                                           value="<?php echo $GetPage["Page_HeadLists_Temp"]; ?>">
                                <?php } // Auth::accessLevel() ?>

                            </div> <!-- admGrid2Cols -->
                        </fieldset>

                        <?php } else { ?>
                            <input type="Hidden" name="Page_Type" value="<?php echo $GetPage["Page_Type"]; ?>">
                            <input type="Hidden" name="Page_Lists_Temp" value="<?php echo $GetPage["Page_Lists_Temp"]; ?>">
                            <input type="Hidden" name="Page_Lists_Temp2" value="<?php echo $GetPage["Page_Lists_Temp2"]; ?>">
                            <input type="Hidden" name="Page_HeadLists_Temp"
                                   value="<?php echo $GetPage["Page_HeadLists_Temp"]; ?>">
                            <input type="Hidden" name="Page_HeadLists_Flag"
                                   value="<?php echo $GetPage["Page_HeadLists_Flag"]; ?>">
                            <input type="Hidden" name="Page_Rec_Temp" value="<?php echo $GetPage["Page_Rec_Temp"]; ?>">
                        <?php }// if Acc_PageEditSettings ?>
                </div>


                <!--      MOBILE     -->
                <!--  *************  -->
                <?php if ((Auth::accessLevel() == 0) OR ($accAdm['Acc_PageEditSettings'] == 1)) { ?>
                <div class="orangeBox menuTabCont" data-tabname="mobile" style="display:none">

                    <!-- Order -->
                    <!-- <div class="form-group">
                        <label class="formLabel"><?php echo $textordercat; ?></label>

                        <div class="colInput formLabelHor">
                            <input type="text" name="Page_Order_Mob" value="<?php echo $GetPage['Page_Order_Mob']; ?>"
                                   size="2" maxlength="2" class="formField">
                        </div>
                    </div> -->
                    <!-- Display Mode (method lists) -->
                    <div class="form-group">
                        <label class="formLabel"><?php echo $textPageType; ?></label>

                        <div class="colInput formLabelHor">
                            <?php
                            $Page_Type_Mob = $GetPage["Page_Type_Mob"];

                            $MethTempDefault_Sel = "SELECT * FROM method_lists_templates WHERE MLTemp_Name = 'Default'";
                            $MethTempDefault_Query = q($MethTempDefault_Sel);
                            $MethTempDefault = f($MethTempDefault_Query);

                            $MethTemp_Sel = "SELECT * FROM method_lists_templates WHERE MLTemp_Name <> 'Default' Order by MLTemp_Name";
                            $MethTemp_Query = q($MethTemp_Sel);
                            ?>

                            <select name="Page_Type_Mob" class="formField">
                                <?php if ($MethTempDefault['MLTemp_Name'] == "Default") print "<option value=\"".$MethTempDefault["MLTemp_ID"]."\" selected>Default</option>";
                                while ($MethTemp = f($MethTemp_Query)) { ?>
                                    <option
                                        value="<?php echo $MethTemp['MLTemp_ID']; ?>" <?php if ($Page_Type_Mob == $MethTemp['MLTemp_ID']) echo 'selected'; ?>><?php echo $MethTemp['MLTemp_Name'] ?></option>
                                <?php } ?>
                            </select>
                            <a class="popUpWindow cDefault editBtn" href="core/method_lists_row_fields_edit.php?MLR_Temp_ID=<?php echo $Page_Type_Mob; ?>" data-width="92%" data-height="94%">
                                <i class="fas fa-layer-group" title="<?php print $textEditRecViewCat; ?>"></i> Edit
                            </a>
                        </div>
                    </div>

                    <fieldset class="borderLight">
                        <legend>Templates/Views of Records</legend>

                        <div class="admGrid2Cols">
                            <div>
                                <!-- Display Category List -->
                                <div class="form-group">
                                    <label class="formLabel"><?php print $textCatListView; ?></label>

                                    <div class="colInput formLabelHor">
                                        <?php
                                        if (($GetPage['Page_Header_Flag'] == 1) OR ($GetPage['Parent_Page_ID'] == 0)) {
                                            $pageHeader = pageHeader($Page_ID);
                                        } else {
                                            $headerPageID = headerPageID($Page_ID);
                                            $pageHeader = pageHeader($headerPageID);
                                        }
                                        ?>
                                        <?php
                                        $Page_Lists_Mob = $GetPage["Page_Lists_Mob"];

                                        //find ListID
                                        $GetListsTempListID_Sel = "SELECT * FROM lists_templates WHERE LTemp_ID = $Page_Lists_Mob";
                                        $GetListsTempListID_Query = q($GetListsTempListID_Sel);
                                        $GetListsTempListID = f($GetListsTempListID_Query);

                                        $ListsTemp_Select = "SELECT * FROM lists_templates Order by LTemp_Name";
                                        $ListsTemp_Query = q($ListsTemp_Select);
                                        ?>

                                        <select name="Page_Lists_Mob" class="formField">
                                            <?php while ($ListsTemp = f($ListsTemp_Query)) { ?>
                                                <option
                                                    value="<?php echo $ListsTemp['LTemp_ID']; ?>" <?php if ($Page_Lists_Mob == $ListsTemp['LTemp_ID']) {
                                                    $LTR_Temp_ID = $ListsTemp['LTemp_ID'];
                                                    echo 'selected';
                                                } ?>><?php echo $ListsTemp['LTemp_Name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <a class="popUpWindow cDefault editBtn" href="core/lists_row_fields_edit.php?LTR_Temp_ID=<?php echo $LTR_Temp_ID; ?>&ListID=<?php echo $GetListsTempListID['LTemp_ListID']; ?>" data-width="92%" data-height="94%">
                                            <i class="fas fa-layer-group" title="<?php print $textEditPageView; ?>"></i> Edit
                                        </a>
                                    </div>
                                </div> <!-- form-group -->
                            </div>

                            <div>
                                <div class="form-group">
                                    <label class="formLabel"><?php print $textCatListView; ?> (Alternative)</label>
                                    <!--    Page Lists Temp 2   -->
                                    <!--    *****************   -->
                                    <div class="colInput formLabelHor">
                                        <?php
                                        if (($GetPage['Page_Header_Flag'] == 1) OR ($GetPage['Parent_Page_ID'] == 0)) {
                                            $pageHeader = pageHeader($Page_ID);
                                        } else {
                                            $headerPageID = headerPageID($Page_ID);
                                            $pageHeader = pageHeader($headerPageID);
                                        }
                                        ?>
                                        <?php
                                        $Page_Lists_Mob2 = $GetPage["Page_Lists_Mob2"];

                                        //find ListID
                                        $GetListsTempListID_Sel = "SELECT * FROM lists_templates WHERE LTemp_ID = $Page_Lists_Mob";
                                        $GetListsTempListID_Query = q($GetListsTempListID_Sel);
                                        $GetListsTempListID = f($GetListsTempListID_Query);

                                        $ListsTemp_Select = "SELECT * FROM lists_templates Order by LTemp_Name";
                                        $ListsTemp_Query = q($ListsTemp_Select);
                                        ?>

                                        <select name="Page_Lists_Mob2" class="formField">
                                            <option value="0" selected="selected">Select a different Lists View</option>
                                            <?php while ($ListsTemp = f($ListsTemp_Query)) { ?>
                                                <option
                                                    value="<?php echo $ListsTemp['LTemp_ID']; ?>" <?php if ($Page_Lists_Mob2 == $ListsTemp['LTemp_ID']) {
                                                    $LTR_Temp_ID = $ListsTemp['LTemp_ID'];
                                                    echo 'selected';
                                                } ?>><?php echo $ListsTemp['LTemp_Name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <a class="popUpWindow cDefault editBtn" href="core/lists_row_fields_edit.php?LTR_Temp_ID=<?php echo $LTR_Temp_ID; ?>&ListID=<?php echo $GetListsTempListID['LTemp_ListID']; ?>" data-width="92%" data-height="94%">
                                            <i class="fas fa-layer-group" title="<?php print $textEditPageView; ?>"></i> Edit</a>
                                    </div>
                                </div> <!-- form-group -->

                            </div>
                        </div>


                            <!-- Display Mode of records  -->
                            <div class="form-group">
                                <label class="formLabel"><?php echo $textRecView; ?></label>

                                <div class="colInput formLabelHor">
                                    <?php
                                    $Page_Rec_Mob = $GetPage["Page_Rec_Mob"];

                                    //find ListID
                                    $GetRecTempListID_Sel = "SELECT * FROM rec_templates WHERE RTemp_ID = $Page_Rec_Mob";
                                    $GetRecTempListID_Query = q($GetRecTempListID_Sel);
                                    $GetRecTempListID = f($GetRecTempListID_Query);

                                    $RecTempDefault_Sel = "SELECT * FROM rec_templates WHERE RTemp_Name = 'Default'";
                                    $RecTempDefault_Query = q($RecTempDefault_Sel);
                                    $RecTempDefault = f($RecTempDefault_Query);

                                    $RecTemp_Sel = "SELECT * FROM rec_templates WHERE RTemp_Name <> 'Default' Order by RTemp_Name";
                                    $RecTemp_Query = q($RecTemp_Sel);
                                    ?>

                                    <select name="Page_Rec_Mob" class="formField">
                                        <?php if ($RecTempDefault['RTemp_Name'] == "Default") print "<option value=\"".$RecTempDefault["RTemp_ID"]."\" selected>Default</option>";
                                        while ($RecTemp = f($RecTemp_Query)) { ?>
                                            <option
                                                value="<?php echo $RecTemp['RTemp_ID']; ?>" <?php if ($Page_Rec_Mob == $RecTemp['RTemp_ID']) echo 'selected'; ?>><?php echo $RecTemp['RTemp_Name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php if ($GetRecTempListID['RTemp_ListID'] <> "") { ?>
                                    <a class="popUpWindow cDefault editBtn" href="core/row_fields_edit.php?RTR_Temp_ID=<?php echo $Page_Rec_Mob; ?>&ListID=<?php echo $GetRecTempListID['RTemp_ListID']; ?>" data-width="92%" data-height="94%">
                                        <?php } else { ?>
                                        <a class="popUpWindow cDefault editBtn" href="core/rec_templates_view.php" data-width="92%" data-height="94%">
                                            <?php } ?>
                                            <i class="fas fa-layer-group" title="<?php print $textEditRecViewCat; ?>"></i> Edit
                                        </a>
                                </div>
                            </div>

                            <?php if ($GetPage['Page_Content'] <> 0) { ?>
                                <!--    Page Header Lists Temp  -->
                                <div class="form-group">
                                    <label
                                        class="formLabel"><?php print $textHeaderCateg; ?></label>

                                    <div class="colInput formLabelHor">
                                        <?php
                                        $Page_HeadLists_Mob = $GetPage['Page_HeadLists_Mob'];

                                        //find ListID
                                        $GetHeadTempListID_Sel = "SELECT * FROM listshead_templates WHERE LHTemp_ID = $Page_HeadLists_Mob";
                                        $GetHeadTempListID_Query = q($GetHeadTempListID_Sel);
                                        $GetHeadTempListID = f($GetHeadTempListID_Query);

                                        $ListsTemp_Select = "SELECT * FROM listshead_templates Order by LHTemp_Name";
                                        $ListsTemp_Query = q($ListsTemp_Select);
                                        ?>

                                        <select name="Page_HeadLists_Mob" class="formField">
                                            <?php while ($ListsTemp = f($ListsTemp_Query)) { ?>
                                                <option
                                                    value="<?php echo $ListsTemp['LHTemp_ID']; ?>" <?php if ($Page_HeadLists_Mob == $ListsTemp['LHTemp_ID']) echo 'selected'; ?>><?php echo $ListsTemp['LHTemp_Name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <a class="popUpWindow cDefault editBtn" href="core/listshead_row_fields_edit.php?LHTR_Temp_ID=<?php echo $Page_HeadLists_Mob; ?>&ListID=<?php echo $GetHeadTempListID['LHTemp_ListID']; ?>" data-width="92%" data-height="94%">
                                            <i class="fas fa-layer-group" title="<?php print $textEditHContView; ?>"></i> Edit</a>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <!-- Ean = 0 -->
                                <input type="Hidden" name="Page_HeadLists_Mob"
                                       value="<?php echo $GetPage["Page_HeadLists_Mob"]; ?>">
                            <?php } ?>
                        </fieldset>
                    </div>
                <?php }?>

                </div> <!-- //.menuTabsCont -->

                <div class="top30 orangeBox expand">
                    <?php if ($Page_Settings_Rec['PS_ID'] == 1) { ?>
                        <input type="hidden" name="Set_Site_Name" value="INCOM">
                    <?php } ?>
                    <div class="title expandHandler"><i class="fas fa-border-none"></i> Grid Css Settings</div>
                    <div class="admGrid3Cols expandCont" style="display:none;">
                        <div>
                            <div class="form-group">
                                <label class="formLabel" style="width:100%;">List Grid
                                    <?php
                                    $setStyle_Query = q("SELECT * FROM styles WHERE css_ID = ".$Page_Settings_Rec["Set_List_DivClass"]);
                                    $setStyle = f($setStyle_Query);
                                    if (nr($setStyle_Query) > 0) { ?>
                                        <a class="popUpWindow cDefault right" href="core/styles_edit.php?css_ID=<?php echo $Page_Settings_Rec['Set_List_DivClass']?>&amp;HeaderCat=1" data-width="680" data-height="94%">edit</a>
                                    <?php } ?>
                                </label>
                                <select name="Set_List_DivClass" class="formField" data-placeholder="Select Style »">
                                    <option value="">Select Style &raquo;</option>
                                    <?php
                                    $Style_Query = q("SELECT * FROM styles WHERE css_HeaderCat <  2 Order by css_Name");
                                    while ($GetStyle = f($Style_Query)) { ?>
                                        <option value="<?php echo $GetStyle['css_ID']; ?>" <?php if ($GetStyle['css_ID'] == $Page_Settings_Rec['Set_List_DivClass']) echo "selected"; ?>><?php echo $GetStyle['css_Name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <label class="formLabel" style="width:100%;">List Grid Item
                                    <?php
                                    $setStyle_Query = q("SELECT * FROM styles WHERE css_ID = ".$Page_Settings_Rec["Set_Item_DivClass"]);
                                    $setStyle = f($setStyle_Query);
                                    if (nr($setStyle_Query) > 0) { ?>
                                        <a class="popUpWindow cDefault right" href="core/styles_edit.php?css_ID=<?php echo $Page_Settings_Rec['Set_Item_DivClass']?>&amp;HeaderCat=1" data-width="680" data-height="94%">edit</a>
                                    <?php } ?>
                                </label>
                                <select name="Set_Item_DivClass" class="formField" data-placeholder="Select Style »">
                                    <option value="">Select Style &raquo;</option>
                                    <?php
                                    $Style_Query = q("SELECT * FROM styles WHERE css_HeaderCat <  2 Order by css_Name");
                                    while ($GetStyle = f($Style_Query)) { ?>
                                        <option value="<?php echo $GetStyle['css_ID']; ?>" <?php if ($GetStyle['css_ID'] == $Page_Settings_Rec['Set_Item_DivClass']) echo "selected"; ?>><?php echo $GetStyle['css_Name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <div class="formLabel">Max Records</div>
                                    <input type="text" name="Set_List_NumRecs" value="<?php echo $Page_Settings_Rec['Set_List_NumRecs']; ?>" size="3" class="formField">
                            </div>
                        </div>

                    </div><!-- admGrid3Cols -->
                </div>

                <div class="top30 blueBox expand">
                    <div class="title expandHandler"><i class="far fa-images"></i> Photo Gallery Settings</div>
                    <div class="admGrid2Cols expandCont" style="display:none">
                        <div>
                            <div class="form-group">
                                <label class="formLabel" style="width:100%;">Gallery Grid Css
                                    <?php
                                    $setStyle_Query = q("SELECT * FROM styles WHERE css_ID = ".$Page_Settings_Rec["Set_Div_GridGallery"]);
                                    $setStyle = f($setStyle_Query);
                                    if (nr($setStyle_Query) > 0) { ?>
                                        <a class="popUpWindow cDefault right" href="core/styles_edit.php?css_ID=<?php echo $Page_Settings_Rec['Set_Div_GridGallery']?>&amp;HeaderCat=1" data-width="680" data-height="94%">edit</a>
                                    <?php } ?>
                                </label>
                                <select name="Set_Div_GridGallery" class="formField" data-placeholder="SelectStyle »">
                                    <option value="">Select Style &raquo;</option>
                                    <?php
                                    $Style_Query = q("SELECT * FROM styles WHERE css_HeaderCat <  2 Order by css_Name");
                                    while ($GetStyle = f($Style_Query)) { ?>
                                        <option value="<?php echo $GetStyle['css_ID']; ?>" <?php if ($GetStyle['css_ID'] == $Page_Settings_Rec['Set_Div_GridGallery']) echo "selected"; ?>><?php echo $GetStyle['css_Name']; ?></option>
                                    <?php } ?>
                                </select>
                                
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label class="formLabel" style="width:100%;">Grid Item

                                    <?php
                                    $setStyle_Query = q("SELECT * FROM styles WHERE css_ID = ".$Page_Settings_Rec["Set_Div_GridGalleryItem"]);
                                    $setStyle = f($setStyle_Query);
                                    if (nr($setStyle_Query) > 0) { ?>
                                        <a class="popUpWindow cDefault right" href="core/styles_edit.php?css_ID=<?php echo $Page_Settings_Rec['Set_Div_GridGalleryItem']?>&amp;HeaderCat=1" data-width="680" data-height="94%">edit</a>
                                    <?php } ?>
                                </label>
                                <select name="Set_Div_GridGalleryItem" class="formField" data-placeholder="SelectStyle »">
                                    <option value="">Select Style &raquo;</option>
                                    <?php
                                    $Style_Query = q("SELECT * FROM styles WHERE css_HeaderCat <  2 Order by css_Name");
                                    while ($GetStyle = f($Style_Query)) { ?>
                                        <option value="<?php echo $GetStyle['css_ID']; ?>" <?php if ($GetStyle['css_ID'] == $Page_Settings_Rec['Set_Div_GridGalleryItem']) echo "selected"; ?>><?php echo $GetStyle['css_Name']; ?></option>
                                    <?php } ?>
                                </select>
                                
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <label class="formLabel">Show Thumbnails Photos</label>
                                <input type="text" name="Set_MaxPhotos" value="<?php echo $Page_Settings_Rec['Set_MaxPhotos']; ?>" size="2" class="formField">
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <label class="formLabel">Show Thumbnails Mobile</label>
                                <input type="text" name="Set_MobMaxPhotos" value="<?php echo $Page_Settings_Rec['Set_MobMaxPhotos']; ?>" size="2" class="formField">
                            </div>
                        </div>
                    </div>

                </div>

                </div>
            </div><!-- admGridCatR -->



        <div class="top20"></div>



        <div class="top30 blueBox">
            <div class="title">Advanced Settings</div>

                <fieldset>
                    <legend>Category General Variables</legend>

                    <!--    CHECK BOXES     -->
                    <div class="admGrid4Cols">
                        <div>
                            <?php editRecCheck("Special Group","Page_Special_Group",$GetPage['Page_Special_Group'])?>
                        </div>

                        <div>
                            <?php editRecCheck("Header Category","headerflag",$GetPage['Page_Header_Flag'],$textHeadInfo)?>
                        </div>
                        <div>
                            <?php editRecCheck("Synchronize","Page_Synchronize",$GetPage['Page_Synchronize'],"Synchronize records between different websites")?>
                        </div>
                    </div>


                    <?php if ((Auth::accessLevel() == 0) OR ($accAdm['Acc_PageEditSettings'] == 1)) { ?>
                        <div class="admGrid4Cols">
                            <div>
                                <!--    Variable 1  -->
                                <div class="form-group">
                                    <label class="formLabel"><?php print $textVariableFree; ?> (1): <i class="fas fa-question-circle admInfo cGreen" title="<?php echo $textVariableInfo; ?>"></i></label>

                                    <div class="colInput">
                                        <input type="text" name="Page_GenVar" value="<?php echo $GetPage['Page_GenVar']; ?>" size="38" maxlength="255" class="formField noConvertCase">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <!--    Variable 2  -->
                                <div class="form-group">
                                    <label class="formLabel"><?php print $textVariableFree; ?> (2): <i class="fas fa-question-circle admInfo cGreen" title="<?php echo $textVariableInfo; ?>"></i></label>

                                    <div class="colInput">
                                        <input type="text" name="Page_GenVar2" value="<?php echo $GetPage['Page_GenVar2']; ?>" size="38" maxlength="255" class="formField noConvertCase">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <!--    Variable 3  -->
                                <div class="form-group">
                                    <label class="formLabel"><?php print $textVariableFree; ?> (3): <i class="fas fa-question-circle admInfo cGreen" title="<?php echo $textVariableInfo; ?>"></i></label>

                                    <div class="colInput">
                                        <input type="text" name="Page_GenVar3" value="<?php echo $GetPage['Page_GenVar3']; ?>"
                                               size="38" maxlength="255" class="formField noConvertCase">
                                    </div>
                                </div>
                            </div>
                        </div> <!-- //3cols -->


                        <div class="admGrid4Cols">
                            <div>

                                <!--    GET START LANG PAGE ID  -->
                                <div class="form-group">
                                    <label class="formLabel"><?php print $textStartLangID; ?></label>

                                    <div class="colInput">
                                        <select name="Page_StartLangID" class="formField">
                                            <option value="">------ <?php echo $textselectdropdown; ?> ------</option>
                                            <?php
                                            $GetIDStartLang_Sel = "SELECT * FROM pages WHERE Page_Lang = '".$GetVar["Rec_Scroll1"]."' AND Page_Section = '".$GetPage["Page_Section"]."' Order by Page_Name Asc";
                                            $GetIDStartLang_Query = q($GetIDStartLang_Sel);
                                            while ($GetIDStartLang = f($GetIDStartLang_Query)) {
                                                ?>
                                                <option
                                                    value="<?php echo $GetIDStartLang['Page_ID']; ?>" <?php if ($GetPage['Page_StartLangID'] == $GetIDStartLang['Page_ID']) echo "selected"; ?>><?php echo $GetIDStartLang['Page_Name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <!--    GET CONTENT FROM SECTION    -->
                                <div class="form-group">
                                    <label class="formLabel"><?php print $textGetFromSection; ?></label>

                                    <div class="colInput">
                                        <select name="Page_GetFromSection" class="formField">
                                            <?php
                                            $GetSections_Sel = "SELECT * FROM sections Order by Section_Order";
                                            $GetSections_Query = q($GetSections_Sel);
                                            while ($GetFromSection = f($GetSections_Query)) { ?>
                                                <option value="<?php echo $GetFromSection['Section_Name']; ?>" <?php if ($GetPage['Page_GetFromSection'] == $GetFromSection['Section_Name']) echo "selected"; ?>><?php echo $GetFromSection['Section_Title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="top20"></div>
                                <div class="form-group">
                                    <label class="formLabel">Attach Categories</label>
                                        <a class="popUpWindow cLight bgColor buttonLink" href="core/related_categories.php?Page_ID=<?php echo $GetPage['Page_ID']; ?>" data-width="92%" data-height="94%"><?php print $textEditT; ?></a>
                                </div>
                            </div>

                            <div>
                                <div class="top20"></div>
                                <div class="form-group">
                                    <label class="formLabel">Attach Filters</label>

                                        <a class="popUpWindow cLight bgColor buttonLink" href="core/page_filters_view.php?Page_ID=<?php echo $GetPage['Page_ID']; ?>" data-width="92%" data-height="94%"><?php print $textEditT; ?></a>
                                </div>
                            </div>
                    <?php } else { // if Acc_PageEditSettings ?>
                        <input type="Hidden" name="Page_GenVar" value="<?php echo $GetPage["Page_GenVar"]; ?>">
                        <input type="Hidden" name="Page_GenVar2" value="<?php echo $GetPage["Page_GenVar2"]; ?>">
                        <input type="Hidden" name="Page_GenVar3" value="<?php echo $GetPage["Page_GenVar3"]; ?>">
                        <input type="Hidden" name="Page_GetFromSection"
                               value="<?php echo $GetPage["Page_GetFromSection"]; ?>">
                        <input type="Hidden" name="Page_OrderBy" value="<?php echo $GetPage["Page_OrderBy"]; ?>">
                        <input type="Hidden" name="Page_SortBy" value="<?php echo $GetPage["Page_SortBy"]; ?>">
                    <?php } ?>
                </fieldset>

                <fieldset>
                    <legend>Security</legend>

                    <div class="admGrid4Cols">
                        <div>
                            <div class="top20"></div>
                            <!--    Member Access   -->
                            <?php editRecCheck($textPageAuthorized,"Page_Authorized",$GetPage['Page_Authorized'],$textPageAuthInfo)?>
                        </div>
                        <div>
                            <div class="form-group">
                                <label class="formLabel">Access Level <i class="fas fa-question-circle admInfo cGreen" title="Show page only to login members, with this access level or smaller"></i>
                                </label>
                                <div class="colInput">
                                    <select name="Page_MemAccess" class="formField">
                                        <option value="0">All</option>
                                        <?php
                                        for ($ac = 1; $ac <= 3; $ac++) { ?>
                                            <option value="<?php echo $ac; ?>" <?php if ($GetPage['Page_MemAccess'] == $ac) echo 'selected'; ?>><?php echo $ac; ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>

                        </div>
                    </div>

                </fieldset>

                <fieldset>
                    <legend>Category Tools</legend>
                    <div class="admGrid2Cols">
                        <div> <!-- first column -->
                            <!--    Κατηγορία που Ανήκει    -->
                            <div class="form-group">
                                <label class="formLabel">Move to Parent Category</label>

                                <div class="colInput">
                                    <select name="Parent_Page_ID" class="formField">
                                        <option value="0" selected>-- Move to --</option>
                                        <?php
                                        $sPPageID = $GetPage['Parent_Page_ID'];
                                        $GetSections_Sel = "SELECT * FROM sections WHERE Section_Name <> 'socialmedia' AND Section_Name <> 'bookonline' AND Section_Name <> 'settings' Order by Section_Order Asc";
                                        $GetSections_Query = q($GetSections_Sel);
                                        while ($GetSections = f($GetSections_Query)) {
                                            $Section = $GetSections['Section_Name'];
                                            ?>
                                            <option value></option>
                                            <option value="<?php echo $GetSections['Section_Name']; ?>" class="emphasised">
                                                &nbsp;&nbsp;&raquo; <?php echo $GetSections['Section_Title']; ?></option>
                                            <?php echo getCatCambRecursesion(0, 1, $sPPageID, $Section);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div><!-- second column -->
                            <!--    Language    -->
                            <div class="form-group">
                                <label class="formLabel"><?php print $textMovetoLanguage; ?></label>

                                <div class="colInput">
                                    <select name="Page_Lang" class="formField">
                                        <?php
                                        while ($Select_Lang_row = f($Select_Lang_q)) {
                                            ?>
                                            <option
                                                value="<?php echo $Select_Lang_row['Lang_Title']; ?>" <?php if ($Select_Lang_row['Lang_Title'] == $GetPage['Page_Lang']) echo "selected"; ?>><?php echo $Select_Lang_row['Lang_Desc']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

        </div><!-- orangeBox -->


        <!-- Meta Tags -->
        <!-- --------- -->
        <div class="yellowBox">
            <div class="title">Meta Tags</div>

            <!--    Page No Follow  -->
            <div class="admGrid4Cols">
                <div>
                    <?php editRecCheck("No Index","Page_No_Index",$GetPage['Page_No_Index'])?>
                </div>
                <div>
                    <?php editRecCheck("No Follow","Page_No_Follow",$GetPage['Page_No_Follow'])?>
                </div>
            </div>

            <div class="top15"></div>

            <!-- Page Title -->
            <div class="form-group">
                <label class="formLabel">Meta Title <small>characters: <span id="charNumTitle"></span> <em>(70 characters or fewer)</em></small></label>
                <div class="colInput">
                    <input id="field" onkeyup="countCharTitle(this)" type="text" name="Page_Meta_Title" value="<?php if ($GetPage['Page_Meta_Title'] == "") echo $GetPage['Page_Name']; else echo $GetPage['Page_Meta_Title']; ?>" class="formField">
                </div>
            </div>
            <!-- Page Description -->
            <div class="form-group">
                <label class="formLabel">Page Description <small>characters: <span id="charNum"></span> <em>(300 characters or fewer)</em></small></label>
                <div class="colInput">
                    <textarea id="field" onkeyup="countChar(this)" name="Page_Meta_Desc" rows="3"
                              class="formField"><?php echo $GetPage['Page_Meta_Desc']; ?></textarea>
                </div>
            </div>
            <!-- Page Keywords -->
            <div class="form-group">
                <label class="formLabel">Page Keywords</label>

                <div class="colInput formLabelHor">
                    <textarea name="Page_Meta_Keywords" rows="2"
                              class="formField"><?php echo $GetPage['Page_Meta_Keywords']; ?></textarea>
                </div>
            </div>
            <!-- Page Keywords -->
            <div class="form-group">
                <label class="formLabel">Social Media Description</label>

                <div class="colInput">
                    <textarea name="Page_Meta_SocialDesc" rows="2"
                              class="formField"><?php echo $GetPage['Page_Meta_SocialDesc']; ?></textarea>
                </div>
            </div>
            <!--    Canonical   -->
            <div class="form-group">
                <label class="formLabel">Canonical URL</label>

                <div class="colInput">
                    <input type="text" name="Page_Canonical_URL"
                           value="<?php echo $GetPage['Page_Canonical_URL']; ?>" class="formField">
                </div>
            </div>
        </div><!-- yellowBox -->

        <!-- XML Sitemap -->
        <!-- ----------- -->

        <div class="blueBox">
            <div class="title">XML Sitemap</div>

            <div class="admGrid4Cols">
                <div>
                    <div class="form-group">
                         <label class="formLabel">Priority <i class="fas fa-question-circle admInfo cGreen" title="<?php echo $textxmlexclude; ?>"></i></label>
                         <input type="text" name="Page_SMPriority" size="4" maxlength="4" class="formField" value="<?php echo $GetPage['Page_SMPriority']; ?>">
                     </div>
                </div>
                <div>
                    <div class="top25"></div>
                    <?php editRecCheck("Export Records","Page_XMLSiteMap",$GetPage['Page_XMLSiteMap'])?>
                </div>
            </div>

        </div>


        <div class="admGrid2Cols">
            <?php if ($GetPage['Page_Header_Flag'] == 1) { ?>
            <div>
                <!-- ********** Templates & Styles ********** -->
                <!-- **************************************** -->

                <?php if ((Auth::accessLevel() == 0) OR ($accAdm['Acc_PageEditSettings'] == 1)) { ?>

                        <div class="orangeBox menuTabs categorySettingsTabs">
                            <a href="#" class="title categorySettingsTab cDefault active" data-tab="desktop"><i class="fas fa-desktop"></i> Desktop Templates Settings</a>
                            <a href="#" class="title categorySettingsTab cDefault" data-tab="mobile"><i class="fas fa-mobile-alt"></i> Mobile Templates Settings</a>
                        </div>

                        <div class="menuTabsCont">

                            <div class="orangeBox menuTabCont" data-tabname="desktop">


                                <div class="admGrid2Cols">
                                    <div>
                                        <!--   Category Template  -->
                                        <div class="form-group">
                                            <label class="formLabel">Category Template</label>

                                            <div class="colInput">
                                                <?php
                                                $stemps = "SELECT * FROM build_layout";
                                                $qtemps = q($stemps);
                                                ?>
                                                <select name="Page_Temp_ID" class="formField">
                                                    <?php while ($temps = f($qtemps)) { ?>
                                                        <option
                                                            value="<?php echo $temps['BLayout_ID']; ?>" <?php if ($temps['BLayout_ID'] == $GetPage['Page_Temp_ID']) echo 'selected'; ?>><?php echo $temps['BLayout_Name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <!--   Category Layout Style / Select Styles - Links  -->
                                        <div class="form-group">
                                            <label class="formLabel">Category Layout Style</label>
                                            <div class="colInput">
                                                <?php
                                                $seps = "SELECT * FROM layout_styles";
                                                $qseps = q($seps);
                                                ?>
                                                <select name="Page_Style_ID" class="formField">
                                                    <option value="0">----</option>
                                                    <?php while ($pstyles = f($qseps)) { ?>
                                                        <option
                                                            value="<?php echo $pstyles['Style_ID']; ?>" <?php if ($pstyles['Style_ID'] == $GetPage['Page_Style_ID']) echo 'selected'; ?>><?php echo $pstyles['Style_Name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label class="formLabel"><?php print $textSelect; ?> Styles - Links</label>
                                            <div class="colInput">
                                                <?php
                                                $GetSTL_Sel = "SELECT * FROM layout_styles  Order by Style_ID";
                                                $GetSTL_Query = q($GetSTL_Sel);
                                                ?>
                                                <select name="Page_Styles_Links" class="formField">
                                                    <option value="0">----</option>
                                                    <?php while ($GetSTL = f($GetSTL_Query)) { ?>
                                                        <option
                                                            value="<?php echo $GetSTL['Style_ID']; ?>" <?php if ($GetSTL['Style_ID'] == $GetPage['Page_Styles_Links']) echo 'selected'; ?>><?php echo $GetSTL['Style_Name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <!--   Record Template / Record Layout Style -->
                                        <div class="form-group">
                                            <label class="formLabel">Record Template</label>
                                            <div class="colInput">
                                                <?php
                                                $stemps = "SELECT * FROM build_layout";
                                                $qtemps = q($stemps);
                                                ?>
                                                <select name="Page_RecTemp_ID" class="formField">
                                                    <?php while ($temps = f($qtemps)) { ?>
                                                        <option
                                                            value="<?php echo $temps['BLayout_ID']; ?>" <?php if ($temps['BLayout_ID'] == $GetPage['Page_RecTemp_ID']) echo 'selected'; ?>><?php echo $temps['BLayout_Name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label class="formLabel">Record Layout Style</label>
                                            <div class="colInput">
                                                <?php
                                                $seps = "SELECT * FROM layout_styles";
                                                $qseps = q($seps);
                                                ?>
                                                <select name="Page_RecStyle_ID" class="formField">
                                                    <option value="0">----</option>
                                                    <?php while ($pstyles = f($qseps)) { ?>
                                                        <option
                                                            value="<?php echo $pstyles['Style_ID']; ?>" <?php if ($pstyles['Style_ID'] == $GetPage['Page_RecStyle_ID']) echo 'selected'; ?>><?php echo $pstyles['Style_Name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <!--  Header Name / Show Photo Galleries only from   -->
                                        <div class="form-group">
                                            <label class="formLabel">Header Name</label>
                                            <div class="colInput">
                                                <select name="Page_Header" class="formField">
                                                    <option value="default" selected>-- <?php print $textDefault; ?> --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label class="formLabel"><?php print $textPhtGalleryCh; ?> <i class="fas fa-question-circle admInfo cGreen" title="<?php echo $textPhtGallInfo; ?>"></i></label>
                                            <div class="colInput">
                                                <!-- ΕΠΙΛΟΓΗ ΚΑΤΗΓΟΡΙΑΣ ΦΩΤΟΓΡΑΦΙΩΝ -->
                                                <!-- Επιλέγει όλα τα Page Header, και τα εμφανίζει στο drop down. Ουσιαστικά το κάθε Page Header αποτελεί μια αυτόνομη
                                                κεντρική κατηγορία λίστας φωτογραφιών αφού κάτω από αυτό υπάρχουν πολλές υποκατηγορίες
                                                Με την επιλογή το πεδίο Page_ImgCat_Hid παίρνει την τιμή του Page_ID από το αντίστοχο Header -->
                                                <select name="Page_ImgCat_Hid" class="formField">
                                                    <option value="" selected>-- <?php print $textSelect; ?> --</option>
                                                    <option value class="emphasised">&raquo; from
                                                        Lang <?php echo $defaultLang; ?></option>
                                                    <?php
                                                    // Default Lang
                                                    $sel_headers = "SELECT Page_ID,Page_Name FROM pages WHERE Page_Header_Flag = 1 AND Page_Lang = '$defaultLang' AND Page_Section = '".$_SESSION["AdminSection"]."'";
                                                    $headers_result = q($sel_headers);

                                                    while ($getHeaders = f($headers_result)) {
                                                        ?>
                                                        <option
                                                            value="<?php echo $getHeaders['Page_ID']; ?>" <?php if ($getHeaders['Page_ID'] == $GetPage['Page_ImgCat_Hid']) echo 'selected'; ?>><?php echo $getHeaders['Page_Name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    $Select_Lang = "SELECT * FROM lang WHERE Lang_Title <> '$defaultLang'";
                                                    $Select_Lang_q = q($Select_Lang);
                                                    while ($GetLang = f($Select_Lang_q)) { ?>
                                                        <option value class="emphasised">&nbsp;&raquo; from
                                                            Lang <?php echo $GetLang['Lang_Title']; ?></option>
                                                        <?php
                                                        // Default Lang
                                                        $sel_headers = "SELECT Page_ID,Page_Name FROM pages WHERE Page_Header_Flag = 1 AND Page_Lang = '".$GetLang["Lang_Title"]."' AND Page_Section = '".$_SESSION["AdminSection"]."' Order by Page_Lang";
                                                        $headers_result = q($sel_headers);

                                                        while ($getHeaders = f($headers_result)) {
                                                            ?>
                                                            <option
                                                                value="<?php echo $getHeaders['Page_ID']; ?>" <?php if ($getHeaders['Page_ID'] == $GetPage['Page_ImgCat_Hid']) echo 'selected'; ?>><?php echo $getHeaders['Page_Name']; ?></option>
                                                            <?php
                                                        }
                                                    } // while($GetLang
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>


                        <!--      MOBILE     -->
                        <!--  *************  -->

                        <?php if ((Auth::accessLevel() == 0) OR ($accAdm['Acc_PageEditSettings'] == 1)) { ?>
                            <div class="orangeBox menuTabCont" data-tabname="mobile" style="display:none">

                            <div class="admGrid2Cols">
                                <div>
                                    <!-- Select Template -->
                                    <div class="form-group">
                                        <label class="formLabel"><?php print $textSelect; ?> Template</label>
                                        <div class="colInput">
                                            <?php
                                            $stemps = "SELECT * FROM build_layout";
                                            $qtemps = q($stemps);
                                            ?>
                                            <select name="Page_Temp_ID_Mob" class="formField">
                                                <?php while ($temps = f($qtemps)) { ?>
                                                    <option
                                                        value="<?php echo $temps['BLayout_ID']; ?>" <?php if ($temps['BLayout_ID'] == $GetPage['Page_Temp_ID_Mob']) echo 'selected'; ?>><?php echo $temps['BLayout_Name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <!-- Layout Style -->
                                    <div class="form-group">
                                        <label class="formLabel"><?php print $textSelect; ?> Layout Style</label>
                                        <div class="colInput">
                                            <?php
                                            $seps = "SELECT * FROM layout_styles";
                                            $qseps = q($seps);
                                            ?>
                                            <select name="Page_Style_ID_Mob" class="formField">
                                                <option value="0">----</option>
                                                <?php while ($pstyles = f($qseps)) { ?>
                                                    <option
                                                        value="<?php echo $pstyles['Style_ID']; ?>" <?php if ($pstyles['Style_ID'] == $GetPage['Page_Style_ID_Mob']) echo 'selected'; ?>><?php echo $pstyles['Style_Name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <!-- Styles - Links -->
                                    <div class="form-group">
                                        <label class="formLabel"><?php print $textSelect; ?> Styles - Links</label>
                                        <div class="colInput">
                                            <?php
                                            $GetSTL_Sel = "SELECT * FROM layout_styles  Order by Style_ID";
                                            $GetSTL_Query = q($GetSTL_Sel);
                                            ?>
                                            <select name="Page_Styles_Links_Mob" class="formField">
                                                <option value="0">----</option>
                                                <?php while ($GetSTL = f($GetSTL_Query)) { ?>
                                                    <option
                                                        value="<?php echo $GetSTL['Style_ID']; ?>" <?php if ($GetSTL['Style_ID'] == $GetPage['Page_Styles_Links_Mob']) echo 'selected'; ?>><?php echo $GetSTL['Style_Name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        <?php } else { // if Acc_PageEditSettings ?>
                            <input type="Hidden" name="mobenable" value="<?php echo $GetPage["Page_Mob_Enable"]; ?>">
                            <input type="Hidden" name="Page_Type_Mob" value="<?php echo $GetPage["Page_Type_Mob"]; ?>">
                            <input type="Hidden" name="Page_Lists_Mob" value="<?php echo $GetPage["Page_Lists_Mob"]; ?>">
                            <input type="Hidden" name="Page_HeadLists_Mob" value="<?php echo $GetPage["Page_HeadLists_Mob"]; ?>">
                            <input type="Hidden" name="Page_Rec_Mob" value="<?php echo $GetPage["Page_Rec_Mob"]; ?>">
                            <input type="Hidden" name="Page_Temp_ID_Mob" value="<?php echo $GetPage["Page_Temp_ID_Mob"]; ?>">
                            <input type="Hidden" name="Page_Style_ID_Mob" value="<?php echo $GetPage["Page_Style_ID_Mob"]; ?>">
                            <input type="Hidden" name="Page_Styles_Links_Mob" value="<?php echo $GetPage["Page_Styles_Links_Mob"]; ?>">
                        <?php } ?>
                    </div>
                </div>

            <?php } else { // if Acc_PageEditSettings ?>
                <input type="Hidden" name="Page_ImgCat_Hid" value="<?php echo $GetPage["Page_ImgCat_Hid"]; ?>">
                <input type="Hidden" name="Page_Temp_ID" value="<?php echo $GetPage["Page_Temp_ID"]; ?>">
                <input type="Hidden" name="Page_Style_ID" value="<?php echo $GetPage["Page_Style_ID"]; ?>">
                <input type="Hidden" name="Page_Style_ID" value="<?php echo $GetPage["Page_Style_ID"]; ?>">
                <input type="Hidden" name="Page_RecTemp_ID" value="<?php echo $GetPage["Page_RecTemp_ID"]; ?>">
                <input type="Hidden" name="Page_RecStyle_ID" value="<?php echo $GetPage["Page_RecStyle_ID"]; ?>">
                <input type="Hidden" name="Page_Header" value="<?php echo $GetPage["Page_Header"]; ?>">
            <?php } ?>
        </div>
        <?php }?>

            <div>
                <?php if ($CurList['Page_List_ID'] <> 6) { //Εάν η λίστα είναι banners να μη τα εμφανίσει ?>
                    <div class="orangeBox">
                        <!--    BANNERS     -->
                        <!--  ------------- -->
                        <div class="title">Banner Ad Slots</div>

                        <div class="admGrid2Cols">
                            <div>
                                <!-- Banners Top -->
                                <div class="form-group">
                                    <label class="formLabel">Banners Slot 1</label>
                                    <div class="colInput">
                                        <select name="Page_BanArea1" class="formField">
                                            <option value="0">Banners Caterory</option>
                                            <?php echo getCatBanners(0, 1, $GetPage['Page_BanArea1']); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label class="formLabel">Banners Slot 2</label>
                                    <div class="colInput">
                                        <select name="Page_BanArea2" class="formField">
                                            <option value="0">Banners Caterory</option>
                                            <?php echo getCatBanners(0, 1, $GetPage['Page_BanArea2']); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label class="formLabel">Banners Slot 3</label>
                                    <div class="colInput">
                                        <select name="Page_BanArea3" class="formField">
                                            <option value="0">Banners Caterory</option>
                                            <?php echo getCatBanners(0, 1, $GetPage['Page_BanArea3']); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label class="formLabel">Banners Slot 4</label>
                                    <div class="colInput">
                                        <select name="Page_BanArea4" class="formField">
                                            <option value="0">Banners Caterory</option>
                                            <?php echo getCatBanners(0, 1, $GetPage['Page_BanArea4']); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label class="formLabel">Banners Slot 5</label>
                                    <div class="colInput">
                                        <select name="Page_BanArea5" class="formField">
                                            <option value="0">Banners Caterory</option>
                                            <?php echo getCatBanners(0, 1, $GetPage['Page_BanArea5']); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                <?php }?>
            </div>

            <?php if ($GetPage['Page_Header_Flag'] != 1){ ?>
                <!-- Ean to Header_Flag = 0 -->
                <input type="Hidden" name="Page_Header" value="<?php echo $GetPage["Page_Header"]; ?>">
            <?php } ?>
        </div>

        <!--	buttons	-->
        <div class="top20 clear"></div>
        <div class="width100" align="center"></div>
        <br/>

        <div class="adminNav bgLighter borderLight">
                <div class="left" style="width:51%; text-align:right;">
                    <input type="submit" name="publish_rec" value="Publish & Exit" class="textBigger bgGreen cLight buttonLink">
                </div>
                <div class="left" style="width:20%; margin-left:2%;">
                    <input type="submit" class="textBigger bgColor cLight buttonLink" name="save_rec" value="Save">
                </div>
                <div class="left top8" style="text-align:right;width:27%;">
                    <a href="index.php?ID=pages_view" class="textBigger cDefault buttonLink"><i class="fas fa-reply"></i> Back</a>
                </div>
                <div style="clear:both;"></div>
        </div>
    </form>

    <div class="clear"></div>
</div>


<?php
// CHANGE CATEGORY
// ***************
function getCatCambRecursesion($F_id, $F_echoSpaces, $sPPageID, $Section)
{
    $qu = "SELECT * FROM pages WHERE Parent_Page_ID = $F_id AND Page_Lang = '".$_SESSION["AdminLang"]."' AND Page_Section = '$Section' Order by Page_Order";
    $re = q($qu);
    while ($re_set = f($re)) {

        if ($re_set['Parent_Page_ID'] == 0) {
            $diaxor = str_repeat("> ", $F_echoSpaces);
        } else {
            $diaxor = str_repeat("&nbsp;&nbsp;", $F_echoSpaces);
        }

        $sPageID = $re_set['Page_ID'];
        $sPageName = $re_set['Page_Name'];
        $ParPageID = $re_set['Parent_Page_ID'];
        ?>
        <option
            value="<?php echo $sPageID; ?>" <?php if ($sPPageID == $sPageID) echo "Selected"; ?>><?php echo $diaxor . $sPageName; ?></option>
        <?php
        $qu1 = "select * from pages where Parent_Page_ID=".$re_set["Page_ID"];
        $re1 = q($qu1);
        if (nr($re1) > 0) {
            $echoSpaces = $F_echoSpaces + 2;
            getCatCambRecursesion($re_set["Page_ID"], $echoSpaces, $sPPageID, $Section);
        }
    }//end of while
}//end of function getCatCambRecursesion()


// BANNERS CATEGORIES
// ******************
function getCatBanners($F_id, $F_echoSpaces, $sPPageID)
{
    $qu = "SELECT * FROM pages WHERE Parent_Page_ID = $F_id AND Page_Section = 'banners' Order by Page_Order";
    $re = q($qu);
    while ($re_set = f($re)) {

        if ($re_set['Parent_Page_ID'] == 0) {
            $diaxor = str_repeat("> ", $F_echoSpaces);
        } else {
            $diaxor = str_repeat("&nbsp;&nbsp;", $F_echoSpaces);
        }

        $sPageID = $re_set['Page_ID'];
        $sPageName = $re_set['Page_Name'];
        $ParPageID = $re_set['Parent_Page_ID'];

        if ($re_set['Parent_Page_ID'] == 0) { ?>
            <option value=""></option> <?php } ?>
        <option
            value="<?php echo $sPageID; ?>" <?php if ($sPPageID == $sPageID) echo "Selected"; ?>><?php echo $diaxor . $sPageName; ?></option>
        <?php $qu1 = "select * from pages where Parent_Page_ID=".$re_set["Page_ID"];
        $re1 = q($qu1);
        if (nr($re1) > 0) {
            $echoSpaces = $F_echoSpaces + 2;
            getCatBanners($re_set["Page_ID"], $echoSpaces, $sPPageID);
        }

    }//end of while
}//end of function ()
?>
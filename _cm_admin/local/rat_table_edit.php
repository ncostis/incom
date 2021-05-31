<?php
session_start();
require_once("../init.php");
require_once($routes["initvars.php"]);
require_once($routes["settingsvars.php"]);

// timestamp
$gmt = $GetVar['Rec_Field20'] * 60 * 60;
$timestamp = time() + $gmt;
?>
<!DOCTYPE HTML>
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
    <?php require_once($routes["head_script.php"]); ?>
   <link href="<?php echo $rootPath; ?>css/layout.css" rel="stylesheet" type="text/css">
    <meta name="copyright" content="Copyright © Overron LTD, All rights reserved.">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="<?php echo $rootPath; ?>js/sortable_drag_and_drop.js"></script>
    <script src="<?php echo $rootPath; ?>js/incom_ipsum.min.js"></script>
    <?php require_once($routes["javascripts.php"]); ?>

</head>

<body class="bgMedium">
<div class="contentArea">
    <?php
    $Rat_ID = getparamvalue('Rat_ID');
    $GetRat = f(q("SELECT * FROM recs_att_tables WHERE Rat_ID = $Rat_ID LIMIT 1"));

    $Rec_ID = getparamvalue('Rec_ID');
    $GetRec_Sel = "SELECT * FROM pages,records WHERE Rec_ID = $Rec_ID AND Page_ID = Rec_Page_ID";
    $GetRec_Query = q($GetRec_Sel);
    $GetRec = f($GetRec_Query);

    $SubCat = getparamvalue('SubCat');
    $List_ID = getparamvalue('List_ID');
    $ListCat_ID = getparamvalue('ListCat_ID');
    $Rat_Page_ID = getparamvalue('RatPageID');

    $GetRenameString_Sel = "SELECT * FROM incom_keys WHERE ID = 1";
    $GetRenameString_Query = q($GetRenameString_Sel);
    $GetRenameString = f($GetRenameString_Query);
    $RenameString = $GetRenameString['RenameString'];
    ?>
    <script type="text/javascript" src="<?php echo $rootPath."editor_".$RenameString; ?>/ckeditor.js"></script>

    <script>
        function callFromDialog(data) { //for callback from the dialog
            document.getElementById('imgGalID').value = data;
            var currentLocation = window.location;
            // &var ή ?var αν είναι απ' ευθείας το URL
            window.location.href = currentLocation + '&newPhotoGalID=' + data;
        }
    </script>
    <script>
        function callFromDialogNR(data) { //for callback from the dialog
            document.getElementById('imgGalNRID').value = data;
            var currentLocation = window.location;
            // &var ή ?var αν είναι απ' ευθείας το URL
            window.location.href = currentLocation + '&newPhotoGalNRID=' + data;
        }
    </script>
    <script>
        function callFromDialogRelLang(data) { //for callback from the dialog
            document.getElementById('relLangRec').value = data;
            var currentLocation = window.location;
            // &var ή ?var αν είναι απ' ευθείας το URL
            window.location.href = currentLocation + '&newRelLangRec=' + data;
        }
    </script>

    <!-- <link href="<?php echo $rootPath; ?>js/file_uploader/style.css" rel="stylesheet" type="text/css"> -->
    <link href="<?php echo $rootPath; ?>js/dropzone/dropzone.css" rel="stylesheet">
    <link href="<?php echo $rootPath; ?>js/dropzone/basic.css" rel="stylesheet">
    <!-- <link href="js/fancybox/jquery.fancybox.css" rel="stylesheet"> -->
    <script src="<?php echo $rootPath; ?>js/dropzone/dropzone.min.js"></script>
    <!-- <script src="js/fancybox/jquery.fancybox.pack.js"></script> -->

    <?php //require "js/file_uploader/javascripts.php"; ?>

    <?php
    require_once($routes["convert_case_text.php"]);
    require_once($routes["functions_fields.php"]);
    $AdminUser_ID = $_SESSION["UserID"];

    //modify date
    $month = date('m');
    $year = date('Y');
    $Modify_Date = gmdate("Y-m-d,H:i", $timestamp);
    ?>

    <?php

    // update record with attached photo gallery
    if (getparamvalue('newPhotoGalID') <> '') {
        $upr = "UPDATE recs_att_tables SET Rat_Img_Cat_ID = '".$_GET["newPhotoGalID"]."' WHERE Rat_ID = \"$Rat_ID\"";
        q($upr);
        ?>
        <script language="JavaScript">
            window.location = "rat_table_edit.php?Rat_ID=<?php echo $Rat_ID; ?>&Rec_ID=<?php echo $Rec_ID; ?>&List_ID=<?php echo $List_ID; ?>&ListCat_ID=<?php echo $ListCat_ID; ?>&SubCat=<?php echo $SubCat; ?>&RatPageID=<?php echo $Rat_Page_ID; ?>";
        </script>
        <?php
    }
    // delete photo gallery from record
    if (getparamvalue('delPG') == 1) {
        $upr = "UPDATE recs_att_tables SET Rat_Img_Cat_ID = '' WHERE Rat_ID = \"$Rat_ID\"";
        q($upr);
        ?>
        <script language="JavaScript">
            window.location = "rat_table_edit.php?Rat_ID=<?php echo $Rat_ID; ?>&Rec_ID=<?php echo $Rec_ID; ?>&List_ID=<?php echo $List_ID; ?>&ListCat_ID=<?php echo $ListCat_ID; ?>&SubCat=<?php echo $SubCat; ?>&RatPageID=<?php echo $Rat_Page_ID; ?>";
        </script>
        <?php
    }

    // Create Editors
    $Text1 = stripslashes(preg_replace('#(\\\r|\\\r\\\n|\\\n|\\\)#', '', getparamvalue('Rat_Text1')));
    $Text2 = stripslashes(preg_replace('#(\\\r|\\\r\\\n|\\\n|\\\)#', '', getparamvalue('Rat_Text2')));

    $tablename = "searchtext";
    //find search id
    $GetSearchText_Sel = "SELECT * FROM $tablename WHERE SRec_ID = $Rec_ID";
    $GetSearchText_Query = q($GetSearchText_Sel);
    $GetSearchText = f($GetSearchText_Query);
    $SID = $GetSearchText['SID'];

    if (strlen($Text1) > 2) {
        if (!is_dir("../../texts/" . $year)) {
            mkdir("../../texts/" . $year);
        }
        if (!is_dir("../../texts/" . $year . "/" . $month)) {
            mkdir("../../texts/" . $year . "/" . $month);
        }
        $FileName1 = $year . "/" . $month . "/" . getparamvalue('Rat_ID') . "_rat1";
        $FileNamePath1 = "../../texts/" . $year . "/" . $month . "/" . getparamvalue('Rat_ID') . "_rat1.htm";
        $ourFileHandle = fopen($FileNamePath1, 'w') or die("can't open file 1 $FileNamePath1");
        fwrite($ourFileHandle, $Text1);
        fclose($ourFileHandle);
    }
    if (strlen($Text2) > 2) {
        if (!is_dir("../../texts/" . $year)) {
            mkdir("../../texts/" . $year);
        }
        if (!is_dir("../../texts/" . $year . "/" . $month)) {
            mkdir("../../texts/" . $year . "/" . $month);
        }
        $FileName2 = $year . "/" . $month . "/" . getparamvalue('Rat_ID') . "_rat2";
        $FileNamePath2 = "../../texts/" . $year . "/" . $month . "/" . getparamvalue('Rat_ID') . "_rat2.htm";
        $ourFileHandle = fopen($FileNamePath2, 'w') or die("can't open file 2 $FileNamePath2");
        fwrite($ourFileHandle, $Text2);
        fclose($ourFileHandle);
    }

    if ((getparamvalue('save_rec') <> '') OR (getparamvalue('publish_rec') <> '')) {
        $Rat_Rec_ID = getparamvalue('Rat_Rec_ID');
        $Rat_ID = getparamvalue('Rat_ID');

        $Rat_Title = stringfordb('Rat_Title');
        $Rat_Desc = stringfordb('Rat_Desc');
        $Rat_Order = getparamvalue('Rat_Order');

        $Rat_TextArea1 = stringfordb('Rat_TextArea1');
        $Rat_TextArea2 = stringfordb('Rat_TextArea2');
        $Rat_TextArea3 = stringfordb('Rat_TextArea3');
        $Rat_TextArea4 = stringfordb('Rat_TextArea4');

        $Rat_Field1 = stringfordb('Rat_Field1');
        $Rat_Field2 = stringfordb('Rat_Field2');
        $Rat_Field3 = stringfordb('Rat_Field3');
        $Rat_Field4 = stringfordb('Rat_Field4');
        $Rat_Field5 = stringfordb('Rat_Field5');
        $Rat_Field6 = stringfordb('Rat_Field6');
        $Rat_Field7 = stringfordb('Rat_Field7');
        $Rat_Field8 = stringfordb('Rat_Field8');
        $Rat_Field9 = stringfordb('Rat_Field9');
        $Rat_Field10 = stringfordb('Rat_Field10');
        $Rat_Field11 = stringfordb('Rat_Field11');
        $Rat_Field12 = stringfordb('Rat_Field12');
        $Rat_Field13 = stringfordb('Rat_Field13');
        $Rat_Field14 = stringfordb('Rat_Field14');
        $Rat_Field15 = stringfordb('Rat_Field15');
        $Rat_Field16 = stringfordb('Rat_Field16');
        $Rat_Field17 = stringfordb('Rat_Field17');
        $Rat_Field18 = stringfordb('Rat_Field18');
        $Rat_Field19 = stringfordb('Rat_Field19');
        $Rat_Field20 = stringfordb('Rat_Field20');
        $Rat_Field21 = stringfordb('Rat_Field21');
        $Rat_Field22 = stringfordb('Rat_Field22');
        $Rat_Field23 = stringfordb('Rat_Field23');
        $Rat_Field24 = stringfordb('Rat_Field24');
        $Rat_Field25 = stringfordb('Rat_Field25');
        $Rat_Field26 = stringfordb('Rat_Field26');
        $Rat_Field27 = stringfordb('Rat_Field27');
        $Rat_Field28 = stringfordb('Rat_Field28');
        $Rat_Field29 = stringfordb('Rat_Field29');
        $Rat_Field30 = stringfordb('Rat_Field30');
        //------------->Field30
        $Rat_Price = getparamvalue('Rat_Price');
        $Rat_Discount = getparamvalue('Rat_Discount');
        $Rat_Weight = getparamvalue('Rat_Weight');
        $Rat_Stock = getparamvalue('Rat_Stock');
        $Rat_Availability = getparamvalue('Rat_Availability');

        $Rat_Check1 = getparamvalue('Rat_Check1');
        $Rat_Check2 = getparamvalue('Rat_Check2');
        $Rat_Check3 = getparamvalue('Rat_Check3');
        $Rat_Check4 = getparamvalue('Rat_Check4');
        $Rat_Check5 = getparamvalue('Rat_Check5');
        $Rat_Check6 = getparamvalue('Rat_Check6');
        $Rat_Check7 = getparamvalue('Rat_Check7');
        $Rat_Check8 = getparamvalue('Rat_Check8');
        $Rat_Check9 = getparamvalue('Rat_Check9');
        $Rat_Check10 = getparamvalue('Rat_Check10');
        $Rat_Check11 = getparamvalue('Rat_Check11');
        $Rat_Check12 = getparamvalue('Rat_Check12');
        $Rat_Check13 = getparamvalue('Rat_Check13');
        $Rat_Check14 = getparamvalue('Rat_Check14');
        $Rat_Check15 = getparamvalue('Rat_Check15');
        $Rat_Check16 = getparamvalue('Rat_Check16');
        $Rat_Check17 = getparamvalue('Rat_Check17');
        $Rat_Check18 = getparamvalue('Rat_Check18');
        $Rat_Check19 = getparamvalue('Rat_Check19');
        $Rat_Check20 = getparamvalue('Rat_Check20');
        $Rat_Check21 = getparamvalue('Rat_Check21');
        $Rat_Check22 = getparamvalue('Rat_Check22');
        $Rat_Check23 = getparamvalue('Rat_Check23');
        $Rat_Check24 = getparamvalue('Rat_Check24');
        $Rat_Check25 = getparamvalue('Rat_Check25');
        $Rat_Check26 = getparamvalue('Rat_Check26');
        $Rat_Check27 = getparamvalue('Rat_Check27');
        $Rat_Check28 = getparamvalue('Rat_Check28');
        $Rat_Check29 = getparamvalue('Rat_Check29');
        $Rat_Check30 = getparamvalue('Rat_Check30');
        $Rat_Check31 = getparamvalue('Rat_Check31');
        $Rat_Check32 = getparamvalue('Rat_Check32');
        $Rat_Check33 = getparamvalue('Rat_Check33');
        $Rat_Check34 = getparamvalue('Rat_Check34');
        $Rat_Check35 = getparamvalue('Rat_Check35');
        $Rat_Check36 = getparamvalue('Rat_Check36');
        $Rat_Check37 = getparamvalue('Rat_Check37');
        $Rat_Check38 = getparamvalue('Rat_Check38');
        $Rat_Check39 = getparamvalue('Rat_Check39');
        $Rat_Check40 = getparamvalue('Rat_Check40');
        //------------->Field40

        //------------->Record View
        $Rat_View = getparamvalue('Rat_View');

        //------------->Record Scroll
        $Rat_Scroll1 = getparamvalue('Rat_Scroll1');
        $Rat_Scroll2 = getparamvalue('Rat_Scroll2');
        $Rat_Scroll3 = getparamvalue('Rat_Scroll3');
        $Rat_Scroll4 = getparamvalue('Rat_Scroll4');
        $Rat_Scroll5 = getparamvalue('Rat_Scroll5');
        //------------->Field5

        $Rat_DateStart = getparamvalue('Rat_DateStart');
        $Rat_DateStop = getparamvalue('Rat_DateStop');

        $upr = "
                UPDATE recs_att_tables
                SET
                    Rat_Title = '$Rat_Title',
                    Rat_Page_ID = '$Rat_Page_ID',
                    Rat_Desc = '$Rat_Desc',
                    Rat_Order = '$Rat_Order',

                    Rat_TextArea1 = '$Rat_TextArea1',
                    Rat_TextArea2 = '$Rat_TextArea2',
                    Rat_TextArea3 = '$Rat_TextArea3',
                    Rat_TextArea4 = '$Rat_TextArea4',

                    Rat_Field1 = '$Rat_Field1',
                    Rat_Field2 = '$Rat_Field2',
                    Rat_Field3 = '$Rat_Field3',
                    Rat_Field4 = '$Rat_Field4',
                    Rat_Field5 = '$Rat_Field5',
                    Rat_Field6 = '$Rat_Field6',
                    Rat_Field7 = '$Rat_Field7',
                    Rat_Field8 = '$Rat_Field8',
                    Rat_Field9 = '$Rat_Field9',
                    Rat_Field10 = '$Rat_Field10',
                    Rat_Field11 = '$Rat_Field11',
                    Rat_Field12 = '$Rat_Field12',
                    Rat_Field13 = '$Rat_Field13',
                    Rat_Field14 = '$Rat_Field14',
                    Rat_Field15 = '$Rat_Field15',
                    Rat_Field16 = '$Rat_Field16',
                    Rat_Field17 = '$Rat_Field17',
                    Rat_Field18 = '$Rat_Field18',
                    Rat_Field19 = '$Rat_Field19',
                    Rat_Field20 = '$Rat_Field20',
                    Rat_Field21 = '$Rat_Field21',
                    Rat_Field22 = '$Rat_Field22',
                    Rat_Field23 = '$Rat_Field23',
                    Rat_Field24 = '$Rat_Field24',
                    Rat_Field25 = '$Rat_Field25',
                    Rat_Field26 = '$Rat_Field26',
                    Rat_Field27 = '$Rat_Field27',
                    Rat_Field28 = '$Rat_Field28',
                    Rat_Field29 = '$Rat_Field29',
                    Rat_Field30 = '$Rat_Field30',

                    Rat_Price = '$Rat_Price',
                    Rat_Discount = '$Rat_Discount',
                    Rat_Weight = '$Rat_Weight',
                    Rat_Stock = '$Rat_Stock',
                    Rat_Availability = '$Rat_Availability',

                    Rat_Check1 = '$Rat_Check1',
                    Rat_Check2 = '$Rat_Check2',
                    Rat_Check3 = '$Rat_Check3',
                    Rat_Check4 = '$Rat_Check4',
                    Rat_Check5 = '$Rat_Check5',
                    Rat_Check6 = '$Rat_Check6',
                    Rat_Check7 = '$Rat_Check7',
                    Rat_Check8 = '$Rat_Check8',
                    Rat_Check9 = '$Rat_Check9',
                    Rat_Check10 = '$Rat_Check10',
                    Rat_Check11 = '$Rat_Check11',
                    Rat_Check12 = '$Rat_Check12',
                    Rat_Check13 = '$Rat_Check13',
                    Rat_Check14 = '$Rat_Check14',
                    Rat_Check15 = '$Rat_Check15',
                    Rat_Check16 = '$Rat_Check16',
                    Rat_Check17 = '$Rat_Check17',
                    Rat_Check18 = '$Rat_Check18',
                    Rat_Check19 = '$Rat_Check19',
                    Rat_Check20 = '$Rat_Check20',
                    Rat_Check21 = '$Rat_Check21',
                    Rat_Check22 = '$Rat_Check22',
                    Rat_Check23 = '$Rat_Check23',
                    Rat_Check24 = '$Rat_Check24',
                    Rat_Check25 = '$Rat_Check25',
                    Rat_Check26 = '$Rat_Check26',
                    Rat_Check27 = '$Rat_Check27',
                    Rat_Check28 = '$Rat_Check28',
                    Rat_Check29 = '$Rat_Check29',
                    Rat_Check30 = '$Rat_Check30',
                    Rat_Check31 = '$Rat_Check31',
                    Rat_Check32 = '$Rat_Check32',
                    Rat_Check33 = '$Rat_Check33',
                    Rat_Check34 = '$Rat_Check34',
                    Rat_Check35 = '$Rat_Check35',
                    Rat_Check36 = '$Rat_Check36',
                    Rat_Check37 = '$Rat_Check37',
                    Rat_Check38 = '$Rat_Check38',
                    Rat_Check39 = '$Rat_Check39',
                    Rat_Check40 = '$Rat_Check40',

                    Rat_Scroll1 = '$Rat_Scroll1',
                    Rat_Scroll2 = '$Rat_Scroll2',
                    Rat_Scroll3 = '$Rat_Scroll3',
                    Rat_Scroll4 = '$Rat_Scroll4',
                    Rat_Scroll5 = '$Rat_Scroll5',

                    Rat_Text1 = '$FileName1',
                    Rat_Text2 = '$FileName2',
                    Rat_View    = '$Rat_View',

                    Rat_DateStart = '$Rat_DateStart',
                    Rat_DateStop = '$Rat_DateStop'

                WHERE Rat_ID = \"$Rat_ID\"
                ";
        q($upr);


        //Create - Update record in table searchtext
        //$finalSStr = "";
        //$GetTexts_Sel = "SELECT * FROM recs_att_tables WHERE Rat_Rec_ID = $Rec_ID";
        //$GetTexts_Query = q($GetTexts_Sel);
        //while ($GetTexts = f($GetTexts_Query)) {
            //$FileTextPath = "../texts/" . $GetTexts['Rat_Text1'] . ".htm";
            //$finalSStr = $finalSStr . " " . createsearchtext($FileTextPath, $Rat_ID);
            //$finalSStr = " " . $GetTexts['Rat_Title'] . " " . $GetTexts['Rat_Desc'] . " " . $finalSStr;
            //$finalSStr = convertText($finalSStr);
        //}

        //update
        //$upr = "UPDATE $tablename SET STextAttTable = '$finalSStr' WHERE SID = $SID";
        //q($upr);
        // end of Create Editors
        ?>

        <?php
    // Εάν είναι Save πάει απ' ευθείας ξανά στο record
    if (isset($_POST['save_rec'])) { ?>
        <script language="JavaScript">
            window.location = "rat_table_edit.php?Rat_ID=<?php echo $Rat_ID; ?>&Rec_ID=<?php echo $Rec_ID; ?>&List_ID=<?php echo $List_ID; ?>&ListCat_ID=<?php echo $ListCat_ID; ?>&SubCat=<?php echo $SubCat; ?>&RatPageID=<?php echo $Rat_Page_ID; ?>";
        </script>
    <?php } ?>

        <script language="JavaScript">
            window.location = "rat_table_view.php?Rec_ID=<?php echo $Rec_ID; ?>&List_ID=<?php echo $List_ID; ?>&ListCat_ID=<?php echo $ListCat_ID; ?>&SubCat=<?php echo $SubCat; ?>";
        </script>
        <?php
    }

    // if we create a Rat Content record $RatCont = 1, then list_ID = List_Rat2
    // We get the List_Rat2 from the Page where rec has attached this recs_att_tables
    if (getparamvalue('RatCont') == 1) { //GET
        $SelPage = "SELECT * FROM pages,records WHERE Rec_ID = $Rec_ID AND Page_ID = Rec_Page_ID";
        $SelPage_Query = q($SelPage);
        $GetRecPage = f($SelPage_Query);
        //  euresi tipou
        $CatList_ID = $GetRecPage["Page_List_ID"];

        $SelectCont_List = "SELECT * FROM lists WHERE list_ID = '$CatList_ID'";
        $SelectCont_Query = q($SelectCont_List);
        $GetContList = f($SelectCont_Query);
        $List_ID = $GetContList['List_Rat2_ID'];
    }

    //  euresi tipou
    $GetList_Sel = "SELECT * FROM lists WHERE list_ID = '$List_ID'";
    $GetList_Query = q($GetList_Sel);
    $GetList = f($GetList_Query);

    //  euresi eggrafis
    $Select_Rec = "SELECT * FROM recs_att_tables WHERE Rat_ID = $Rat_ID";
    $Select_Rat_q = q($Select_Rec);
    $Select_Rat_row = f($Select_Rat_q);
    $curRatText1 = "../../texts/" . $Select_Rat_row['Rat_Text1'] . ".htm";
    $curRatText2 = "../../texts/" . $Select_Rat_row['Rat_Text2'] . ".htm";

    // If there is content at List_RecPage field, that means tha we have declare
    // another record_edit page with different fields descriptions than default
    // otherwise, if List_RecPage = "" then it shows record_edit_default.php

    if ($GetList['List_RecPage'] == "") {
        require_once "rat_table_edit_default.php";
    } else {
        $recpage = $GetList['List_RecPage'];
        require "$recpage";
    }

    require_once($routes["dropzone_controller.php"]);

    ?>
    <script>
        $(".dropzone .fancybox").each(function(){
            var dropzone  =  $(this).parents(".dropzone");
            $(this).fancybox({
                type:'iframe',
                width:1366,
                height:768,
                afterClose: function() {
                    var url =dropzone.find("img").attr('src');
                    dropzone.find("img").attr('src',url+"?v="+Date.now());
                    //$(document).trigger('StylesUploadForm', url+"?v="+Date.now());
                }
             });
        })

    </script>
    <?php
    //FUNTIONS
    function initImageTemplate($sourcePage,$templateID,$imageField,$imagePath,$dbID){
        global $GetRec;
        global $Path_File_Admin;

        if($sourcePage!="File1" && $sourcePage!="File2"){//find largest image available and get width and height
            if($GetRec[$imageField]<>""){
                $dimensions=generateDimensions();
                foreach ($dimensions as $folder => $value) {
                    if (file_exists($imagePath . $folder. "/" . $GetRec[$imageField])) {
                        $CreatedImage = imagecreatefromwebp($imagePath . $folder. "/" . $GetRec[$imageField]);
                        $InitWidth=imagesx($CreatedImage);
                        $InitHeight=imagesy($CreatedImage);
                        break;
                    }
                }
                if($InitWidth==""){ //if image is only on root folder
                    $ExtFile=substr($GetRec[$imageField], strrpos($GetRec[$imageField], '.') + 1);
                    if($ExtFile=="webp"){
                        $CreatedImage = imagecreatefromwebp($imagePath . $GetRec[$imageField]);
                    }elseif($ExtFile=="jpg"){
                        $CreatedImage = imagecreatefromjpeg($imagePath . $GetRec[$imageField]);
                    }elseif($ExtFile=="png") {
                        $CreatedImage = imagecreatefrompng($imagePath . $GetRec[$imageField]);
                    }elseif($ExtFile=="gif"){
                        $CreatedImage = imagecreatefromgif($imagePath . $GetRec[$imageField]);
                    }
                    $InitWidth=imagesx($CreatedImage);
                    $InitHeight=imagesy($CreatedImage);
                }
            }
        }


        print"<div id=\"".$templateID."\" class=\"ADMnone\">
                <div class=\"dz-preview dz-image-preview\">
                <div class=\"dz-image bgLighter\"><img data-dz-thumbnail=\"\"></div>";
                if($GetRec[$imageField]<>""){
                    if($sourcePage!="File1" && $sourcePage!="File2"){
                        print"<a href=\"";echo $imagePath;echo $GetRec[$imageField];print"\" target=\"_blank\" class=\"dz-details popUpImage \">";
                    }else{
                        print"<a href=\"";echo $Path_File_Admin;echo $GetRec[$imageField];print"\" target=\"_blank\" class=\"dz-details popUpImage \">";
                    }
                 }else{
                    print"<a href=\"#\" target=\"_blank\" class=\"dz-details\">";
                 }
                 print"<div class=\"dz-size\"><span data-dz-size=\"\"></span></div>
                        <div class=\"dz-filename\"><span data-dz-name=\"\"></span></div>
                        <div class=\"dz-remove cRed\"  data-dz-remove=\"\"></div>";

                print"</a>";

                   if($sourcePage!="Logo" && $sourcePage!="LogoFooter" && $sourcePage!="File1" && $sourcePage!="File2"){ print"<a class=\"ADMcropper popUpWindow cDefault\" href=\"";echo $baseURL;print"image_cropper.php?sourcePage=".$sourcePage."&dbID=".$dbID."&width=".$InitWidth."&height=".$InitHeight."\" data-width='92%' data-height='94%'></a>";}
                    print"<div class=\"dz-progress\"><span class=\"dz-upload\" data-dz-uploadprogress=\"\"></span></div>
                    <div class=\"dz-error-message\"><span data-dz-errormessage=\"\"></span></div>
                    <div class=\"dz-success-mark\">
                        <svg width=\"54px\" height=\"54px\" viewBox=\"0 0 54 54\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                            <title>Check</title>
                            <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                            <path d=\"M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z\" stroke-opacity=\"0.198794158\" stroke=\"#747474\" fill-opacity=\"0.816519475\" fill=\"#FFFFFF\"></path>
                            </g>
                        </svg>
                    </div>
                    <div class=\"dz-error-mark\">
                        <svg width=\"54px\" height=\"54px\" viewBox=\"0 0 54 54\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                            <title>Error</title>
                            <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                            <g stroke=\"#747474\" stroke-opacity=\"0.198794158\" fill=\"#FFFFFF\" fill-opacity=\"0.816519475\">
                            <path d=\"M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z\"></path>
                            </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>";
    }


    //Get only $len words from text srting
    function createsearchtext($FileNamePath, $Rec_ID)
    {
        if (file_exists($FileNamePath)) {
            $len = 350; //number of words
            $wordCount = 0;
            $charCount = 0;

            $str = file_get_contents("$FileNamePath");
            $length = strlen(strip_tags($str));
            for ($i = 0; $i < $length; $i++) {
                if ($str[$i] == " ") {
                    $wordCount++;
                    $charCount++;
                    if ($wordCount == $len)
                        break;
                } else {
                    $charCount++;
                } # end if
            } # end for loop

            $newstr = substr($str, 0, $charCount);
            //clear text srting from chars like <p><b><br> etc
            require "text_cleartags.php";
            $cleartagstr = strtr($newstr, $arrRemTag);

            //clear any word less than 5 chars
            $finalSStr = "";
            $step1 = explode(" ", $cleartagstr);
            // loop each word array
            foreach ($step1 as $eachWord) {
                $strchars = strlen(utf8_decode($eachWord));
                if ($strchars > 4) {
                    $finalSStr = $finalSStr . " " . $eachWord;
                }
            }
            return $finalSStr;

        }
    }

    function convertText($mystring)
    {
        // Αφαιρεί τους τόνους από τις λέξεις
        $alfavitlover = array('α', 'ε', 'η', 'ι', 'ι', 'ο', 'υ', 'ω');
        $alfavitupper = array('ά', 'έ', 'ή', 'ί', 'ϊ', 'ό', 'ύ', 'ώ');
        $mystring = str_replace($alfavitupper, $alfavitlover, $mystring);

        // convert Upper Case
        $lowercase = mb_convert_case($mystring, MB_CASE_UPPER, "UTF-8");
        return $lowercase;
    }

    ?>
    </div>
    <div class="top40"></div>
</body>
</html>
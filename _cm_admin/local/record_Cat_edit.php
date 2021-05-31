<?php
$GetRenameString_Sel = "SELECT * FROM incom_keys WHERE ID = 1";
$GetRenameString_Query = q($GetRenameString_Sel);
$GetRenameString = f($GetRenameString_Query);
$RenameString = $GetRenameString['RenameString'];
?>
<script type="text/javascript" src="<?php echo "editor_".$RenameString; ?>/ckeditor.js"></script>
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

<link href="<?php echo $rootPath; ?>js/file_uploader/style.css" rel="stylesheet" type="text/css">
<style>
    #upload-wrapper {
        width: 440px;
        margin-right: auto;
        margin-left: auto;
        margin-top: 20px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #8dabb3;
    }
</style>
<?php
require_once("init.php");
require "js/file_uploader/javascripts.php";
?>
<script type="text/javascript" src="<?php echo "editor_".$RenameString; ?>/ckeditor.js"></script>
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

<link href="js/dropzone/dropzone.css" rel="stylesheet">
<link href="js/dropzone/basic.css" rel="stylesheet">
<script src="js/dropzone/dropzone.min.js"></script>
<?php
require_once($routes["convert_case_text.php"]);
require_once($routes["functions_fields.php"]);
$AdminUser_ID = Auth::userID();

//modify date
$month = date('m');
$year = date('Y');
$Modify_Date = gmdate("Y-m-d,H:i", $timestamp);
?>

<?php
// update record with attached photo gallery
if (getparamvalue('newPhotoGalID') <> "") {
    $upr = "UPDATE records SET Rec_Img_Cat_ID = '".$_GET["newPhotoGalID"]."' WHERE Rec_ID = '".$_GET["Rec_ID"]."'";
    q($upr);
    ?>
    <script language="JavaScript">
        window.location = "index.php?ID=record_Cat_edit&Page_ID=<?php echo $_GET["Page_ID"]; ?>&Rec_ID=<?php echo $_GET["Rec_ID"]; ?>";
    </script>
    <?php
}
// update record with attached NR photo gallery
if (getparamvalue('newPhotoGalNRID') <> "") {
    $upr = "UPDATE records SET Rec_NoResImg_Cat_ID = '".$_GET["newPhotoGalNRID"]."' WHERE Rec_ID = '".$_GET["Rec_ID"]."'";
    q($upr);
    ?>
    <script language="JavaScript">
        window.location = "index.php?ID=record_Cat_edit&Page_ID=<?php echo $_GET["Page_ID"]; ?>&Rec_ID=<?php echo $_GET["Rec_ID"]; ?>";
    </script>
    <?php
}
// update record with related rec land ID
if (getparamvalue('newRelLangRec') <> "") {
    $upr = "UPDATE records SET Rec_Rel_LangID = '".$_GET["newRelLangRec"]."' WHERE Rec_ID = '".$_GET["Rec_ID"]."'";
    q($upr);
    ?>
    <script language="JavaScript">
        window.location = "index.php?ID=record_Cat_edit&Page_ID=<?php echo $_GET["Page_ID"]; ?>&Rec_ID=<?php echo $_GET["Rec_ID"]; ?>";
    </script>
    <?php
}
// delete photo gallery from record
if (getparamvalue('delPG') == 1) {
    $upr = "UPDATE records SET Rec_Img_Cat_ID = '' WHERE Rec_ID = '".$_GET["Rec_ID"]."'";
    q($upr);
    ?>
    <script language="JavaScript">
        window.location = "index.php?ID=record_Cat_edit&Page_ID=<?php echo $_GET["Page_ID"]; ?>&Rec_ID=<?php echo $_GET["Rec_ID"]; ?>";
    </script>
    <?php
}
// delete photo gallery NR from record
if (getparamvalue('delPGNR') == 1) {
    $upr = "UPDATE records SET Rec_NoResImg_Cat_ID = '' WHERE Rec_ID = '".$_GET["Rec_ID"]."'";
    q($upr);
    ?>
    <script language="JavaScript">
        window.location = "index.php?ID=record_Cat_edit&Page_ID=<?php echo $_GET["Page_ID"]; ?>&Rec_ID=<?php echo $_GET["Rec_ID"]; ?>";
    </script>
    <?php
}
// Delete Related Record from record
if (getparamvalue('delRelR') == 1) {
    $upr = "UPDATE records SET Rec_Rel_LangID = NULL WHERE Rec_ID = '".$_GET["Rec_ID"]."'";
    q($upr);
    ?>
    <script language="JavaScript">
        window.location = "index.php?ID=record_Cat_edit&Page_ID=<?php echo getparamvalue('Page_ID'); ?>&Rec_ID=<?php echo getparamvalue('Rec_ID'); ?>";
    </script>
    <?php
}

if ((isset($_POST['save_rec'])) OR (isset($_POST['publish_rec']))) {
    $Rec_ID = $_POST["Rec_ID"];

    $Rec_Title = stringfordb('Rec_Title');
    $Rec_Desc = stringfordb('Rec_Desc');
    $Rec_Title_Meta = stringfordb('Rec_Title_Meta');
    $Rec_Desc_Meta = stringfordb('Rec_Desc_Meta');
    $Rec_Keywords = $_POST['Rec_Keywords'];

    $Rec_Order = $_POST["Rec_Order"];
    $orderVar = $_POST["orderVar"];
    $Rec_ShowHome = $_POST["Rec_ShowHome"];
    $Rec_HomeRotator = $_POST["Rec_HomeRotator"];

    $DateStart = $_POST["year"] . $_POST["month"] . $_POST["date"] . $_POST["hour"] . $_POST["min"];
    if ($DateStart == "") $DateStart = "0000-00-00";
    $DateStop = $_POST["yearStop"] . $_POST["monthStop"] . $_POST["dateStop"] . $_POST["hourStop"] . $_POST["minStop"];
    if ($DateStop == "") $DateStop = "0000-00-00";

    // Create Editors
    // --------------
    $Text1 = stripslashes(preg_replace('#(\\\r|\\\r\\\n|\\\n|\\\)#', '', getparamvalue('Rec_Text1')));

    $tablename = "searchtext";
    //find search id
    $GetSearchText_Sel = "SELECT * FROM $tablename WHERE SRec_ID = $Rec_ID";
    $GetSearchText_Query = q($GetSearchText_Sel);
    $GetSearchText = f($GetSearchText_Query);
    $SID = $GetSearchText['SID'];

    if (strlen($Text1) > 2) {
        if (!is_dir("../texts/" . $year)) {
            mkdir("../texts/" . $year);
        }
        if (!is_dir("../texts/" . $year . "/" . $month)) {
            mkdir("../texts/" . $year . "/" . $month);
        }
        $FileName1 = $year . "/" . $month . "/" . $_POST["Rec_ID"] . "_1";
        $FileNamePath1 = "../texts/" . $year . "/" . $month . "/" . $_POST["Rec_ID"] . "_1.htm";
        $ourFileHandle = fopen($FileNamePath1, 'w') or die("can't open file");
        fwrite($ourFileHandle, $Text1);
        fclose($ourFileHandle);
    }


    $Text2 = stripslashes(preg_replace('#(\\\r|\\\r\\\n|\\\n|\\\)#', '', getparamvalue('Rec_Text2')));
    if (strlen($Text2) > 2) {
        if (!is_dir("../texts/" . $year)) {
            mkdir("../texts/" . $year);
        }
        if (!is_dir("../texts/" . $year . "/" . $month)) {
            mkdir("../texts/" . $year . "/" . $month);
        }
        $FileName2 = $year . "/" . $month . "/" . $_POST["Rec_ID"] . "_2";
        $FileNamePath2 = "../texts/" . $year . "/" . $month . "/" . $_POST["Rec_ID"] . "_2.htm";
        $ourFileHandle = fopen($FileNamePath2, 'w') or die("can't open file");
        fwrite($ourFileHandle, $Text2);
        fclose($ourFileHandle);
    }

    $TextMob = stripslashes(preg_replace('#(\\\r|\\\r\\\n|\\\n|\\\)#', '', getparamvalue('Rec_TextMob')));
    if (strlen($TextMob) > 2) {
        if ($GetRec['Rec_TextMob'] == "") {
            if (!is_dir("../texts/" . $year)) {
                mkdir("../texts/" . $year);
            }
            if (!is_dir("../texts/" . $year . "/" . $month)) {
                mkdir("../texts/" . $year . "/" . $month);
            }
            $FileNameMob = $year . "/" . $month . "/" . $_POST["Rec_ID"] . "_Mob";
        } else {
            $FileNameMob = $GetRec['Rec_TextMob'];
        }
        $FileNamePathMob = "../texts/" . $FileNameMob . ".htm";
        $ourFileHandle = fopen($FileNamePathMob, 'w') or die("can't open file");
        fwrite($ourFileHandle, $TextMob);
        fclose($ourFileHandle);
    }

    //Create - Update record in table searchtext
    if (($GetSection['Page_Section'] <> "hidden") AND ($GetSection['Page_Section'] <> "banners") AND ($GetSection['Page_Section'] <> "bookonline") AND ($GetSection['Page_Section'] <> "settings")) {

        $finalSStr1 = createsearchtext($FileNamePath1, $Rec_ID);
        $finalSStr2 = createsearchtext($FileNamePath2, $Rec_ID);
        $finalSStr = $finalSStr1 . " " . $finalSStr2;
        $finalSStr = " " . $Rec_Title . " " . $Rec_Desc . " " . $Rec_Keywords . " " . $finalSStr;
        $finalSStr = convertText($finalSStr);

        if ($SID == "") {
            //CREATE Record to table
            $stq = "INSERT INTO `$tablename` (`SID` ,`SRec_ID`,`SPage_ID`,`SPage_Lang`,`STitle`,`SDesc`,`SText1`)
				 VALUES(NULL, '$Rec_ID', '$Page_ID', '".$_SESSION["AdminLang"]."', '$Rec_Title', '$Rec_Desc', '$finalSStr')";
            q($stq);
        } else {
            //update
            $upr = "UPDATE $tablename SET SText1 = '$finalSStr', STitle = '$Rec_Title', SDesc = '$Rec_Desc' WHERE SID = $SID";
            q($upr);
        }
    } // $GetSection
    // end of Create Editors


    $Rec_TextArea1 = stringfordb('Rec_TextArea1');
    $Rec_TextArea2 = stringfordb('Rec_TextArea2');
    $Rec_TextArea3 = stringfordb('Rec_TextArea3');
    $Rec_TextArea4 = stringfordb('Rec_TextArea4');

    $Rec_Field1 = stringfordb('Rec_Field1');
    $Rec_Field2 = stringfordb('Rec_Field2');
    $Rec_Field3 = stringfordb('Rec_Field3');
    $Rec_Field4 = stringfordb('Rec_Field4');
    $Rec_Field5 = stringfordb('Rec_Field5');
    $Rec_Field6 = stringfordb('Rec_Field6');
    $Rec_Field7 = stringfordb('Rec_Field7');
    $Rec_Field8 = stringfordb('Rec_Field8');
    $Rec_Field9 = stringfordb('Rec_Field9');
    $Rec_Field10 = stringfordb('Rec_Field10');
    $Rec_Field11 = stringfordb('Rec_Field11');
    $Rec_Field12 = stringfordb('Rec_Field12');
    $Rec_Field13 = stringfordb('Rec_Field13');
    $Rec_Field14 = stringfordb('Rec_Field14');
    $Rec_Field15 = stringfordb('Rec_Field15');
    $Rec_Field16 = stringfordb('Rec_Field16');
    $Rec_Field17 = stringfordb('Rec_Field17');
    $Rec_Field18 = stringfordb('Rec_Field18');
    $Rec_Field19 = stringfordb('Rec_Field19');
    $Rec_Field20 = stringfordb('Rec_Field20');
    $Rec_Field21 = stringfordb('Rec_Field21');
    $Rec_Field22 = stringfordb('Rec_Field22');
    $Rec_Field23 = stringfordb('Rec_Field23');
    $Rec_Field24 = stringfordb('Rec_Field24');
    $Rec_Field25 = stringfordb('Rec_Field25');
    $Rec_Field26 = stringfordb('Rec_Field26');
    $Rec_Field27 = stringfordb('Rec_Field27');
    $Rec_Field28 = stringfordb('Rec_Field28');
    $Rec_Field29 = stringfordb('Rec_Field29');
    $Rec_Field30 = stringfordb('Rec_Field30');
    //------------->Field30
    $Rec_Price = getparamvalue('Rec_Price');
    $Rec_Discount = getparamvalue('Rec_Discount');
    $Rec_Weight = getparamvalue('Rec_Weight');

    $Rec_Check1 = getparamvalue('Rec_Check1');
    $Rec_Check2 = getparamvalue('Rec_Check2');
    $Rec_Check3 = getparamvalue('Rec_Check3');
    $Rec_Check4 = getparamvalue('Rec_Check4');
    $Rec_Check5 = getparamvalue('Rec_Check5');
    $Rec_Check6 = getparamvalue('Rec_Check6');
    $Rec_Check7 = getparamvalue('Rec_Check7');
    $Rec_Check8 = getparamvalue('Rec_Check8');
    $Rec_Check9 = getparamvalue('Rec_Check9');
    $Rec_Check10 = getparamvalue('Rec_Check10');
    //------------->Field20

    //------------->Record View
    $Num_HPhotos = getparamvalue('Num_HPhotos');
    $StartAt_Photos = getparamvalue('StartAt_Photos');
    $RepeatRow_Photos = getparamvalue('RepeatRow_Photos');
    if ($RepeatRow_Photos == "") $RepeatRow_Photos = 1;
    $Rec_View = getparamvalue('Rec_View');
    if ($Rec_View <= 1) $Rec_View = 1; // default
    $Rec_View_Mob = getparamvalue('Rec_View_Mob');
    if ($Rec_View_Mob <= 1) $Rec_View_Mob = 1; // default
    $Rec_Lists_View = getparamvalue('Rec_Lists_View');
    $Rec_Lists_View_Mob = getparamvalue('Rec_Lists_View_Mob');

    //------------->Record Scroll
    $Rec_Scroll1 = getparamvalue('Rec_Scroll1');
    $Rec_Scroll2 = getparamvalue('Rec_Scroll2');
    $Rec_Scroll3 = getparamvalue('Rec_Scroll3');
    $Rec_Scroll4 = getparamvalue('Rec_Scroll4');
    $Rec_Scroll5 = getparamvalue('Rec_Scroll5');
    $Rec_Scroll6 = getparamvalue('Rec_Scroll6');
    $Rec_Scroll7 = getparamvalue('Rec_Scroll7');
    //------------->Field5

    $Rec_Img_Cat_ID = getparamvalue('Rec_Img_Cat_ID');
    $Rec_NoResImg_Cat_ID = getparamvalue('Rec_NoResImg_Cat_ID');
    $Docs_Group_ID = getparamvalue('Docs_Group_ID');

    $Rec_DateStart = $DateStart;
    $Rec_DateStop = $DateStop;
    $Rec_Active = getparamvalue('Rec_Active');

    $upr = "
			UPDATE records
			SET
				Rec_Title = '$Rec_Title',
				Rec_Desc = '$Rec_Desc',
				Rec_Order = '$Rec_Order',
				Rec_ShowHome = '$Rec_ShowHome',
				Rec_HomeRotator = '$Rec_HomeRotator',

				Rec_TextArea1 = '$Rec_TextArea1',
				Rec_TextArea2 = '$Rec_TextArea2',
				Rec_TextArea3 = '$Rec_TextArea3',
				Rec_TextArea4 = '$Rec_TextArea4',

				Rec_Field1 = '$Rec_Field1',
				Rec_Field2 = '$Rec_Field2',
				Rec_Field3 = '$Rec_Field3',
				Rec_Field4 = '$Rec_Field4',
				Rec_Field5 = '$Rec_Field5',
				Rec_Field6 = '$Rec_Field6',
				Rec_Field7 = '$Rec_Field7',
				Rec_Field8 = '$Rec_Field8',
				Rec_Field9 = '$Rec_Field9',
				Rec_Field10 = '$Rec_Field10',
				Rec_Field11 = '$Rec_Field11',
				Rec_Field12 = '$Rec_Field12',
				Rec_Field13 = '$Rec_Field13',
				Rec_Field14 = '$Rec_Field14',
				Rec_Field15 = '$Rec_Field15',
				Rec_Field16 = '$Rec_Field16',
				Rec_Field17 = '$Rec_Field17',
				Rec_Field18 = '$Rec_Field18',
				Rec_Field19 = '$Rec_Field19',
				Rec_Field20 = '$Rec_Field20',
				Rec_Field21 = '$Rec_Field21',
				Rec_Field22 = '$Rec_Field22',
				Rec_Field23 = '$Rec_Field23',
				Rec_Field24 = '$Rec_Field24',
				Rec_Field25 = '$Rec_Field25',
				Rec_Field26 = '$Rec_Field26',
				Rec_Field27 = '$Rec_Field27',
				Rec_Field28 = '$Rec_Field28',
				Rec_Field29 = '$Rec_Field29',
				Rec_Field30 = '$Rec_Field30',

				Rec_Price = '$Rec_Price',
				Rec_Discount = '$Rec_Discount',
				Rec_Weight = '$Rec_Weight',

				Rec_Check1 = '$Rec_Check1',
				Rec_Check2 = '$Rec_Check2',
				Rec_Check3 = '$Rec_Check3',
				Rec_Check4 = '$Rec_Check4',
				Rec_Check5 = '$Rec_Check5',
				Rec_Check6 = '$Rec_Check6',
				Rec_Check7 = '$Rec_Check7',
				Rec_Check8 = '$Rec_Check8',
				Rec_Check9 = '$Rec_Check9',
				Rec_Check10 = '$Rec_Check10',

				Rec_Scroll1 = '$Rec_Scroll1',
				Rec_Scroll2 = '$Rec_Scroll2',
				Rec_Scroll3 = '$Rec_Scroll3',
				Rec_Scroll4 = '$Rec_Scroll4',
				Rec_Scroll5 = '$Rec_Scroll5',
				Rec_Scroll6 = '$Rec_Scroll6',
				Rec_Scroll7 = '$Rec_Scroll7',

				Num_HPhotos = '$Num_HPhotos',
				StartAt_Photos = '$StartAt_Photos',
				RepeatRow_Photos = '$RepeatRow_Photos',
				Rec_View 	= '$Rec_View',
				Rec_View_Mob = '$Rec_View_Mob',
				Rec_Lists_View = '$Rec_Lists_View',
				Rec_Lists_View_Mob = '$Rec_Lists_View_Mob',

				Rec_Img_Cat_ID = '$Rec_Img_Cat_ID',
				Rec_NoResImg_Cat_ID = '$Rec_NoResImg_Cat_ID',
				Docs_Group_ID = '$Docs_Group_ID',

				Rec_DateStart = '$Rec_DateStart',
				Rec_DateStop = '$Rec_DateStop',
				Rec_Active = '$Rec_Active',
				Rec_Text1 = '$FileName1',
				Rec_Text2 = '$FileName2',
                Rec_TextMob = '$FileNameMob',

				Modify_Date = '$Modify_Date',
				AdminUser_ID = '$AdminUser_ID'

			WHERE Rec_ID = \"$Rec_ID\"
			";
    q($upr);
    ?>

    <?php
    if (isset($_POST['save_rec'])) {
        // Εάν είναι Save πάει απ' ευθείας ξανά στο record
    } else { ?>
        <script language="JavaScript">
            window.location = "index.php?ID=records_view";
        </script>
    <?php } ?>


    <?php
}

if ($_SESSION['AdminSection'] <> '') {
    $Page_Section = $_SESSION['AdminSection'];
} else {
    $Page_Section = "general";
}

//	euresi katigorias
$tmpPageID = $_GET['Page_ID'];

$GetPage_Sel = "SELECT * FROM pages WHERE Page_ID = '$tmpPageID'";
$GetPage_Query = q($GetPage_Sel);
$GetPage = f($GetPage_Query);


//	euresi tipou
$tmpList_ID = $GetPage["Page_Content"];
$Page_Rec_Temp = $GetPage['Page_Rec_Temp'];
$Page_HeadLists_Temp = $GetPage['Page_HeadLists_Temp'];

$GetList_Sel = "SELECT * FROM lists WHERE list_ID = '$tmpList_ID'";
$GetList_Query = q($GetList_Sel);
$GetList = f($GetList_Query);

//find ListID
$GetRecTempListID_Sel = "SELECT * FROM rec_templates WHERE RTemp_ID = $Page_Rec_Temp";
$GetRecTempListID_Query = q($GetRecTempListID_Sel);
$GetRecTempListID = f($GetRecTempListID_Query);

//	euresi eggrafis
$GetRec_Sel = "SELECT * FROM records WHERE Rec_Page_Content = '1' AND Rec_Page_ID = '$tmpPageID'";
$GetRec_Query = q($GetRec_Sel);
$GetRec = f($GetRec_Query);
$tmpRec_ID = $GetRec['Rec_ID'];
$curRecText1 = "../texts/" . $GetRec['Rec_Text1'] . ".htm";
$curRecText2 = "../texts/" . $GetRec['Rec_Text2'] . ".htm";
$curRecTextMob = "../texts/" . $GetRec['Rec_TextMob'] . ".htm";

//an den iparxei eggrafi kanei insert
$nssr = nr($GetRec_Query);
if ($tmpRec_ID == "") {
    $dateNow = date("Y-m-d");

    $inr = "
		INSERT INTO records
				(Rec_Page_ID, Rec_Page_Content, Rec_Title, Rec_Order, Rec_DateStart)
		VALUES 	('$tmpPageID', '1', '', '9999', '$dateNow')
	";
    q($inr);


    $GetLastRec_Sel = "SELECT * FROM records Order by Rec_ID Desc LIMIT 0,1";
    $GetLastRec_Query = q($GetLastRec_Sel);
    $GetLastRec = f($GetLastRec_Query);
    ?>
    <script language="JavaScript">
        window.location = "index.php?ID=record_Cat_edit&Page_ID=<?php echo $_GET["Page_ID"]; ?>&Rec_ID=<?php echo $GetLastRec["Rec_ID"]; ?>";
    </script>

    <?php
}
?>

<?php
// If there is content at List_RecPage field, that means tha we have declare
// another record_Cat_edit page with different fields descriptions than default
// otherwise, if List_RecPage = "" then it shows record_Cat_edit_default.php

if ($GetList['List_RecPage'] == "") {
    require "record_Cat_edit_default.php";
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
                    $pathFile = $imagePath . $folder. "/" . $GetRec[$imageField];
                    
                    $ExtFile=substr($GetRec[$imageField], strrpos($GetRec[$imageField], '.') + 1);
                    if($ExtFile=="webp"){
                        $CreatedImage = imagecreatefromwebp($pathFile);
                    }elseif($ExtFile=="jpg"){
                        $CreatedImage = imagecreatefromjpeg($pathFile);
                    }elseif($ExtFile=="png") {
                        $CreatedImage = imagecreatefrompng($pathFile);
                    }elseif($ExtFile=="gif"){
                        $CreatedImage = imagecreatefromgif($pathFile);
                    }
                    list($InitWidth, $InitHeight) = getImageDimensions($CreatedImage, $pathFile);
                    break;
                }
            }
            if($InitWidth==""){ //if image is only on root folder
                $ExtFile=substr($GetRec[$imageField], strrpos($GetRec[$imageField], '.') + 1);
                $pathFile = $imagePath . $GetRec[$imageField];
                if($ExtFile=="webp"){
                    $CreatedImage = imagecreatefromwebp($pathFile);
                }elseif($ExtFile=="jpg"){
                    $CreatedImage = imagecreatefromjpeg($pathFile);
                }elseif($ExtFile=="png") {
                    $CreatedImage = imagecreatefrompng($pathFile);
                }elseif($ExtFile=="gif"){
                    $CreatedImage = imagecreatefromgif($pathFile);
                }
                list($InitWidth, $InitHeight) = getImageDimensions($CreatedImage,$pathFile);

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

               if($sourcePage!="Logo" && $sourcePage!="LogoFooter" && $sourcePage!="File1" && $sourcePage!="File2"){ print"<a class=\"ADMcropper popUpWindow cDefault\" href=\"";echo $baseURL;print"uploads/image_cropper.php?sourcePage=".$sourcePage."&dbID=".$dbID."&width=".$InitWidth."&height=".$InitHeight."\" data-width='92%' data-height='94%'></a>";}
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

        //clear any word less than 4 chars
        $finalSStr = "";
        $step1 = explode(" ", $cleartagstr);
        // loop each word array
        foreach ($step1 as $eachWord) {
            $strchars = strlen(utf8_decode($eachWord));
            if ($strchars > 3) {
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




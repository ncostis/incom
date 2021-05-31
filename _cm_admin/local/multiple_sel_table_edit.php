<?php
require_once("../init.php");
require_once($routes["initvars.php"]);
require_once($routes["popup_header_scripts.php"]);
require_once($routes["functions_fields.php"]);

$SubCat = $_GET['SubCat'];
$LID = $_GET['LID'];
$List_ID = $_GET['List_ID'];
$Name = $_GET['Name'];
$Rat_ID = $_GET['Rat_ID'];
$Rat_Page_ID = getparamvalue('RatPageID');

$GetRenameString_Sel = "SELECT * FROM incom_keys WHERE ID = 1";
$GetRenameString_Query = q($GetRenameString_Sel);
$GetRenameString = f($GetRenameString_Query);
$RenameString = $GetRenameString['RenameString'];
?>
    <script type="text/javascript" src="<?php echo $rootPath."editor_".$RenameString; ?>/ckeditor.js"></script>
<?php

if ((isset($_POST['save_rec'])) || (isset($_POST['publish_rec']))) {
    $Rat_Rec_ID = getparamvalue("Rat_Rec_ID");
    $Rat_ID = getparamvalue("Rat_ID");

    $Rat_Title = getparamvalue("Rat_Title");
    $Rat_Desc = getparamvalue("Rat_Desc");
    $Rat_Order = getparamvalue("Rat_Order");

    $Rat_TextArea1 = stripslashes(preg_replace('#(\\\r|\\\r\\\n|\\\n)#', '', getparamvalue('Rat_TextArea1')));
    $Rat_TextArea2 = stripslashes(preg_replace('#(\\\r|\\\r\\\n|\\\n)#', '', getparamvalue('Rat_TextArea2')));
    $Rat_TextArea3 = stripslashes(preg_replace('#(\\\r|\\\r\\\n|\\\n)#', '', getparamvalue('Rat_TextArea3')));
    $Rat_TextArea4 = stripslashes(preg_replace('#(\\\r|\\\r\\\n|\\\n)#', '', getparamvalue('Rat_TextArea4')));

    $Rat_Field1 = getparamvalue("Rat_Field1");
    $Rat_Field2 = getparamvalue("Rat_Field2");
    $Rat_Field3 = getparamvalue("Rat_Field3");
    $Rat_Field4 = getparamvalue("Rat_Field4");
    $Rat_Field5 = getparamvalue("Rat_Field5");
    $Rat_Field6 = getparamvalue("Rat_Field6");
    $Rat_Field7 = getparamvalue("Rat_Field7");
    $Rat_Field8 = getparamvalue("Rat_Field8");
    $Rat_Field9 = getparamvalue("Rat_Field9");
    $Rat_Field10 = getparamvalue("Rat_Field10");
    $Rat_Field11 = getparamvalue("Rat_Field11");
    $Rat_Field12 = getparamvalue("Rat_Field12");
    $Rat_Field13 = getparamvalue("Rat_Field13");
    $Rat_Field14 = getparamvalue("Rat_Field14");
    $Rat_Field15 = getparamvalue("Rat_Field15");
    $Rat_Field16 = getparamvalue("Rat_Field16");
    $Rat_Field17 = getparamvalue("Rat_Field17");
    $Rat_Field18 = getparamvalue("Rat_Field18");
    $Rat_Field19 = getparamvalue("Rat_Field19");
    $Rat_Field20 = getparamvalue("Rat_Field20");
    $Rat_Field21 = getparamvalue("Rat_Field21");
    $Rat_Field22 = getparamvalue("Rat_Field22");
    $Rat_Field23 = getparamvalue("Rat_Field23");
    $Rat_Field24 = getparamvalue("Rat_Field24");
    $Rat_Field25 = getparamvalue("Rat_Field25");
    $Rat_Field26 = getparamvalue("Rat_Field26");
    $Rat_Field27 = getparamvalue("Rat_Field27");
    $Rat_Field28 = getparamvalue("Rat_Field28");
    $Rat_Field29 = getparamvalue("Rat_Field29");
    $Rat_Field30 = getparamvalue("Rat_Field30");
    //------------->Field30

    $Rat_Check1 = getparamvalue("Rat_Check1");
    $Rat_Check2 = getparamvalue("Rat_Check2");
    $Rat_Check3 = getparamvalue("Rat_Check3");
    $Rat_Check4 = getparamvalue("Rat_Check4");
    $Rat_Check5 = getparamvalue("Rat_Check5");
    $Rat_Check6 = getparamvalue("Rat_Check6");
    $Rat_Check7 = getparamvalue("Rat_Check7");
    $Rat_Check8 = getparamvalue("Rat_Check8");
    $Rat_Check9 = getparamvalue("Rat_Check9");
    $Rat_Check10 = getparamvalue("Rat_Check10");
    $Rat_Check11 = getparamvalue("Rat_Check11");
    $Rat_Check12 = getparamvalue("Rat_Check12");
    $Rat_Check13 = getparamvalue("Rat_Check13");
    $Rat_Check14 = getparamvalue("Rat_Check14");
    $Rat_Check15 = getparamvalue("Rat_Check15");
    $Rat_Check16 = getparamvalue("Rat_Check16");
    $Rat_Check17 = getparamvalue("Rat_Check17");
    $Rat_Check18 = getparamvalue("Rat_Check18");
    $Rat_Check19 = getparamvalue("Rat_Check19");
    $Rat_Check20 = getparamvalue("Rat_Check20");
    $Rat_Check21 = getparamvalue("Rat_Check21");
    $Rat_Check22 = getparamvalue("Rat_Check22");
    $Rat_Check23 = getparamvalue("Rat_Check23");
    $Rat_Check24 = getparamvalue("Rat_Check24");
    $Rat_Check25 = getparamvalue("Rat_Check25");
    $Rat_Check26 = getparamvalue("Rat_Check26");
    $Rat_Check27 = getparamvalue("Rat_Check27");
    $Rat_Check28 = getparamvalue("Rat_Check28");
    $Rat_Check29 = getparamvalue("Rat_Check29");
    $Rat_Check30 = getparamvalue("Rat_Check30");
    $Rat_Check31 = getparamvalue("Rat_Check31");
    $Rat_Check32 = getparamvalue("Rat_Check32");
    $Rat_Check33 = getparamvalue("Rat_Check33");
    $Rat_Check34 = getparamvalue("Rat_Check34");
    $Rat_Check35 = getparamvalue("Rat_Check35");
    $Rat_Check36 = getparamvalue("Rat_Check36");
    $Rat_Check37 = getparamvalue("Rat_Check37");
    $Rat_Check38 = getparamvalue("Rat_Check38");
    $Rat_Check39 = getparamvalue("Rat_Check39");
    $Rat_Check40 = getparamvalue("Rat_Check40");
    //------------->Field40

    //------------->Record View
    $Rat_View = getparamvalue("Rat_View");

    //------------->Record Scroll
    $Rat_Scroll1 = getparamvalue("Rat_Scroll1");
    $Rat_Scroll2 = getparamvalue("Rat_Scroll2");
    $Rat_Scroll3 = getparamvalue("Rat_Scroll3");
    $Rat_Scroll4 = getparamvalue("Rat_Scroll4");
    $Rat_Scroll5 = getparamvalue("Rat_Scroll5");
    //------------->Field5

    //modify date
    $gmt = $GetVar['Rec_Field20'] * 60 * 60;
    $timestamp = time() + $gmt;
    $Modify_Date = gmdate("Y-m-d,H:i", $timestamp);

    $Rat_DateStart = getparamvalue("Rat_DateStart");
    $Rat_DateStop = getparamvalue("Rat_DateStop");

    $upr = "
			UPDATE recs_att_tables
			SET 
				Rat_Title = '$Rat_Title',
				Rat_Page_ID = '$Rat_Page_ID',
				Rat_List_ID = '$LID',
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

				Rat_View 	= '$Rat_View',
                Modify_Date = '$Modify_Date',
				Rat_DateStart = '$Rat_DateStart',
				Rat_DateStop = '$Rat_DateStop'
				
			WHERE Rat_ID = \"$Rat_ID\"
			";
    q($upr);

    // SYNCHRONIZE - DOWNLOAD RECORD
    $GetSynch_Sel = "SELECT * FROM sections WHERE Section_Name = 'synchronize'";
    $GetSynch_Query = q($GetSynch_Sel);
    if (nr($GetSynch_Query) > 0) require_once($routes["recs_att_tables_download.php"]);
}

if (isset($_POST['publish_rec'])) { ?>
    <script language="JavaScript">
        window.location = "multiple_sel_table_view.php?LID=<?php echo $LID; ?>&List_ID=<?php echo $List_ID; ?>&SubCat=<?php echo $SubCat; ?>&Name=<?php echo $Name;?>";
    </script>
    <?php
} else {

//	euresi tipou
    $GetList_Sel = "SELECT * FROM lists WHERE list_ID = '$List_ID'";
    $GetList_Query = q($GetList_Sel);
    $GetList = f($GetList_Query);

//	euresi eggrafis
    $GetRats_Sel = "SELECT * FROM recs_att_tables WHERE Rat_ID = $Rat_ID";
    $GetRats_Query = q($GetRats_Sel);
    $GetRat = f($GetRats_Query);

    $backURL = "multiple_sel_table_view.php?LID=$LID&List_ID=$List_ID&SubCat=$SubCat&Name=$Name";

// If there is content at List_RecPage field, that means tha we have declare
// another record_edit page with different fields descriptions than default
// otherwise, if List_RecPage = "" then it shows record_edit_default.php

print "<div class=\"top20\">";
    if ($GetList['List_RecPage'] == "") {
        require_once "../local/rat_table_edit_default.php";
    } else {
        $recpage = $GetList['List_RecPage'];
        require "$recpage";
    }
print "</div>";
} // if
?>
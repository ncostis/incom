<?php
//********* SHOW DOC **********/

$file = $Path_File . $GetRec['Rec_File1'];
$fileCheck = $Path_FileCheck . $GetRec['Rec_File1'];
$icon = getDocIcon($GetRec['Rec_File1']);
$filename = $GetRec['Rec_File1'];

if (($filename == "") AND ($GetRec['Rec_Rel_LangID'] > 0)) {
    $GetRelLangRec_Sel = "SELECT * FROM records WHERE Rec_ID = $GetRec[Rec_Rel_LangID]";
    $GetRelLangRec_Query = q($GetRelLangRec_Sel);
    $GetRelLangRec = f($GetRelLangRec_Query);
	 $filename = $GetRelLangRec['Rec_File1'];
	 $file = $Path_File . $GetRelLangRec['Rec_File1'];
}


$ModPageID = getModPageID($ModPageID, $Lang);
if (($RecMod_ID <> "") OR ($ModPageID <> "")) {
    if ($RecMod_ID <> "") {
        $GetModRec_Sel = "SELECT * FROM records WHERE Rec_ID = $RecMod_ID AND Rec_Active = 0";
    } // Get content from module Dynamically
    elseif ($ModPageID <> "") {
        $GetModRec_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $ModPageID AND Rec_Active = 0";
    } // Get content directly from module
    $GetModRec_Query = q($GetModRec_Sel);
    $GetModRec = f($GetModRec_Query);

    $file = $Path_File . $GetModRec['Rec_File1'];
    $fileCheck = $Path_FileCheck . $GetModRec['Rec_File1'];
    $icon = getDocIcon($GetModRec['Rec_File1']);
    $filename = $GetModRec['Rec_File1'];
    
    if (($filename == "") AND ($GetModRec['Rec_Rel_LangID'] > 0)) {
    $GetRelLangRec_Sel = "SELECT * FROM records WHERE Rec_ID = $GetModRec[Rec_Rel_LangID]";
    $GetRelLangRec_Query = q($GetRelLangRec_Sel);
    $GetRelLangRec = f($GetRelLangRec_Query);
	 $filename = $GetRelLangRec['Rec_File1'];
	 $file = $Path_File . $GetRelLangRec['Rec_File1'];
}

}

if ((file_exists($fileCheck)) AND ($filename <> "")) {
    $fileSizePr = (int)(filesize($fileCheck) / 1000);
    print "<a href=\"$file\" class=\"download\" target='_blank'></a>";
}

?>
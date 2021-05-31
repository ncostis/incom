<?php
require_once("init.php");

$Rat_ID = $_GET['Rat_ID'];
$SubCat = $_GET['SubCat'];
$List_ID = $_GET['List_ID'];

if (getparamvalue('saved') == 'ok') {
    $Rat_Rat_ID = getparamvalue('Rat_Rat_ID');
    $Rat_ID = getparamvalue('Rat_ID');

    $Rat_Title = stringfordb('Rat_Title');
    $Rat_Desc = stringfordb('Rat_Desc');
    $Rat_Order = getparamvalue('Rat_Order');

    $Rat_TextArea1 = stringfordb('Rat_TextArea1');
    $Rat_TextArea2 = stringfordb('Rat_TextArea2');

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
    $Num_HPhotos = getparamvalue('Num_HPhotos');
    $Num_VPhotos = getparamvalue('Num_VPhotos');
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
				Rat_Desc = '$Rat_Desc',
				Rat_Order = '$Rat_Order',
				
				Rat_TextArea1 = '$Rat_TextArea1',
				Rat_TextArea2 = '$Rat_TextArea2',
				
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
				
				Num_HPhotos = '$Num_HPhotos',
				Num_VPhotos = '$Num_VPhotos',
				Rat_View 	= '$Rat_View',
				
				Rat_DateStart = '$Rat_DateStart',
				Rat_DateStop = '$Rat_DateStop'
				
			WHERE Rat_ID = \"$Rat_ID\"
			";
    q($upr);
    ?>
    <script language="JavaScript">
        window.location = "rat_table_view.php?Rat_ID=<?php echo $Rat_ID; ?>&List_ID=<?php echo $List_ID; ?>&SubCat=<?php echo $SubCat; ?>";
    </script>
    <?php
} elseif (getparamvalue('TField1"] == '') {
    ?>
    <!--
    <script language="JavaScript">
        window.alert("Μην αφήσετε πεδία κενά...");
    </script>
    -->

    <!--	selides		--><!--	selides		--><!--	selides		--><!--	selides		-->

    <?php
}

//	euresi tipou
$Select_Lists = "SELECT * FROM lists WHERE list_ID = '$List_ID'";
$Select_Lists_q = q($Select_Lists);
$Select_Lists_row = f($Select_Lists_q);

//	euresi eggrafis
$Select_Rec = "SELECT * FROM recs_att_tables WHERE Rat_ID = $Rat_ID";
$Select_Rat_q = q($Select_Rec);
$Select_Rat_row = f($Select_Rat_q);


// If there is content at List_RecPage field, that means tha we have declare
// another record_edit page with different fields descriptions than default
// otherwise, if List_RecPage = "" then it shows record_edit_default.php

if ($Select_Lists_row['List_RecPage'] == "") {
    require_once "../local/rat_table_edit_default.php";
} else {
    $recpage = $Select_Lists_row['List_RecPage'];
    require "$recpage";
}
?>
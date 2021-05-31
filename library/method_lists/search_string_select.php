<?php
$arrayFields = array();

// Check if there is POSTs
if (getparamvalue('Rec_Title') <> "") {
    $field = "Rec_Title";
    $value = getparamvalue('Rec_Title');
    $arrayFields[] = "$field,$value";
}
// Check Fields
for ($x = 1; $x < 20; $x++) {
    if (getparamvalue('Rec_Field' . $x) <> "") {
        $field = "Rec_Field" . $x;
        $value = getparamvalue('Rec_Field' . $x);
        $arrayFields[] = "$field,$value";
    }
}
// Check Scrolls
for ($x = 1; $x < 7; $x++) {
    if (getparamvalue('Rec_Scroll' . $x) <> "") {
        $field = "Rec_Scroll" . $x;
        $value = getparamvalue('Rec_Scroll' . $x);
        $arrayFields[] = "$field,$value";
    }
}

// IF POST EXIST THEN CREATE SEARCH STRING
// ***************************************

$numItemsSearch = count($arrayFields);

if ($numItemsSearch > 0) {
    for ($i = 0; $i < $numitems; $i++) {
        $arrString = $arrayFields[$i];
        $arrVar = explode(',', $arrString);
        $fieldName = $arrVar[0];
        $fieldValue = $arrVar[1];
        if ($fieldValue <> "") $stringSearch .= " AND " . $fieldName . " like '%" . $fieldValue . "%'";
    }
} // if
?>
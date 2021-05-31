<?php
$iUrlLocation = count(array_filter(explode('/', $rootURL)));
$sPath = ltrim(strtok($_SERVER["REQUEST_URI"], '?'), '/');
$aPath = explode('/', $sPath);
for ($iCutArray = 0; $iCutArray < $iUrlLocation; $iCutArray++) {
    array_shift($aPath);
}

$available_page_views = array();
$available_page_views_ind = array();
$GetLangs_Sel = "SELECT * FROM lang Order by Lang_ID";
$GetLangs_Query = q($GetLangs_Sel);
while ($GetLang = f($GetLangs_Query)) {
    $available_page_views[] = $GetLang["Lang_Title"];
    $available_page_views_ind[] = $GetLang["Lang_Title"];
}
$available_page_views_ind[] = "index.php";

$_GET['ID'] = isset($aPath[0]) ? $aPath[0] : '';
$_GET["Rec_ID"] = isset($aPath[1]) ? $aPath[1] : '';
$var1 = isset($aPath[2]) ? $aPath[2] : '';
$var2 = isset($aPath[3]) ? $aPath[3] : '';
$var3 = isset($aPath[4]) ? $aPath[4] : '';

if (in_array($_GET['ID'], $available_page_views)) {
    $_GET['ID'] = isset($aPath[1]) ? $aPath[1] : '';
    $_GET["Rec_ID"] = isset($aPath[2]) ? $aPath[2] : '';
    $var1 = isset($aPath[3]) ? $aPath[3] : '';
    $var2 = isset($aPath[4]) ? $aPath[4] : '';
    $var3 = isset($aPath[5]) ? $aPath[5] : '';
}
//$ID = getparamvalue('ID');

$available_page_views = array();
$check_ID_query = "SELECT Page_View FROM pages WHERE Page_Lang = '$Lang'";
$check_ID = q($check_ID_query);
while ($Check_For_ID = f($check_ID)) {
    $available_page_views[] .= $Check_For_ID['Page_View'];
}

//if ($_GET['ID']=='index.php' || $_GET['ID']=='el') unset($_GET['ID']);
if (in_array($_GET['ID'], $available_page_views_ind)) unset($_GET['ID']);

if (strlen($_GET['ID']) > 0 && !in_array($_GET['ID'], $available_page_views)) {
    if ($_SERVER['HTTPS'] == 'on') { $http = "https"; } else { $http = "http"; }
    $newURL = $http."://".$_SERVER['HTTP_HOST'].$siteURL."errorpage-".$Lang;
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    echo "<script type='text/javascript'>  window.location='".$newURL."?u=$sPath'; </script>";
    die;
}

$Rec_ID = getparamvalue("Rec_ID");
if (strlen($Rec_ID) > 0){
    // if (strlen($Rec_ID) > 0 && !is_numeric($Rec_ID)) {
    if(!is_numeric($Rec_ID) || nr( q("SELECT Rec_ID FROM records,pages WHERE Rec_ID = $Rec_ID AND Page_View = '".$_GET['ID']."' AND Rec_Page_ID = Page_ID ") )==0 ){

        unset ($_GET["Rec_ID"]);
        if ($_SERVER['HTTPS'] == 'on') { $http = "https"; } else { $http = "http"; }
        $newURL = $http."://".$_SERVER['HTTP_HOST'].$siteURL."errorpage-".$Lang;
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        echo "<script type='text/javascript'>  window.location='".$newURL."?u=$sPath'; </script>";
        die;
    }
}
?>
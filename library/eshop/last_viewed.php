<?php
//Πρακτικά αυτή δουλεύει μόνη της, απλά πρέπει να κάνουμε Uncomment τον τρόπο που θα παίρνει το link, σύμφωνα με το site (Friendly URLS ή όχι)

//Παίρνουμε το $link για μη friendly urls
$product_link = $HTTP_SERVER_VARS['PHP_SELF'];
if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
    $product_link .= "?" . $HTTP_SERVER_VARS['QUERY_STRING'];
}

//Παίρνουμε το $link για friendly urls
//$friendly_title=friendly($GetRec['Rec_Title']);
//$product_link=$siteURL.$PageResults['Page_View']."/".$GetRec['Rec_ID']."/".$friendly_title."/";


//Παίρνουμε τον τίτλο
$title = $GetRec['Rec_Title'];
if ($PageResults['Page_Section'] == "general" && $GetRec['Rec_ID'] != '') {
    addProductToSession($product_link, $title);
}
getRecentlyViewedProducts();

?>
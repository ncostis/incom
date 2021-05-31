<?php
// SHOW CATEGORY CONTENT
if (getparamvalue('Rec_ID') == "") {
    require $path . "views/cat_content.php";
}
// $Page_HeadLists_Flag: Show in Record from edit page (check box)
if ((getparamvalue('Rec_ID') <> "") AND ($Page_HeadLists_Flag == 1)) {
    require $path . "views/cat_content.php";
}
if(isset($CatCont)){
    //exei header content
    if(nr($SliderHeader_Query)==0){
        echo "<div class='topNoHeader'></div>";
    }
}else{
    echo "<div class='topNoHeader'></div>";
}
?>

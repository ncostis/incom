<?php
$GetLastPosts_Sel = "SELECT * FROM pages, records WHERE Page_ID = $Page_ID AND Rec_Page_ID = $Page_ID AND Rec_Page_Content = 0 Order by Rec_DateStart Desc, Rec_Order";
$GetLastPosts_Query = q($GetLastPosts_Sel);


print "<div style='background-color:#b5b5b5; padding:4px; text-align:center' class='whitetext'>Latest Posts</div>";
while ($GetLastPost = f(GetLastPosts_Sel)) {
    print $GetLastPost['Rec_Title'];
}
?>




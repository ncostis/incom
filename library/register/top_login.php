<?php
if (isset($_SESSION['user']['Customer_ID'])) {
    $username = $_SESSION['user']['Name'];
    $member_sel = "Select * from members where Mem_Name = '$username'";
    $member_Query = q($member_sel);
    $member = f($member_Query);

    $GetExtrID_Sel = "SELECT * FROM members_access WHERE MemAcc_Mem_ID = ".$member["Mem_ID"]." AND MemAcc_Parent_Page_ID = 0";
    $GetExtrID_Query = q($GetExtrID_Sel);
    $GetExtrID = f($GetExtrID_Query);
    $extrPageID = $GetExtrID['MemAcc_Page_ID'];

    $GetExtrURL_Sel = "SELECT * FROM pages WHERE Page_ID = $extrPageID";
    $GetExtrURL_Query = q($GetExtrURL_Sel);
    $GetExtrURL = f($GetExtrURL_Query);
    $extrURL = $GetExtrURL['Page_View'];
    $url = $siteURL . $extrURL;


    print"<div class=\"right toplogBack\"><a href=\"" . $path . "library/register/logout.php\" class=\"toploglinks\">&raquo; $logout</a>&nbsp;&nbsp;&nbsp;
<a href=\"$url\" class=\"toploglinks\">&raquo; $returnextranet</a></div>";
    print"<div style=\"clear:both;\"></div>";
} ?>

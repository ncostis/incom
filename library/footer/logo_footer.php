<?php
    print "<a href=\"$siteURL\">";
    if($GetLogo['Rec_Logo_Bottom'] <> '') {
        $pathimage = $rootURL.$Path_Image . $GetLogo['Rec_Logo_Bottom'];
        print "<img src=\"$pathimage\" width=\"auto\" height=\"auto\" title='".$GetHome["Rec_Field20"]."' alt='".$GetHome["Rec_Field20"]."' border='0'/>";
    }else if($GetHome['Rec_TextArea1']<>""){
        print $GetHome['Rec_TextArea1'];
    }
    print "</a>";
?>

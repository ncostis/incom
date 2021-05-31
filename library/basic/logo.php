<div class="center">
<?php
    print "<a href=\"$siteURL\" class='logo'>";
    if($GetHome['Rec_TextArea1']<>""){
        print $GetHome['Rec_TextArea1'];
    }else if($GetLogo['Rec_Logo'] <> '') {
        $pathimage = $rootURL.$Path_Image . $GetLogo['Rec_Logo'];
        print "<img src='".$pathimage."' width='auto' height='auto' title='".$GetHome['Rec_Field20']."' alt='".$GetHome['Rec_Field20']."'/>";
    }
    print "</a>";
?>
</div>
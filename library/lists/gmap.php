<script type="text/javascript">
    $(document).ready(function () {
        $("#variousmap").fancybox({
            type:'iframe',
            toolbar  : true,
            buttons : ['close'],
        });
    });
</script>


<?php
// image map always from one language, same as Logo
print "<a id=\"variousmap\" data-src=\"{$GetLogo['Rec_TextArea2']}\" href=\"javascript:;\">";
if ($GetOptRec['Rec_Check1'] == 1) { // LazyLoad
	print "<img data-srcset=\""; echo srcsetPaths($GetLogo['Rec_Image2'],"images",$path,$rootURL,$mobileMode); print "\" data-src=\"$Path_Image".$GetLogo["Rec_Image2"]."\" srcset=\"";echo srcsetPaths($GetLogo['Rec_Image2'],"images",$path,$rootURL,$mobileMode); print "\" src=\"$Path_Image".$GetLogo["Rec_Image2"]."\" alt='Google Map' width=\"100%\" height=\"auto\">";
}else{
	print "<img srcset=\"";echo srcsetPaths($GetLogo['Rec_Image2'],"images",$path,$rootURL,$mobileMode); print "\" src=\"$Path_Image".$GetLogo["Rec_Image2"]."\" alt='Google Map' width=\"100%\" height=\"auto\">";
}
print"</a>";
?>

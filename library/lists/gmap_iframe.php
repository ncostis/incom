<?php
 if ($GetOptRec['Rec_Check1'] == 1) { // LazyLoad
 	print"<iframe class=\"lazyload\" data-src=\"".$GetLogo["Rec_TextArea2"]."\" src=\"".$GetLogo["Rec_TextArea2"]."\" width=\"100%\" height=\"500\" frameBorder=\"0\"></iframe>";
} else {
 	print"<iframe src=\"".$GetLogo["Rec_TextArea2"]."\" width=\"100%\" height=\"500\" frameBorder=\"0\"></iframe>";
}
?>
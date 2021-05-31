<?php
if (!file_exists($cachefile) || time() - $cachetime > filemtime($cachefile)) {
    $cached = fopen($cachefile, 'w');
    fwrite($cached, ob_get_contents());
    fclose($cached);
    ob_end_flush();
}
?>
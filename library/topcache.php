<?php
session_start();
$url = $_SERVER["REQUEST_URI"];
$break = Explode('/', $url);
$file = $break[count($break) - 2];
$cachefile = 'cache/cached-' . $file . '.html';
$cachetime = 60;

if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    include($cachefile);
    exit;
}

ob_start();
?>
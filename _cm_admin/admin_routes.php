<?php
define("ROOT_FOLDER", __DIR__);

if((!file_exists('routes.php')) && (!file_exists('../routes.php'))){
	makeRoutes(ROOT_FOLDER);
	// header("Location: ".parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}

include("routes.php");

function makeRoutes($dir, &$results = array()){
	$files = scandir($dir);
    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
        	if(pathinfo($path)['extension']!="php") continue;
        	if(isset($results[basename($path)])){
        		//echo("Duplicate filename: $path<br>");
        	}
            $results[basename($path)] = $path; //create ["filename.php"=>"absolute path"]
        } else if ($value != "." && $value != "..") {
            makeRoutes($path, $results);
        }
    }
    $file = 'routes.php';
    $fileContents = var_export($results, true);
    $fileContents = '<?php $routes = '.$fileContents.'?>';
	file_put_contents($file, $fileContents);
}
?>
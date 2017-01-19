<?php

define('COMMOND', 'php-cli-toolbox');
define('BOX_PATH', __DIR__ . '/box/');

function loadTool($tool) {

	if (function_exists($tool)) {
		return;
	}

	$toolFilename = BOX_PATH . $tool . '.php';
	if (!file_exists($toolFilename)) {
		println("$tool not exist. see php-tools help");
		die;
	}
	
	include_once $toolFilename;

	if (!function_exists($tool)) {
		println("$tool contains error");
		die;
	}
}

function listTools() {
	$tools = [];
	$files = scandir(BOX_PATH);
	foreach($files as $file){
    	if (in_array($file, ['.', '..', 'help.php'])){
        	continue;
    	}
    	array_push($tools, substr($file, 0, strpos($file, '.')));
	}
	return $tools;
}

function println($string) {
	echo $string, PHP_EOL;
}
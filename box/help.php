<?php

function help($tool = '') {
	if (empty($tool)) {
		return listTools();
	}

	loadTool($tool);
	$toolHelp = $tool . '_help';
	if (function_exists($toolHelp)) {
		return call_user_func($toolHelp);
	}
}

function help_help() {
	return COMMOND . ' help toolname';
}
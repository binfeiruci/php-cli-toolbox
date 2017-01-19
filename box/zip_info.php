<?php

function zip_info($filepath) {

	if (!file_exists($filepath)) {
		return [];
	}

	$zip = zip_open($filepath);
	$ret = [];
	while ($entry = zip_read($zip)) {
		zip_entry_open($zip, $entry);
		$name = zip_entry_name($entry);
		$filesize = zip_entry_filesize($entry);
		$compressedsize = zip_entry_compressedsize($entry);
		$compressedmethod = zip_entry_compressionmethod($entry);
		$data = zip_entry_read($entry, 50) . '...';
	
		$ret[] = compact('name', 'filesize', 'compressedsize', 'compressedmethod', 'data');
	}
	
	return $ret;
}

function zip_info_help() {
	return COMMOND . ' zip_info filename';
}
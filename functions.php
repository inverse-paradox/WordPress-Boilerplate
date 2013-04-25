<?php
/* == include separate files ========== */
$directory = dirname(__FILE__) . '/functions';
if ($fh = opendir($directory)) {
	while (false !== ($entry = readdir($fh))) {
		if ($entry != '.' && $entry != '..') {
			$ext = substr($entry, strrpos($entry, '.') + 1);
			if ($ext == 'php') {
				include $directory . '/' . $entry;
			}
		}
	}
}

?>
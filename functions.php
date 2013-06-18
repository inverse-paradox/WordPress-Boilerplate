<?php

function theme_loader($directory)
{
	$pattern = $directory.'/*';
	foreach(glob($pattern) as $file){
		if(is_dir($file)){
			theme_loader($file);
		} else {
			include_once $file;
		}				
	}
}

theme_loader(dirname(__FILE__) . '/functions');
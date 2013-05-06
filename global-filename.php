<?php
/*
Plugin Name: Global Filename
Plugin URI: http://wpceo.com/global-filename/
Description: Change Unicode characters in the upload filename (like München.jpg,中-文.doc) to English letters (like Mc3bcnchen.jpg,e4b8ad-e69687.doc) using hex code for browser-recognized and different-system-friendly URL.
Version: 0.8
Author: WP CEO
Author URI: http://wpceo.com/
*/

add_filter('sanitize_file_name','wpceo_chinese_char');
function wpceo_chinese_char($string){
	return preg_replace_callback('/[\x{0080}-\x{ffff}]/iu','wpceo_get_hex_by_callback',$string);
}
function wpceo_get_hex_by_callback($string){
	$string = (string)$string[0];
	return bin2hex($string);
}

//自动修正上传文件中的中文文件名。

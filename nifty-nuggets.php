<?php
/*
Plugin Name:Nifty Nuggets
Plugin URI: http://www.consultben.com/nifty-nuggets/
Description: Allows writers to add tags into their posts which will be replaced upon viewing with a predefined string or the result of a PHP expression.
Version: 0.1
Author: Benjamin Cool Root
Author URI: http://www.consultben.com
*/

function NiftyReplace($content) {

	$NIFTY_START_CODE = '##';
	$NIFTY_END_CODE= '##';
	
	$replaceTags = array (
		'blogurl' => get_bloginfo('url'),
		'category_base' => get_settings('category_base'),
		'tag_base' => get_settings('tag_base'),
		'current_date' => date('Y-M-D H:i:s')
		);	
	
	foreach ($replaceTags as $pattern => $replacement ){
	$content=str_ireplace($NIFTY_START_CODE . $pattern . $NIFTY_END_CODE,$replacement,$content);
	}
	return $content;
}

add_filter('the_content', 'NiftyReplace'); add_filter('category_description', 'NiftyReplace'); ?>

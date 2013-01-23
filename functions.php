<?php
// If you want to override certain default WordPress behaviors,
// or create new functions, shortcodes and more, you can add them
// to the functions.php file.

// WARNING: Functions.php is really powerful. Even one incorrect
// line of code can break your site, forcing you to delete the file
// from your FTP server and start over. (Trust me, I've done it before.)



// JAVASCRIPT INCLUDES
// Use the latest Google-hosted jQuery file instead of the one that
// ships with WordPress. Via http://CSS-Tricks.com
// Also includes theme javascript in the footer.

function my_scripts_method() {
	wp_deregister_script('jquery'); 
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1'); 
	wp_enqueue_script('jquery');
	wp_register_script('gmf-js', get_template_directory_uri() . '/js/gmf.js', false, '1.0.0', true); 
	wp_enqueue_script('gmf-js');
}

add_action('wp_enqueue_scripts', 'my_scripts_method');



// SEARCH FORM SHORTCODE
// Creates a function and shortcode to insert a search form anywhere
// on your site. Includes a lable for screen readers.
// Include in php files use echo gmf_wpsearch(); (wrapped in PHP tags)
// or in the Wordpress editor using the [searchform] shortcode.

function gmf_wpsearch() {
	$form = '<form method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader" for="s">Search this site:</label>
	<input type="text" class="input-search input-small" placeholder="Search this site..." value="' . get_search_query() . '" name="s" id="s">
	<input type="submit" id="searchsubmit" value="Search" class="btn">
	</form>';
	return $form;
}
add_shortcode( 'searchform', 'gmf_wpsearch' );


?>

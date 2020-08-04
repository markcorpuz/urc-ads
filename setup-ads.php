<?php
/**
 * Plugin Name: Setup Ads
 * Description: Handle all the ads for the site and pulled via shortcode
 * Version: 4.0
 * Author: Jake Almeda
 * Author URI: http://smarterwebpackages.com/
 * Network: true
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// this shortcode loads the Google AD JavaScript onto the page
//add_shortcode( 'setup_load_google_ad_js', 'setup_load_google_ad_js_func' );
add_action( 'wp_head', 'setup_load_google_ad_js_func', 6 );
function setup_load_google_ad_js_func() {

	if( setup_bot_detected() ) {
		?><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- Page & Post Article Body Resposive Ad -->
				<ins class="adsbygoogle"
					style="display:block"
					data-ad-client="ca-pub-0947746501358966"
					data-ad-slot="7597430493"
					data-ad-format="auto"></ins>
				<script><?php
	}

}

// shortcode for calling the ad display handler
add_shortcode( 'spk_adsbygoogle_js', 'setup_adsbygoogle_function' );
function setup_adsbygoogle_function() {

	if( setup_bot_detected() ) {

		return '<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>';

	}

}

    	/*return '<script async src="'.plugin_dir_url( __FILE__ )."js_external/adsbygoogle.js?ver=".date( 'YmdHis', filemtime( plugin_dir_path( __FILE__ )."js_external/adsbygoogle.js" ) ).'"></script>
				<!-- Page & Post Article Body Resposive Ad -->
				<ins class="adsbygoogle"
				     style="display:block"
				     data-ad-client="ca-pub-0947746501358966"
				     data-ad-slot="7597430493"
				     data-ad-format="auto"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>';
				*/




/*
<div class="adsense-sidebar">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Page & Post Article Body Resposive Ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-0947746501358966"
     data-ad-slot="7597430493"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
*/

/* --------------------------------------------------------------------------------------------
 * | Function to hide scripts from bots
 * ----------------------------------------------------------------------------------------- */
function setup_bot_detected() {
	
	/*$x=0;	

	$agents = array(
				'Google Page Speed Insights', 	// Google
				'Gecko/20100101', 				// GTmetrix
			);

	foreach( $agents as $value ) {
		if( strpos( $_SERVER['HTTP_USER_AGENT'], $value ) == FALSE ) {
			$x++;
		}
	}

	//if( $x == count( $agents ) ) {
	if( $x >= 1 ) {
		return TRUE;
	}*/

	// return true to ignore bot checking
	return TRUE;

}
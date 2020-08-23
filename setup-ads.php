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


// Inline Google Ads JS in the Header
add_filter( 'wp_head', 'setup_inline_adsbygoogle_js_func' );
function setup_inline_adsbygoogle_js_func() {
	?><script type="text/javascript"><?php
		echo file_get_contents( 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js' );
	?></script><?PHP
}


// Load the Google AD script after x number of minutes
/*add_action( 'wp_footer', 'setup_load_google_ad_js_func', 10000 );
function setup_load_google_ad_js_func() {

	if( setup_bot_detected() ) {

		// original
		//echo '<script data-ad-client="ca-pub-0947746501358966" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>';

		echo setup_minify_javascript( '<script type="text/javascript">
			jQuery( document ).ready( function() {

				var counter = 3; // in seconds
				setInterval( function() {

				    counter--;

				    // Display counter wherever you want to display it.
				    if( counter === 0 ) {
				    	
				    	// load google ad JS
				    	jQuery( "footer" ).append( \'<script data-ad-client="ca-pub-0947746501358966" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>\' );

				    	// load the rest of the codes
				    	//LoadTheCodes();

				    }

				}, 1000);
				
			});
		</script>' );
		// OLD CODE: <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"><\/script>
	}

}*/


// shortcode for calling the ad display handler
add_shortcode( 'spk_adsbygoogle_js', 'setup_adsbygoogle_function' );
function setup_adsbygoogle_function() {

	if( setup_bot_detected() ) {

		return '<div>
					<!-- Page & Post Article Body Resposive Ad -->
					<ins class="adsbygoogle"
						style="display:block"
						data-ad-client="ca-pub-0947746501358966"
						data-ad-slot="7597430493"
						data-ad-format="auto">
					</ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>';
		
		//return 'Ads original placement.';
	}

}


/* --------------------------------------------------------------------------------------------
 * | Widget entry
 * | --------------
 * | REGISTER SHORTCODE TO HIDE GOOGLE'S OWN SCRIPTS FROM BEING TAGGED BY THEM - 2
 * ----------------------------------------------------------------------------------------- */
add_shortcode( 'spk_google_suggested_articles_js', 'setup_adsbygoogle_function_2' );
function setup_adsbygoogle_function_2() {

	if( setup_bot_detected() ) {

    	return '<div>
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-format="autorelaxed"
					     data-ad-client="ca-pub-0947746501358966"
					     data-ad-slot="2135583692"></ins>
					<script>
					     (adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>';
				
	}

}


// execute shortcodes in widget
add_filter( 'widget_text', 'do_shortcode' );


/* --------------------------------------------------------------------------------------------
 * | ADS AFTER MENU (HEADER)
 * ----------------------------------------------------------------------------------------- */
add_action( 'genesis_before_content_sidebar_wrap', 'top_google_ads' );
function top_google_ads() {
	echo '<div class="padding">'.do_shortcode( "[spk_adsbygoogle_js][/spk_adsbygoogle_js]" ).'</div>';
}


/* --------------------------------------------------------------------------------------------
 * | ADS BEFORE FOOTER
 * ----------------------------------------------------------------------------------------- */
add_action( 'genesis_after_content_sidebar_wrap', 'bottom_google_ads' );
function bottom_google_ads() {
	echo '<div class="padding">'.do_shortcode( "[spk_adsbygoogle_js][/spk_adsbygoogle_js]" ).'</div>';
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

/* --------------------------------------------------------------------------------------------
 * | Putting the Amazon scripts here to test if we can enqueue the scripts properly
 * ----------------------------------------------------------------------------------------- */
/*add_shortcode( 'spk_amazon_market_place', 'spk_amazon_market_place_func' );
function spk_amazon_market_place_func() {

	if( setup_bot_detected() ) {
		//return '<script src="'.plugin_dir_url( __FILE__ )."js_external/amazon_marketplace.js?ver=".date( 'YmdHis', filemtime( plugin_dir_path( __FILE__ )."js_external/amazon_marketplace.js" ) ).'"></script>';
		return '<div id="amzn-assoc-ad-9f2cb097-ecee-468c-b007-0b4fcd5a22c9"></div><script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=9f2cb097-ecee-468c-b007-0b4fcd5a22c9"></script>';
	}
	
}*/

// ##########################################################################################################################
// # LAZY LOAD ADS ##########################################################################################################
// ##########################################################################################################################
// ##########################################################################################################################
// ##########################################################################################################################

/*add_action( 'wp_footer', 'setup_inline_ss_ads_js', 100 );
function setup_inline_ss_ads_js() {

	$js_file = file_get_contents( plugins_url( 'js/ss_ads_asset.js', __FILE__ ) );

    ?><script type="text/javascript">

    	<?php
        if( !empty( $js_file ) ) {
            echo setup_minify_javascript( $js_file );
        }
        ?>

    </script><?php

}
	

add_action ( 'wp_head', 'my_js_variables', 10000 );
function my_js_variables(){ 

	/ * $sol_plug_dir = plugins_url().'/soliloquy/assets/css/';
    $soliloquy_css = file_get_contents( $sol_plug_dir.'soliloquy.css' );
    if( !empty( $soliloquy_css ) ) {
        $soli_styles = str_replace( 'images/', $sol_plug_dir.'images/', $soliloquy_css );
        //echo setup_minify_css( $soliloquy_css );
    } * /

	?>
	<script type="text/javascript">

	var setup_soliloquy = <?php echo json_encode( array( 
		'soli_sc' => do_shortcode( '[soliloquy id="32558"]' ),
//		'soli_styles' => $soli_styles,
	) ); ?>
	</script><?php
}*/


// JAVASCRIPT MINIFIER
if( !function_exists( 'setup_minify_javascript' ) ) {
    
    function setup_minify_javascript( $input ) {

        if(trim($input) === "") return $input;
        return preg_replace(
            array(
                // Remove comment(s)
                '#\s*("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')\s*|\s*\/\*(?!\!|@cc_on)(?>[\s\S]*?\*\/)\s*|\s*(?<![\:\=])\/\/.*(?=[\n\r]|$)|^\s*|\s*$#',
                // Remove white-space(s) outside the string and regex
                '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/)|\/(?!\/)[^\n\r]*?\/(?=[\s.,;]|[gimuy]|$))|\s*([!%&*\(\)\-=+\[\]\{\}|;:,.<>?\/])\s*#s',
                // Remove the last semicolon
                '#;+\}#',
                // Minify object attribute(s) except JSON attribute(s). From `{'foo':'bar'}` to `{foo:'bar'}`
                '#([\{,])([\'])(\d+|[a-z_][a-z0-9_]*)\2(?=\:)#i',
                // --ibid. From `foo['bar']` to `foo.bar`
                '#([a-z0-9_\)\]])\[([\'"])([a-z_][a-z0-9_]*)\2\]#i'
            ),
            array(
                '$1',
                '$1$2',
                '}',
                '$1$3',
                '$1.$3'
            ),
        $input);


    }

}


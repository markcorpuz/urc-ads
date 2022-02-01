<?php

/* --------------------------------------------------------------------------------------------
 * | ADS AFTER MENU (HEADER)
 * ----------------------------------------------------------------------------------------- */
add_action( 'genesis_before_content_sidebar_wrap', 'urc_adsbygoogles_top' );
function urc_adsbygoogles_top() {

	if( !is_page( 'free-ebook' ) ) {
		echo '<div class="padding-bottom">'.urc_adsbygoogles_script().'</div>';
	}

}


/* --------------------------------------------------------------------------------------------
 * | ADS BEFORE FOOTER
 * ----------------------------------------------------------------------------------------- */
add_action( 'genesis_after_content_sidebar_wrap', 'urc_adsbygoogles_bottom' );
function urc_adsbygoogles_bottom() {

	echo '<div class="padding-top">'.urc_adsbygoogles_script().'</div>';

}


/* --------------------------------------------------------------------------------------------
 * | AD SCRIPT - FUNCTION
 * ----------------------------------------------------------------------------------------- */
function urc_adsbygoogles_script() {

	return '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-0947746501358966"
		     crossorigin="anonymous"></script>
		<!-- Page & Post Article Body Resposive Ad -->
		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-0947746501358966"
		     data-ad-slot="7597430493"
		     data-ad-format="auto"
		     data-full-width-responsive="true"></ins>
		<script>
		     (adsbygoogle = window.adsbygoogle || []).push({});
		</script>';

}
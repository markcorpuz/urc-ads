<?php

// HEADER AND FOOTER SCRIPTS

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// HEADER
add_shortcode( 'setup-header-footer-scripts', 'setup_header_footer_scripts_function' );
function setup_header_footer_scripts_function() {


	$google_analytics = "<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-90942410-1', 'auto');
		  ga('send', 'pageview');

		</script>";


	$google_tag_manager = '<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQFDBGR"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->';


	$twitter_tag_code = "<!-- Twitter universal website tag code -->
		<script>
		!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
		},s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
		a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
		// Insert Twitter Pixel ID and Standard Event data below
		twq('init','nzg7t');
		twq('track','PageView');
		</script>
		<!-- End Twitter universal website tag code -->";


	$amazon_market_place = '<div id="amzn-assoc-ad-b0a592c1-6f67-436c-a82b-52492a2da902"></div><script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=b0a592c1-6f67-436c-a82b-52492a2da902"></script>';


	return $google_analytics.$google_tag_manager.$twitter_tag_code.$amazon_market_place;

}
<?php
/*
Plugin Name: Allow aliases
Plugin URI: https://github.com/adigitalife/yourls-allow-aliases
Description: This plugin allows YOURLS to work with alias hostnames for the server
Version: 1.0
Author: Aylwin
Author URI: http://adigitalife.net/
*/
// Hook our custom function into the 'shunt_get_request' filter
yourls_add_filter( 'shunt_get_request', 'allow_aliases' );
// Our custom function that will be triggered when the event occurs
function allow_aliases () {
        
	yourls_do_action( 'pre_get_request' );
	
	// Ignore protocol & www. prefix
	$root = str_replace( array( 'https://', 'http://', 'https://www.', 'http://www.' ), '', YOURLS_SITE );
	// Use the configured domain instead of $_SERVER['HTTP_HOST']
	$root_host = parse_url( YOURLS_SITE );
	
	// Case insensitive comparison of the YOURLS root to match both http://Sho.rt/blah and http://sho.rt/blah
	$request = preg_replace( "!$root/!i", '', $root_host['host'] . $_SERVER['REQUEST_URI'], 1 );
	// Unless request looks like a full URL (ie request is a simple keyword) strip query string
	if( !preg_match( "@^[a-zA-Z]+://.+@", $request ) ) {
		$request = current( explode( '?', $request ) );
	}
	
	return yourls_apply_filter( 'get_request', $request );
}

<?php
/*
Plugin Name: Stop Internal Pingbacks
Plugin URI: http://lamp.sangkrit.net/
Description: Stop WordPress from sending internal pingbacks.
Version: 0.1
Author: Shardul Pandey
Author URI: http://sangkrit.net/shardul

License: GPLv2 or later
*/

function stop_my_pinging( &$links ) {
	$home = get_option( 'home' );
	foreach ( $links as $l => $link )
		if ( 0 === strpos( $link, $home ) )
			unset($links[$l]);
}

add_action( 'pre_ping', 'stop_my_pinging' );
?>
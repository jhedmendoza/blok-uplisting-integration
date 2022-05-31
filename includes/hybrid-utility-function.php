<?php
if ( !defined('ABSPATH') ) exit; // Exit if accessed directly


// Globals.
global $hybrid_instances;

// Initialize placeholders.
$hybrid_report_instances = array();


function hybrid_new_instances( $class = '' ) {
	global $hybrid_instances;
	return $hybrid_instances[ $class ] = new $class();
}


function hybrid_get_path( $filename = '' ) {
	return HYBRID_PATH . ltrim($filename, '/');
}


function hybrid_include( $filename = '', $attributes='') {
	$file_path = hybrid_get_path($filename);
	if( file_exists($file_path) ) {
		include_once($file_path);
	}
}

function hybrid_curl($api_url, $post_data=[], $request_type = 'POST', $headers = []) {
	$curl_init = curl_init($api_url);

	if ( !empty($post_data) )
		curl_setopt($curl_init, CURLOPT_POSTFIELDS, $post_data);

	if (strtoupper($request_type) == 'GET')
		curl_setopt($curl_init, CURLOPT_CUSTOMREQUEST, 'GET');

	if ( !empty($headers) )	 {
		curl_setopt($curl_init, CURLOPT_HTTPHEADER, $headers);
	}

	curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, true);
	$api_response = curl_exec($curl_init);
	curl_close($curl_init);
 	$result = json_decode($api_response, true);

	return $result;
}
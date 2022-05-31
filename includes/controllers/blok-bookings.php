<?php

add_action('wp_ajax_blok_get_bookings', 'blok_get_bookings');
add_action('wp_ajax_nopriv_blok_get_bookings', 'blok_get_bookings');

add_action('wp_ajax_blok_create_bookings', 'blok_create_bookings');
add_action('wp_ajax_nopriv_blok_create_bookings', 'blok_create_bookings');

add_action('wp_ajax_blok_get_properties', 'blok_get_properties');
add_action('wp_ajax_nopriv_blok_get_properties', 'blok_get_properties');

function blok_get_bookings() {

    $property_id = sanitize_text_field($_POST['property_id']);
    // $check_in    = sanitize_text_field($_POST['check_in']);
    // $check_out   = sanitize_text_field($_POST['check_out']);

    $check_in = '2022-05-01';
    $check_out= '2022-07-03';

	$token = base64_encode(UPLISTING_API_KEY);

	$calendar = hybrid_curl(UPLISTING_CALENDAR_API.'?'.http_build_query([
        'from'=> $check_in,
        'to'  => $check_out,
        'listing_id' => 40149
      ]), [], 'GET', ['Content-Type:application/json', 'Authorization:Basic '.$token ]);

      echo '<pre>'; print_r($calendar); exit;

}

function blok_create_bookings() {

}

function blok_get_properties() {

}
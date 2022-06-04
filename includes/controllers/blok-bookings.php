<?php

add_action('wp_ajax_blok_get_bookings', 'blok_get_bookings');
add_action('wp_ajax_nopriv_blok_get_bookings', 'blok_get_bookings');

add_action('wp_ajax_blok_create_bookings', 'blok_create_bookings');
add_action('wp_ajax_nopriv_blok_create_bookings', 'blok_create_bookings');

add_action('wp_ajax_blok_get_properties', 'blok_get_properties');
add_action('wp_ajax_nopriv_blok_get_properties', 'blok_get_properties');

function blok_get_bookings() {

  $property_id = sanitize_text_field($_POST['property_id']);
  $check_in    = sanitize_text_field($_POST['check_in']);
  $check_out   = sanitize_text_field($_POST['check_out']);

	$token = base64_encode(UPLISTING_API_KEY);

	$calendar = hybrid_curl(UPLISTING_CALENDAR_API.'/'.$property_id.'?'.http_build_query([
        'from'=> $check_in,
        'to'  => $check_out
      ]), [], 'GET', ['Content-Type:application/json', 'Authorization:Basic '.$token]);

  $bookings = $calendar['calendar']['days'];

  if ( isset($bookings) && !empty($bookings) ) {
    echo json_encode(['status' => true, 'msg' => 'Bookings found.', 'data' => $bookings]);
  }
  else {
    echo json_encode(['status' => false, 'msg' => 'No bookings found.', 'data' => '']);
  }
     
  exit;
}

function blok_create_bookings() {

}

function blok_get_properties() {
	$property_ids = include HYBRID_PATH.'includes/config/property_ids.php'; 
	$token = base64_encode(UPLISTING_API_KEY);

	$properties = hybrid_curl(UPLISTING_PROPERTIES_API, [], 'GET', [
		'Content-Type:application/json',
		'Authorization:Basic '.$token 
	]);

	foreach ($properties['data'] as $property) {
		$uplisting_id = $property['id'];
		$results[] = array(
			'id'            => isset($property_ids[$uplisting_id]) ? $property_ids[$uplisting_id] : $uplisting_id,
      'has_property'  => isset($property_ids[$uplisting_id]) ? 1 : 0,
			'property_name' => $property['attributes']['name']
		);
	}

  return $results;
}
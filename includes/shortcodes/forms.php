<?php
add_shortcode('blok-book-now-form', 'shortcode_blok_book_now');

function shortcode_blok_book_now() {
	ob_start();
	$token = base64_encode(UPLISTING_API_KEY);

	$properties = hybrid_curl(UPLISTING_PROPERTIES_API, [], 'GET', [
		'Content-Type:application/json',
		'Authorization:Basic '.$token 
	]);

	foreach ($properties['data'] as $property) {
		$results[] = array(
			'id' => $property['id'],
			'property_name' => $property['attributes']['name']
		);
	}

	hybrid_include('includes/template/book_now_form.php', $results);
	return ob_get_clean();
}
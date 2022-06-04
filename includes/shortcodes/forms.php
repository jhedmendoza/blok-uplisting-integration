<?php
add_shortcode('blok-book-now-form', 'shortcode_blok_book_now');

function shortcode_blok_book_now() {
	ob_start();

	$properties = blok_get_properties();

	hybrid_include('includes/template/book_now_form.php', $properties);

	return ob_get_clean();
}
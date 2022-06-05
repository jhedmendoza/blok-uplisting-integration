<?php
add_shortcode('blok-book-now-form', 'shortcode_blok_book_now');

function shortcode_blok_book_now() {
	ob_start();

	hybrid_include('includes/template/book_now_form.php');

	return ob_get_clean();
}
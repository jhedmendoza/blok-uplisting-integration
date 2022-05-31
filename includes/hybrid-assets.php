<?php
if ( !defined('ABSPATH') ) exit; // Exit if accessed directly

add_action('wp_enqueue_scripts', 'hybrid_enqueue_script');
add_action('wp_head', 'js_inline_script' );

/**
 * nmb_subscription_enqueue_script
 *
 * @wp-hook wp_enqueue_scripts
 * @return  void
 */
function hybrid_enqueue_script() {

	$version_script = '1.0';

	//enqueue external css lib
	wp_enqueue_style('bootstrap-5-css','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', [], '5.0.2');
	//wp_enqueue_style('blok-fontawesome-free', HYBRID_DIR_URL . 'assets/lib/fontawesome-free/css/all.min.css', [], '5.15.1');

	//enqueue css
	wp_enqueue_style('blok-booking', HYBRID_DIR_URL . 'assets/css/booking.css', [], $version_script);

	//enqueue external js lib
	wp_enqueue_script('bootstrap-5-js','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', ['jquery'], '5.0.2', true);
	wp_enqueue_script('swal-alert','https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js', ['jquery'], '10.15.5', true);

	//enqueue js
	wp_enqueue_script('blok-booking', HYBRID_DIR_URL . 'assets/js/booking.js', ['jquery'], $version_script, true);
	

}
?>

<?php function js_inline_script() { ?>
<script type="text/javascript">
   	var pluginAjaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
<?php } ?>

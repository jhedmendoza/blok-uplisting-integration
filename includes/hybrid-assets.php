<?php
if ( !defined('ABSPATH') ) exit; // Exit if accessed directly

add_action('wp_enqueue_scripts', 'hybrid_enqueue_script');

/**
 * nmb_subscription_enqueue_script
 *
 * @wp-hook wp_enqueue_scripts
 * @return  void
 */
function hybrid_enqueue_script() {

	$version_script = '1.0';
		//enqueue styles
	 //enqueue js
}

function nxs_report_js_inline_script() {

?>
<script type="text/javascript">
   	var pluginAjaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
<?php
}

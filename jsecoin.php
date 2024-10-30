<?php
/**
 * Plugin Name: JSEcoin
 * Plugin URI: https://jsecoin.com
 * Description: This plugin makes it easy to add the JSEcoin code snippet to your wordpress website.
 * Version: 1.0.1
 * Author: mediacambridge
 * License: GPL2
 */

add_action( 'wp_footer', 'jsecoin' );
function jsecoin() {
  echo get_option('jsecoin');

}

add_action('admin_menu', 'jsecoin_menu');

function jsecoin_menu() {
	add_menu_page('jsecoin Settings', 'JSEcoin', 'administrator', 'jsecoin-settings', 'jsecoin_settings_page', 'dashicons-editor-unlink');
}

function jsecoin_settings_page() {
?>
<div class="wrap">
<h2>JSEcoin Wordpress Plugin</h2>
<p>You can get your code snippet from <a href="https://jsecoin.com/platform/?publishers=1" target="_blank">https://jsecoin.com/platform/?publishers=1</a></p>
<p>Enter your code in the text area below</p>
<form method="post" action="options.php" onsubmit="alert('Saved');">
    <?php settings_fields( 'jsecoin-settings-group' ); ?>
    <?php do_settings_sections( 'jsecoin-settings-group' ); ?>
    <textarea style="width: 100%; height: 200px;" name="jsecoin"><?php echo esc_attr( get_option('jsecoin') ); ?></textarea><br>
    <br>
    <?php submit_button(); ?>
</form>
</div>

<?php
}

add_action( 'admin_init', 'jsecoin_settings' );

function jsecoin_settings() {
	register_setting( 'jsecoin-settings-group', 'jsecoin' );
}
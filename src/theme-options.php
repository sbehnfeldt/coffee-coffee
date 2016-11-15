<?php
if ( 'POST' ===  $_SERVER['REQUEST_METHOD']) {
	$ageLimit = $_POST['ageLimit'];
	update_option( 'coffee-coffee-age_limit', $ageLimit );
	?>
	<div class="updated">
		<p><strong><?php _e( 'settings saved.', 'menu-test' ); ?></strong></p>
	</div>
<?php } else {
	$ageLimit = get_option( 'coffee-coffee-age_limit');
}
?>
<div class="wrap">
	<h2><?php echo __( 'Menu Test Plugin Settings', 'menu-test' ); ?></h2>
	<form name="optionsForm" method="post" action="">
		<p>
			<?php _e( 'New Article Age Limit: ', 'menu-test' ); ?>
			<input type="text" name="ageLimit" value="<?php echo $ageLimit; ?>"> days.
		</p>

		<p class="submit">
			<input type="submit" name="Submit" class="button button-primary" value="<?php esc_attr_e( 'Save Changes' ) ?>" />
		</p>
	</form>
</div>
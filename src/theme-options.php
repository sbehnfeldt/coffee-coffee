<?php
if ( 'POST' === $_SERVER['REQUEST_METHOD'] ) {
	$useBlogIndexCarousel = $_POST['useBlogIndexCarousel'];
	$ageLimit             = $_POST['ageLimit'];
	update_option( 'coffee-coffee-use_blog_index_carousel', $useBlogIndexCarousel );
	update_option( 'coffee-coffee-age_limit', $ageLimit );
	?>
	<div class="updated">
		<p><strong><?php _e( 'settings saved.' ); ?></strong></p>
	</div>
<?php } else {
	$useBlogIndexCarousel = get_option( 'coffee-coffee-use_blog_index_carousel' );
	$ageLimit = get_option( 'coffee-coffee-age_limit' );
}
?>
<div class="wrap">
	<h2><?php echo __( 'Menu Test Plugin Settings' ); ?></h2>
	<form name="optionsForm" method="post" action="">
		<p>
			<?php _e( 'Use blog index carousel: ' ); ?>
			<input type="checkbox" name="useBlogIndexCarousel" <?php if ( $useBlogIndexCarousel ) : echo ' checked'; endif; ?> />
		</p>

		<p>
			<?php _e( 'New Article Age Limit: ' ); ?>
			<input type="text" name="ageLimit" value="<?php echo $ageLimit; ?>"> days.
		</p>

		<p class="submit">
			<input type="submit" name="Submit" class="button button-primary"
			       value="<?php esc_attr_e( 'Save Changes' ) ?>"/>
		</p>
	</form>
</div>
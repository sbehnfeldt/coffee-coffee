<?php
if ( 'POST' === $_SERVER['REQUEST_METHOD'] ) {
	$useBlogIndexCarousel = $_POST['useBlogIndexCarousel'];
	$ageLimit             = $_POST['ageLimit'];
	update_option( 'coffee-coffee_use-blog-index-carousel', $useBlogIndexCarousel );
	update_option( 'coffee-coffee_age-limit', $ageLimit );
	?>
	<div class="updated">
		<p><strong><?php _e( 'settings saved.' ); ?></strong></p>
	</div>
<?php } else {
	$useBlogIndexCarousel = get_option( 'coffee-coffee_use-blog-index-carousel' );
	$ageLimit             = get_option( 'coffee-coffee_age-limit' );
}
?>
<div class="wrap">
	<h2><?php echo __( 'Menu Test Plugin Settings' ); ?></h2>
	<form name="optionsForm" method="post" action="">
		<div>
			<?php _e( 'Use blog index carousel: ' ); ?>
			<input type="checkbox"
			       name="useBlogIndexCarousel" <?php if ( $useBlogIndexCarousel ) : echo ' checked'; endif; ?> />
			<div class="options<?php if ( ! $useBlogIndexCarousel ) : echo ' hidden'; endif ?>">
				<p>Hello, options</p>
			</div>
		</div>
		<fieldset>
			<p>
				<?php _e( 'New Article Age Limit: ' ); ?>
				<input type="text" name="ageLimit" value="<?php echo $ageLimit; ?>"> days.
			</p>
		</fieldset>
		<p class="submit">
			<input type="submit" name="Submit" class="button button-primary"
			       value="<?php esc_attr_e( 'Save Changes' ) ?>"/>
		</p>
	</form>
</div>
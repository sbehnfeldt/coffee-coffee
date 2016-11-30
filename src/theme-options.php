<?php
if ( 'POST' === $_SERVER['REQUEST_METHOD'] ) {
	$useBlogIndexCarousel = $_POST['useBlogIndexCarousel'];
	$useSiteHeaderSlide   = $_POST['useSiteHeaderSlide'];
	$ageLimit             = $_POST['ageLimit'];
	update_option( 'coffee-coffee_use-blog-index-carousel', $useBlogIndexCarousel );
	update_option( 'coffee-coffee_use-site-header-slide', $useSiteHeaderSlide );
	update_option( 'coffee-coffee_age-limit', $ageLimit );
	?>
	<div class="updated">
		<p><strong><?php _e( 'settings saved.' ); ?></strong></p>
	</div>
<?php } else {
	$useBlogIndexCarousel = get_option( 'coffee-coffee_use-blog-index-carousel' );
	$useSiteHeaderSlide   = get_option( 'coffee-coffee_use-site-header-slide' );
	$ageLimit             = get_option( 'coffee-coffee_age-limit' );
}
?>
<div class="wrap">
	<h2><?php echo __( 'Menu Test Plugin Settings' ); ?></h2>
	<form name="optionsForm" method="post" action="">
		<div>
			<input type="checkbox"
			       name="useBlogIndexCarousel" <?php if ( $useBlogIndexCarousel ) : echo ' checked'; endif; ?> />
			<?php _e( 'Use blog index carousel: ' ); ?>
			<div class="blogIndexCarouselOptions<?php if ( ! $useBlogIndexCarousel ) : echo ' hidden'; endif ?>">
				<input type="checkbox"
				       name="useSiteHeaderSlide" <?php if ( $useSiteHeaderSlide ) : echo ' checked'; endif ?> />
				<?php _e( 'Use blog header image in carousel: ' ); ?>
			</div>
		</div>

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
<!doctype html>
<html lang="en">
<?php get_header(); ?>

<?php
$bodyClasses = [ 'coffee-class' ];
if ( is_front_page() ) :
	array_push( $bodyClasses, 'coffee-front' );
endif;
?>

<body <?php body_class( $bodyClasses ); ?>>

<div class="container">
	<div class="row">
		<img src="<?php header_image(); ?>" width="100%" alt=""/>
		<?php include 'navbar.php'; ?>

		<h1>Blog Index</h1>
		<?php if ( have_posts() ):
			while ( have_posts() ): the_post(); ?>
				<div class="row">
					<div class="col-xs-12">
						<?php get_template_part( 'content' ); ?>
					</div>
				</div>
			<?php endwhile; ?>
			<?php
		else:
			echo( 'No posts found' );
		endif;
		?>
	</div>
</div>

<?php get_footer(); ?>
</body>
</html>

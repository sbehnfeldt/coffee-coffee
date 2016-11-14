<?php
/* Template used to render the blog posts index, whether it is the "home" page or not. */
?>
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
	<?php include 'navbar.php'; ?>
	<img src="<?php header_image(); ?>" width="100%" alt=""/>

	<h1>Blog Index</h1>

	<?php if ( have_posts() ):
		while ( have_posts() ): the_post(); ?>
			<h1>Post count: <?php $posts = get_posts(); echo count($posts); ?></h1>
			<?php get_template_part( 'article', 'home' ); ?>
		<?php endwhile; ?>
		<?php
	else:
		echo( 'No posts found' );
	endif;
	?>
	<?php get_footer(); ?>
</div>

</body>
</html>

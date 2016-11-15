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
	<?php get_template_part( 'navbar' ); ?>
	<img class="page-banner" src="<?php header_image(); ?>" width="100%" alt=""/>

	<h1>Blog Index</h1>
	<?php $nPosts = get_posts();
	if ( 0 == $nPosts ) : ?>
		<div>No Posts Found</div>
	<?php elseif ( 1 == $nPosts ) :
		the_post();
		get_template_part( 'article', 'home' );
	elseif ( 2 == $nPosts ) : ?>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<?php
				the_post();
				get_template_part( 'article', 'home' );
				the_post();
				get_template_part( 'article', 'home' );
				?>
			</div>
		</div>

	<?php else: ?>
		<?php while ( have_posts() ): ?>
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<?php the_post();
					get_template_part( 'article', 'home' );
					if ( ! have_posts() ): break; endif; ?>
				</div>
				<div class="col-xs-12 col-sm-4">
					<?php the_post();
					get_template_part( 'article', 'home' );
					if ( ! have_posts() ): break; endif; ?>
				</div>
				<div class="col-xs-12 col-sm-4">
					<?php the_post();
					get_template_part( 'article', 'home' ); ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php get_footer(); ?>
</div>

</body>
</html>

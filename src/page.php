<!doctype html>
<html lang="en">
<?php get_header(); ?>

<?php
$bodyClasses = [ 'coffee-full-width' ];
if ( is_home() ) :
	array_push( $bodyClasses, 'coffee-home' );
endif;
if ( is_front_page() ) :
	array_push( $bodyClasses, 'coffee-front' );
endif;
?>

<body <?php body_class( $bodyClasses ); ?>>
<div class="container">
	<img src="<?php header_image(); ?>" width="100%" alt=""/>

	<?php get_template_part( 'navbar' ); ?>

	<?php
	if ( have_posts() ):
		while ( have_posts() ): the_post(); ?>
			<h3><?php the_title(); ?></h3>
			<?php the_content(); ?>
			<?php the_tags(); ?>
			<hr/>
			<?php
		endwhile;
	else:
		echo( 'Nope' );
	endif;
	?>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
</div><!-- .container -->
</body>
</html>

<!doctype html>
<html lang="en">
<?php get_header(); ?>

<?php
$bodyClasses = [ 'coffee-class' ];
if ( is_home() ) :
	array_push( $bodyClasses, 'coffee-blog' );
endif;
if ( is_front_page() ) :
	array_push( $bodyClasses, 'coffee-front' );
endif;
?>

<body <?php body_class( $bodyClasses ); ?>>
<div class="container">
	<?php if (has_post_thumbnail()): ?>
		<?php the_post_thumbnail('large'); ?>
	<?php else: ?>
		<img src="<?php header_image(); ?>" width="100%" alt=""/>
	<?php endif; ?>

	<?php get_template_part( 'navbar' ); ?>

	<?php
	if ( have_posts() ):
		while ( have_posts() ): the_post(); ?>
			<h3><?php the_title(); ?></h3>
			<small>Posted on: <?php the_time( 'F j, Y' ); ?> in <?php the_category(); ?></small>
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
</div>
</body>
</html>

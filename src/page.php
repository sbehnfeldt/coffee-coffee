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
	<?php get_template_part( 'navbar' ); ?>
	<img class="page-banner" src="<?php header_image(); ?>" width="100%" alt=""/>
	<div class="row">
		<div class="col-xs-10 col-med-12">
			<?php
			if ( have_posts() ):
				while ( have_posts() ): the_post(); ?>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
					<?php the_tags(); ?>
					<?php
				endwhile;
			else:
				echo( 'Nope' );
			endif;
			?>
		</div>

		<div class="col-xs-2 sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php get_footer(); ?>
</div><!-- .container -->
</body>
</html>

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
	<?php get_template_part( 'navbar' ); ?>
	<div class="col-xs-12">
		<?php if ( has_post_thumbnail() ): ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php else: ?>
			<img class="page-banner" src="<?php header_image(); ?>" width="100%" alt=""/>
		<?php endif; ?>
	</div>

	<div class="row">
		<div class="col-xs-10 col-med-12">
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
		</div>
		<div class="col-xs-2">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php get_footer(); ?>
</div><!-- /div.container -->
</body>
</html>

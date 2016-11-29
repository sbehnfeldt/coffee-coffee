<?php
/**
 * Single post template.  Used when a single post is queried.
 */
?>
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
	<header>
		<?php get_template_part( 'navbar' ); ?>

		<h1><?php the_title(); ?></h1>
		<br/>
		<small>Posted on: <?php the_time( 'F j, Y' ); ?> in <?php the_category( ',' ); ?></small>
		<br/>
		<small><?php echo implode( ', ', the_tags() ); ?></small>
	</header>

	<div class="col-xs-10 col-med-12">
		<?php
		if ( have_posts() ):
			while ( have_posts() ): the_post();
				get_template_part( 'post', get_post_format() );
				echo( '<hr />' );
				if ( comments_open() ) {
					comments_template();
				} else {
					echo( '<h5 class="text-center">Comments are closed.</h5>' );
				}

			endwhile;
		else:
			echo( 'Nope' );
		endif;
		?>
	</div>

	<div class="col-xs-2">
		<?php get_sidebar(); ?>
	</div>

</div><!-- /div.container -->
<?php get_footer(); ?>
</body>
</html>

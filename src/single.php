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
		<small>Posted on: <?php the_time( 'F j, Y' ); ?> in <?php the_category(); ?></small>
	</header>

	<div class="col-xs-10 col-med-12">
		<?php
		if ( have_posts() ):
			while ( have_posts() ): the_post(); ?>
				<div class="row">
					<?php if ( has_post_thumbnail() ): ?>
						<?php the_post_thumbnail( 'medium', array( 'class' => 'pull-left ' ) ); ?>
					<?php endif; ?>

					<?php
					$gallery = get_post_gallery();
					$content = strip_shortcode_gallery( get_the_content() );
					$content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) );
					?>
					<div class="content">
						<?php echo $content; ?>
					</div>
				</div>
				<?php if ( $gallery ): ?>
					<div class="row gallery"><?php echo $gallery ?></div>
				<?php endif; ?>
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

	<?php get_footer(); ?>
</div><!-- /div.container -->
</body>
</html>

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

	<div class="container">
		<div id="post-teasers">
			<?php $nPosts = get_posts();
			if ( 0 == $nPosts ) : ?>
				<div>No Posts Found</div>
			<?php elseif ( 1 == $nPosts ) :
				the_post();
				get_template_part( 'article', 'teaser' );
			elseif ( 2 == $nPosts ) : ?>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<?php
						the_post();
						get_template_part( 'article', 'teaser' );
						the_post();
						get_template_part( 'article', 'teaser' );
						?>
					</div>
				</div>

			<?php else: ?>
				<?php while ( have_posts() ): ?>
					<div class="row">
						<div class="col-xs-12 col-sm-4">
							<?php the_post();
							get_template_part( 'article', 'teaser' );
							if ( ! have_posts() ): break; endif; ?>
						</div>
						<div class="col-xs-12 col-sm-4">
							<?php the_post();
							get_template_part( 'article', 'teaser' );
							if ( ! have_posts() ): break; endif; ?>
						</div>
						<div class="col-xs-12 col-sm-4">
							<?php the_post();
							get_template_part( 'article', 'teaser' ); ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>

	<?php get_footer(); ?>
</div><!-- /div.container>

</body>
</html>

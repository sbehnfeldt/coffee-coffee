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

	<div class="blog-index-contents">
		<?php if ( get_option( 'coffee-coffee_use-blog-index-carousel' ) ):
			get_template_part( 'blogIndexCarousel' );
		endif; ?>

		<div id="post-teasers">
			<?php if ( ! have_posts() ) : ?>
				<div>No Posts Found</div>
			<?php else: ?>
				<?php $count = 0; ?>
				<?php while ( have_posts() ): ?>
					<?php if ( 0 === $count % 3 ) : ?><div class="row"><?php endif; ?>
					<div class="col-xs-12 col-sm-4">
						<?php the_post();
						get_template_part( 'teaser', get_post_format() );
						if ( ! have_posts() ): break; endif; ?>
					</div>
					<?php $count++; if ( 0 === $count % 3 ): ?></div><?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>

	<?php get_footer(); ?>
</div><!-- /div.container>

</body>
</html>

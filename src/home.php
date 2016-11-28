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

	<!-- Latest blog posts carousel -->
	<div id="latest-posts-carousel" class="carousel slide" data-ride="carousel">

		<?php $indicators = '<li data-target="#latest-posts-carousel" data-slide-to="0" class="active" />'; ?>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">

			<div class="item active">
				<img class="page-banner" src="<?php header_image(); ?>" width="100%" alt="" / >
				<div class="carousel-caption">
					<h1 class="entry-title"><a href="<?php bloginfo( 'wpurl' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<p><?php bloginfo( 'description' ); ?></p>
				</div>
			</div>

			<?php $count = 1;
			if ( have_posts() ):
				while ( have_posts() ):
					the_post();
					if ( ! has_post_thumbnail() ): continue; endif;
					?>
					<!-- ?php get_template_part( 'slider', 'home' ); ? -->
					<div class="item">
						<?php the_post_thumbnail( 'full' ); ?>
						<div class="carousel-caption">
							<h1><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>
							<p><?php echo the_excerpt(); ?></p>
						</div>
					</div>

					<?php $indicators .= '<li data-target="#latest-posts-carousel" data-slide-to="' . $count . '" />' ?>
					<?php $count ++; endwhile; ?>
				<?php
			endif;
			?>

		</div>

		<!-- Indicators -->
		<ol class="carousel-indicators"><?php echo $indicators; ?></ol>

		<!-- Controls -->
		<a href="#latest-posts-carousel" class="left carousel-control" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a href="#latest-posts-carousel" class="right carousel-control" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" ariaa-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>


	<div class="container">
		<div id="post-teasers">
			<?php $nPosts = get_posts();
			if ( 0 == $nPosts ) : ?>
				<div>No Posts Found</div>
			<?php elseif ( 1 == $nPosts ) :
				the_post();
				get_template_part( 'teaser', get_post_format() );
			elseif ( 2 == $nPosts ) : ?>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<?php
						the_post();
						get_template_part( 'teaser', get_post_format() );
						the_post();
						get_template_part( 'teaser', get_post_format() );
						?>
					</div>
				</div>

			<?php else: ?>
				<?php while ( have_posts() ): ?>
					<div class="row">
						<div class="col-xs-12 col-sm-4">
							<?php the_post();
							get_template_part( 'teaser', get_post_format() );
							if ( ! have_posts() ): break; endif; ?>
						</div>
						<div class="col-xs-12 col-sm-4">
							<?php the_post();
							get_template_part( 'teaser', get_post_format() );
							if ( ! have_posts() ): break; endif; ?>
						</div>
						<div class="col-xs-12 col-sm-4">
							<?php the_post();
							get_template_part( 'teaser', get_post_format() );
							?>
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

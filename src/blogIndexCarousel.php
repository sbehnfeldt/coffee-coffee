<!-- Latest blog posts carousel -->
<div id="latest-posts-carousel" class="carousel slide" data-ride="carousel">

	<?php
	$count = 0;
	$indicators = '<li data-target="#latest-posts-carousel" data-slide-to="' . $count++ . '" class="active" />'; ?>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">

		<div class="item active">
			<img class="page-banner" src="<?php header_image(); ?>" width="100%" alt="" / >
			<div class="carousel-caption">
				<h1 class="entry-title"><a href="<?php bloginfo( 'wpurl' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<p><?php bloginfo( 'description' ); ?></p>
			</div>
		</div>

		<?php
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



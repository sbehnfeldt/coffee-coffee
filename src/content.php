<article>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<small>Posted on: <?php the_time( 'F j, Y' ); ?> in <?php echo get_the_category_list( ', ' ); ?>
		<br/>
		<?php echo 'Post format:' . get_post_format(); ?>
	</small>
	<div class="row">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="thumbnail-img"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
		<?php endif; ?>

		<?php the_excerpt(); ?>
		<small><?php echo get_the_tag_list( 'Tagged with ', ', ' ); ?></small>
	</div>
</article>

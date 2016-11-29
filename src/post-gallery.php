<article>
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
</article>

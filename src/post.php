<div class="row">
	<?php if ( has_post_thumbnail() ): ?>
		<?php the_post_thumbnail( 'medium', array( 'class' => 'pull-left ' ) ); ?>
	<?php endif; ?>

	<div class="content">
		<?php the_content(); ?>
	</div>
</div>
<?php the_tags(); ?>
<hr/>

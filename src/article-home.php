<?php
$today     = date( 'r' );
$published = get_the_date( $r );
$diff      = round( ( strtotime( $today ) - strtotime( $published ) ) / ( 24 * 60 * 60 ), 0 );
$postClass = $diff < get_option( 'coffee-coffee-age_limit' ) ? 'newArticle' : null;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $postClass ); ?>>
	<header class="entry-header">
		<?php if ( $postClass == 'newArticle' ) : ?>
			<span class="badge">New!</span>
			<?php else : ?>
			<span>&nbsp;</span>
		<?php endif; ?>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<small>Posted on: <?php the_time( 'F j, Y' ); ?> in <?php echo get_the_category_list( ', ' ); ?></small>
	</header>
	<div class="row">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="col-xs-12 col-sm-4">
				<div class="thumbnail"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
			</div>
			<div class="col-xs-12 col-sm-8">
				<?php the_excerpt(); ?>
				<small><?php echo get_the_tag_list( 'Tagged with ', ', ' ); ?></small>
			</div>
		<?php else: ?>
			<div class="col-xs-12">
				<?php the_excerpt(); ?>
				<small><?php echo get_the_tag_list( 'Tagged with ', ', ' ); ?></small>
			</div>
		<?php endif; ?>
	</div>
</article>

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
		<?php endif; ?>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
			</div>
		<?php endif; ?>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<small>Posted on: <?php the_time( 'F j, Y' ); ?> in <?php echo get_the_category_list( ', ' ); ?></small>
	</header>

	<div class="row">
		<?php the_excerpt(); ?>
	</div>

	<div class="footer">
		<small><?php echo get_the_tag_list( 'Tagged with ', ', ' ); ?></small>
	</div>
</article>

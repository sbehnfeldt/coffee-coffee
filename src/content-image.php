<?php
$imgId = get_post_thumbnail_id();
$urls= wp_get_attachment_image_src($imgId, 'large', true);
$url = $urls[0];
?>

<h3><?php the_title(); ?></h3>

<div class="thumbnail-img">
    <a href="<?php echo $url; ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
</div>
<small>Posted on: <?php the_time('F j, Y'); ?> in <?php the_category(); ?></small>
<small><?php echo 'THIS IS THE FORMAT:' . get_post_format(); ?></small>
<?php the_content(); ?>
<?php the_tags(); ?>
<hr/>

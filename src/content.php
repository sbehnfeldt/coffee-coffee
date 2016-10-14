<h3><?php the_title(); ?></h3>

<div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?></div>
<small>Posted on: <?php the_time('F j, Y'); ?> in <?php the_category(); ?></small>
<small><?php echo 'THIS IS THE FORMAT:' . get_post_format(); ?></small>
<?php the_content(); ?>
<?php the_tags(); ?>
<hr/>

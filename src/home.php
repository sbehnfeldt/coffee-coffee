<!doctype html>
<html lang="en">
<?php get_header(); ?>

<?php
$bodyClasses = ['coffee-class'];
if (is_front_page()) :
    array_push($bodyClasses, 'coffee-front');
endif;
?>

<body <?php body_class($bodyClasses); ?>>
<?php wp_nav_menu(['theme_location' => 'primary']) ?>
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->widgth; ?>" alt="" />

<h1>Blog Index</h1>
<?php

if (have_posts()):
    while (have_posts()): the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
        <?php
    endwhile;
else:
    echo('No posts found');
endif;
?>

<?php get_footer(); ?>
</body>
</html>

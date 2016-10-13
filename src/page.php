<!doctype html>
<html lang="en">
<?php   get_header(); ?>

<?php
$bodyClasses = ['coffee-full-width'];
if ( is_home()) :
    array_push( $bodyClasses, 'coffee-home' );
endif;
if ( is_front_page()) :
    array_push( $bodyClasses, 'coffee-front' );
endif;
?>

<body <?php body_class($bodyClasses); ?>>
<?php wp_nav_menu(['theme_location' => 'primary']) ?>

<?php
if ( have_posts ()):
    while (have_posts()): the_post();?>
        <h3><?php the_title();?></h3>
        <?php the_content();?>
        <?php the_tags(); ?>
        <hr />
        <?php
    endwhile;
else:
    echo ('Nope');
endif;
?>

<?php get_footer(); ?>
</body>
</html>

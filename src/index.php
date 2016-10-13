<!doctype html>
<html lang="en">
<?php   get_header(); ?>

<?php
$bodyClasses = ['coffee-class'];
if ( is_home()) :
    array_push( $bodyClasses, 'coffee-blog' );
endif;
if ( is_front_page()) :
    array_push( $bodyClasses, 'coffee-front' );
endif;
?>

<body <?php body_class($bodyClasses); ?>>
    <?php wp_nav_menu(['theme_location' => 'primary']) ?>

    <h1>Default Page Template</h1>
    <?php
    if ( have_posts ()):
        while (have_posts()): the_post();?>
            <h3><?php the_title();?></h3>
            <small>Posted on: <?php the_time('F j, Y'); ?>  in <?php the_category(); ?></small>
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

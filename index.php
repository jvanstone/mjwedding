<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 
 * @package MJWedding
 * @subpackage  MJ_Wedding
 * @since 1.0.0
 */
?>
<?php get_header();?>

<main id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'entry' ); ?>
     <?php comments_template(); ?>
    
    <?php endwhile; endif; ?>
    <?php get_template_part( 'nav', 'below' ); ?>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
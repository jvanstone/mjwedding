<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @category   WordPress_Theme
 * @package    MJWedding
 * @subpackage mjwedding
 * @author     Vanstone Online <jason@vanstoneonline.com>
 * @license    GPL 3.0 http://www.gnu.org/licenses/gpl-3.0.html
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since      1.0.0
 */

get_header();?>

<main id="content">
<?php

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'entry' );
		comments_template();
	endwhile;
endif;
?>
	<?php get_template_part( 'nav', 'below' ); ?>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

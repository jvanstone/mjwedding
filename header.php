<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MJWedding
 * @subpackage  mjwedding
 * @since 1.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php mjwedding_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php do_action( 'mjwedding_before_site' ); // Hooked: vonline_preloader(). ?>

<div id="page" class="style" >
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mjwedding' ); ?></a>

	<?php get_template_part( 'template-parts/header/site-header' ); ?>

	<div id="content" class="site-content" >
		<div id="primary" class="content-area" >
		<?php if ( is_front_page() ) : ?>
			<main id="main" class="site-main" role="main" style="background: url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/FrontPageTextBack.png') center top no-repeat">		
		<?php else : ?>
			<main id="main" class="site-main" role="main" style="background: #FFF3F4;">
		<?php endif; ?>

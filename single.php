<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MJWedding
 * @subpackage  MJ_Wedding
 * @since 1.0.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'mjwedding' ), '%title' ),
			)
		);
	}

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	// Previous/next post navigation.
	$mjwedding_next = is_rtl() ? mj_wedding_get_icon_svg( 'ui', 'arrow_left' ) : mj_wedding_get_icon_svg( 'ui', 'arrow_right' );
	$mjwedding_prev = is_rtl() ? mj_wedding_get_icon_svg( 'ui', 'arrow_right' ) : mj_wedding_get_icon_svg( 'ui', 'arrow_left' );

	$mjwedding_post_type      = get_post_type_object( get_post_type() );
	$mjwedding_post_type_name = '';
	if (
		is_object( $mjwedding_post_type ) &&
		property_exists( $mjwedding_post_type, 'labels' ) &&
		is_object( $mjwedding_post_type->labels ) &&
		property_exists( $mjwedding_post_type->labels, 'singular_name' )
	) {
		$mjwedding_post_type_name = $mjwedding_post_type->labels->singular_name;
	}

	/* translators: %s: The post-type singlular name (example: Post, Page etc) */
	$mjwedding_next_label = sprintf( esc_html__( 'Next %s', 'mjwedding' ), $mjwedding_post_type_name );
	/* translators: %s: The post-type singlular name (example: Post, Page etc) */
	$mjwedding_previous_label = sprintf( esc_html__( 'Previous %s', 'mjwedding' ), $mjwedding_post_type_name );

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $mjwedding_next_label . $mjwedding_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $mjwedding_prev . $mjwedding_previous_label . '</p><p class="post-title">%title</p>',
		)
	);
endwhile; // End of the loop.

get_footer();

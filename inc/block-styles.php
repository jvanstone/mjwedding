<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package MJWedding
 * @subpackage  MJ_Wedding
 * @since 1.0.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function mj_wedding_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'mjwedding-columns-overlap',
				'label' => esc_html__( 'Overlap', 'mjwedding' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'mjwedding-border',
				'label' => esc_html__( 'Borders', 'mjwedding' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'mjwedding-border',
				'label' => esc_html__( 'Borders', 'mjwedding' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'mjwedding-border',
				'label' => esc_html__( 'Borders', 'mjwedding' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'mjwedding-image-frame',
				'label' => esc_html__( 'Frame', 'mjwedding' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'mjwedding-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'mjwedding' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'mjwedding-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'mjwedding' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'mjwedding-border',
				'label' => esc_html__( 'Borders', 'mjwedding' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'mjwedding-separator-thick',
				'label' => esc_html__( 'Thick', 'mjwedding' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'mjwedding-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'mjwedding' ),
			)
		);
	}
	add_action( 'init', 'mj_wedding_register_block_styles' );
}

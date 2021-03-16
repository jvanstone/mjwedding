<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package MJWedding
 * @subpackage  mjwedding
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
	function mjwedding_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'MJWedding-columns-overlap',
				'label' => esc_html__( 'Overlap', 'mjwedding' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'MJWedding-border',
				'label' => esc_html__( 'Borders', 'mjwedding' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'MJWedding-border',
				'label' => esc_html__( 'Borders', 'mjwedding' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'MJWedding-border',
				'label' => esc_html__( 'Borders', 'mjwedding' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'MJWedding-image-frame',
				'label' => esc_html__( 'Frame', 'mjwedding' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'MJWedding-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'mjwedding' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'MJWedding-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'mjwedding' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'MJWedding-border',
				'label' => esc_html__( 'Borders', 'mjwedding' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'MJWedding-separator-thick',
				'label' => esc_html__( 'Thick', 'mjwedding' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'MJWedding-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'mjwedding' ),
			)
		);
	}
	add_action( 'init', 'mjwedding_register_block_styles' );
}

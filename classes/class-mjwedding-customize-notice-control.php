<?php
/**
 * Customize API: MJWedding_Customize_Notice_Control class
 *
 * @package MJWedding
 * @subpackage  mjwedding
 * @since 1.0.0
 */

/**
 * Customize Notice Control class.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class MJWedding_Customize_Notice_Control extends WP_Customize_Control {
	/**
	 * The control type.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $type = 'mjwedding-notice';

	/**
	 * Renders the control content.
	 *
	 * This simply prints the notice we need.
	 *
	 * @access public
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function render_content() {
		?>
		<div class="notice notice-warning">
			<p><?php esc_html_e( 'To access the Dark Mode settings, select a light background color.', 'mjwedding' ); ?></p>
			<p><a href="https://wordpress.org/support/article/mjwedding/">
				<?php esc_html_e( 'Learn more about Dark Mode.', 'mjwedding' ); ?>
			</a></p>
		</div>
		<?php
	}
}

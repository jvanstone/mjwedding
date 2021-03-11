<?php
/**
 * Show the appropriate content for the Quote post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MJWedding
 * @subpackage  mj_wedding
 * @since 1.0.0
 */

$content = get_the_content();

// If there is no quote or pullquote print the content.
if ( has_block( 'core/quote', $content ) ) {
	mj_wedding_print_first_instance_of_block( 'core/quote', $content );
} elseif ( has_block( 'core/pullquote', $content ) ) {
	mj_wedding_print_first_instance_of_block( 'core/pullquote', $content );
} else {
	the_excerpt();
}

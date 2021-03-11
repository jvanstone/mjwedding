<?php
/**
 * Show the appropriate content for the Audio post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MJWedding
 * @subpackage  mj_wedding
 * @since 1.0.0
 */

$content = get_the_content();

if ( has_block( 'core/audio', $content ) ) {
	mj_wedding_print_first_instance_of_block( 'core/audio', $content );
} elseif ( has_block( 'core/embed', $content ) ) {
	mj_wedding_print_first_instance_of_block( 'core/embed', $content );
} else {
	mj_wedding_print_first_instance_of_block( 'core-embed/*', $content );
}

// Add the excerpt.
the_excerpt();

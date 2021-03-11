<?php
/**
 * Show the appropriate content for the Gallery post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MJWedding
 * @subpackage  mj_wedding
 * @since 1.0.0
 */

// Print the 1st gallery found.
if ( has_block( 'core/gallery', get_the_content() ) ) {

	mj_wedding_print_first_instance_of_block( 'core/gallery', get_the_content() );
}

the_excerpt();

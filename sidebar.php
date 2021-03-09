<?php
/**
 * Template part for Sidebar 
 * 
 * Not in use at the moment
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/
 *
 * @package Candian Guide
 * @subpackage canadian guide
 * @since 1.0.0
 */

?>

<aside id="sidebar">
    <?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
        <div id="primary" class="widget-area">
            <ul class="xoxo">
            <?php dynamic_sidebar( 'primary-widget-area' ); ?>
            </ul>
        </div>
    <?php endif; ?>
</aside>
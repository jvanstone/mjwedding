<?php
/**
 * Function defaults
 *
 * @category   Wordpress_Theme
 * @package    MJWedding
 * @subpackage mj_wedding
 * @author     Vanstone Online <jason@vanstoneonline.com>
 * @license    GPL 3.0 http://www.gnu.org/licenses/gpl-3.0.html
 * @link       vanstoneonline.com
 * @since      1.0.0
 */

// Install the plugin Installer.
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

if ( ! function_exists( 'mj_wedding_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function mj_wedding_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on M & J Wedding, use a find and replace
		* to change 'mjwedding' to the name of your theme in all the template files.
			*/
		load_theme_textdomain( 'mjwedding', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
			* Let WordPress manage the document title.
			* This theme does not use a hard-coded <title> tag in the document head,
			* WordPress will provide it for us.
			*/
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
			* Enable support for Post Thumbnails on posts and pages.
			*
			* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			*/
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'mjwedding' ),
				'footer'  => __( 'Secondary menu', 'mjwedding' ),
			)
		);

		/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$background_color = get_theme_mod( 'background_color', 'FFF3F4' );
		if ( 127 > MJ_Wedding_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
			add_theme_support( 'dark-editor-style' );
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'mjwedding' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'mjwedding' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'mjwedding' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'mjwedding' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'mjwedding' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'mjwedding' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'mjwedding' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'mjwedding' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'mjwedding' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'mjwedding' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'mjwedding' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'mjwedding' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'mjwedding' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'mjwedding' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'FFF3F4',
				'default-image'  => get_template_directory_uri() . '/assets/img/mjbackground.png',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$white     = '#FFFFFF';
		$yellow    = '#EEEADD';
		$soft_pink = '#FFF3F4';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'mjwedding' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'mjwedding' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'mjwedding' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'mjwedding' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'mjwedding' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'mjwedding' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'mjwedding' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'mjwedding' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'mjwedding' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'mjwedding' ),
					'slug'  => 'white',
					'color' => $white,
				),
				array(
					'name'  => esc_html__( 'Soft Pink', 'mjwedding' ),
					'slug'  => 'soft-pink',
					'color' => $soft_pink,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'mjwedding' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'mjwedding' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'mjwedding' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'mjwedding' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'mjwedding' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'mjwedding' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'mjwedding' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'mjwedding' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if ( is_customize_preview() ) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support( 'starter-content', mj_wedding_get_starter_content() );
		}

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );
	}
}
add_action( 'after_setup_theme', 'mj_wedding_setup' );

/**
 * Register widget area.
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function mj_wedding_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'mjwedding' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'mjwedding' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mj_wedding_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since 1.0.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function mj_wedding_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mj_wedding_content_width', 750 );
}
add_action( 'after_setup_theme', 'mj_wedding_content_width', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 *
 * @return void
 */
function mj_wedding_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used.
	// to detect if the current browser is internet explorer.
	global $is_IE;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'mj-wedding-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'mj-wedding-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	// RTL styles.
	wp_style_add_data( 'mj-wedding-style', 'rtl', 'replace' );

	// Print styles.
	wp_enqueue_style( 'mj-wedding-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script(
		'mj-wedding-ie11-polyfills',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Main navigation scripts.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script(
			'mj-wedding-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array( 'mj-wedding-ie11-polyfills' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'mj-wedding-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array( 'mj-wedding-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);

}
add_action( 'wp_enqueue_scripts', 'mj_wedding_scripts' );

/**
 * Enqueue block editor script.
 *
 * @since 1.0.0
 *
 * @return void
 */
function mjwedding_block_editor_script() {

	wp_enqueue_script( 'mjwedding-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'mjwedding_block_editor_script' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function mj_wedding_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		require get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	}

	// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'mj_wedding_skip_link_focus_fix' );

/** Enqueue non-latin language styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function mj_wedding_non_latin_languages() {
	$custom_css = mj_wedding_get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'mj-wedding-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'mj_wedding_non_latin_languages' );

	// SVG Icons class.
	require get_template_directory() . '/classes/class-mj-wedding-svg-icons.php';

	// Custom color classes.
	require get_template_directory() . '/classes/class-mj-wedding-custom-colors.php';
	new MJ_Wedding_Custom_Colors();

	// Enhance the theme by hooking into WordPress.
	require get_template_directory() . '/inc/template-functions.php';

	// Menu functions and filters.
	require get_template_directory() . '/inc/menu-functions.php';

	// Custom template tags for the theme.
	require get_template_directory() . '/inc/template-tags.php';

	// Customizer additions.
	require get_template_directory() . '/classes/class-mj-wedding-customize.php';
	new MJ_Wedding_Customize();

	// Block Patterns.
	require get_template_directory() . '/inc/block-patterns.php';

	// Block Styles.
	require get_template_directory() . '/inc/block-styles.php';

	// Dark Mode.
	require_once get_template_directory() . '/classes/class-mj-wedding-dark-mode.php';
	new MJ_Wedding_Dark_Mode();

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since 1.0.0
 *
 * @return void
 */
function mjwedding_customize_preview_init() {
	wp_enqueue_script(
		'mjwedding-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'mjwedding-customize-preview',
		get_theme_file_uri( '/assets/js/customize-preview.js' ),
		array( 'customize-preview', 'customize-selective-refresh', 'jquery', 'mjwedding-customize-helpers' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_preview_init', 'mjwedding_customize_preview_init' );

/**
 * Enqueue scripts for the customizer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function mjwedding_customize_controls_enqueue_scripts() {

	wp_enqueue_script(
		'mjwedding-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'mjwedding_customize_controls_enqueue_scripts' );

/**
 * Calculate classes for the main <html> element.
 *
 * @since 1.0.0
 *
 * @return void
 */
function mjwedding_the_html_classes() {
	$classes = apply_filters( 'mjwedding_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function mjwedding_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
	document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'mjwedding_add_ie_class' );



/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one required with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function my_theme_register_required_plugins() {
	/*
	* Array of plugin arrays. required keys are name and slug.
	* If the source is NOT from the .org repo, then source is also required.
	*/
	$plugins = array(
		// Forminator Plugin
		// By setting 'is_callable' to either a function from that plugin or a class method
		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
		// recognize the plugin as being installed.
		array(
			'name'               => 'Forminator',
			'slug'               => 'forminator',
			'is_callable'        => 'wpseo_init',
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.14.9', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),

	);

		/*
		* Array of configuration settings. Amend each line as needed.
		*
		* TGMPA will start providing localized text strings soon. If you already have translations of our standard
		* strings available, please help us make TGMPA even better by giving us access to these translations or by
		* sending in a pull-request with .po file(s) with the translations.
		*
		* Only uncomment the strings in the config array if you want to customize the strings.
		*/
		$config = array(
		'id'              => 'tgmpa',                      // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'    => '',                             // Default absolute path to bundled plugins.
		'menu'            => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'     => 'themes.php',                // Parent menu slug.
		'capability'      => 'edit_theme_options',     // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'     => true,                          // Show admin notices or not.
		'dismissable'     => true,                          // If false, a user cannot dismiss the nag message.
		'dismiss_msg'     => '',                             // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'    => false,                         // Automatically activate plugins after installation or not.
		'message'         => '',                             // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

<?php

/**

 * Twenty Fifteen functions and definitions

 *

 * Set up the theme and provides some helper functions, which are used in the

 * theme as custom template tags. Others are attached to action and filter

 * hooks in WordPress to change core functionality.

 *

 * When using a child theme you can override certain functions (those wrapped

 * in a function_exists() call) by defining them first in your child theme's

 * functions.php file. The child theme's functions.php file is included before

 * the parent theme's file, so the child theme functions would be used.

 *

 * @link https://developer.wordpress.org/themes/basics/theme-functions/

 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/

 *

 * Functions that are not pluggable (not wrapped in function_exists()) are

 * instead attached to a filter or action hook.

 *

 * For more information on hooks, actions, and filters,

 * {@link https://developer.wordpress.org/plugins/}

 *

 * @package WordPress

 * @subpackage Twenty_Fifteen

 * @since Twenty Fifteen 1.0

 */



/**

 * Set the content width based on the theme's design and stylesheet.

 *

 * @since Twenty Fifteen 1.0

 */

if ( ! isset( $content_width ) ) {

	$content_width = 660;

}



/**

 * Twenty Fifteen only works in WordPress 4.1 or later.

 */

if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {

	require get_template_directory() . '/inc/back-compat.php';

}



if ( ! function_exists( 'twentyfifteen_setup' ) ) :

	/**

	 * Sets up theme defaults and registers support for various WordPress features.

	 *

	 * Note that this function is hooked into the after_setup_theme hook, which

	 * runs before the init hook. The init hook is too late for some features, such

	 * as indicating support for post thumbnails.

	 *

	 * @since Twenty Fifteen 1.0

	 */

	function twentyfifteen_setup() {



		/*

		 * Make theme available for translation.

		 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyfifteen

		 * If you're building a theme based on twentyfifteen, use a find and replace

		 * to change 'twentyfifteen' to the name of your theme in all the template files

		 */

		load_theme_textdomain( 'twentyfifteen' );



		// Add default posts and comments RSS feed links to head.

		add_theme_support( 'automatic-feed-links' );



		/*

		 * Let WordPress manage the document title.

		 * By adding theme support, we declare that this theme does not use a

		 * hard-coded <title> tag in the document head, and expect WordPress to

		 * provide it for us.

		 */

		add_theme_support( 'title-tag' );



		/*

		 * Enable support for Post Thumbnails on posts and pages.

		 *

		 * See: https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails

		 */

		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 825, 510, true );



		// This theme uses wp_nav_menu() in two locations.

		register_nav_menus(

			array(

				'primary' => __( 'Primary Menu', 'twentyfifteen' ),

				'social'  => __( 'Social Links Menu', 'twentyfifteen' ),

			)

		);



		/*

		 * Switch default core markup for search form, comment form, and comments

		 * to output valid HTML5.

		 */

		add_theme_support(

			'html5',

			array(

				'search-form',

				'comment-form',

				'comment-list',

				'gallery',

				'caption',

				'script',

				'style',

			)

		);



		/*

		 * Enable support for Post Formats.

		 *

		 * See: https://wordpress.org/support/article/post-formats/

		 */

		add_theme_support(

			'post-formats',

			array(

				'aside',

				'image',

				'video',

				'quote',

				'link',

				'gallery',

				'status',

				'audio',

				'chat',

			)

		);



		/*

		 * Enable support for custom logo.

		 *

		 * @since Twenty Fifteen 1.5

		 */

		add_theme_support(

			'custom-logo',

			array(

				'height'      => 248,

				'width'       => 248,

				'flex-height' => true,

			)

		);



		$color_scheme  = twentyfifteen_get_color_scheme();

		$default_color = trim( $color_scheme[0], '#' );



		// Setup the WordPress core custom background feature.



		/**

		 * Filter Twenty Fifteen custom-header support arguments.

		 *

		 * @since Twenty Fifteen 1.0

		 *

		 * @param array $args {

		 *     An array of custom-header support arguments.

		 *

		 *     @type string $default-color          Default color of the header.

		 *     @type string $default-attachment     Default attachment of the header.

		 * }

		 */

		add_theme_support(

			'custom-background',

			apply_filters(

				'twentyfifteen_custom_background_args',

				array(

					'default-color'      => $default_color,

					'default-attachment' => 'fixed',

				)

			)

		);



		/*

		 * This theme styles the visual editor to resemble the theme style,

		 * specifically font, colors, icons, and column width.

		 */

		add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );



		// Load regular editor styles into the new block-based editor.

		add_theme_support( 'editor-styles' );



		// Load default block styles.

		add_theme_support( 'wp-block-styles' );



		// Add support for responsive embeds.

		add_theme_support( 'responsive-embeds' );



		// Add support for custom color scheme.

		add_theme_support(

			'editor-color-palette',

			array(

				array(

					'name'  => __( 'Dark Gray', 'twentyfifteen' ),

					'slug'  => 'dark-gray',

					'color' => '#111',

				),

				array(

					'name'  => __( 'Light Gray', 'twentyfifteen' ),

					'slug'  => 'light-gray',

					'color' => '#f1f1f1',

				),

				array(

					'name'  => __( 'White', 'twentyfifteen' ),

					'slug'  => 'white',

					'color' => '#fff',

				),

				array(

					'name'  => __( 'Yellow', 'twentyfifteen' ),

					'slug'  => 'yellow',

					'color' => '#f4ca16',

				),

				array(

					'name'  => __( 'Dark Brown', 'twentyfifteen' ),

					'slug'  => 'dark-brown',

					'color' => '#352712',

				),

				array(

					'name'  => __( 'Medium Pink', 'twentyfifteen' ),

					'slug'  => 'medium-pink',

					'color' => '#e53b51',

				),

				array(

					'name'  => __( 'Light Pink', 'twentyfifteen' ),

					'slug'  => 'light-pink',

					'color' => '#ffe5d1',

				),

				array(

					'name'  => __( 'Dark Purple', 'twentyfifteen' ),

					'slug'  => 'dark-purple',

					'color' => '#2e2256',

				),

				array(

					'name'  => __( 'Purple', 'twentyfifteen' ),

					'slug'  => 'purple',

					'color' => '#674970',

				),

				array(

					'name'  => __( 'Blue Gray', 'twentyfifteen' ),

					'slug'  => 'blue-gray',

					'color' => '#22313f',

				),

				array(

					'name'  => __( 'Bright Blue', 'twentyfifteen' ),

					'slug'  => 'bright-blue',

					'color' => '#55c3dc',

				),

				array(

					'name'  => __( 'Light Blue', 'twentyfifteen' ),

					'slug'  => 'light-blue',

					'color' => '#e9f2f9',

				),

			)

		);



		// Indicate widget sidebars can use selective refresh in the Customizer.

		add_theme_support( 'customize-selective-refresh-widgets' );

	}

endif; // twentyfifteen_setup()

add_action( 'after_setup_theme', 'twentyfifteen_setup' );



/**

 * Register widget area.

 *

 * @since Twenty Fifteen 1.0

 *

 * @link https://developer.wordpress.org/reference/functions/register_sidebar/

 */

function twentyfifteen_widgets_init() {

	register_sidebar(

		array(

			'name'          => __( 'Widget Area', 'twentyfifteen' ),

			'id'            => 'sidebar-1',

			'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),

			'before_widget' => '<aside id="%1$s" class="widget %2$s">',

			'after_widget'  => '</aside>',

			'before_title'  => '<h2 class="widget-title">',

			'after_title'   => '</h2>',

		)

	);

}

add_action( 'widgets_init', 'twentyfifteen_widgets_init' );



if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :

	/**

	 * Register Google fonts for Twenty Fifteen.

	 *

	 * @since Twenty Fifteen 1.0

	 *

	 * @return string Google fonts URL for the theme.

	 */

	function twentyfifteen_fonts_url() {

		$fonts_url = '';

		$fonts     = array();

		$subsets   = 'latin,latin-ext';



		/*

		 * translators: If there are characters in your language that are not supported

		 * by Noto Sans, translate this to 'off'. Do not translate into your own language.

		 */

		if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {

			$fonts[] = 'Noto Sans:400italic,700italic,400,700';

		}



		/*

		 * translators: If there are characters in your language that are not supported

		 * by Noto Serif, translate this to 'off'. Do not translate into your own language.

		 */

		if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {

			$fonts[] = 'Noto Serif:400italic,700italic,400,700';

		}



		/*

		 * translators: If there are characters in your language that are not supported

		 * by Inconsolata, translate this to 'off'. Do not translate into your own language.

		 */

		if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {

			$fonts[] = 'Inconsolata:400,700';

		}



		/*

		 * translators: To add an additional character subset specific to your language,

		 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.

		 */

		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );



		if ( 'cyrillic' == $subset ) {

			$subsets .= ',cyrillic,cyrillic-ext';

		} elseif ( 'greek' == $subset ) {

			$subsets .= ',greek,greek-ext';

		} elseif ( 'devanagari' == $subset ) {

			$subsets .= ',devanagari';

		} elseif ( 'vietnamese' == $subset ) {

			$subsets .= ',vietnamese';

		}



		if ( $fonts ) {

			$fonts_url = add_query_arg(

				array(

					'family'  => urlencode( implode( '|', $fonts ) ),

					'subset'  => urlencode( $subsets ),

					'display' => urlencode( 'fallback' ),

				),

				'https://fonts.googleapis.com/css'

			);

		}



		return $fonts_url;

	}

endif;



/**

 * JavaScript Detection.

 *

 * Adds a `js` class to the root `<html>` element when JavaScript is detected.

 *

 * @since Twenty Fifteen 1.1

 */

function twentyfifteen_javascript_detection() {

	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";

}

add_action( 'wp_head', 'twentyfifteen_javascript_detection', 0 );



/**

 * Enqueue scripts and styles.

 *

 * @since Twenty Fifteen 1.0

 */

function twentyfifteen_scripts() {

	// Add custom fonts, used in the main stylesheet.

	wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );



	// Add Genericons, used in the main stylesheet.

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );



	// Load our main stylesheet.

	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) ); // [NI] versão dinâmica = cache-bust automático



	// Theme block stylesheet.

	wp_enqueue_style( 'twentyfifteen-block-style', get_template_directory_uri() . '/css/blocks.css', array( 'twentyfifteen-style' ), '20190102' );



	// Load the Internet Explorer specific stylesheet.

// [NI 2026-10-12] IE conditional removed (deprecated in WP 6.9+): 	wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20170916' );

// [NI 2026-10-12] IE conditional removed (deprecated in WP 6.9+): 	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );



	// Load the Internet Explorer 7 specific stylesheet.

// [NI 2026-10-12] IE conditional removed (deprecated in WP 6.9+): 	wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141210' );

// [NI 2026-10-12] IE conditional removed (deprecated in WP 6.9+): 	wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );



	wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141028', true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}



	if ( is_singular() && wp_attachment_is_image() ) {

		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141210' );

	}



	wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20171218', true );

	wp_localize_script(

		'twentyfifteen-script',

		'screenReaderText',

		array(

			'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',

			'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',

		)

	);

}

add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );



/**

 * Enqueue styles for the block-based editor.

 *

 * @since Twenty Fifteen 2.1

 */

function twentyfifteen_block_editor_styles() {

	// Block styles.

	wp_enqueue_style( 'twentyfifteen-block-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '20190102' );

	// Add custom fonts.

	wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

}

add_action( 'enqueue_block_editor_assets', 'twentyfifteen_block_editor_styles' );





/**

 * Add preconnect for Google Fonts.

 *

 * @since Twenty Fifteen 1.7

 *

 * @param array   $urls          URLs to print for resource hints.

 * @param string  $relation_type The relation type the URLs are printed.

 * @return array URLs to print for resource hints.

 */

function twentyfifteen_resource_hints( $urls, $relation_type ) {

	if ( wp_style_is( 'twentyfifteen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {

		if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {

			$urls[] = array(

				'href' => 'https://fonts.gstatic.com',

				'crossorigin',

			);

		} else {

			$urls[] = 'https://fonts.gstatic.com';

		}

	}



	return $urls;

}

add_filter( 'wp_resource_hints', 'twentyfifteen_resource_hints', 10, 2 );



/**

 * Add featured image as background image to post navigation elements.

 *

 * @since Twenty Fifteen 1.0

 *

 * @see wp_add_inline_style()

 */

function twentyfifteen_post_nav_background() {

	if ( ! is_single() ) {

		return;

	}



	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );

	$next     = get_adjacent_post( false, '', false );

	$css      = '';



	if ( is_attachment() && 'attachment' == $previous->post_type ) {

		return;

	}



	if ( $previous && has_post_thumbnail( $previous->ID ) ) {

		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );

		$css      .= '

			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }

			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }

			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }

		';

	}



	if ( $next && has_post_thumbnail( $next->ID ) ) {

		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );

		$css      .= '

			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }

			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }

			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }

		';

	}



	wp_add_inline_style( 'twentyfifteen-style', $css );

}

add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );



/**

 * Display descriptions in main navigation.

 *

 * @since Twenty Fifteen 1.0

 *

 * @param string  $item_output The menu item output.

 * @param WP_Post $item        Menu item object.

 * @param int     $depth       Depth of the menu.

 * @param array   $args        wp_nav_menu() arguments.

 * @return string Menu item with possible description.

 */

function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {

	if ( 'primary' == $args->theme_location && $item->description ) {

		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );

	}



	return $item_output;

}

add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );



/**

 * Add a `screen-reader-text` class to the search form's submit button.

 *

 * @since Twenty Fifteen 1.0

 *

 * @param string $html Search form HTML.

 * @return string Modified search form HTML.

 */

function twentyfifteen_search_form_modify( $html ) {

	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );

}

add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );



/**

 * Modifies tag cloud widget arguments to display all tags in the same font size

 * and use list format for better accessibility.

 *

 * @since Twenty Fifteen 1.9

 *

 * @param array $args Arguments for tag cloud widget.

 * @return array The filtered arguments for tag cloud widget.

 */

function twentyfifteen_widget_tag_cloud_args( $args ) {

	$args['largest']  = 22;

	$args['smallest'] = 8;

	$args['unit']     = 'pt';

	$args['format']   = 'list';



	return $args;

}

add_filter( 'widget_tag_cloud_args', 'twentyfifteen_widget_tag_cloud_args' );



/**

 * Prevents `author-bio.php` partial template from interfering with rendering

 * an author archive of a user with the `bio` username.

 *

 * @since Twenty Fifteen 2.6

 *

 * @param string $template Template file.

 * @return string Replacement template file.

 */

function twentyfifteen_author_bio_template( $template ) {

	if ( is_author() ) {

		$author = get_queried_object();

		if ( $author instanceof WP_User && 'bio' === $author->user_nicename ) {

			// Use author templates if exist, fall back to template hierarchy otherwise.

			return locate_template( array( "author-{$author->ID}.php", 'author.php' ) );

		}

	}



	return $template;

}

add_filter( 'author_template', 'twentyfifteen_author_bio_template' );





/**

 * Implement the Custom Header feature.

 *

 * @since Twenty Fifteen 1.0

 */

require get_template_directory() . '/inc/custom-header.php';



/**

 * Custom template tags for this theme.

 *

 * @since Twenty Fifteen 1.0

 */

require get_template_directory() . '/inc/template-tags.php';



/**

 * Customizer additions.

 *

 * @since Twenty Fifteen 1.0

 */

require get_template_directory() . '/inc/customizer.php';

// [NI 2026-10-12] Core Web Vitals — LCP desktop (Search Console: 852 URLs > 2.5s)
// 1) Yandex Metrika scripts: defer (analytics, no dependency)
add_filter('script_loader_tag', 'ni_defer_yandex_scripts', 10, 3);
function ni_defer_yandex_scripts($tag, $handle, $src) {
    $defer_handles = array('wp-yandex-metrika_YmEc', 'wp-yandex-metrika_frontend', 'wp-ym-ec', 'wp-ym-frontend');
    if (in_array($handle, $defer_handles)) {
        $tag = str_replace(' src=', ' defer src=', $tag);
    }
    return $tag;
}
// 2) Google Fonts: display=swap (evita bloqueio de render por fontes)
add_filter('style_loader_tag', 'ni_fonts_display_swap', 10, 4);
function ni_fonts_display_swap($tag, $handle, $href, $media) {
    if (strpos($href, 'fonts.googleapis.com') !== false && strpos($href, 'display=') === false) {
        $tag = str_replace($href, $href . '&display=swap', $tag);
    }
    return $tag;
}
// 3) Remover scripts de emoji (render-blocking no head, dispensáveis)
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


// ==================================================================
// [NI DARK MODE 2026-10-13] Classe body.ni-dark SOMENTE para admins
// (preview privado do dark mode enquanto não liberamos pro público)
// ==================================================================
function ni_dark_mode_admin_preview( $classes ) {
	// [NI 2026-10-13] Preview do dark mode (admin-only por enquanto).
	// Preferência persistida em cookie 'ni-theme' (gravado pelo seletor Light Side/Dark Side):
	// - 'light' → admin escolheu Light Side: SEM a classe (sem flash de tema errado)
	// - 'dark' ou ausente → dark (padrão do preview)
	// [NI v2.7.28] Lançamento público do dark mode: DARK é o padrão para
	// TODOS os visitantes; 'light' (cookie ni-theme) é a opção escolhida.
	// Antes: preview privado (apenas administradores logados).
	$side = isset( $_COOKIE['ni-theme'] ) ? sanitize_key( wp_unslash( $_COOKIE['ni-theme'] ) ) : '';
	if ( 'light' !== $side ) {
		$classes[] = 'ni-dark';
	}
	return $classes;
}
add_filter( 'body_class', 'ni_dark_mode_admin_preview' );


/* ============================================================
 * [NI 2026-10-14] Easter egg — Konami Code → som "Fahh" (meme)
 * ============================================================
 * Desktop: ↑ ↑ ↓ ↓ ← → ← → B A (teclado)
 * Mobile: 10 toques na tela na mesma sequência:
 *   ↑↑↓↓ = toques no TERÇO superior
 *   ←→←→ = toques nas METADES esquerda/direita do terço central
 *   BA   = 2 toques no terço inferior
 * O áudio (50KB, assets/fahh-meme.mp3) só é baixado quando o código
 * é completado — zero custo para visitantes comuns. Sem bibliotecas.
 * ============================================================ */
function ni_konami_fahh() {
	// sequência canônica em keyCodes + variantes de setas (e.key)
	$seq = array(
		'ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown',
		'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight',
		'b', 'a',
	);
	$js = json_encode($seq);
	$mp3 = get_template_directory_uri() . '/assets/fahh-meme.mp3';
	?>
	<script>
	(function () {
		'use strict';
		var KONAMI = <?php echo $js; ?>;
		var MP3 = <?php echo json_encode($mp3); ?>;

		var pos = 0;
		var audio = null;

		function fahh() {
			if (audio) { audio.currentTime = 0; audio.play(); return; }
			audio = new Audio(MP3);
			audio.play();
		}

		function register(symbol) {
			if (KONAMI[pos] === symbol) {
				pos++;
				if (pos === KONAMI.length) {
					pos = 0;
					fahh();
				}
			} else {
				// símbolo errado: reinicia (ou continua se o atual casa com o 1º)
				pos = (KONAMI[0] === symbol) ? 1 : 0;
			}
		}

		/* ---- Desktop: teclado (keydown) ---- */
		document.addEventListener('keydown', function (e) {
			var k = e.key;
			if (k === 'ArrowUp' || k === 'ArrowDown' || k === 'ArrowLeft' || k === 'ArrowRight') {
				register(k);
			} else if (k.length === 1) {
				register(k.toLowerCase());
			}
		}, { passive: true });

		/* ---- Mobile: 10 taps por zonas (touchstart, sem bloquear scroll) ---- */
		document.addEventListener('touchstart', function (e) {
			if (e.touches.length !== 1) { pos = 0; return; }
			var t = e.touches[0];
			var w = window.innerWidth;
			var h = window.innerHeight;
			var zone;
			if (t.clientY < h / 3) {
				zone = 'ArrowUp';                    // terço superior
			} else if (t.clientY > (2 * h) / 3) {
				zone = (KONAMI[pos] === 'b' || KONAMI[pos] === 'a') ? KONAMI[pos] : 'ArrowDown'; // terço inferior: B/A em sequência
			} else {
				zone = t.clientX < w / 2 ? 'ArrowLeft' : 'ArrowRight'; // terço central: metades
			}
			register(zone);
		}, { passive: true });
	})();
	</script>
	<?php
}
add_action('wp_footer', 'ni_konami_fahh');


/* ============================================================
 * [NI 2026-10-14 v2.7.23] Rolagem infinita (CWV-safe) na home/arquivos
 * ============================================================
 * - Vanilla JS (~2.5KB inline no footer = zero render-blocking)
 * - REST API nativa (/wp/v2/posts?page=N) — sem admin-ajax, sem jQuery
 * - IntersectionObserver (rootMargin 600px) — carrega ANTES do usuário
 *   bater no fim; nenhum handler de scroll (INP intacto)
 * - Cards apensados ABAIXO do conteúdo (zero CLS); imagens novas com
 *   loading=lazy + aspect-ratio reservado pelo CSS (anti-CLS v2.7.14+)
 * - Paginação clássica permanece no HTML: crawlers/no-JS navegam normal
 *   (SEO intacto) — só é escondida quando o JS está ativo
 * - Para no fim via cabeçalho X-WP-TotalPages
 * ============================================================ */
function ni_infinite_scroll() {
	// Só na home/blog/arquivos (loop de lista), não em single/página
	if ( ! ( is_home() || is_archive() || is_search() ) ) {
		return;
	}
	// Não ativa se o loop está vazio
	global $wp_query;
	if ( ! $wp_query || $wp_query->max_num_pages < 2 ) {
		return;
	}
	$total = (int) $wp_query->max_num_pages;
	$rest  = esc_url_raw( rest_url( 'wp/v2/posts' ) );
	?>
	<script>
	(function () {
		'use strict';
		var main = document.querySelector('.site-main');
		if (!main) return;
		var paginacao = main.querySelector('.pagination, .nav-links');
		if (paginacao) paginacao.style.display = 'none'; /* JS ativo: esconde; no-JS/crawler vê normal */

		var TOTAL = <?php echo (int) $total; ?>;
		var REST  = <?php echo json_encode($rest); ?>;
		var page  = 1;
		var carregando = false;
		var fim = page >= TOTAL;

		/* Sentinela */
		var sentinela = document.createElement('div');
		sentinela.id = 'ni-inf-sentinel';
		sentinela.setAttribute('aria-hidden', 'true');
		sentinela.style.cssText = 'height:1px;overflow:hidden';
		main.appendChild(sentinela);

		var status = document.createElement('p');
		status.id = 'ni-inf-status';
		status.style.cssText = 'text-align:center;color:inherit;margin:1em 0;font-size:0.85em;height:1.4em';
		status.textContent = '';
		main.appendChild(status);

		function esc(s) {
			return String(s).replace(/[&<>"']/g, function (c) {
				return { '&': '&#38;', '<': '&#60;', '>': '&#62;', '"': '&#34;', "'": '&#39;' }[c];
			});
		}

		/* title.rendered vem com entidades HTML (&#8211;) — usar como está
		   (não re-escapar), só extrair texto puro para o atributo aria */
		function texto(s) {
			var d = document.createElement('div');
			d.innerHTML = s;
			return (d.textContent || '').trim();
		}

		function card(p) {
			var img = '';
			var media = p._embedded && p._embedded['wp:featuredmedia'];
			if (media && media[0]) {
				var m0 = media[0];
				var sizes = (m0.media_details && m0.media_details.sizes) ? m0.media_details.sizes : null;
				var s = null;
				if (sizes) s = sizes['post-thumbnail'] || sizes.large || sizes.full;
				if (!s && m0.source_url) s = { source_url: m0.source_url, width: m0.media_details ? m0.media_details.width : 743, height: m0.media_details ? m0.media_details.height : 292 };
				if (s && s.source_url) {
					var alt = esc(texto(m0.alt_text || p.title.rendered));
					img = '<a class="post-thumbnail" href="' + esc(p.link) + '" aria-hidden="true">' +
						'<img width="' + (s.width || 743) + '" height="' + (s.height || 292) + '" ' +
						'src="' + esc(s.source_url) + '" ' +
						'alt="' + alt + '" decoding="async" loading="lazy" ' +
						'class="attachment-post-thumbnail size-post-thumbnail wp-post-image" /></a>';
				}
			}
			var titulo = p.title.rendered; /* entidades já corretas */
			var exc = p.excerpt.rendered;  /* já vem <p>…</p>, sanitizado server-side */
			return '<article id="post-' + p.id + '" class="post type-post format-standard has-post-thumbnail hentry">' +
				img +
				'<header class="entry-header"><h1 class="entry-title"> <a href="' + esc(p.link) + '">' + titulo + '</a></h1></header>' +
				'<div class="entry-excerpt">' + exc +
				'<p class="ni-continue-reading"><a class="more-link" href="' + esc(p.link) + '" rel="bookmark">Continuar lendo <span class="screen-reader-text">' + titulo + '</span><span aria-hidden="true">&rarr;</span></a></p>' +
				'</div></article>';
		}

		function carregar() {
			if (carregando || fim) return;
			carregando = true;
			status.textContent = 'Carregando…';
			fetch(REST + '?page=' + (page + 1) + '&per_page=10&_embed=wp:featuredmedia&_fields=id,link,title,excerpt,_links,_embedded.wp:featuredmedia', { credentials: 'same-origin' })
				.then(function (r) {
					if (!r.ok) throw 0;
					page++;
					if (page >= TOTAL) fim = true;
					return r.json();
				})
				.then(function (posts) {
					var html = '';
					for (var i = 0; i < posts.length; i++) html += card(posts[i]);
					if (html) {
						sentinela.insertAdjacentHTML('beforebegin', html);
						/* dispara lazy-load do que entrou no viewport */
						if (window.odProfileLoaded) window.odProfileLoaded();
					}
					carregando = false;
					status.textContent = fim ? 'Fim da lista ✓' : '';
				})
				.catch(function () {
					fim = true;
					carregando = false;
					status.textContent = '';
					if (paginacao) paginacao.style.display = ''; /* falha: volta a paginação */
				});
		}

		if ('IntersectionObserver' in window) {
			var io = new IntersectionObserver(function (entries) {
				if (entries[0].isIntersecting) carregar();
			}, { rootMargin: '900px 0px' });
			io.observe(sentinela);
		} else {
			/* Fallback: link manual (acessível) */
			var btn = document.createElement('button');
			btn.textContent = 'Carregar mais';
			btn.style.cssText = 'display:block;margin:1em auto;padding:.5em 1em;cursor:pointer';
			btn.addEventListener('click', carregar);
			main.appendChild(btn);
		}
	})();
	</script>
	<?php
}
add_action('wp_footer', 'ni_infinite_scroll');


/* ============================================================
 * [NI 2026-10-14 v2.7.26] SEO: canonical + noindex (Search Console fix)
 * ============================================================
 * Diagnóstico Search Console (out/2026): 871 "Cópia sem página canônica",
 * 3.319 "Detectada mas não indexada", 1.716 "Rastreada mas não indexada" —
 * causa raiz: site SEM plugin de SEO desde a remoção do Yoast = zero
 * canonicals; 5.502 tags no sitemap (83% com <=2 posts = thin content);
 * sitemap DUPLICADO (plugin Google Sitemap XML + nativo wp-sitemap.xml).
 *
 * Fix (sem plugin):
 * 1. Canonical em todas as views (single, página, archive, home, busca com
 *    query, paginação numerada no canonical da própria página)
 * 2. noindex nas TAGS com <=2 posts (thin) e na PAGINAÇÃO /page/2+
 * 3. Tags FORA do sitemap nativo (wp-sitemap-posts continua; taxonomies de
 *    tag removidas — categorias permanecem)
 * ============================================================ */

/* --- 1) Canonical robusto --- */
function ni_rel_canonical() {
	if ( is_singular() ) {
		$url = get_permalink();
	} elseif ( is_search() ) {
		return; /* busca: sem canonical (URLs efêmeras) */
	} else {
		/* URL limpa: path atual SEM query strings (elimina ?utm, ?cb, etc.) */
		$path = wp_parse_url( home_url( add_query_arg( array() ) ), PHP_URL_PATH );
		$url  = home_url( $path );
	}
	if ( ! empty( $url ) ) {
		printf( '<link rel="canonical" href="%s">' . "\n", esc_url( $url ) );
	}
}
add_action( 'wp_head', 'ni_rel_canonical', 5 );

/* --- 2) noindex: tags fracas + paginação --- */
function ni_robots_noindex() {
	$noindex = false;
	if ( is_tag() ) {
		$tag = get_queried_object();
		if ( $tag && $tag->count <= 2 ) {
			$noindex = true; /* tag com <=2 posts = thin content */
		}
	}
	if ( is_paged() && ! is_singular() ) {
		$noindex = true; /* /page/2+: conteúdo duplicado da listagem */
	}
	if ( $noindex ) {
		echo '<meta name="robots" content="noindex, follow">' . "\n";
	}
}
add_action( 'wp_head', 'ni_robots_noindex', 6 );

/* --- 3) Sitemap nativo: remover TODAS as tags (post_tag) --- */
add_filter( 'wp_sitemaps_taxonomies', function ( $taxonomies ) {
	unset( $taxonomies['post_tag'] );
	return $taxonomies;
} );

<?php
/* NI-MARKER-2.7.31-A */

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
					img = '<a class="post-thumbnail" href="' + esc(niUtm(p.link, p.id, 'card')) + '" aria-hidden="true">' +
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
				'<header class="entry-header"><h1 class="entry-title"> <a href="' + esc(niUtm(p.link, p.id, 'card')) + '">' + titulo + '</a></h1></header>' +
				'<div class="entry-excerpt">' + exc +
				'<p class="ni-continue-reading"><a class="more-link" href="' + esc(niUtm(p.link, p.id)) + '" rel="bookmark">Continuar lendo <span class="screen-reader-text">' + titulo + '</span><span aria-hidden="true">&rarr;</span></a></p>' +
				'</div></article>';
		}

		function niUtm(base, id, medium) {
			if (!base) return base;
			try {
				var u = new URL(base);
				var segs = u.pathname.split('/').filter(Boolean);
				var slug = segs.length ? segs[segs.length - 1] : String(id || '');
				u.searchParams.set('utm_source', 'post-listing');
				u.searchParams.set('utm_medium', medium || 'continue-reading');
				u.searchParams.set('utm_campaign', slug);
				return u.toString();
			} catch (e) { return base; }
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


/* ============================================================
 * [NI v2.7.28b] Remover jquery-migrate do front-end (QM: peso legado)
 * O alias 'jquery' carrega core + migrate; o migrate só existe para
 * compatibilidade com APIs pré-jQuery-3. Nada no front usa (auditado
 * via Query Monitor: twentyfifteen-script e wptelegram usam APIs
 * modernas). Admin/wp-admin continua COM migrate (padrão de mercado).
 * ============================================================ */
add_action( 'wp_default_scripts', function ( $scripts ) {
	if ( is_admin() ) {
		return;
	}
	$scripts->remove( 'jquery-migrate' );
	$jquery = $scripts->query( 'jquery' );
	if ( $jquery ) {
		$jquery->deps = array_diff( $jquery->deps, array( 'jquery-migrate' ) );
	}
} );


/* ============================================================
 * [NI v2.7.30] SEO meta + Open Graph / Twitter Cards (embeds sociais)
 * Discord, Telegram, WhatsApp, X etc. precisam de og:* para gerar
 * preview do link. Emissive: meta description (home + posts), og:title,
 * og:description, og:url, og:type, og:image (featured ou logo default),
 * article:* (publicado/modificado/seção/tags), twitter:card.
 * ============================================================ */

/* og:image default do site (home/arquivos/tags): logo 629x710 */
if ( ! defined( 'NI_OG_DEFAULT_IMAGE' ) ) {
	define( 'NI_OG_DEFAULT_IMAGE', 26302 ); /* ID da mídia logo2018v2.png */
}

/**
 * [NI v2.7.32] Converte uma URL de imagem .webp para JPEG (cache em
 * uploads/og-cache/). Retorna a URL .jpg ou '' em caso de falha.
 */
function ni_webp_to_jpeg_url( $url ) {
	$path = wp_parse_url( $url, PHP_URL_PATH );
	if ( ! $path ) {
		return '';
	}
	$file = ABSPATH . ltrim( $path, '/' );
	if ( ! file_exists( $file ) ) {
		return '';
	}
	$up    = wp_upload_dir();
	$base  = basename( $path );
	$name  = pathinfo( $base, PATHINFO_FILENAME );
	$cache = trailingslashit( $up['basedir'] ) . 'og-cache';
	if ( ! is_dir( $cache ) ) {
		wp_mkdir_p( $cache );
	}
	$cache_file = $cache . '/' . $name . '.jpg';
	$cache_url  = trailingslashit( $up['baseurl'] ) . 'og-cache/' . $name . '.jpg';
	if ( ! file_exists( $cache_file ) ) {
		$editor = wp_get_image_editor( $file );
		if ( is_wp_error( $editor ) ) {
			return '';
		}
		$editor->set_quality( 82 );
		$saved = $editor->save( $cache_file, 'image/jpeg' );
		if ( is_wp_error( $saved ) ) {
			return '';
		}
	}
	return $cache_url;
}

function ni_og_image_data( $post_id = 0 ) {
	$img = array( 'url' => '', 'width' => 0, 'height' => 0, 'alt' => '' );
	$sizes = array( 'full', 'large', 'medium_large', 'medium' );
	$att_id = 0;
	if ( $post_id && has_post_thumbnail( $post_id ) ) {
		$att_id = (int) get_post_thumbnail_id( $post_id );
	} else {
		$att_id = (int) NI_OG_DEFAULT_IMAGE;
	}
	foreach ( $sizes as $size ) {
		$data = wp_get_attachment_image_src( $att_id, $size );
		if ( ! empty( $data[0] ) ) {
			$img['url']    = $data[0];
			$img['width']  = (int) $data[1];
			$img['height'] = (int) $data[2];
			break;
		}
	}
	if ( empty( $img['url'] ) ) {
		$default = wp_get_attachment_image_src( (int) NI_OG_DEFAULT_IMAGE, 'full' );
		if ( ! empty( $default[0] ) ) {
			$img['url']    = $default[0];
			$img['width']  = (int) $default[1];
			$img['height'] = (int) $default[2];
		}
	}
	// [NI v2.7.32] compat X/Twitter: webp para jpeg
	if ( ! empty( $img['url'] ) && preg_match( '/\.webp($|\?)/i', $img['url'] ) ) {
		$jpg = ni_webp_to_jpeg_url( $img['url'] );
		if ( $jpg ) {
			$img['url'] = $jpg;
		}
	}

	if ( $att_id ) {
		$img['alt'] = (string) get_post_meta( $att_id, '_wp_attachment_image_alt', true );
		if ( '' === trim( $img['alt'] ) ) {
			$img['alt'] = (string) get_the_title( $post_id ? (int) $post_id : $att_id );
		}
	}
	return $img;
}

function ni_meta_description() {
	$desc = '';
	if ( is_singular() ) {
		$post = get_queried_object();
		if ( $post ) {
			/* excerpt manual (campo Resumo) em primeiro lugar */
			if ( ! empty( $post->post_excerpt ) ) {
				$desc = $post->post_excerpt;
			} else {
				/* gerado do conteúdo: primeiro parágrafo com texto */
				$desc = wp_trim_words( wp_strip_all_tags( $post->post_content ), 28, '…' );
			}
		}
	} elseif ( is_tag() || is_category() ) {
		$term = get_queried_object();
		if ( $term && ! empty( $term->description ) ) {
			$desc = wp_trim_words( wp_strip_all_tags( $term->description ), 28, '…' );
		} else {
			$desc = sprintf( 'Arquivo de %s no NewsInside — notícias e guias da cena homebrew, retroconsoles e retrogames.', single_term_title( '', false ) );
		}
	} elseif ( is_home() || is_front_page() ) {
		$desc = get_bloginfo( 'description' );
	}
	$desc = trim( $desc );
	if ( mb_strlen( $desc ) > 160 ) {
		$desc = mb_substr( $desc, 0, 157 ) . '…';
	}
	return $desc;
}

function ni_seo_meta_tags() {
	if ( is_admin() || is_feed() || is_robots() || is_search() ) {
		return;
	}

	$site_name = get_bloginfo( 'name' );
	$desc      = ni_meta_description();

	/* ---- meta description (Google/PSI SEO) ---- */
	if ( $desc ) {
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( $desc ) );
	}

	/* ---- Open Graph ---- */
	$og = array(
		'og:locale'    => get_locale(),
		'og:site_name' => $site_name,
	);

	if ( is_singular() ) {
		$post     = get_queried_object();
		$title    = single_post_title( '', false );
		$og['og:type'] = 'article';
		$og['og:title'] = $title;
		$og['og:url']  = get_permalink( $post );
		$og['article:published_time'] = get_the_date( DATE_W3C, $post );
		$og['article:modified_time'] = get_the_modified_date( DATE_W3C, $post );
		$cats = get_the_category( $post->ID );
		if ( $cats && ! is_wp_error( $cats ) ) {
			$og['article:section'] = $cats[0]->name;
		}
		$img = ni_og_image_data( $post->ID );
	} else {
		$title = wp_get_document_title();
		$og['og:type']  = 'website';
		$og['og:title'] = $title;
		$path = wp_parse_url( home_url( add_query_arg( array() ) ), PHP_URL_PATH );
		$og['og:url']   = home_url( $path );
		$img = ni_og_image_data( 0 );
	}

	if ( $desc ) {
		$og['og:description'] = $desc;
	}
	if ( ! empty( $img['url'] ) ) {
		$og['og:image']        = $img['url'];
		$og['og:image:width']  = $img['width'];
		$og['og:image:height'] = $img['height'];
		if ( ! empty( $img['alt'] ) ) {
			$og['og:image:alt'] = $img['alt'];
		}
	}

	foreach ( $og as $property => $content ) {
		if ( '' !== $content && null !== $content ) {
			printf( '<meta property="%s" content="%s">' . "\n", esc_attr( $property ), esc_attr( $content ) );
		}
	}

	/* ---- Twitter Card (X/Twitter + fallback de plataformas sem og) ---- */
	$tw = array(
		'twitter:card' => ( is_singular() && has_post_thumbnail() ) ? 'summary_large_image' : 'summary',
	);
	if ( isset( $og['og:title'] ) ) {
		$tw['twitter:title'] = $og['og:title'];
	}
	if ( isset( $og['og:description'] ) ) {
		$tw['twitter:description'] = $og['og:description'];
	}
	if ( ! empty( $img['url'] ) ) {
		$tw['twitter:image'] = $img['url'];
	}
	foreach ( $tw as $name => $content ) {
		printf( '<meta name="%s" content="%s">' . "\n", esc_attr( $name ), esc_attr( $content ) );
	}
}
add_action( 'wp_head', 'ni_seo_meta_tags', 4 ); /* antes do canonical (5) e noindex (6) */


/* ============================================================
 * [NI v2.7.30] Performance: render-blocking CSS
 * PSI mobile: "Solicitações que bloquearam a renderização" 2.870ms.
 * - wp-components (15KiB): CSS do EDITOR/admin (botões, dropdowns) —
 *   inútil no front-end; dequeue para visitante.
 * - preconnect fonts.googleapis.com: o CSS de fontes é render-blocking
 *   no caminho crítico (o hint original só cobria fonts.gstatic.com).
 * ============================================================ */
add_filter( 'style_loader_tag', function ( $html, $handle ) {
	if ( 'wp-components' === $handle && ! is_admin() && ! current_user_can( 'manage_options' ) ) {
		return '';
	}
	return $html;
}, 10, 2 ); /* front-end: nao imprime o CSS do editor */

add_filter( 'wp_resource_hints', function ( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href'        => 'https://fonts.googleapis.com',
			'crossorigin',
		);
	}
	return $urls;
}, 20, 2 );

/**
 * [NI v2.7.34] SEO: páginas de busca interna.
 * O Google rastreia URLs ?s= do site (formulários, plugins, bots) e elas
 * entram no GSC como "Cópia sem página canônica" / "Rastreada, mas não
 * indexada". Correção: noindex + canonical para a home nas buscas.
 */
function ni_search_noindex( $robots ) {
	if ( is_search() ) {
		$robots['noindex'] = true;
		$robots['nofollow'] = true;
	}
	return $robots;
}
add_filter( 'wp_robots', 'ni_search_noindex' );

function ni_search_canonical() {
	if ( is_search() ) {
		printf( "<link rel='canonical' href='%s' />\n", esc_url( home_url( '/' ) ) );
	}
}
add_action( 'wp_head', 'ni_search_canonical', 9 );

/*
 * UTM Compartilhamento (v2) — dropdowns de fonte/mídia (evita typos que
 * fragmentam dados no GA4), campanha automática = slug do post e botão
 * "Copiar link com UTM" (clipboard). Valores efêmeros, não persistem no DB.
 */
if ( ! function_exists( 'ni_utm_share_meta_box' ) ) {

    function ni_utm_sources() {
        return array( 'youtube', 'tiktok', 'twitter', 'telegram', 'facebook' );
    }

    function ni_utm_mediums() {
        return array( 'social', 'video', 'chat', 'bio' );
    }

    function ni_utm_share_meta_box() {
        add_meta_box(
            'ni_utm_share',
            __( 'UTM Compartilhamento', 'twentyfifteen-more' ),
            'ni_utm_share_meta_box_callback',
            'post',
            'side',
            'default'
        );
    }
    add_action( 'add_meta_boxes', 'ni_utm_share_meta_box' );

    function ni_utm_share_meta_box_callback( $post ) {
        wp_nonce_field( 'ni_utm_share_save', 'ni_utm_share_nonce' );

        $permalink  = get_permalink( $post->ID );
        $slug       = $post->post_name ? $post->post_name : sanitize_title( get_the_title( $post->ID ) );
        $sel_source = 'youtube';
        $sel_medium = 'social';
        $campaign   = $slug;
        ?>
        <p><label for="ni_utm_source"><?php _e( 'Fonte (utm_source):', 'twentyfifteen-more' ); ?></label><br>
        <select id="ni_utm_source" style="width:100%;">
            <?php foreach ( ni_utm_sources() as $s ) : ?>
                <option value="<?php echo esc_attr( $s ); ?>" <?php selected( $sel_source, $s ); ?>><?php echo esc_html( $s ); ?></option>
            <?php endforeach; ?>
        </select></p>

        <p><label for="ni_utm_medium"><?php _e( 'Mídia (utm_medium):', 'twentyfifteen-more' ); ?></label><br>
        <select id="ni_utm_medium" style="width:100%;">
            <?php foreach ( ni_utm_mediums() as $m ) : ?>
                <option value="<?php echo esc_attr( $m ); ?>" <?php selected( $sel_medium, $m ); ?>><?php echo esc_html( $m ); ?></option>
            <?php endforeach; ?>
        </select></p>

        <p><label for="ni_utm_campaign"><?php _e( 'Campanha (utm_campaign):', 'twentyfifteen-more' ); ?></label><br>
        <input type="text" id="ni_utm_campaign" value="<?php echo esc_attr( $campaign ); ?>" style="width:100%;" /></p>

        <hr>
        <p><strong><?php _e( 'URL final com UTM:', 'twentyfifteen-more' ); ?></strong></p>
        <input type="text" id="ni_utm_final_url" value="" style="width:100%; font-family:monospace;" readonly onclick="this.select();" />
        <p><button type="button" class="button button-primary" id="ni_utm_copy_btn" style="width:100%;"><?php _e( 'Copiar link com UTM', 'twentyfifteen-more' ); ?></button></p>

        <script>
        (function(){
            var base = <?php echo wp_json_encode( $permalink ); ?>;
            var src = document.getElementById('ni_utm_source');
            var med = document.getElementById('ni_utm_medium');
            var cmp = document.getElementById('ni_utm_campaign');
            var out = document.getElementById('ni_utm_final_url');
            var btn = document.getElementById('ni_utm_copy_btn');
            var resetLabel = <?php echo wp_json_encode( __( 'Copiar link com UTM', 'twentyfifteen-more' ) ); ?>;
            function norm(s){ return String(s).toLowerCase().replace(/[^a-z0-9_-]+/g,'_').replace(/^_+|_+$/g,''); }
            function build(){
                var q = [];
                if (src.value) { q.push('utm_source=' + encodeURIComponent(src.value)); }
                if (med.value) { q.push('utm_medium=' + encodeURIComponent(med.value)); }
                if (cmp.value) { q.push('utm_campaign=' + encodeURIComponent(cmp.value)); }
                out.value = q.length ? base + '?' + q.join('&') : base;
            }
            src.addEventListener('change', build);
            med.addEventListener('change', build);
            cmp.addEventListener('input', function(){ cmp.value = norm(cmp.value); build(); });
            build();
            btn.addEventListener('click', function(){
                function done(){ btn.textContent = '\u2713 Copiado!'; setTimeout(function(){ btn.textContent = resetLabel; }, 2000); }
                function fallback(){ out.select(); try { document.execCommand('copy'); } catch(e){} done(); }
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(out.value).then(done, fallback);
                } else {
                    fallback();
                }
            });
        })();
        </script>
        <?php
    }

    function ni_utm_share_save_postdata( $post_id ) {
        if ( ! isset( $_POST['ni_utm_share_nonce'] ) || ! wp_verify_nonce( $_POST['ni_utm_share_nonce'], 'ni_utm_share_save' ) ) {
            return $post_id;
        }
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
        /* Sem persistência: os valores UTM são efêmeros, usados só no editor. */
    }
    add_action( 'save_post', 'ni_utm_share_save_postdata' );
}
/*
 * Disable update notifications for default WordPress themes
 * Prevents update prompts for bundled themes that are not in use
 */
function ni_hide_default_theme_updates($value) {
    // List of default theme slugs to hide updates for
    $default_themes = array(
        'twentyfifteen',
        'twentysixteen',
        'twentyseventeen',
        'twentynineteen',
        'twentytwenty',
        'twentytwentyone',
        'twentytwentytwo',
        'twentythree',
        'twentyfour',
        'twentytwentythree',
        'twentytwentyfour',
        'twentytwentyfive',
        // Add more as needed
    );
    foreach ($default_themes as $theme) {
        if (isset($value->response[$theme])) {
            unset($value->response[$theme]);
        }
    }
    return $value;
}
add_filter('site_transient_update_themes', 'ni_hide_default_theme_updates');

/*
 * [NI 2026-10-17] URL do botao "Continuar lendo" com UTM de engajamento.
 * Todo clique no CTA das listagens (home/arquivo/busca) fica rastreavel no GA4:
 *   utm_source=post-listing, utm_medium=continue-reading, utm_campaign=<slug do post>.
 * Post completo, admin, feed e embed ficam SEM UTM (canonical/SEO intactos).
 */
function ni_continue_reading_url( $url = '', $medium = 'continue-reading' ) {
	if ( is_singular() || is_admin() || is_feed() || is_embed() ) {
		return $url ? $url : get_permalink();
	}
	$post_id = get_the_ID();
	if ( ! $post_id ) {
		return $url ? $url : get_permalink();
	}
	$campaign = get_post_field( 'post_name', $post_id );
	if ( ! $campaign ) {
		$campaign = (string) $post_id;
	}
	$base = $url ? $url : get_permalink( $post_id );
	return add_query_arg(
		array(
			'utm_source'   => 'post-listing',
			'utm_medium'   => $medium,
			'utm_campaign' => $campaign,
		),
		$base
	);
}

/*
 * Filtro do more-link gerado pelo the_content() (caminho com resumo manual/more):
 * substitui o href pelo mesmo URL com UTM do helper.
 */
function ni_more_link_utm( $link_html ) {
	$utmed = ni_continue_reading_url( get_permalink() );
	if ( $utmed && $utmed !== get_permalink() ) {
		$link_html = preg_replace( '/href="[^"]*"/', 'href="' . esc_url( $utmed ) . '"', $link_html, 1 );
	}
	return $link_html;
}
add_filter( 'the_content_more_link', 'ni_more_link_utm' );


/**
 * [NI 2026-10-20] Embed de guias do GuiasInside (site secundario).
 * Cole a URL do guia no editor e o WordPress renderiza um card com
 * banner do sistema, titulo clicavel (H1) e target _blank.
 * Padrao: /guias/lerGuia.php?fabricante=X&sistema=Y&guia=Z
 */
function ni_guiasinside_embed_handlers() {
	wp_embed_register_handler(
		'ni_guiasinside',
		'#https?://(www\.)?newsinside\.org/guias/lerGuia\.php\?fabricante=([a-z0-9_-]+)&sistema=([a-z0-9_-]+)&guia=([a-z0-9_-]+)#i',
		'ni_guiasinside_embed_callback',
		10
	);
}
add_action( 'init', 'ni_guiasinside_embed_handlers' );

/**
 * Padrao de token: URL -> comentario HTML antes do wpautop (p7),
 * card real depois dele (p12). Impede o wpautop de fatiar o card.
 */
function ni_guiasinside_store( $key, $html ) {
	static $store = array();
	if ( null === $html ) {
		return isset( $store[ $key ] ) ? $store[ $key ] : '';
	}
	$store[ $key ] = $html;
}

function ni_guiasinside_tokenize( $content ) {
	if ( false === strpos( $content, 'lerGuia.php' ) ) {
		return $content;
	}
	return preg_replace_callback(
		'#https?://(www\.)?newsinside\.org/guias/lerGuia\.php\?fabricante=([a-z0-9_-]+)&sistema=([a-z0-9_-]+)&guia=([a-z0-9_-]+)#i',
		function ( $m ) {
			$html = ni_guiasinside_embed_callback( $m, array(), $m[0], array() );
			$key  = 'NI_GUIA_' . md5( $m[0] );
			ni_guiasinside_store( $key, $html );
			return '<!--' . $key . '-->';
		},
		$content
	);
}
add_filter( 'the_content', 'ni_guiasinside_tokenize', 7 );

function ni_guiasinside_restore( $content ) {
	if ( false === strpos( $content, 'NI_GUIA_' ) ) {
		return $content;
	}
	// 1) token sozinho num paragrafo: remover o <p> em volta
	$content = preg_replace_callback(
		'/<p>\s*<!--NI_GUIA_([a-f0-9]{32})-->\s*<\/p>/',
		function ( $m ) { return ni_guiasinside_store( 'NI_GUIA_' . $m[1], null ); },
		$content
	);
	// 2) tokens restantes (inline)
	$content = preg_replace_callback(
		'/<!--NI_GUIA_([a-f0-9]{32})-->/',
		function ( $m ) { return ni_guiasinside_store( 'NI_GUIA_' . $m[1], null ); },
		$content
	);
	return $content;
}
add_filter( 'the_content', 'ni_guiasinside_restore', 12 );

function ni_guiasinside_embed_title( $guia, $url ) {
	$titulo = ucwords( str_replace( array( '-', '_' ), ' ', $guia ) );
	$cache_key = 'ni_guia_titulo_' . md5( $guia );
	$cached = get_transient( $cache_key );
	if ( false !== $cached ) {
		return $cached;
	}
	$response = wp_remote_get( $url, array( 'timeout' => 5 ) );
	if ( ! is_wp_error( $response ) && 200 === wp_remote_retrieve_response_code( $response ) ) {
		$body = wp_remote_retrieve_body( $response );
		if ( preg_match( '/<meta\s+property="og:title"\s+content="([^"]+)"/i', $body, $m ) ) {
			// og:title = "GuiasInside - BadAvatar 1.3" -> strip prefixo
			$titulo = sanitize_text_field( preg_replace( '/^GuiasInside\s*-\s*/i', '', $m[1] ) );
		} elseif ( preg_match_all( '/<title>\s*GuiasInside\s*-\s*([^<]+?)\s*<\/title>/i', $body, $ms ) ) {
			// fallback: ultimo <title> da pagina (o primeiro mostra so o sistema)
			$titulo = sanitize_text_field( end( $ms[1] ) );
		}
	}
	set_transient( $cache_key, $titulo, MONTH_IN_SECONDS );
	return $titulo;
}

function ni_guiasinside_embed_callback( $matches, $attr, $url, $rawattr ) {
	$fabricante = sanitize_key( $matches[2] );
	$sistema    = sanitize_key( $matches[3] );
	$guia       = sanitize_key( $matches[4] );
	$titulo     = ni_guiasinside_embed_title( $guia, $url );
	$banner     = 'https://www.newsinside.org/guias/assets/sistemas/' . rawurlencode( $fabricante ) . '/' . rawurlencode( $sistema ) . '/banner.jpg';
	$alt        = 'Banner ' . ucfirst( $sistema ) . ' - GuiasInside';

	// tudo em UMA linha: wpautop nao pode inserir <p> no meio do card
	$html = '<div class="ni-guia-card"><a class="ni-guia-link" href="' . esc_url( $url ) . '" target="_blank" rel="noopener"><img class="ni-guia-banner" src="' . esc_url( $banner ) . '" alt="' . esc_attr( $alt ) . '" loading="lazy" /></a><h1 class="ni-guia-titulo"><a href="' . esc_url( $url ) . '" target="_blank" rel="noopener">' . esc_html( $titulo ) . '</a></h1><span class="ni-guia-marca">GuiasInside</span></div>';
	return $html;
}


/**
 * [NI 2026-10-20] CSS do card de embed do GuiasInside (+ dark mode).
 */
function ni_guiasinside_css() {
	$css = '.ni-guia-card{margin:2em 0;padding:1.25em;border:1px solid #e0e0e0;border-radius:8px;background:#fff;text-align:center}'
	      . '.ni-guia-link{display:block}'
	      . '.ni-guia-banner{max-width:100%;height:auto;border-radius:6px}'
	      . '.ni-guia-titulo{font-size:1.4em;margin:.6em 0 .3em}'
	      . '.ni-guia-titulo a{color:inherit;text-decoration:none}'
	      . '.ni-guia-titulo a:hover{text-decoration:underline}'
	      . '.ni-guia-marca{display:inline-block;font-size:.75em;text-transform:uppercase;letter-spacing:.08em;color:#767676}'
	      . 'body.ni-dark .ni-guia-card{background:#1f1f1f;border-color:#333}'
	      . 'body.ni-dark .ni-guia-titulo a{color:#c8c8c8}'
	      . 'body.ni-dark .ni-guia-marca{color:#8a8a8a}';
	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'ni_guiasinside_css', 20 );


/**
 * [NI 2026-10-22] Fechar a porta de spam: XML-RPC desativado por completo
 * (pingbacks/trackbacks eram o vetor restante dos bots).
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

// Remover os metodos de pingback do XML-RPC (defesa em profundidade,
// caso algum plugin reative o servico).
function ni_kill_pingback_methods( $methods ) {
	unset( $methods['pingback.ping'], $methods['pingback.extensions.getPingbacks'] );
	return $methods;
}
add_filter( 'xmlrpc_methods', 'ni_kill_pingback_methods' );

// Headers de pingback fora do <head> (menos descoberta automatica pelos bots)
function ni_remove_x_pingback( $headers ) {
	unset( $headers['X-Pingback'] );
	return $headers;
}
add_filter( 'wp_headers', 'ni_remove_x_pingback' );

// Pingback de trackback na fila? nao encaminhar
function ni_kill_trackback( $fields ) {
	$fields['trackback_url'] = '';
	return $fields;
}


/**
 * [NI 2026-10-23] Wayback Machine: arquiva o post logo apos o publish.
 * O plugin lh-wayback-machine so processa via evento horario do wp-cron
 * (1 post por ciclo, que na Locaweb quase nunca roda). No publish, agendamos
 * o single event do plugin e spawnamos o wp-cron em background na hora.
 */
function ni_wayback_on_publish( $new_status, $old_status, $post ) {
	if ( 'publish' === $new_status && 'publish' !== $old_status
		&& ! wp_is_post_revision( $post )
		&& class_exists( 'LH_wayback_machine_plugin' ) ) {
		LH_wayback_machine_plugin::queue_single();
		wp_maybe_spawn_cron();
	}
}
add_action( 'transition_post_status', 'ni_wayback_on_publish', 10, 3 );

/**
 * Google News sitemap (GN Publisher) no robots.txt
 */
function ni_news_sitemap_robots( $output, $public ) {
	if ( $public ) {
		$output .= "\nSitemap: https://www.newsinside.org/gn_sitemap.xml\n";
	}
	return $output;
}
add_filter( 'robots_txt', 'ni_news_sitemap_robots', 10, 2 );

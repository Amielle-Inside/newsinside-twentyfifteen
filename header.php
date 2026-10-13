<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js?ver=3.7.0"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>

	<div id="sidebar" class="sidebar">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php
					twentyfifteen_the_custom_logo();

				if ( is_front_page() && is_home() ) :
					?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) :
						?>
<p class="site-description"><?php echo $description; ?></p>
					<?php
					endif;
					?>
					<?php
					// [NI 2026-10-13] Seletores Light Side / DarkSide — visíveis apenas para admins
					// enquanto o dark mode está em preview privado.
					if ( is_user_logged_in() && current_user_can( 'administrator' ) ) :
						?>
						<div class="ni-theme-toggle" role="group" aria-label="Escolher tema">
							<button type="button" class="ni-side-btn ni-side-btn--light" data-ni-side="light">Light Side</button>
							<button type="button" class="ni-side-btn ni-side-btn--dark" data-ni-side="dark">Dark Side</button>
						</div>
						<script>
						(function() {
							function niApply(side) {
								document.body.classList.toggle('ni-dark', side === 'dark');
								try { localStorage.setItem('ni-theme', side); } catch (e) {}
								try { document.cookie = 'ni-theme=' + side + ';path=/;max-age=31536000;samesite=lax'; } catch (e) {}
							}
							document.addEventListener('click', function(e) {
								var btn = e.target.closest('.ni-side-btn');
								if (!btn) return;
								niApply(btn.getAttribute('data-ni-side'));
							});
							// Estado inicial: preferência salva (localStorage > cookie); senão, escuro (preview padrão para admin)
							var saved = null;
							try { saved = localStorage.getItem('ni-theme'); } catch (e) {}
							if (saved !== 'light' && saved !== 'dark') {
								var m = document.cookie.match(/(?:^|;\s*)ni-theme=(light|dark)\b/);
								if (m) { saved = m[1]; }
							}
							if (saved === 'light' || saved === 'dark') { niApply(saved); }
						})();
						</script>
						<?php
					endif;
					?>
					<button class="secondary-toggle"><?php _e( 'Menu and widgets', 'twentyfifteen' ); ?></button>
			</div><!-- .site-branding -->
		</header><!-- .site-header -->

		<?php get_sidebar(); ?>
	</div><!-- .sidebar -->

	<div id="content" class="site-content">

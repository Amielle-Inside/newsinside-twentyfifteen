<?php

/**

 * The main template file

 *

 * This is the most generic template file in a WordPress theme

 * and one of the two required files for a theme (the other being style.css).

 * It is used to display a page when nothing more specific matches a query.

 * e.g., it puts together the home page when no home.php file exists.

 *

 * Learn more: {@link https://developer.wordpress.org/themes/basics/template-hierarchy/}

 *

 * @package WordPress

 * @subpackage Twenty_Fifteen

 * @since Twenty Fifteen 1.0

 */



get_header(); ?>



	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">



		<?php if ( have_posts() ) : ?>



			<?php if ( is_home() && ! is_front_page() ) : ?>

				<header>

					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>

				</header>

			<?php endif; ?>



			<?php

			// Start the loop.

			while ( have_posts() ) :

				the_post();
				// 01fev2025: vamos resumir a home page
				//the_excerpt();



				/*

				 * Include the post format-specific template for the content. If you want

				 * to use this in a child theme, then include a file called content-___.php

				 * (where ___ is the post format) and that will be used instead.

				 */

				//get_template_part( 'content', get_post_format() );
				//get_template_part( 'excerpt', get_post_format() );
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php
						// Post thumbnail.
						twentyfifteen_post_thumbnail();
					?>

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title"> <a href="'.get_permalink().'">', '</a></h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-excerpt">
						<?php the_excerpt(); ?>
						<p class="ni-continue-reading">
							<a class="more-link" href="<?php the_permalink(); ?>" rel="bookmark"><?php printf( __( 'Continuar lendo %s', 'twentyfifteen' ), the_title( '<span class="screen-reader-text">', '</span>', false ) ); ?><span aria-hidden="true">&rarr;</span></a>
						</p>
						<?php
							/*
							wp_link_pages(

								array(

									'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',

									'after'       => '</div>',

									'link_before' => '<span>',

									'link_after'  => '</span>',

									'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',

									'separator'   => '<span class="screen-reader-text">, </span>',

								)

							);
							*/
							?>

					</div><!-- .entry-content -->

					<?php //edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

				</article><!-- #post-<?php the_ID(); ?> -->

				<?php

				// End the loop.

			endwhile;



			// Previous/next page navigation.

			the_posts_pagination(

				array(

					'prev_text'          => __( 'Previous page', 'twentyfifteen' ),

					'next_text'          => __( 'Next page', 'twentyfifteen' ),

					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',

				)

			);



			// If no content, include the "No posts found" template.

		else :

			get_template_part( 'content', 'none' );



		endif;

		?>



		</main><!-- .site-main -->

	</div><!-- .content-area -->



<?php get_footer(); ?>


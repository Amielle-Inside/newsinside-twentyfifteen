<?php
/**
 * The default template for displaying content (fork: botao Continuar Lendo sempre visivel)
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen_More
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( is_single() ) :
			// No post completo: comportamento original.
			the_content(
				sprintf(
					/* translators: %s: Post title. */
					__( 'Continue reading %s', 'twentyfifteen' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				)
			);
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
		else :
			// Listagens (home/arquivo/busca): resumo + botao Continuar Lendo SEMPRE.
			if ( has_excerpt() || strpos( get_post_field( 'post_content', get_the_ID() ), '<!--more-->' ) !== false ) :
				// Tem resumo manual ou more: usa o more-link padrao do WP (estilo original).
				the_content(
					sprintf(
						__( 'Continuar lendo %s', 'twentyfifteen' ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					)
				); // [NI] label idem; the_content() ecoa sem whitespace extra
			else :
				// Sem resumo: excerpt automatico (55 palavras) + botao explicito.
				the_excerpt();
			endif;
			?>
			<p class="ni-continue-reading">
				<?php
				// [NI 2026-10-13] Label do CTA: verbo direto, 2 palavras visíveis,
				// título só para leitores de tela (confiança + contexto) — sem whitespace do template.
				$ni_sr_title = the_title( '<span class="screen-reader-text">', '</span>', false );
				?>
				<a class="more-link" href="<?php the_permalink(); ?>" rel="bookmark"><?php printf( __( 'Continuar lendo %s', 'twentyfifteen' ), $ni_sr_title ); ?><span aria-hidden="true">&rarr;</span></a>
			</p>
			<?php
		endif;
		?>
	</div><!-- .entry-content -->

	<?php
	// Author bio.
	if ( is_single() && get_the_author_meta( 'description' ) ) :
		get_template_part( 'author-bio' );
	endif;
	?>

	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->

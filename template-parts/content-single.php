<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vikrantnegi2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-meta">
			<?php vikrantnegi2_posted_on(); ?>
	</div><!-- .entry-meta -->

	<header class="post-header">
   <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<section class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vikrantnegi2' ),
				'after'  => '</div>',
			) );
		?>
	</section><!-- .entry-content -->

	<footer class="entry-footer">
		<?php vikrantnegi2_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

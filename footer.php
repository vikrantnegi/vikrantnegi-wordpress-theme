<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vikrantnegi2
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'vikrantnegi2' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'vikrantnegi2' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'vikrantnegi2' ), 'vikrantnegi2', '<a href="http://vikrantnegi.com" rel="designer">Vikrant Negi</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
	<script src="https://use.fontawesome.com/186263d2aa.js"></script>
</body>
</html>

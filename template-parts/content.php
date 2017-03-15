<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vikrantnegi2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-article'); ?>>
  <div class="article-body">
    <header class="entry-header">
      <?php
      if ( is_single() ) :
        the_title( '<h1 class="entry-title">', '</h1>' );
      else :
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
      endif;
    ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
      <?php
        the_excerpt();
     ?>
    </div><!-- .entry-content -->

    <div class="learn-more">
      <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
        <?php
          printf(
            wp_kses( __( 'Learn more %s <span class="meta-nav">>></span>', 'vikrantnegi2' ), array( 'span' => array( 'class' => array() ) ) ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
          );
        ?>
      </a>
    </div>

  </div><!-- /.article-body -->

  <div class="article-meta">
    <?php
      if ( 'post' === get_post_type() ) : ?>
      <div class="entry-meta">
        <?php vikrantnegi2_index_posted_on(); ?>
      </div><!-- .entry-meta -->
      <?php
    endif; ?>
  </div><!-- /.article-meta -->

</article><!-- #post-## -->

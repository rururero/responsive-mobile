<?php
/**
 * Image template
 *
 * Displays when an image url is visited
 *
 * @package      Responsive_II
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the  Framework and all modifications
 * should be made in a child theme.
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

	<div id="content" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php get_template_part( 'template-parts/loop-header' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php responsive_II_entry_before(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php responsive_II_entry_top(); ?>
						<h1 class="post-title"><?php the_title(); ?></h1>

						<p><?php _e( '&#8249; Return to', 'responsive-II' ); ?> <a
								href="<?php echo get_permalink( $post->post_parent ); ?>"
								rel="gallery"><?php echo get_the_title( $post->post_parent ); ?></a>
						</p>

						<div class="post-meta">
							<?php responsive_II_post_meta_data(); ?>

							<?php if ( comments_open() ) : ?>
								<span class="comments-link">
									<span class="mdash">&mdash;</span>
									<?php comments_popup_link( __( 'No Comments &darr;', 'responsive-II' ), __( '1 Comment &darr;', 'responsive-II' ), __( '% Comments &darr;', 'responsive-II' ) ); ?>
								</span>
							<?php endif; ?>
						</div>
						<!-- end of .post-meta -->

						<div class="attachment-entry">
							<a href="<?php echo wp_get_attachment_url( $post->ID ); ?>"><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></a>
							<?php if ( ! empty( $post->post_excerpt ) ) {
								the_excerpt();
							} ?>
							<?php the_content( __( 'Read more &#8250;', 'responsive-II' ) ); ?>
							<?php wp_link_pages( array(
								'before' => '<div class="pagination">' . __( 'Pages:', 'responsive-II' ),
								'after'  => '</div>'
							) ); ?>
						</div><!-- end of .post-entry -->

						<nav class="navigation">
							<div class="nav-previous"><?php previous_image_link( 'thumbnail' ); ?></div>
							<div class="nav-next"><?php next_image_link( 'thumbnail' ); ?></div>
						</nav><!-- end of .navigation -->

						<?php if ( comments_open() ) : ?>
							<div class="post-data">
								<?php the_tags( __( 'Tagged with:', 'responsive-II' ) . ' ', ', ', '<br />' ); ?>
								<?php the_category( __( 'Posted in %s', 'responsive-II' ) . ', ' ); ?>
							</div><!-- end of .post-data -->
						<?php endif; ?>


						<?php get_template_part( 'template-parts/post-data' ); ?>

						<?php responsive_II_entry_bottom(); ?>
					</article><!-- end of #post-<?php the_ID(); ?> -->
					<?php responsive_II_entry_after(); ?>

					<?php responsive_II_comments_before(); ?>
					<?php comments_template( '', true ); ?>
					<?php responsive_II_comments_after(); ?>

				<?php
				endwhile;

				get_template_part( 'template-parts/loop-nav' );

			else :

				get_template_part( 'template-parts/loop-no-posts' );

			endif;
			?>
		</main><!-- #main -->
		<?php get_sidebar( 'gallery' ); ?>
	</div><!-- #content -->
<?php get_footer(); ?>

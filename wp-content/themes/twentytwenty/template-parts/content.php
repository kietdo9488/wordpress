<?php

/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php




	if (!is_search()) {
		get_template_part('template-parts/entry-header');
		get_template_part('template-parts/featured-image');
	}

	?>
	<!-- Start search result  -->
	<?php
	if (is_search() || !is_singular() && 'summary' === get_theme_mod('blog_content', 'full')) {
	?>
		<div class="post-inner <?php echo is_page_template('templates/template-full-width.php') ? '' : 'thin'; ?> ">


			<div class="entry-content">

		

				<!-- Sua Noi Dung -->
				<div class="boxresult">
					
					<div class="cot result1"><?php echo get_the_post_thumbnail($post->ID, 'post-thumbnail', "class=img-fluid") ?></div>
					<div class="cot result">
						
						<div class="cot result2">
							
							<div class="ngay"><?php echo get_the_date('d', $post->ID); ?></div>
							<div class="thang">Tháng <?php echo get_the_date('m', $post->ID); ?></div>
						</div>
						<div class="cot result3">
							
							<div class="result31"><?php the_title('<a class="theNd" href="' . esc_url(get_permalink()) . '">', '</a>'); ?></div>
							<div class="result32"><?php the_excerpt(); ?></div>
						</div>
					</div>

				</div>
				<!-- Su Noi Dung -->


			</div><!-- .entry-content -->

		</div><!-- .post-inner -->
	<?php
	} else {

		the_content(__('Continue reading', 'twentytwenty'));
	}

	?>
	<!-- End search result  -->
	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__('Page', 'twentytwenty') . '"><span class="label">' . __('Pages:', 'twentytwenty') . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		// edit_post_link();

		// Single bottom post meta.
		twentytwenty_the_post_meta(get_the_ID(), 'single-bottom');

		if (post_type_supports(get_post_type(get_the_ID()), 'author') && is_single()) {

			get_template_part('template-parts/entry-author-bio');
		}
		?>

	</div><!-- .section-inner -->

	<?php

	if (is_single()) {

		get_template_part('template-parts/navigation');
	}

	/*
	 * Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 */
	if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) {
	?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

	<?php
	}
	?>

</article><!-- .post -->
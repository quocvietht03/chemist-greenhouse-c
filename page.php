<?php
/**
 * The template page
 *
 */

get_header();
?>
<div class="pj-container">
<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();

	the_content();

	wp_link_pages(
		array(
			'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'chemist-greenhouse-c' ) . '">',
			'after'    => '</nav>',
			/* translators: %: Page number. */
			'pagelink' => esc_html__( 'Page %', 'chemist-greenhouse-c' ),
		)
	);

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.
?>
</div>
<?php
get_footer();

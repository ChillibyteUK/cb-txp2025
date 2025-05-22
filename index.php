<?php
/**
 * Template for displaying the blog index page.
 *
 * @package cb-pbh2025
 */

defined( 'ABSPATH' ) || exit;

$page_for_posts = get_option( 'page_for_posts' );

set_query_var( 'header_class', 'header-blue' );

get_header();
?>
<main id="main" class="blog">
    <div class="container py-5">
        <h1 class="insights-title">Insights</h1>
		<div class="row g-4">
		<?php
		$current_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args         = array(
			'post_type'      => 'post',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'posts_per_page' => 9,
			'paged'          => $current_page,
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				?>
			<div class="col-md-4">
				<a class="blog-card" href="<?php the_permalink(); ?>">
					<div class="blog-card__date mb-3"><?= get_the_date( 'd.m.y' ); ?></div>
					<h2 class="text-headline-md"><?= esc_html( the_title() ); ?></h3>
				</a>
			</div>
				<?php
			}
		} else {
			echo '<p>No posts found.</p>';
		}

		wp_reset_postdata();
		?>
        </div>
		<!-- Pagination -->
		<div class="pagination mt-4 row">
			<div class="col text-start">
				<?php
				if ( get_previous_posts_link() ) {
					previous_posts_link( 'Prev' );
				}
				?>
			</div>
			<div class="col text-end">
				<?php
				if ( get_next_posts_link( '', $query->max_num_pages ) ) {
					next_posts_link( 'Next' );
				}
				?>
			</div>
		</div>
    </section>
</main>
<?php

get_footer();
?>
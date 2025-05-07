<?php
/**
 * Template Name: Feedback Log
 *
 * @package cb-txp2025
 */

if ( ! is_user_logged_in() ) {
	wp_die( 'You must be logged in to view this page.', 'Access Denied', array( 'response' => 403 ) );
}

get_header();
?>

<main class="feedback-archive container py-5 mt-5">
	<h1>User Feedback</h1>

	<?php
	$args = array(
		'post_type'      => 'user_feedback',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
	);
	$feedback_query = new WP_Query( $args );
	?>

	<?php if ( $feedback_query->have_posts() ) { ?>
		<dl class="feedback-list">
			<?php
            while ( $feedback_query->have_posts() ) {
				$feedback_query->the_post();
                ?>
				<dt class="feedback-list__item"><?= get_the_title(); ?></dt>
				<dd>
					<strong><?= get_field( 'name' ); ?></strong><br>
					<?= nl2br( esc_html( get_field( 'message' ) ) ); ?>
				</dd>
			    <?php
            }
            ?>
		</dl>
	<?php } else { ?>
		<p>No feedback submitted yet.</p>
	<?php } ?>

	<?php wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>

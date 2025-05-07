<?php
/**
 * Template: User Feedback Archive
 *
 * @package cb-txp2025
 */

if ( ! is_user_logged_in() ) {
	wp_die( 'You must be logged in to view this page.', 'Access Denied', array( 'response' => 403 ) );
}

get_header(); ?>

<main class="feedback-archive container py-5">
	<h1>User Feedback</h1>
    <?php
    if ( have_posts() ) {
        ?>
		<dl class="feedback-list">
			<?php
            while ( have_posts() ) {
                the_post();
                ?>
				<dt class="feedback-list__item"><?php the_title(); ?></dt>
                <dd>
                    <strong><?= get_field( 'name' ); ?></strong><br>
                    <?= get_field( 'message' ); ?>
                </dd>
			    <?php
            }
            ?>
		</dl>
	    <?php 
    } else {
        ?>
		<p>No feedback submitted yet.</p>
        <?php
    }
    ?>
</main>

<?php get_footer(); ?>

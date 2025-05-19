<?php
/**
 * Block template for CB Latest Post Hero.
 *
 * @package cb-txp2025
 */

 $latest_post_id = wp_get_recent_posts(
	array(
		'numberposts' => 1,
		'post_status' => 'publish',
	)
)[0]['ID'];

$image = get_the_post_thumbnail_url( $latest_post_id, 'full' );
$title = get_the_title( $latest_post_id );
$excerpt = get_the_excerpt( $latest_post_id );
?>
<section class="latest_post_hero">
	<a href="<?php echo esc_url( get_permalink( $latest_post_id ) ); ?>">
		<div class="latest_post_hero__image">
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>">
		</div>
		<div class="latest_post_hero__link">
			<i class="fa-solid fa-play"></i>
		</div>
		<div class="latest_post_hero__content">
			<div class="container">
				<div class="row g-4">
					<div class="col-sm-6">
						<h2 class="mb-0"><?php echo esc_html( $title ); ?></h2>
					</div>
					<div class="col-sm-6">
						<p><?php echo esc_html( $excerpt ); ?></p>
						<p><strong>New Episodes Daily</strong> - Click for today's new podcast.</p>
					</div>
				</div>
			</div>
		</div>
	</a>
</section>
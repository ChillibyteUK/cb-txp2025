<?php
/**
 * Block template for CB Video Hero.
 *
 * @package cb-pbh2025
 */

if ( get_field( 'video_url' ) ) {
    $video_url = get_field( 'video_url' );
	$poster    = get_field( 'video_poster' );
    ?>
    <section class="video_hero">
		<div class="ratio ratio-16x9">
			<picture>
				<source srcset="<?= esc_attr( wp_get_attachment_image_srcset( $poster, 'full' ) ); ?>" type="image/jpeg">
				<img 
					src="<?= esc_url( wp_get_attachment_url( $poster ) ); ?>" 
					alt="Poster image"
				>
			</picture>
			<video class="absolute inset-0 h-full w-full" autoplay="" loop="" muted="" playsinline="" x-ref="video">
				<source src="<?= esc_url( $video_url ); ?>" type="video/mp4">
				Your browser does not support the video tag.
			</video>
        </div>
 	</section>
    <?php
}

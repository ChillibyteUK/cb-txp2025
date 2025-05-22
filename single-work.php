<?php
/**
 * Template for displaying single posts.
 *
 * @package cb-pbh2025
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main" class="single-work">
	<div class="container">
		<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'single-work__hero mb-5' ) ); ?>
		<?php
		if ( wp_get_attachment_image( get_field( 'logo' ), 'full' ) ) {
			echo wp_get_attachment_image( get_field( 'logo' ), 'full', false, array( 'class' => 'single-work__logo mb-5' ) );
		}
		?>
        <h1><?= esc_html( get_the_title() ); ?></h1>
		<article>
			<?php
	        echo wp_kses_post( apply_filters( 'the_content', get_the_content() ) );
    	    ?>
		</article>
    </div>
    <?php
	$video = get_field( 'video' );
	if ( ! empty( $video['poster'] ) && ! empty( $video['video_mp4'] ) ) {
		$video  = get_field( 'video' );
		$poster = $video['poster'];
		?>
		<div class="container video-lightbox-wrapper">
			<picture>
				<source srcset="<?= esc_attr( wp_get_attachment_image_srcset( $poster, 'full' ) ); ?>" type="image/jpeg">
				<img 
					src="<?= esc_url( wp_get_attachment_url( $poster ) ); ?>" 
					alt="Poster image"
					class="video-poster"
					style="display: block; width: 100%; height: auto;"
				>
			</picture>

			<a href="<?= esc_url( $video['video_mp4'] ); ?>" 
			class="glightbox glightbox-video play-button" 
			data-gallery="case-study-video" 
			data-type="video"
			style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: flex; align-items: center; justify-content: center; width: 144px; height: 144px; background: rgba(0,0,0,0.6); border-radius: 50%;"
			>
				<span class="sr-only">Play video</span>
				<svg aria-hidden="true" focusable="false" height="144" viewBox="0 0 26 26" width="144" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" style="fill: #fff;">
					<path d="M24 13c0-2.92-1.16-5.71-3.22-7.78a11.005 11.005 0 0 0-15.56 0 11.005 11.005 0 0 0 0 15.56 11.005 11.005 0 0 0 15.56 0C22.84 18.72 24 15.92 24 13Zm2 0c0 3.45-1.37 6.75-3.81 9.19a12.988 12.988 0 0 1-18.38 0 12.988 12.988 0 0 1 0-18.38 12.988 12.988 0 0 1 18.38 0C24.63 6.25 26 9.55 26 13Zm-7.9.5-8.25 4.75c-.16.19-.43.23-.64.11-.21-.12-.3-.38-.21-.61v-9.5c-.09-.23 0-.49.21-.61s.48-.08.64.11l8.25 4.75c.2.09.32.28.32.5s-.13.41-.32.5Z"/>
				</svg>
			</a>
		</div>
		<?php
	}


	if ( ! empty( get_field( 'images' ) ) ) {
		$gallery = get_field( 'images' );
		if ( $gallery ) {
			?>
	<div id="lightbox-carousel" class="glide mt-5">
		<div class="glide__track" data-glide-el="track">
			<ul class="glide__slides">
				<?php
				foreach ( $gallery as $image ) {
					?>
				<li class="glide__slide">
					<a 
                        href="<?= esc_url( wp_get_attachment_image_url( $image, 'full' ) ); ?>" 
                        class="glightbox"
                        data-gallery="gallery1"
                        data-title="<?= esc_attr( get_post_meta( $image, '_wp_attachment_image_alt', true ) ); ?>"
                    >
                        <?= wp_get_attachment_image( $image, 'large' ); ?>
                    </a>
				</li>
					<?php
				}
				?>
			</ul>
		</div>
		<div class="container">
			<div class="glide__arrows" data-glide-el="controls">
				<button class="glide__arrow glide__arrow--prev" data-glide-dir="<">
					<svg width="60" height="30" viewBox="0 0 60 30"><path d="M-3.8147e-06 15L25 29.4338L25 0.56624L-3.8147e-06 15ZM60 12.5L22.5 12.5L22.5 17.5L60 17.5L60 12.5Z" fill="white"></path></svg>
					<span class="sr-only">Previous</span>
				</button>
				<button class="glide__arrow glide__arrow--next" data-glide-dir=">">
					<svg width="60" height="30" viewBox="0 0 60 30" class="rotate-180"><path d="M-3.8147e-06 15L25 29.4338L25 0.56624L-3.8147e-06 15ZM60 12.5L22.5 12.5L22.5 17.5L60 17.5L60 12.5Z" fill="white"></path></svg>
					<span class="sr-only">Next</span>
				</button>
			</div>
		</div>
	</div>
			<?php
		}
	}
	?>
	<div class="text-center py-5 back">
		<a href="/#work">Back</a>
	</div>
	<?php
    get_template_part( './page-templates/blocks/cb-contact' );
    ?>
</main>
<?php

add_action(
	'wp_footer',
	function () {
		$has_video   = ! empty( get_field( 'video' ) );
		$has_gallery = ! empty( get_field( 'images' ) );
		?>
<script>
document.addEventListener('DOMContentLoaded', function () {
		<?php
		if ( $has_gallery ) {
			?>
	new Glide('#lightbox-carousel', {
		type: 'carousel',
		perView: 4.2,
		focusAt: 'center',
		gap: 16,
		breakpoints: {
			1024: { perView: 2.2 },
			768: { perView: 1.2 },
			480: { perView: 1 }
		}
	}).mount();

	GLightbox({
		selector: '.glightbox',
		touchNavigation: true,
		loop: true
	});
			<?php
		}
		if ( $has_video ) {
			?>
	GLightbox({
		selector: '.glightbox-video',
		touchNavigation: true,
		loop: false
	});
			<?php
		}
		?>
});
</script>
		<?php
	}
);

get_footer();
?>
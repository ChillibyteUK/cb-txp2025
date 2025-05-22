<?php
/**
 * Block template for CB Video Hero.
 *
 * @package cb-txp2025
 */

 if ( get_field( 'vimeo_video_id' ) ) {
    $video_id = get_field( 'vimeo_video_id' );
    ?>
    <div class="blog_hero">
        <div class="container">
            <div class="ratio ratio-16x9">
                <iframe src="<?= esc_url( 'https://player.vimeo.com/video/' . $video_id . '?title=0&byline=0&portrait=0' ); ?>"
                title="<?= esc_attr( get_the_title() ); ?>"
                allowfullscreen
                allow="autoplay; fullscreen; picture-in-picture"></iframe>
            </div>
        </div>
    </div>
    <?php
}

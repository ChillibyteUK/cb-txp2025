<?php
/**
 * Block template for CB FooGallery.
 *
 * @package cb-txp2025
 */

$gallery_id = get_field( 'gallery_id' );
?>
<div class="container py-5">
    <h2 class="text-center">Gallery</h2>
    <div class="gallery-container">
        <?php
        if ( $gallery_id ) {
            echo do_shortcode( '[foogallery id="' . esc_attr( $gallery_id ) . '"]' );
        } else {
            echo '<p>No gallery found.</p>';
        }
        ?>
    </div>
</div>
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
    <?php
    // if acf checkbox 'show_user_upload' is checked, show the upload form
    if ( get_field( 'show_user_upload' ) ) {
        ?>
        <div class="user-upload-form py-5 tetx-center">
            <h3 class="h4">Upload Your Photos</h3>
            <?= do_shortcode( '[foogallery_upload id="' . esc_attr( $gallery_id ) . '"]' ); ?>
        </div>
        <?php
    }
    ?>
</div>
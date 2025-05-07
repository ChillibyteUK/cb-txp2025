<?php
/**
 * Template for displaying single posts.
 *
 * @package cb-txp2025
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main" class="blog">
    <div class="page_hero">
        <?= get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
    </div>
    <?php
        if ( function_exists( 'yoast_breadcrumb' ) ) {
            yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
        }
    ?>
    <div class="container p-5 bg--white">
        <div class="row">
            <div class="col-md-8">
                <h1 class="h2"><?= esc_html( get_the_title() ); ?></h1>
                <?php
                if ( get_field( 'post_excerpt' ) ) {
                    ?>
                    <p class="fs-500"><?= wp_kses_post( get_field( 'post_excerpt' ) ); ?></p>
                    <?php
                }
				// phpcs:disable
				// no read time at the moment as the articles are very short
				// $count = estimate_reading_time_in_minutes(get_the_content(), 200, true, true) ?? null;
				// if ($count) {
				//     echo $count;
				// }
				// phpcs:enable
				?>
                <div class="post_meta">
                    <a class="post_meta__author" href="<?= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?= get_the_author(); ?></a>
                    <span class="post_meta__date"><?= esc_html( get_the_date( 'jS F Y' ) ); ?></span>
                </div>
                <?php
				echo wp_kses_post( get_the_content() );
				?>
            </div>
            <div class="col-md-4">
                <?php
                if ( get_field( 'podcast_id' ) ) {
                    // output a vimeo player
                    $podcast_id = get_field( 'podcast_id' );
                    $podcast_url = 'https://vimeo.com/' . esc_html( $podcast_id );
                    $podcast_url = esc_url( $podcast_url );
                    $podcast_embed = '<iframe src="' . $podcast_url . '" width="100%" height="400" frameborder="0" allowfullscreen></iframe>';
                    echo wp_kses_post( $podcast_embed );    
                }
                else {
                    echo 'NO PODCAST ID FOUND';
                    echo get_the_post_thumbnail( get_the_ID(), 'full' );
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    get_template_part( './page-templates/blocks/cb-contact' );
    ?>
</main>
<?php
get_footer();
?>
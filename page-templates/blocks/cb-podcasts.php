<?php
/**
 * Block template for CB Podcasts.
 *
 * @package cb-txp2025
 */

// Query to get all posts, ordered by date, including published and scheduled.
$args = array(
    'post_type'      => 'post',
    'post_status'    => array( 'publish', 'future' ), // Include published and scheduled posts.
    'orderby'        => 'date',
    'order'          => 'ASC',
    'posts_per_page' => -1,
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
	?>
<div class="podcasts container py-5">
    <h2 class="text-center">PODCASTS</h2>
    <!-- Splide Slider Container -->
    <div class="splide" id="cb-podcasts-slider">
        <div class="splide__track">
            <ul class="splide__list mb-5">
                <?php
                while ( $query->have_posts() ) {
                    $query->the_post();
                    ?>
                    <li class="splide__slide">
                        <?php
                        if ( get_post_status() === 'publish' ) {
                            ?>
                        <div class="podcast-card">
                            <a href="<?php the_permalink(); ?>" class="podcast-card--published">
                                <div class="podcast-card__date"><?= get_the_date(); ?></div>
                                <h3 class="podcast-card__title"><?= esc_html( the_title() ); ?></h3>
                                <div class="podcast-card__excerpt"><?= wp_kses_post( get_the_content() ); ?></div>
                                <div class="podcast-card__status">LIVE NOW</div>
                                <?= get_the_post_thumbnail( get_the_ID(), 'large', array( 'class' => 'podcast-card__thumbnail' ) ); ?>
                            </a>
                        </div>
                            <?php
                        } else {
                            ?>
                        <div class="podcast-card">
                            <div class="podcast-card--scheduled">
                                <div class="podcast-card__date"><?= get_the_date(); ?></div>
                                <h3 class="podcast-card__title"><?= esc_html( the_title() ); ?></h3>
                                <div class="podcast-card__excerpt"><?= wp_kses_post( get_the_content() ); ?></div>
                                <div class="podcast-card__status">COMING SOON</div>
                                <?= get_the_post_thumbnail( get_the_ID(), 'large', array( 'class' => 'podcast-card__thumbnail' ) ); ?>
                            </div>
                        </div>
                            <?php
                        }
                        ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
	<?php
} else {
	?>
<p>No posts found.</p>
	<?php
}

// Reset post data.
wp_reset_postdata();

add_action(
    'wp_footer',
    function () {
        ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('#cb-podcasts-slider', {
            type       : 'loop',
            perPage    : 4,
            breakpoints: {
                1200: {
                    perPage: 3,
                },
                992: {
                    perPage: 2,
                },
                768: {
                    perPage: 1,
                },
            },
            perMove    : 1,
            gap        : '1rem',
            autoplay   : true,
            interval   : 4000, // 4 seconds
            pagination : true,
            arrows     : false,
        }).mount();
    });
</script>
		<?php
    }
);
?>
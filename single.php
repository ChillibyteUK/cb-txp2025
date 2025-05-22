<?php
/**
 * Template for displaying single posts.
 *
 * @package cb-pbh2025
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main" class="blog">
    <div class="container p-5">
		<div class="insights-title">Insights</div>
        <h1 class="text-headline-xl text-uppercase mb-4"><?= esc_html( get_the_title() ); ?></h1>
        <?php
		if ( has_post_thumbnail() ) {
			echo wp_kses_post( get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'page__hero mb-5' ) ) );
		}

		echo wp_kses_post( get_the_content() );
        ?>
    </div>
	<div class="text-center py-5 back">
		<a href="/insights/">Back</a>
	</div>
    <?php
    get_template_part( './page-templates/blocks/cb-contact' );
    ?>
</main>
<?php
get_footer();
?>
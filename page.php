<?php
/**
 * Template Name: Page
 *
 * @package cb-pbh2025
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<main id="main" class="<?= esc_attr( $classes ); ?>">
    <?php
	if ( ! is_front_page() ) {
		?>
		<div class="container">
		<?php
		$hero = get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'page__hero mb-5' ) );
		if ( $hero ) {
			echo wp_kses_post( $hero );
		}
		?>
		<h1><?= esc_html( get_the_title() ); ?></h1>
		<?php
	}
    the_post();
    the_content();
	// phpcs:disable
    // $block_names = get_all_block_names_from_content(get_the_ID());
    // print_r($block_names);
	// phpcs:enable
	if ( ! is_front_page() ) {
		?>
		<div class="text-center py-5 single-work__back">
			<a href="/">Back</a>
		</div>
	</div>
		<?php
		get_template_part( './page-templates/blocks/cb-contact' );
	}
    ?>
</main>
<?php
get_footer();

<?php
/**
 * Template Name: Contact
 *
 * @package cb-pbh2025
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<main id="main" class="contact-template">
	<div class="container">
		<h1 class="insights-title text-center pt-5"><?= esc_html( get_the_title() ); ?></h1>
		<?php

		echo do_shortcode( '[contact-form-7 id="b677ad2" title="Contact form 1"]' );

		?>
	</div>
	<div class="address-block py-5">
		<div class="container">
			<div class="row g-4">
				<div class="col-lg-4 d-flex flex-column justify-content-center align-items-center border-md-end">
					<div>T: <?= do_shortcode( '[contact_phone]' ); ?></div>
					<div>E: <?= do_shortcode( '[contact_email]' ); ?></div>
				</div>
				<div class="col-md-6 col-lg-4 text-center">
					<h3>London</h3>
					<div class="address-block__address">
						<?= wp_kses_post( get_field( 'contact_address_london', 'option' ) ); ?><br>
						<a href="<?= esc_url( get_field( 'london_map_url', 'option' ) ); ?>" target="_blank" rel="noopener noreferrer" class="address-block__map-link"> View on map</a>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 text-center">
					<h3>Manchester</h3>
					<div class="address-block__address">
						<?= wp_kses_post( get_field( 'contact_address_manchester', 'option' ) ); ?><br>
						<a href="<?= esc_url( get_field( 'manchester_map_url', 'option' ) ); ?>" target="_blank" rel="noopener noreferrer" class="address-block__map-link"> View on map</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();

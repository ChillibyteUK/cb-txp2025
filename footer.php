<?php
/**
 * Footer template for the CB Arcus 2025 theme.
 *
 * This file contains the footer section of the theme, including navigation menus,
 * office addresses, and colophon information.
 *
 * @package cb-txp2025
 */

defined( 'ABSPATH' ) || exit;
?>
<div id="footer-top"></div>
<footer class="footer py-4">
    <div class="container">
        <div class="row pb-5 g-3">
            <div class="col-sm-3">
                <div><strong>Registered Address</strong></div>
                <?= get_field( 'contact_address', 'option' ); ?>
            </div>
            <div class="col-sm-3">
                <?=
				wp_nav_menu(
					array(
						'theme_location'  => 'footer_menu1',
						'container_class' => 'footer__menu',
					)
				);
				?>
            </div>
            <div class="col-sm-6 d-flex justify-content-sm-end">
                <div class="footer__logo">
                    Technology<br><span class="text-primary-400">X</span> People
                </div>
            </div>
        </div>

        <div class="colophon d-flex justify-content-between align-items-center flex-wrap">
            <div>
                &copy; <?= esc_html( gmdate( 'Y' ) ); ?> TxP.
            </div>
            <div>
                <a href="https://www.chillibyte.co.uk/" rel="nofollow noopener" target="_blank" class="cb"
                title="Digital Marketing by Chillibyte"></a>
            </div>
        </div>
</footer>
<div class="footer__after"></div>
<?php wp_footer(); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
	if (typeof FooGallery !== 'undefined' && typeof FooGallery.ready === 'function') {
		FooGallery.ready();
	}
});
</script>
</body>

</html>
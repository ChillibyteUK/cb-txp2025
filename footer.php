<?php
/**
 * Footer template for the CB TXP theme.
 *
 * This file contains the footer section of the theme, including navigation menus,
 * office addresses, and colophon information.
 *
 * @package cb-pbh2025
 */

defined( 'ABSPATH' ) || exit;
?>
<div id="footer-top"></div>
<footer class="footer">
    <div class="container">
        <div class="row py-5 g-3">
            <div class="col-sm-9 d-flex justify-content-start">
                <div class="text-center">Copyright &copy; <?= esc_html( gmdate( 'Y' ) ); ?> <a href="https://www.humannetworkgroup.com/" target="_blank">Human Network Ltd.</a><br>All rights reserved.</div>
            </div>
			<div class="col-sm-3 d-flex justify-content-end footer-social gap-3">
				<a class="d-flex align-items-center justify-items-center" href="https://www.instagram.com/pbhagency/" rel="noopener noreferrer" target="_blank">
					<i class="fa-brands fa-instagram"></i>
				</a>
				<a class="d-flex align-items-center justify-items-center" href="https://www.linkedin.com/company/powered-by-humans" rel="noopener noreferrer" target="_blank">
					<i class="fa-brands fa-linkedin-in"></i>
				</a>
			</div>
        </div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
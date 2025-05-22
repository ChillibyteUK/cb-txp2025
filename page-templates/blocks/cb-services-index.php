<?php
/**
 * Block template for CB Services Index.
 *
 * @package cb-pbh2025
 */

defined( 'ABSPATH' ) || exit;

$parent = get_page_by_path( 'services' );
if ( ! $parent ) {
	return;
}
$children = get_children(
	array(
		'post_parent'    => $parent->ID,
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	)
);
if ( empty( $children ) ) {
	return;
}
?>
<div class="container">
	<div id="services-list" class="row gx-md-3 gy-3 gy-lg-2 justify-content-center">
<?php
$i = 0;
foreach ( $children as $service ) {
	setup_postdata( $service );
	?>
	<div class="work-item col-12 col-md-6 col-lg-4">
		<a href="<?= esc_url( get_permalink( $service->ID ) ); ?>" class="work-item__link">
			<?= get_the_post_thumbnail( $service->ID, 'full', array( 'class' => 'work-item__image' ) ); ?>
			<div class="work-item__overlay">
				<h2 class="work-item__title"><?= esc_html( $service->post_title ); ?></h2>
			</div>
		</a>
	</div>
	<?php
	++$i;
	if ( 0 === $i % 2 ) {
		?>
	<div class="w-100 d-none d-lg-block"></div>
		<?php
	}
}
wp_reset_postdata();
?>
	</div>
</div>
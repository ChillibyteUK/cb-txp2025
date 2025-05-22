<?php
/**
 * Block template for CB Work Index.
 *
 * @package cb-pbh2025
 */

defined( 'ABSPATH' ) || exit;

$q = new WP_Query(
	array(
		'post_type'      => 'work',
		'posts_per_page' => 9,
		'orderby'        => 'date',
		'order'          => 'ASC',
	)
);

if ( ! $q->have_posts() ) {
	return;
}
?>
<div class="container">
	<div id="work-list" class="row g-3">
<?php
while ( $q->have_posts() ) {
	$q->the_post();
	$logo = get_field( 'logo', get_the_ID() );
	?>
	<div class="work-item col-12 col-md-6 col-lg-4">
		<a href="<?= esc_url( get_permalink() ); ?>" class="work-item__link">
			<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'work-item__image' ) ); ?>
			<div class="work-item__overlay">
				<?= wp_get_attachment_image( $logo, 'full', false, array( 'class' => 'work-item__logo' ) ); ?>
				<h2 class="work-item__title"><?= esc_html( get_the_title() ); ?></h2>
			</div>
		</a>
	</div>
	<?php
}
?>
	</div>
	<div class="text-center mt-4">
    	<button id="load-more-work" class="button" data-page="1">Load More</button>
  	</div>
</div>
<?php

add_action(
	'wp_footer',
	function () {
		?>
<script>
document.addEventListener('DOMContentLoaded', function () {
	const loadMoreButton = document.getElementById('load-more-work');
	if (!loadMoreButton) return;

	loadMoreButton.addEventListener('click', function () {
		const page = parseInt(this.dataset.page, 10);
		this.disabled = true;
		this.textContent = 'Loading...';

		fetch('<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>', {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			body: new URLSearchParams({
				action: 'cb_load_more_work',
				page: page
			})
		})
		.then(response => response.json())
		.then(data => {
			const container = document.getElementById('work-list');
			container.insertAdjacentHTML('beforeend', data.html);
			this.dataset.page = page + 1;
			this.disabled = false;
			this.textContent = 'Load More';

			if (data.current_page >= data.max_num_pages || !data.html.trim()) {
				this.remove();
			}
		});
	});
});
</script>
		<?php
	}
);
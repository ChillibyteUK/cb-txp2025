<?php
/**
 * Block template for CB Feedback Form.
 *
 * @package cb-txp2025
 */

?>
<section class="feedback">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-white">Submit Your Feedback</h2>
            </div>
            <div class="col-md-6">
                <div class="acf-feedback-form">
                    <?php
                    if ( ! isset( $_GET['feedback_submitted'] ) ) {
                        acf_form(
                            array(
                                'post_id'         => 'new_post',
                                'new_post'        => array(
                                    'post_type'   => 'user_feedback',
                                    'post_status' => 'publish',
                                ),
                                'field_groups'    => array( 'group_681b78d60074c' ),
                                'form_attributes' => array( 'id' => 'acf-feedback-form' ),
                                'updated_message' => 'Thanks for your feedback!',
                                'submit_value'    => 'Submit Feedback',
                                'return' => add_query_arg( 'feedback_submitted', '1', wp_get_referer() ),
                            )
                        );
                    } else {
                        ?>
                        <p class="success-message">Thanks for your feedback!</p>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
add_action(
    'wp_footer',
    function() {
        ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
	const form = document.querySelector('#acf-feedback-form');

	if (form) {
		form.addEventListener('submit', function (e) {
			e.preventDefault();

			const formData = new FormData(form);

			fetch(window.location.href, {
				method: 'POST',
				credentials: 'same-origin',
				headers: {
					'X-Requested-With': 'XMLHttpRequest'
				},
				body: formData
			})
			.then(response => response.text())
			.then(html => {
				form.innerHTML = '<p class="success-message">Thanks for your feedback!</p>';
			})
			.catch(err => {
				console.error(err);
				alert('There was an error submitting your feedback.');
			});
		});
	}
});
</script>
        <?php
    }
);
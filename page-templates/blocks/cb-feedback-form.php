<?php
/**
 * Block template for CB Feedback Form.
 *
 * @package cb-txp2025
 */

?>
<section class="feedback">
    <div class="container">
        <div class="acf-feedback-form">
            <?php
            acf_form(
                array(
                    'post_id'         => 'new_post',
                    'new_post'        => array(
                        'post_type'   => 'user_feedback',
                        'post_status' => 'publish',
                    ),
                    'field_groups'    => array( 'group_681b78d60074c' ),
                    'submit_value'    => 'Submit Feedback',
                    'updated_message' => 'Thanks for your feedback!',
                )
            );
            ?>
        </div>
    </div>
</section>
<?php
/**
 * Block template for CB Feedback Form.
 *
 * @package cb-txp2025
 */

acf_form( array(
    'post_id'       => 'new_post',
    'new_post'      => array(
        'post_type'   => 'user_feedback',
        'post_status' => 'publish', // or 'private' if you prefer
    ),
    'field_groups'  => array( 'group_681b78d60074c' ),
    'submit_value'  => 'Submit Feedback',
    'updated_message' => 'Thanks for your feedback!',
    'html_before_fields' => '<div class="acf-feedback-form">',
    'html_after_fields'  => '</div>',
) );
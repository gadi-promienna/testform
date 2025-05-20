<?php
add_action('rest_api_init', function() {
    register_rest_route('testform/v1', '/', array(
        'methods' => 'POST',
        'callback' => 'testform_form_callback',
        'permission_callback' => '__return_true'))
 }
);

function testform_form_callback(WP_REST_Request $request) {
    $nonce = $request->get_header('X-WP-Nonce');
    if (!wp_verify_nonce($nonce, 'wp_rest')) {
        return new WP_Error('invalid_nonce', 'Nieprawidłowy nonce', array('status' => 403));
    }
   
    $params = $request->get_json_params();
    $name = sanitize_text_field($params['name'] ?? '');
    $email = sanitize_email($params['email'] ?? '');
    $description = sanitize_textarea_field($params['description'] ?? '');
}
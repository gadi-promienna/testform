<?php
add_action('rest_api_init', function() {
    register_rest_route('testform/v1', '/submit', array(
        'methods' => 'POST',
        'callback' => 'testform_form_callback',
        'permission_callback' => '__return_true'
    ));
 }
);

function testform_form_callback(WP_REST_Request $request) {
    // Todo validacja nonce
    $params = $request->get_json_params(); 
    $name = sanitize_text_field($params['name'] ?? '');
    $email = sanitize_email($params['email'] ?? '');
    $description = sanitize_textarea_field($params['description'] ?? '');
     if (empty($email) ) {
         return new WP_REST_Response([
                'success' => false,
                'message' => 'Pole imię i email są wymagane'
            ], 200);
    }

    if ($name.length() < 3 || $name.length() > 50) {
         return new WP_REST_Response([
                'success' => false,
                'message' => 'Imie musi mieć od 3 do 50 znakow'
            ], 200);
    } 

    if (!is_email($email)) {
            return new WP_REST_Response([
                    'success' => false,
                    'message' => 'Prosze podac poprawny adres email'
                ], 200);
    }

    if ($description.length() > 500) {
         return new WP_REST_Response([
                'success' => false,
                'message' => 'Prosze podac opis w odpowiednim formacie'
            ], 200);
    }

    return new WP_REST_Response([
                'success' => true,
                'message' => 'Dziękujemy za wysłanie formularza!'
            ], 200);
}
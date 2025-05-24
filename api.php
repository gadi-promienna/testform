<?php
add_action('rest_api_init', function() {
    register_rest_route('testform/v1', '/submit', array(
        'methods' => 'POST',
        'callback' => 'testform_form_callback',
        'permission_callback' => '__return_true'
    ));
 }
);

/**
 * Callback function for the REST API endpoint to handle form submission that was sent to testform/v1/sumbmit endpoint.
 * It processes the form data, validates it, and sets notifications or errors as needed.
 * @param WP_REST_Request $request The request object containing form data: wpnonce, email, description.
 * @return void
 */
function testform_form_callback(WP_REST_Request $request) {
    $errors = [];
    $notifications = get_transient('testform_notifications') ?? [];
    if ( ! wp_verify_nonce(wp_unslash($request['_wpnonce']),
        'wp_rest'
    )) {
        $errors[] = [
            'message' => 'Problem z wysłaniem formularza. Proszę spróbować ponownie.'
        ];
    }
    $name = sanitize_text_field($request['name'] ?? '');
    $email = sanitize_email($request['email'] ?? '');
    $description = sanitize_textarea_field($request['email']['description'] ?? '');
    if (empty($email) ) {
            $errors[] = [
                'message' => 'Pole email jest wymagane'
            ];}
    elseif (!is_email($email)) {
        $errors[] = [
                'message' => 'Proszę podać poprawny adres email'
            ];}

    if (empty($name) ) {
            $errors[] = [
                'message' => 'Pole imię jest wymagane'
            ];}
    elseif (strlen($name) < 3 || strlen($name) > 50) {
            $errors[] = [
                'message' => 'Imię musi mieć od 3 do 50 znakow'
            ];} 

    if (strlen($description) > 500) {
            $errors[] = [
                'message' => 'Proszę podać opis w odpowiednim formacie'
            ];
    }

    if (count($errors) > 0) {
        set_transient('simpleform_errors', $errors, 300); 
    } else {
        $notifications[] = [
                'title' => 'Sukces',
                 'message' => 'Dziękujemy za wysłanie formularza!'
            ];
            set_transient('testform_notifications', $notifications, 300);
    }
    wp_redirect(home_url('/'));
    exit;
}
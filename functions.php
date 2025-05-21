<?php 

/**
 * Enqueue custom CSS for the theme
 */
function load_custom_css() {
  wp_enqueue_style('formcreator-style', get_template_directory_uri().'/assets/style.css', array(), wp_get_theme()->get( 'Version' ));
}

/**
 * Include the form creator and api files
 */
function include_testform_files() {
    require_once get_template_directory() . '/src/form-creator/FormBuilder.php';
    require_once get_template_directory() . '/src/form-creator/fields/BaseField.php';
    require_once get_template_directory() . '/src/form-creator/fields/EmailField.php';
    require_once get_template_directory() . '/src/form-creator/fields/TextField.php';
    require_once get_template_directory() . '/src/form-creator/fields/TextareaField.php';
    require_once get_template_directory() . '/src/form-creator/SimpleFormBuilder.php';
    require_once get_template_directory() . '/src/form-creator/SimpleForm.php';
    require_once get_template_directory() . '/api.php';
}

add_action('wp_enqueue_scripts', 'load_custom_css');
add_action('init', 'include_testform_files');


<?php 
/**
 * Title: Simple Form
 * Slug: testform/simple-form
 * Categories: forms
 * Block Types: core/form
 * Keywords: form, simple
 * Inserter: yes
 */
 
 /* Array with validation errors */
$errors = get_transient('simpleform_errors');

 /**
  * Function that uses the FormBuilder to create a simple form.
  * It creates a form with three fields: name, email, and description.
  */
function render_form() {
    $formBuilder = new \FormCreator\SimpleFormBuilder();
    $formBuilder->setConfiguration([
         "action" => "/wp-json/testform/v1/submit",
    ]);
    $formBuilder->addTextField("name", "Imię", ["required"=> true,"class"=> "simple-form__name"]);
    $formBuilder->addEmailField("email", "Email", ["required"=> true]);
    $formBuilder->addTextareaField("description", "Opis", ["required"=> true]);
    $form = $formBuilder->build();
    $form->render();
 }

 /**
  * Function that displays errors if there are any.
  * It retrieves the errors from a transient and displays them in a notification bar.
  */
function display_errors($errors) {
    ?><div class="simpleform-errors"><?php
     foreach ($errors as $error) {
         echo '<div class="error-message">';
         echo '<p>' . esc_html($error['message']) . '</p>';
         echo '</div>';
     }
      ?></div><?php
    delete_transient('simpleform_errors');
}

render_form();
if($errors){
    display_errors($errors);
}
?>
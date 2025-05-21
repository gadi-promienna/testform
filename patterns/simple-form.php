<?php 
/**
 * Title: Simple Form
 * Slug: testform/simple-form
 * Categories: forms
 * Block Types: core/form
 * Keywords: form, simple
 * Inserter: yes
 */
 
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


render_form();
?>
<?php 
/**
 * Title: Simple Form
 * Slug: testform/simple-form
 * Categories: forms
 * Block Types: core/form
 * Keywords: form, simple
 * Inserter: yes
 */
 
 function render_form() {
    $formBuilder = new \FormCreator\SimpleFormBuilder();
     $formBuilder->setConfiguration([
         "action" => ""
     ]);
 
     $formBuilder->addTextField("name", "Name", ["required"=> true]);
     $formBuilder->addEmailField("email", "Email", ["required"=> true]);
     $formBuilder->addTextareaField("description", "Description", ["required"=> true]);
     $form = $formBuilder->build();
     $form->render();
 }


render_form();
?>
<?php
namespace Tests;
// Include the necessary files for the test

use WordPress\Plugin\Hooks;
use Tests\TestCase;
//use FormCreator\SimpleFormBuilder;
//TODO: Change paths to relative
require_once "/var/www/html/wp-content/themes/testform/src/form-creator/FormBuilder.php";
require_once "/var/www/html/wp-content/themes/testform/src/form-creator/fields/BaseField.php";
require_once "/var/www/html/wp-content/themes/testform/src/form-creator/fields/EmailField.php";
require_once "/var/www/html/wp-content/themes/testform/src/form-creator/fields/TextField.php";
require_once "/var/www/html/wp-content/themes/testform/src/form-creator/fields/TextareaField.php";
require_once "/var/www/html/wp-content/themes/testform/src/form-creator/SimpleForm.php";
require_once "/var/www/html/wp-content/themes/testform/src/form-creator/SimpleFormBuilder.php";


class SimpleFormBuilderTest extends TestCase
{

    public function test_simple_form_builder_create_correct_form()
    {
        

        ob_start();
        $form_builder = new \FormCreator\SimpleFormBuilder();
        $form_builder->setConfiguration([
         "action" => "/form.php",
        ]);
    $form_builder->addTextField("name", "Imię");
    $form_builder->addEmailField("email", "Email");
    $form_builder->addTextareaField("description", "Opis");
    $test_form1 = $form_builder->build();
    $test_form1->render();
    $output = ob_get_clean();
    $this->assertStringContainsString('<input type="text"', $output);
    $this->assertStringContainsString('<input type="email"', $output);
    $this->assertStringContainsString('<textarea', $output);    
 }
}
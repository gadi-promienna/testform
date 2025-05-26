<?php
namespace Tests;
// Include the necessary files for the test
use Brain\Monkey;

require_once "/var/www/html/wp-content/themes/testform/src/form-creator/FormBuilder.php";
require_once "/var/www/html/wp-content/themes/testform/src/form-creator/fields/BaseField.php";
require_once "/var/www/html/wp-content/themes/testform/src/form-creator/fields/EmailField.php";
require_once "/var/www/html/wp-content/themes/testform/src/form-creator/fields/TextField.php";
require_once "/var/www/html/wp-content/themes/testform/src/form-creator/fields/TextareaField.php";
require_once "/var/www/html/wp-content/themes/testform/src/form-creator/SimpleForm.php";
require_once "/var/www/html/wp-content/themes/testform/src/form-creator/SimpleFormBuilder.php";


class SimpleFormBuilderTest extends TestCase
{

    /**
     * Set up the test environment
     */
    public function setUp(): void
    {
        // Mock the wp_nonce_field function
        Monkey\Functions\when('wp_nonce_field')->justReturn('mock_nonce');
    }

    /**
     * Test Function to check if simple form builder generates correct Simple Form
     */
    public function test_simple_form_builder_create_correct_form()
    {
     $this->setUp();
     ob_start(); // Start output buffering
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

    /**
     * Test Function to check if simple form builder generates correct Simple Form
     */
    public function test_simple_form_builder_add_correct_field_params()
    {
       $this->setUp();
        ob_start(); // Start output buffering
        $form_builder = new \FormCreator\SimpleFormBuilder();
        $form_builder->setConfiguration([
            "action" => "/form.php",
        ]);   
    $form_builder->addTextField("name", "Imię", ["required"=> true,"class"=> "name"]);
    $form_builder->addEmailField("email", "Email", ["required"=> true]);
    $form_builder->addTextareaField("description", "Opis", ["required"=> true, "class"=> "description"]);
    $test_form2 = $form_builder->build();
    $test_form2->render();
    $output = ob_get_clean();
    $required_count = substr_count($output, 'required'); 
    $this->assertEquals(3, $required_count, 'Formularz powinien mieć 3 pola wymagane');// Check if all fields are required
    $this->assertStringContainsString('class="name"', $output);
    $this->assertStringContainsString('class="description"', $output);    
 }
}
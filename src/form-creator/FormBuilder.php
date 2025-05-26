<?php
namespace FormCreator;
use FormCreator\Fields\EmailField;
use FormCreator\Fields\TextField;
use FormCreator\Fields\TextareaField;

class FormBuilder 
{
    protected $configData;
    protected $inputFields;

    /**
     * Initialize the form builder.
     */
    public function __construct()
    {
        $this->inputFields = [];
        $this->configData = [];
    }   

    /**
     * Set the configuration for the form.
     * @param array $configData
     */
    public function setConfiguration($configData = []) {
        $this->action = $configData["action"]? $configData["action"] : "";
        $this->method = $this->method ? $configData["method"] : "POST";
    }
     
    /**
     * Create and add a new email field to the form.
     * @param string $name The name of the field.
     * @param string $label The label for the field.
     * @param array $fieldConfig The array with configuration for the field.
     */
    public function addEmailField($name, $label, $fieldConfig=[]) {
        $this->inputFields[] = new EmailField($name, $label, $fieldConfig);
    }

    /**
     * Create and add a new text field to the form.
     * @param string $name The name of the field.
     * @param string $label The label for the field.
     * @param array $fieldConfig The array with configuration for the field.
     */
    public function addTextField($name, $label, $fieldConfig=[]) {
        $this->inputFields[] = new TextField($name, $label, $fieldConfig);
    }

    /**
     * Create and add a new Textarea field to the form.
     * @param string $name The name of the field.
     * @param string $label The label for the field.
     * @param array $fieldConfig The array with configuration for the field.
     */
    public function addTextareaField($name, $label, $fieldConfig=[]) {
        $this->inputFields[]= new TextareaField($name, $label, $fieldConfig);
    }
}
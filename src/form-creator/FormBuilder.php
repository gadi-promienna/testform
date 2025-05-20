<?php
namespace FormCreator;

class FormBuilder 
{
    protected $configData;
    protected $inputFields;

    public function __construct()
    {
        $this->inputFields = [];
        $this->configData = [];
    }   

    public function setConfiguration($configData = []) {
        $this->action = $configData["action"]? $configData["action"] : "";
        $this->method = $this->method ? $configData["method"] : "POST";
    }
     
    public function addEmailField($name, $label, $fieldConfig=[]) {
        $this->inputFields[] = new EmailField($name, $label, $fieldConfig);
    }

    public function addTextField($name, $label, $fieldConfig=[]) {
        $this->inputFields[] = new TextField($name, $label, $fieldConfig);
    }

    public function addTextareaField($name, $label, $fieldConfig=[]) {
        $this->inputFields[]= new TextareaField($name, $label, $fieldConfig);
    }
}
<?php
namespace FormCreator;

class BaseField
{
    protected $name;
    protected $label;
    protected $required;
    protected $classNames;

    public function __construct($name, $label, $fieldConfig=[])
    {
        $this->name = $name;
        $this->label = $label;
        $this->setConfiguration($fieldConfig);
    }

    public function setConfiguration($fieldConfig)
    {
        $this->required = $fieldConfig["required"] ? "required" : "";
        $this->classNames = $fieldConfig["class"] ? $fieldConfig["class"] : "";
    }

    public function render()
    {
        $this->renderLabel();
        $this->renderField();
    }
    
    private function renderLabel()
    {
        echo '<label for="' . $this->name . '">' . $this->label . '</label>';
    }

}

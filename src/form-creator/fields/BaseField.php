<?php
namespace FormCreator;

class BaseField
{
    protected $name;
    protected $label;
    protected $required;
    protected $classNames;

    /**
     * BaseField constructor.
     * @param string $name
     * @param string $label
     * @param array $fieldConfig
     */
    public function __construct($name, $label, $fieldConfig=[])
    {
        $this->name = $name;
        $this->label = $label;
        $this->setConfiguration($fieldConfig);
    }

    /**
     * Set the configuration for the field.
     * @param array $fieldConfig
     */
    public function setConfiguration($fieldConfig)
    {
        $this->required = $fieldConfig["required"] ? "required" : "";
        $this->className = $fieldConfig["class"] ? $fieldConfig["class"] : "";
    }

    /**
     * Render the field.
     */
    public function render()
    {
        $this->renderLabel();
        $this->renderField();
    }
    
    /**
     * Render the field label.
     */
    private function renderLabel()
    {
        echo '<label for="' . $this->name . '">' . $this->label . '</label>';
    }

}

<?php
namespace FormCreator;

class SimpleFormBuilder extends FormBuilder {

    private $action;

    /**
     * Set configuration for the form.
     * @param array $configData
     */
    public function setConfiguration($configData = []) {
        $this->action = $configData["action"];
    }

    /**
     * Build the form.
     * @return SimpleForm
     */
    public function build(){
       return new SimpleForm($this->action, $this->inputFields);
    }
}

?>
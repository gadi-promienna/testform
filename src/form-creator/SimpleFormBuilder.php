<?php
namespace FormCreator;

class SimpleFormBuilder extends FormBuilder {

    private $action;

    public function setConfiguration($configData = []) {
        $this->action = $configData["action"];
    }

    public function build(){
       return new SimpleForm($this->action, $this->inputFields);
    }
}

?>
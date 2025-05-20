<?php
namespace FormCreator;

class TextField extends BaseField
{
   protected function renderField()
    {
       echo '<input type="text" name="' . $this->name .'" '.$this->required.' class="'.$this->className.'" />';
    }  
}

<?php
namespace FormCreator\Fields;

class TextField extends BaseField
{
   /**
   * Render the text field.
   */
   protected function renderField()
    {
       echo '<input type="text" name="' . $this->name .'" '.$this->required.' class="'.$this->className.'" />';
    }  
}

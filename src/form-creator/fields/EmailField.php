<?php
namespace FormCreator;

class EmailField extends BaseField
{
   /**
   * Render the email field.
   */
   protected function renderField()
    {
       echo '<input type="email" name="' . $this->name .'" '.$this->required.' class="'.$this->className.'" />';
    }  
}

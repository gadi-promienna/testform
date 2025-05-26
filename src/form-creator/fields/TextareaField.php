<?php
namespace FormCreator\Fields;

class TextareaField extends BaseField
{
   /**
    * Render the textarea field.
    */
   protected function renderField()
    {
       echo '<textarea name="' . $this->name .'" '.$this->required.' class="'.$this->className.'">Tutaj jest miejsce na dłuższy opis</textarea>';
    }  
}

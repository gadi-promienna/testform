<?php
namespace FormCreator;

class SimpleForm
{
    protected $action;
    protected $inputFields = [];

    /**
     * Constructor to initialize the form with action and fields.
     * @param string $action The action URL for the form submission.
     * @param array $inputFields An array of input fields to be included in the form.
     */
    public function __construct($action,$inputFields = [])
    {
        $this->inputFields = $inputFields;
        $this->action = $action;
    }

    /**
     * Render the form.
     * This method generates the HTML for the form, including all input fields.
     */
    public function render()
    {
        ?>
        <form action="<?php echo($this->action) ?>" method='post'>
             <?php foreach($this->inputFields as $field) {
                 $field->render(); }
              ?>
              <button type="submit" class="">Submit</button>
        </form> 
        <?php
    }
 }
?>
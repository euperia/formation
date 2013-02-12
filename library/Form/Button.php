<?php
/**
 * Button.php
 * Class for a Form Button Element
 *
 * @package Form
 * @author Andrew McCombe <euperia@gmail.com>
 */
class Form_Button extends Form_Input {
    /* set type */
    public $type;
    public $buttonType;

    /* required attributes */
    protected $required_attributes = array('name', 'value', 'buttonType');

    public function __construct($item) {
        $this->attributes['type'] = 'button';
        $this->buttonType = 'button';
        parent::__construct($item);
    }

    /**
     * render
     *
     * Overrides the parent render method
     * render the Element
     * @return string
     */
    public function render() {
        return '<button type="' . $this->buttonType . '" '.$this->getAttributesAsHTML(array('label', 'validate', 'required', 'value', 'type', 'buttonType')) .'>'
        . $this->value . '</button>';
    }

}


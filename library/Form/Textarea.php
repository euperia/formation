<?php
/**
 * Form/Textarea.php
 *
 * Textarea Field Class
 *
 * @author andrew
 */
class Form_Textarea extends Form_Input {

    /* set type */
    public  $type = 'textarea';

    /* required attributes */
    protected $required_attributes = array('name');

    public function __construct($item) {
        $this->type = 'textarea';
        parent::__construct($item);
    }

    /**
     * render
     * render the Element
     * @return string
     */
    public function render() {
        return '<textarea '.$this->getAttributesAsHTML(array('value',
                                                             'validator_string',
                                                             'required','label',
                                                             'validator'
                                                                )) .'>'
            . $this->value . '</textarea>';
    }

}


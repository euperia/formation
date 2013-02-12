<?php
/**
 * Text.php
 * Class for a Form Text Element
 *
 * @package Form
 * @author Andrew McCombe <euperia@gmail.com>
 */
class Form_Text extends Form_Input {

    /* set type */
    public $type = 'text';

    /* required attributes */
    public $required_attributes = array('name');

    public function __construct($item) {
        $this->type = 'text';
         $this->attributes['type'] = 'text';
        parent::__construct($item);
    }
}
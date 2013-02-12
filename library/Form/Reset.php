<?php
/**
 * Reset.php
 * Class for a Form Text Element
 *
 * @package Form
 * @author Andrew McCombe <euperia@gmail.com>
 */
class Form_Reset extends Form_Input {

    /* set type */
    public $type = 'radio';

    /* required attributes */
    protected $required_attributes = array('name', 'value');

    public function __construct($item) {
        $this->attributes['type'] = 'reset';
        parent::__construct($item);
    }
}
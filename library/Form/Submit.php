<?php
/**
 * Submit.php
 * Class for a Form Submit Element
 *
 * @package Form
 * @author Andrew McCombe <euperia@gmail.com>
 */
class Form_Submit extends Form_Input {

    /* set type */
    public  $type = 'submit';

    /* required attributes */
    protected $required_attributes = array('name', 'value');

    public function __construct($item) {
        $this->attributes['type'] = 'submit';
        parent::__construct($item);
    }
}
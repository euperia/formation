<?php
/**
 * Hidden.php
 * Class for a Form Hidden Element
 * 
 * @package Form
 * @author Andrew McCombe <euperia@gmail.com>
 */
class Form_Hidden extends Form_Input {
    /* set type */
    public  $type = 'hidden';

    /* required attributes */
    protected $required_attributes = array('name', 'value');

    public function __construct($item) {
        $this->attributes['type'] = 'hidden';
        parent::__construct($item);
    }
}
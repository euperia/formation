<?php
/**
 * Password.php
 * Class for a Form Hidden Element
 *
 * @package Form
 * @author Andrew McCombe <euperia@gmail.com>
 */
class Form_Password extends Form_Input {

    /* set type */
    public  $type = 'password';

    /* required attributes */
    public  $required_attributes = array('name');

    public function __construct($item) {
        $this->attributes['type'] = 'password';
        parent::__construct($item);
    }
}
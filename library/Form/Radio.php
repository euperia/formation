<?php
/**
 * Radio.php
 * Class for a Form Radio Element
 *
 * @package Form
 * @author Andrew McCombe <euperia@gmail.com>
 */
class Form_Radio extends Form_Input {

    /* set type */
    public  $type = 'radio';

    /* required attributes */
    protected $required_attributes = array('name', 'value');

    public function __construct($item) {
        $this->attributes['type'] = 'radio';
        parent::__construct($item);
    }
}
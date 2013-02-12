<?php
/**
 * Image.php
 * Class for a Form Image Element
 *
 * @package Form
 * @author Andrew McCombe <euperia@gmail.com>
 */
class Form_Image extends Form_Input {
    /* set type */
    public  $type = 'image';

    /* required attributes */
    protected $required_attributes = array('name', 'src');

    public function __construct($item) {
        $this->attributes['type'] = 'image';
        parent::__construct($item);
    }
}
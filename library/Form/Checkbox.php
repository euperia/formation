<?php
/**
 * Checkbox.php
 * Class for a Form Text Element
 *
 * @package Form
 * @author Andrew McCombe <euperia@gmail.com>
 */
class Form_Checkbox extends Form_Input {

    /* set type */
    public  $type = 'checkbox';

    /* required attributes */
    protected $required_attributes = array('name', 'value');

    public function __construct($item) {
        $this->attributes['type'] = 'checkbox';
        
            if ($item['checked'] === TRUE) {
                $item['checked'] = 'checked';
            } else {
                unset($item['checked']);
            }
            
        parent::__construct($item);
    }
}
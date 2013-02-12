<?php
/* 
 * Form.php
 * A form class
 */

/**
 *
 * @author Andrew McCombe
 */
class Form {

    public $method;
    public $enctype;
    public $action;
    public $id;
    public $class;
    public $name;

    /**
     * __construct
     * Initialistations
     */
    public function __construct($action=null, $method='get', $id=null, $name=null) {
        if (null === $action) $action = $_SERVER['PHP_SELF'];
        $this->method   = $method; // get by default
        $this->enctype  = 'application/x-www-form-urlencoded';
        $this->action   = $action;
        $this->id       = 'id';
        $this->name     = 'name';
    }



}

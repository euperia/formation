<?php
/* 
 * Input.php
 * Basic imput element.
 * Extended by other Form Elements
 * @author Andrew McCombe
 * @package Form
 */

/**
 * Basic form element functionality
 *
 * @author andrew
 */
class Form_Input {

   public $type;
   public $name;
   public $value;
   public $disabled;
   public $readonly;
   public $size;
   public $maxlength;
   public $src;
   public $alt;
   public $usemap;
   public $ismap;
   public $tabindex;
   public $accesskey;
   public $onfocus;
   public $onblur;
   public $onselect;
   public $onchange;
   public $access;
   public $class = array();
   public $label;
   public $required = false;

   /** @val array list of element attributes */
   public $attributes = array();

   /** @val array list of element validators */
   public $validator = array();

   public function  __construct($item) {
       
       /* Certain fields are required */
        $keys = array();
        foreach(array_keys($item) as $key) $keys[] = $key;

        foreach($this->required_attributes as $key) {
            if (in_array($key, $keys) === false) {
                throw new Exception('Element '.$this->type. ' requires a \''. $key. '\' field.');
            }
        }
        // add all elements
        foreach ($item as $key=>$val) {
            if (is_array($this->$key)) {
                $f = $this->$key;
                $f[] = $val;
                $this->$key = $f;
                $this->attributes[$key][] = $val;
            } else {
                $this->$key = $val;
                $this->attributes[$key] = $val;
            }
        }
        
   }

   /**
     * render
     * render the Element
     * @return string
     */
    public function render() {
        return '<input '.$this->getAttributesAsHTML() .' />';
    }

   /**
    * getAttributesAsHTML
    * returns an equals list of attributes
    * @return string 'field="value" field2="value"' etc
    */
    protected function getAttributesAsHTML($exclude=array('label', 'validator', 'required', 'validator_string', 'current')) {
        foreach ($this->attributes as $key=>$val) {
            if (is_array($exclude) === true && in_array($key, $exclude) === true) continue;


                if (is_array($val)) {
                    $values = array();
                    foreach ($val as $v) {
                        if (is_array($v)) $v = $v[0];
                        $values[] = $v;
                    }
                    $elements[] = $key.'="'.htmlentities(implode(" ", $values), ENT_COMPAT, 'utf-8').'"';
                } else {
                    if (is_bool($val) && $val===true) {
                        $val = $key;
                    }
                    $elements[] = $key.'="'.htmlentities($val, ENT_COMPAT, 'utf-8').'"';
                }
            }

        return implode(' ', $elements);
    }

   public function __destruct() {

    }

    public function __set($field, $var) {

        if (is_array($this->$field)) {
            $f = $this->$field;
            $f[] = $var;
            $this->$field = $f;
            $this->attributes[$field][] = $var;
        } else {
            $this->$field = $var;
            $this->attributes[$field] = $var;
        }
    }

    public function __get($field) {
        if (false === isset($this->$field)) return null;
        return $this->$field;
    }

}

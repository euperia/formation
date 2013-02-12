<?php
/**
 * Form
 * Form builder and validation is all done with this class
 * 
 *
 * @author Andrew McCombe <euperia@gmail.com>
 */
class Form_Form {
    public $template;
    public $elements;
    public $action;
    public $method;
    public $enctype;
    public $error = array();

    public function __construct($action=null, $method='get', $enctype=null) {
        $this->action = (is_null($action) ? $_SERVER['PHP_SELF'] : $action);
        $this->method = $method;
    }

    public function __destruct() {

    }

    public function addElement($type, $attributes) {
        $el = null;
        $type = 'Form_' . ucwords($type);
        $el = new $type($attributes);
        if (is_object($el) === false) {
            throw new Exception('Element "'.$type.'" is not an object!');
        }
        $this->elements[$el->name][] = $el;
        unset($el);
        return true;
    }

    public function removeElement($name) {
        unset($this->elements[$name]);
    }

    public function render($returnArray=0) {

        if (count($this->elements) > 0) {
            foreach ($this->elements as $idx => $element) {
                foreach ($element as $elidx=>$el) {
                    if (get_class($el) == 'Form_File') {
                        $this->enctype = 'multipart/form-data';
                    }

                    // inject previous form data if not empty
                    if ($this->method == 'get' && count($_GET) > 0) $vars=$_GET;
                    if ($this->method == 'post' && count($_POST) > 0) $vars=$_POST;

                    if (isset($vars[$el->name]) && strlen($vars[$el->name]) > 0) {
                        $this->elements[$el->name][$elidx]->value = $vars[$el->name];
                    }
                }
            }
        }
        if (is_null($this->enctype) === true) {
            $this->enctype = 'application/x-www-form-urlencoded';
        }
        global $app;
        $formItem = array();

        $formItem['form']['start'] = '<form action="'.$this->action.'" method="' . $this->method.'" '
            .'enctype="' . $this->enctype.'">';
        if (count($this->elements) > 0) {    
            foreach ($this->elements as $element) {
                foreach ($element as $el) {
                // some elements don't have a label or some have empty labels
                    if (get_class($el) != 'Form_Hidden' && strlen($el->label) > 0) {
                        $formItem['label'][$el->id] = $el->label;
                    }
                    $formItem['element'][$el->id] = $el->render();
                }
            }
        }
        $formItem['form']['close']  = '</form>';

        if ($returnArray==1){
            return $formItem;
        } 

        // return the html form
        echo $formItem['form']['start'] . PHP_EOL;
        echo '<dl>' . PHP_EOL;
        foreach ($formItem['element'] as $key => $value)
        {
            // don't show any decoration for hiden elements
            if (!isset($formItem['label'][$key])) {
                echo $value . PHP_EOL;
            } else {
                echo '<dt>' . htmlentities($formItem['label'][$key], ENT_QUOTES, 'utf-8') . '<dt>' . PHP_EOL;
                echo '<dd>' . $value . '<dd>' . PHP_EOL;
            }
        }
        echo '</dl>' . PHP_EOL;
        echo $formItem['form']['end'] . PHP_EOL;
    }

    /**
     * validate
     * Checks submitted values against the defined
     * 'required' and 'validator' values.
     *
     * If any fails it adds the error to $this->error array.
     * 
     * @return boolean false if fail, true if passed
     */
    public function validate() {
        // get form values
        if ($this->method == 'get' && count($_GET) > 0) $vars=$_GET;
        if ($this->method == 'post' && count($_POST) > 0) $vars=$_POST;

       /* Part One
        * loop through each element and check for required.
        */
       foreach ($this->elements as $element) {
           foreach ($element as $el) {
               if ($el->required === true) {
                    if (in_array($el->name, array_keys($vars)) === false) {
                        // error
                        $this->error[] = $el->label . ' is required.';
                    }

                    // if it exists check that a value has been entered
                    if (strlen($vars[$el->name]) == 0) {
                       // error
                        $this->error[] = $el->label . ' cannot be empty.';
                    }
               }
           }
        }
        
        if (count($this->error) > 0) {
            return false;
        }

        /* Part Two
         * check each element's value for the correct validation.
         */
        foreach ($vars as $key => $val) {
            $element = $this->elements[$key];
            if (is_array($element) === false) {
               $element[] = $element;
            }

            foreach($element as $el) {
                if (count($el->validator) > 0) {
                    foreach($el->validator as $validators) {
                        if (count($validators) > 0) {
                        foreach ($validators as $v) {
                            if (is_array($v) === false) $v[0] = $v;
                            foreach ($v as $val_key=>$val_val) {
                               // do actual validation
                               
                               switch($val_key) {
                                   case 'text':
                                    if (Form_Validator::text($val, $val_val) === false) {
                                        $this->error[] = $el->validator_string;
                                    }
                                   break;
                                   case 'length_min':
                                    if (Form_Validator::length_min($val, $val_val) === false) {
                                        $this->error[] = $el->validator_string;
                                    }
                                   break;
                                   case 'length_max':
                                    if (Form_Validator::length_max($val, $val_val) === false) {
                                        $this->error[] = $el->validator_string;
                                    }
                                   break;
                                   case 'integer':
                                    if (Form_Validator::integer($val, $val_val) === false) {
                                        $this->error[] = $el->validator_string;
                                    }
                                   break;
                                   case 'email':
                                    if (Form_Validator::email($val, $val_val) === false) {
                                        $this->error[] = $el->validator_string;
                                    }
                                   break;
                                   case 'max_value':
                                    if (Form_Validator::max_value($val, $val_val) === false) {
                                        $this->error[] = $el->validator_string;
                                    }
                                   break;
                                   case 'min_value':
                                    if (Form_Validator::min_value($val, $val_val) === false) {
                                        $this->error[] = $el->validator_string;
                                    }
                                   break;
                                   default:
                                        $this->error[] = $val_key. ' is not a valid validator';
                                       break;
                               }
                                
                           }
                        }
                    }
                }
            }
        }
        }

        if (count($this->error) > 0) {
            return false;
        }


        return true;
    }


    public function __set($field, $var) {
        $this->$field = $var;
    }

    public function __get($field) {
        return $this->field;
    }
}


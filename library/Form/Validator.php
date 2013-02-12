<?php
/**
 * Validator.php
 * Contains validation functions for form validation
 *
 * @package Form
 * @author Andrew McCombe <euperia@gmail.com>
 */
class Form_Validator {

    /**
     * text
     *
     * validates the input for text
     * if additional text value is passed it then checks the submitted value
     * against the preset value.
     *
     * @param string input value to be validated
     * @param string value to compare input with
     * @return boolean
     */
    public static function text($val, $compare) {
        if (is_string($val) === false) return false;
        
        if ($compare != '' && (strtolower($val) != strtolower($compare))) {
                return false;
        }
        return true;
    }

    /**
     * length_min
     * Checks that the val is equal to or greater than a value
     * 
     * @param string value to compare
     * @param integer length to compare
     * @throws Exception
     * @return boolean
     */
    public static function length_min($val, $compare) {

        if (false === filter_var($compare, FILTER_VALIDATE_INT)) {
            throw new InvalidArgumentException('comparison value must be an integer');
        }
        return (strlen($val) < $compare ? false : true);
    }

    /**
     * length_max
     * Checks that the val is below or equal to a value
     * 
     * @return boolean
     */
    public static function length_max($val, $compare) {
        if (false === filter_var($compare, FILTER_VALIDATE_INT)) {
            throw new InvalidArgumentException('comparison value must be an integer');
        }
        return (strlen($val) > $compare ? false : true);
    }

    /**
     * integer
     */
    public static function integer($val) {
        if (false === filter_var($val, FILTER_VALIDATE_INT)) {
            return false;
        }
        return true;
    }

    /**
     * email
     * Validates a supplied email address
     * @param string email address
     * @return boolean
     */
    public static function email($val) {
        if (false === filter_var($val, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    /**
     * min_value
     * Compares the val agains the minimum value
     * checks that it is a valid integer first
     * 
     * @param int value to be tested
     * @param int value to compare against
     * 
     * @return boolean
     */
    public static function min_value($val, $compare) {
        if ($val < $compare) {
            return false;
        }
        return true;
    }

    /**
     * max_value
     * compares that the value is greater than or equal to 
     * a provided value
     *
     * @param int value to be tested
     * @param int value to compare against
     * 
     * @return boolean
     */  
    public static function max_value($val, $compare) {
         if ($val > $compare) {
            return false;
        }
        return true;
    }
}


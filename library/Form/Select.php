<?php
/**
 * Select.php
 * Class for a Form Select Element
 *
 * @package Form
 * @author Andrew McCombe <euperia@gmail.com>
 */
class Form_Select extends Form_Input {
    /* set type */
    public  $type = 'select';

    /* required attributes */
    public  $required_attributes = array('name', 'options');

    public function __construct($item) {
        $this->attributes['type'] = 'select';
        parent::__construct($item);
    }

    /**
     * render
     * render the Element
     * @return string
     */
    public function render() {
        $element[] =  '<select '.$this->getAttributesAsHTML(array('label', 'validate', 'required', 'options', 'type', 'selected_value')) .'>';
        if (count($this->options) > 0) {
            $arrOptions = array();

            foreach ($this->options as $option) {
                $opt = '<option value="'.$option['value'].'"';
                if (is_array($this->selected_value)===TRUE) {
                  if (in_array($option['value'], $this->selected_value) === TRUE) {
                      $opt .= ' selected="selected"';
                  }
                } else {
                    if ($this->selected_value == $option['value']) {
                        $opt .= ' selected="selected"';
                    }
                }
                $opt .= '>'.$option['label'].'</option>';
                $arrOptions[] = $opt;
                unset($opt);
            }
            $element[] =  implode(PHP_EOL, $arrOptions);
        }
        $element[] = '</select>';
        return "\n" . implode(PHP_EOL, $element);
    }
}

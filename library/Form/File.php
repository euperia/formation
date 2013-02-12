<?php
/**
 * File.php
 * Class for a Form File Element
 *
 * @package Form
 * @author Andrew McCombe <euperia@gmail.com>
 */
class Form_File extends Form_Input {
    /* set type */
    public  $type = 'file';

    /* required attributes */
    protected $required_attributes = array('name');

    public function __construct($item) {
        $this->attributes['type'] = 'file';
        parent::__construct($item);
    }

     /**
     * render
     * render the Element
     * @return string
     */
    public function render() {
        $output = '';
        
        if (isset($this->current) && is_array($this->current)
            && file_exists($this->current['path'])) {
            
           /*
            * only display images
            */

            $im = getimagesize($this->current['path']);
            
            if ($im !== FALSE) {
                    $output .= '<img src="'.$this->current['url'].'" />'
                            . '<br /><strong>Filename:</strong> ' . pathinfo($this->current['path'], PATHINFO_BASENAME)
                            . ', <strong>Size:</strong> ' .$im[0].' x ' . $im[1]
                            . '<br />';
            }
        }

        $output .= '<input '.$this->getAttributesAsHTML() .' />';
        return $output;
    }
   
}


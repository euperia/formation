<?php

class hiddenElementTest extends PHPUnit_Framework_TestCase
{
	private $form;

	public function setUp()
	{
		$this->form = new Form_Form();
	}

	public function tearDown()
	{
		unset($this->form);
	}

	

	public function testHiddenElement() {
		$this->form->addElement('hidden', array(
			'name'=>'action', 
			'id'=>'action',
		    'value'=>'process',
		    'readonly'=>true,
		    'validator'=>array(
		    	array('text'=>'process')
		   	),
		    'validator_string' => 'action field has been tempered with'
		));

		$form = $this->form->render(true);
		$expected = '<input type="hidden" name="action" id="action" value="process" readonly="readonly" />';
		$this->assertEquals($expected, $form['element']['action']);

	}
}

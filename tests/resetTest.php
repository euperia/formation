<?php

class resetTest extends PHPUnit_Framework_TestCase
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

	public function testResetElement() {
		$this->form->addElement('reset', array(
			'name'=>'reset', 
			'id'=>'reset',
		    'value'=>'Reset',
		));

		$form = $this->form->render(true);
		$expected = '<input type="reset" name="reset" id="reset" value="Reset" />';
		$this->assertEquals($expected, $form['element']['reset']);

	}
}

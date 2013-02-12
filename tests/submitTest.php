<?php

class submitTest extends PHPUnit_Framework_TestCase
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

	public function testSubmitElement() {
		$this->form->addElement('submit', array(
			'name'=>'submit', 
			'id'=>'submit',
		    'value'=>'Submit Me',
		));

		$form = $this->form->render(true);
		$expected = '<input type="submit" name="submit" id="submit" value="Submit Me" />';
		$this->assertEquals($expected, $form['element']['submit']);

	}
}

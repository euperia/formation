<?php

class passwordTest extends PHPUnit_Framework_TestCase
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

	

	public function testPasswordElement() {
		$this->form->addElement('password', array(
			'name'=>'password',
		    'id'=>'password',
		    'tabindex'=>14,
		    'label'=>'Enter Password'
		));

		$form = $this->form->render(true);
		$expected = '<input type="password" name="password" id="password" tabindex="14" />';
		$this->assertEquals($expected, $form['element']['password']);
		$this->assertEquals('Enter Password', $form['label']['password']);
	}
}

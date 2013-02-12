<?php

class textTest extends PHPUnit_Framework_TestCase
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

	public function testTextElement() {
		$this->form->addElement('text', 
		array('name'=>'first_name',
		    'required'=>true,
		    'id'=>'firstname',
		    'size'=>20,
		    'maxlength'=>255,
		    'value' => '',
		    'label' => 'First Name:',
		    'tabindex' => 1,
		));

		$form = $this->form->render(true);
		$expected = '<input type="text" name="first_name" id="firstname" size="20" maxlength="255" value="" tabindex="1" />';
		$this->assertEquals($expected, $form['element']['firstname']);
		$this->assertEquals('First Name:', $form['label']['firstname']);

	}
}

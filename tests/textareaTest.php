<?php

class textareaTest extends PHPUnit_Framework_TestCase
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

	public function testTextareaElement() {

		$this->form->addElement('textarea', array(
			'name' => 'description', 
			'id' => 'description',
		    'tabindex' => 20,
		    'label' => 'Description:',
		    'value' => 'Please enter a description',
		    'cols' => 40,
		    'rows' => 20
		));

		$form = $this->form->render(true);

		$expected = "<textarea name=\"description\" id=\"description\" tabindex=\"20\" cols=\"40\" rows=\"20\">Please enter a description</textarea>";

		$this->assertEquals($expected, $form['element']['description']);
		$this->assertEquals('Description:', $form['label']['description']);
	}
}

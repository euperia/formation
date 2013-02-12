<?php

class selectTest extends PHPUnit_Framework_TestCase
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

	public function testSelectElement() {

		$options = array(
				array('value' => 'item1', 'label' => 'Item 1'),
				array('value' => 'item2', 'label' => 'Item 2'),
				array('value' => 'item3', 'label' => 'Item 3')
		);

		$this->form->addElement('select', array(
			'name' => 'items', 
			'id' => 'itemSelect',
		    'options' => $options,
		    'selected_value' => 'item2',
		    'tabindex' => 14,
		    'label' => 'Select Item'
		));

		$form = $this->form->render(true);

		$expected = "<select name=\"items\" id=\"itemSelect\" tabindex=\"14\">" . PHP_EOL
		 . "<option value=\"item1\">Item 1</option>" . PHP_EOL
		 . "<option value=\"item2\" selected=\"selected\">Item 2</option>" . PHP_EOL
		 . "<option value=\"item3\">Item 3</option>" . PHP_EOL
		 . "</select>";

		$this->assertXmlStringEqualsXmlString($expected, $form['element']['itemSelect']);
		$this->assertEquals('Select Item', $form['label']['itemSelect']);
	}
}

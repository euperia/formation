<?php

class checkboxElementTest extends PHPUnit_Framework_TestCase
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

	

	public function testCheckboxElement() {
		$this->form->addElement('checkbox', array(
			'name'=>'newsletter',
		    'id'=>'newsletter',
		    'value'=> 1,
		    'checked' => FALSE,
		    'tabindex'=>12,
		    'label'=>'Subscribe to Newsletter?'
		));

		$form = $this->form->render(true);
		$expected = '<input type="checkbox" name="newsletter" id="newsletter" value="1" tabindex="12" />';
		$this->assertEquals($expected, $form['element']['newsletter']);
		$this->assertEquals('Subscribe to Newsletter?', $form['label']['newsletter']);
	}
}

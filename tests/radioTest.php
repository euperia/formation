<?php

class radioElementTest extends PHPUnit_Framework_TestCase
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

	

	public function testRadioElement() {
		$this->form->addElement('radio', array(
			'name'=>'sex', 
			'id'=>'sexMale',
		    'value'=>'male',
		    'label' => 'Male'
		));

		$form = $this->form->render(true);
		$expected = '<input type="radio" name="sex" id="sexMale" value="male" />';
		$this->assertEquals($expected, $form['element']['sexMale']);

	}
}

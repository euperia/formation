<?php

class buttonElementTest extends PHPUnit_Framework_TestCase
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

	

	public function testButtonButtonElement() {
		$this->form->addElement('button', array(
			'name'=>'btnTest', 
			'id'=>'btn-test',
		    'value'=>'Click Me',
		    'buttonType' => 'button'
		));

		$form = $this->form->render(true);
		$expected = '<button type="button" name="btnTest" id="btn-test">Click Me</button>';
		$this->assertEquals($expected, $form['element']['btn-test']);
	}

	public function testButtonSubmitElement() {
		$this->form->addElement('button', array(
			'name'=>'btnTestSubmit', 
			'id'=>'btn-submit',
		    'value'=>'Submit Me',
		    'buttonType' => 'submit'
		));

		$form = $this->form->render(true);
		$expected = '<button type="submit" name="btnTestSubmit" id="btn-submit">Submit Me</button>';
		$this->assertEquals($expected, $form['element']['btn-submit']);
	}

	public function testButtonResetElement() {
		$this->form->addElement('button', array(
			'name'=>'btnTestReset', 
			'id'=>'btn-reset',
		    'value'=>'Reset Me',
		    'buttonType' => 'reset'
		));

		$form = $this->form->render(true);
		$expected = '<button type="reset" name="btnTestReset" id="btn-reset">Reset Me</button>';
		$this->assertEquals($expected, $form['element']['btn-reset']);
	}
}

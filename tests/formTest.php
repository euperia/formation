<?php

class formTest extends PHPUnit_Framework_TestCase
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

	public function testFormAction() {
		$this->form->action = 'test.php';
		$this->assertEquals('test.php', $this->form->action);
	}

	public function testFormMethod() {
		$this->form->method = 'get';
		$this->assertEquals('get', $this->form->method);
	}

	public function testFormStart() {
		$this->form->action = 'test.php';
		$this->form->method = 'post';
		$testString = "<form action=\"test.php\" method=\"post\" enctype=\"application/x-www-form-urlencoded\">";
		
		$elements = $this->form->render(true);
		$elements = $elements['form'];

		$this->assertEquals($testString, $elements['start']);
	}

	public function testFormEnd() {
		$this->form->action = 'test.php';
		$this->form->method = 'post';
		$testString = '</form>';
		
		$elements = $this->form->render(true);
		$elements = $elements['form'];
		$this->assertEquals($testString,$elements['close']);
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

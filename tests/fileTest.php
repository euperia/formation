<?php

class fileElementTest extends PHPUnit_Framework_TestCase
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

	

	public function testFileElement() {
		$this->form->addElement('file', array(
			'name'=>'upload',
		    'id'=>'upload',
		    'tabindex'=>13,
		    'label'=>'Upload a File?'
		));

		$form = $this->form->render(true);
		$expected = '<input type="file" name="upload" id="upload" tabindex="13" />';
		$this->assertEquals($expected, $form['element']['upload']);
		$this->assertEquals('Upload a File?', $form['label']['upload']);
	}
}

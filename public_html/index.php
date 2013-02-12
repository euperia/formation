<?php

/**
 * Formation
 * A simple form class for PHP projects
 */

function my_autoloader($class) {
    include __DIR__ . '/../library/' . str_replace('_', '/', $class) . '.php';
}

spl_autoload_register('my_autoloader');

$form = new Form_Form('register.php', 'post');

/* action field */
$form->addElement('hidden', array('name'=>'action', 'id'=>'action',
    'value'=>'process',
    'readonly'=>true,
    'validator'=>array(
    array('text'=>'process')
    ),
    'validator_string' => 'action field has been tempered with'
));

/* Firstname field */
$form->addElement('text', array('name'=>'first_name',
    'required'=>true,
    'id'=>'firstname',
    'size'=>20,
    'maxlength'=>255,
    'value' => '',
    'label' => 'First Name:',
    'tabindex' => 1,
    'validator'=> array(array('text'=>'')),
    'validator_string' => 'Please enter your first name.'
));

/* Lastname field */
$form->addElement('text', array('name'=>'last_name',
    'required'=>true,
    'id'=>'lastname',
    'size'=>20,
    'maxlength'=>255,
    'value' => '',
    'label' => 'Last Name:',
    'tabindex' => 2,
    'validator'=> array(array('text'=>'')),
    'validator_string' => 'Please enter your last name.'
));

/* email field */
$form->addElement('text', array('name'=>'email_address',
    'required'=>true,
    'id'=>'emailaddress',
    'size'=>20,
    'maxlength'=>255,
    'value'=> '',
    'label' => 'Email Address:',
    'tabindex' => 3,
    'validator'=> array(array('email'=>'')),
    'validator_string' => 'Please enter your Email Address.'
));

/* sex */

$form->addElement('radio', array(
    'name' => 'sex',
    'id' => 'sexMale',
    'value' => 'Male',
    'label' => 'Male',
    'checked' => 'checked'
    ));

$form->addElement('radio', array(
    'name' => 'sex',
    'id' => 'sexFemale',
    'value' => 'Female',
    'label' => 'Female'
    ));

/* age */

$age = array(
    array('value' => '18-24', 'label' => '18-24'),
    array('value' => '24-29', 'label' => '24-29'),
    array('value' => '30-34', 'label' => '30-34'),
    array('value' => '35+', 'label' => '35+')
    );

$form->addElement('select', array('name' => 'age',
    'id' => 'age',
    'options'=> $age,
    'selected_value' => '24-29',
    'tabindex'=> 9,
    'label' => 'Age:'
    )
);


/* postcode */
$form->addElement('text', array('name'=>'postcode',
    'required'=>true,
    'id'=>'postcode',
    'size'=>12,
    'maxlength'=>20,
    'value'=> '',
    'label' => 'Post/Zip Code:',
    'tabindex' => 10,
    'validator'=> array(array('text'=>'')),
    'validator_string' => 'Please enter your Post/Zip Code.'
));


/* newsletter */
$form->addElement('checkbox', array('name'=>'newsletter',
    'id'=>'newsletter',
    'value'=> 1,
    'checked' => FALSE,
    'tabindex'=>12,
    'label'=>'Subscribe to Newsletter?'
));
/* password */
$form->addElement('password', array('name'=>'password',
    'id'=>'password',
    'size'=>20,
    'maxlength'=>255,
    'value'=>'',
    'label'=>'Password:',
    'tabindex' => 13,
    'validator'=>array( array('text'=>''),
    array('length_min' => 8)
    ),
    'validator_string' => 'Password length must be greater than 8 chars.',
    'required'=>true
));
/* password confirm */
$form->addElement('password', array('name'=>'confirmation',
    'id'=>'confirmation',
    'size'=>20,
    'maxlength'=>255,
    'value'=>'',
    'label'=>'Password Confirmation:',
    'tabindex' => 14,
    'validator'=>array( array('text'=>''),
    array('length_min' => 8)
    ),
    'validator_string' => 'Password confirmation must be greater than 8 chars.',
    'required'=>true
));

$form->addElement('submit', array(
    'name' => 'submitButton',
    'id' => 'submitButton',
    'value' => 'Submit'
    ));



if (isset($_POST['action'])) {



}

echo $form->render();


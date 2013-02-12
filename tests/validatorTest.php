<?php


class validatorTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        // your code here
    }

    public function tearDown()
    {
        // your code here
    }

    /**
     * @covers Class::Method
     */
    public function testValidateText()
    {
        $this->assertTrue(Form_Validator::text('hello, world', 'hello, world'));
    	$this->assertFalse(Form_Validator::text('12345', 'hello world'));
    }

    /**
     * testLengthMin
     *
     * @return void
     * @author 
     **/
    public function testLengthMin()
    {
        /**
         * Test the minimum length of a string
         * If equal or over it should return true
         * else it should return false
         */
        try {
            Form_Validator::length_min('fish', 'dog');
        } catch (InvalidArgumentException $e) {
            $this->assertTrue(Form_Validator::length_min('this is a test', 14));
            $this->assertFalse(Form_Validator::length_min('this', 10));
            return;
        }
 
        $this->fail('An expected InvalidArgumentException has not been raised.');
    }


    public function testLengthMax() {
        /**
         * Test the maximum length of a string
         * If over it should return false
         * else it should return true
         */
        
        try {
            Form_Validator::length_max('fish', 'dog');
        } catch (InvalidArgumentException $e) {
            $this->assertFalse(Form_Validator::length_max('this is a test', 10));
            $this->assertTrue(Form_Validator::length_max('12345', 10));
            return;
        }
        $this->fail('An expected InvalidArgumentException has not been raised');
    }


    
    public function testInteger()
    {
        // ----------------------------------------------------------------
        // Test that the supplied value is actually an integer
    
        $integers = array(0,-9,9,32876);
        foreach ($integers as $int) {
            $this->assertTrue(Form_Validator::integer($int), 'Failed validating integer ' . $int);
        }
 
        $nonInts = array('banana', 0.03);
        foreach ($nonInts as $n) {
            $this->assertFalse(Form_Validator::integer($n), 'Failed nonInt of ' . $n);
        }
    }
    

    public function testEmail() {
        // Tests that the supplied string is a valid email format.

        $values = array('a@b.c', 'a+b@c.d');
        foreach ($values as $value) {
            $this->assertTrue(Form_Validator::email($value), 'Failed email validation for ' . $value);
        }
    }

    public function testMinValue() {
        // test that a value > or = X
        $this->assertTrue(Form_Validator::min_value(10, 10), 'Failed validating that 10 > or = 10');
        $this->assertTrue(Form_Validator::min_value(12, 10), 'Failed validating that 12 > or = 10');
        $this->assertFalse(Form_Validator::min_value(5, 10), 'Failed validating that 5  < or = 10');
    }

    public function testMaxValue() {
        // test that value is < or =  X
        $this->assertTrue(Form_Validator::max_value(10,10), 'failed validating that 10 < or = 10');
        $this->assertTrue(Form_Validator::max_value(5,10), 'failed validating that 5 < or = 10');
        $this->assertFalse(Form_Validator::max_value(15,10), 'failed validating that 15 > 10');
    }

}
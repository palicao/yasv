<?php

namespace YASV\Validator;

use YASV\Validator\Choices;

class ChoicesTest extends \PHPUnit_Framework_TestCase
{
    
    public function testChoicesValidation() {
        $choices = array('one', 'two', 'three');
        
        $v = new Choices(array('choices' => $choices));
        $v->validate('four');
        $this->assertFalse($v->isValid());
        
        $v = new Choices(array('choices' => $choices));
        $v->validate('three');
        $this->assertTrue($v->isValid());
        
    }
    
}
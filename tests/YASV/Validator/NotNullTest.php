<?php

namespace YASV\Validator;

use YASV\Validator\NotNull;

class NotNullTest extends \PHPUnit_Framework_TestCase
{
    
    public function testNullValuesValidation() {
        $v = new NotNull();
        $v->validate(null);
        $this->assertFalse($v->isValid());
        
        $v = new NotNull();
        $v->validate('');
        $this->assertFalse($v->isValid());
        
        $v = new NotNull();
        $v->validate(false);
        $this->assertFalse($v->isValid());
    }
    
    public function testCheckedValueValidation() {
        $v = new NotNull();
        $v->validate(1);
        $this->assertTrue($v->isValid());
    }
    
}
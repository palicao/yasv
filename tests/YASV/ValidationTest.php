<?php

namespace YASV\Tests;

use YASV\Validation;

class ValidationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException        InvalidArgumentException
     */
    public function testValidateFieldException() {
        $v = new Validation;
        $v->validateField('', '', array(new \stdClass()));
    }
    
}
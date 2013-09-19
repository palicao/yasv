<?php

namespace YASV\Validator;

use YASV\Validator;

/**
 * Checks if a checkbox is checked!
 */
class Checked extends Validator {
    
    protected $error_message = '"{label}" must be checked';
    
    public function validate($value) {
        if (is_null($value) || $value == false || $value == '') {
            $this->raiseError();
            return false;
        }
        return $value;
    }
    
}
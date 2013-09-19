<?php

namespace YASV\Validator;

/**
 * Checks if the value is an integer
 */
class Validator_Integer extends Validator {
    
    protected $error_message = '"{label}" must be an integer number';
    
    public function validate($value) {
        if (!is_numeric($value)) {
            $this->raiseError();
            return false;
        }
        return (int) $value;
    }
    
}
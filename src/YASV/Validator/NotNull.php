<?php

namespace YASV\Validator;

use YASV\Validator;

/**
 * Checks if a value is not null (and not empty)
 */
class NotNull extends Validator {
    
    protected $error_message = '"{label}" must be checked';
    
    public function validate($value) {
        if (is_null($value) || $value == false || $value == '') {
            $this->raiseError();
            return false;
        }
        return $value;
    }
    
}
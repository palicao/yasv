<?php

namespace YASV\Validator;

use YASV\Validator;

/**
 * Checks if the value is a valid email address
 */
class Email extends Validator {
    
    protected $error_message = '"{label}" must be a valid email address';
    
    public function validate($value) {
        $ret = filter_var($value, FILTER_VALIDATE_EMAIL);
        if ($ret === false) {
            $this->raiseError();
        }
        return $ret;
    }
    
}
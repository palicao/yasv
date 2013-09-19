<?php

namespace YASV\Validator;

use YASV\Validator;

/**
 * Checks if a string is at least N characters long
 */
class MinLength extends Validator {
    
    protected $required_params = array('min_length');
    protected $error_message = '"{label}" must be at least {min_length} characters long';

    public function validate($value) {
        if (mb_strlen($value) < $this->params['min_length']) {
            $this->raiseError();
            return false;
        }
        return $value;
    }
    
}
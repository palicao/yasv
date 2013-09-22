<?php

namespace YASV\Validator;

use YASV\Validator;

/**
 * Checks if a string is maximum N characters long
 */
class MaxLength extends Validator {
    
    protected $required_params = array('max_length');
    protected $error_message = '"{label}" must be maximum {max_length} characters long';

    public function validate($value) {
        if (mb_strlen($value) > $this->params['max_length']) {
            $this->raiseError();
            return false;
        }
        return $value;
    }
    
}
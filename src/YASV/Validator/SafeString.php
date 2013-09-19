<?php

namespace YASV\Validator;

use YASV\Validator;

/**
 * Sanitizes a string
 */
class SafeString extends Validator {
    
    public function validate($value) {
        return trim(filter_var($value, FILTER_SANITIZE_STRING));
    }
    
}
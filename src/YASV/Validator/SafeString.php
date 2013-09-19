<?php

namespace YASV\Validator;

/**
 * Sanitizes a string
 */
class Validator_SafeString extends Validator {
    
    public function validate($value) {
        return trim(filter_var($value, FILTER_SANITIZE_STRING));
    }
    
}
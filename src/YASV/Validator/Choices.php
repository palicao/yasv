<?php

namespace YASV\Validator;

/**
 * Checks if a value is in a list of values
 */
class Validator_Choices extends Validator {
    
    protected $required_params = array('choices');
    protected $error_message = '"{label}" contains an unallowed value';
    
    public function validate($value) {
        if (!in_array($value, $this->params['choices'])) {
            $this->raiseError();
            return false;
        }
        return $value;
    }
}
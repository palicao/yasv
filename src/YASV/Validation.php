<?php

namespace YASV;

/**
 * Class Validation
 *
 * @author Alessandro Balasco <alessandro.balasco@gmail.com>
 * @created 12 August 2013
 *
 */

/**
 * Validates and sanatizes multiple values (e.g. a form) collecting errors
 */
class Validation {

    private $errors = array();
    
    /**
     * Validates and sanatizes a value. Returns the sanatized value
     * 
     * @param string $key the key in the $values array
     * @param string $label the label of the field
     * @param array $validations an array of Validator objects
     * @return string 
     */
    public function validateField($value, $label, array $validations) {
        foreach($validations as $validation) {
            if (is_a($validation, 'YASV\Validator')) {
                $old_value = $value;
                $value = $validation->validate($value);
                if (!$validation->isValid()) {
                    $this->errors[] = $validation->getError($old_value, $label);
                }
            } else {
                throw new \InvalidArgumentException('Every element of $validations array must be an object of type YASV\Validator');
            }
        }
        return $value;
    }
    
    /**
     * Returns true if the form is valid
     * 
     * @return bool
     */
    public function isValid() {
        return count($this->errors) == 0;
    }
    
    /**
     * Returns an array of errors
     * 
     * @return array 
     */
    public function getErrors() {
        return $this->errors;
    }
    
}
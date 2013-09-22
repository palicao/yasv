<?php

namespace YASV;

/**
 * Class Validator
 *
 * @author Alessandro Balasco <alessandro.balasco@gmail.com>
 * @created 12 August 2013
 *
 */

/**
 * This class must be extended to define a validate() function which is
 * responsible to sanitize and/or validate data
 */
abstract class Validator implements ValidatorInterface {
    
    /**
     * Message to be returned as error. The placeholders {label}, {value} and
     * every key from $params array will be substituted with the appropriate values 
     * 
     * @var string
     */
    protected $error_message;
    
    /**
     * Associative array of params to configure the validation
     * 
     * @var array
     */
    protected $params;
    
    /**
     * Has this validation passed?
     * 
     * @var bool
     */
    protected $is_valid = true;
    
    /**
     * Array of required params keys
     * 
     * @var array
     */
    protected $required_params = array();
    
    /**
     * Pass a $custom_message if you don't like the default one
     * 
     * @param array $params
     * @param string|null $custom_message 
     */
    public function __construct($params = array(), $custom_message = null) {
        
        $missing_params = array_diff($this->required_params, array_keys($params));
        if (count($missing_params) > 0) {
            throw new \InvalidArgumentException('You must specify the following param(s): '. implode(', ', $missing_params));
        }
        
        $this->params = $params;
        if ($custom_message !== null) $this->error_message = $custom_message;
    }
    
    /**
     * Generates the appropriate error in case of failure
     * 
     * @param mixed $value
     * @param string $label
     * @return string 
     */
    public function getError($value, $label) {
        $message = $this->error_message;
        $substitute = array_merge($this->params, array('label' => $label, 'value' => $value));
        foreach ($substitute as $k => $v) {
            $message = str_replace('{'.$k.'}', $v, $message);
        }
        return $message;
    }
    
    public function raiseError() {
        $this->is_valid = false;
    }
    
    public function isValid() {
        return $this->is_valid;
    }

}
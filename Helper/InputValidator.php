<?php

namespace RomanNumeral\Helper;

class InputValidator
{
    const ERROR_NOT_NUMERIC  = 'Error: %s is not numeric';
    const ERROR_NOT_WHOLE    = 'Error: %s is not a whole number';
    const ERROR_NOT_IN_RANGE = 'Error: %s is not within range 1-100000';

    private $_input;
    private $_message;

    public function __construct($input)
    {
        $this->_input = $input;
    }

    public function isValid() : bool
    {
        if (!is_numeric($this->_input)) {
            $this->_message = sprintf(self::ERROR_NOT_NUMERIC, $this->_input);
            return false;
        }

        if (!(floor(floatval($this->_input)) === floatval($this->_input))) {
            $this->_message = sprintf(self::ERROR_NOT_WHOLE, $this->_input);
            return false;
        }

        if (!((1 <= $this->_input) && ($this->_input <= 100000))) {
            $this->_message = sprintf(self::ERROR_NOT_IN_RANGE, $this->_input);
            return false;
        }

        return true;
    }

    public function getMessage() : ?string
    {
        return $this->_message;
    }
}
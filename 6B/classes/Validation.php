<?php

class Validation{
    private $_passed = false,
            $_errors = [];

    public function check($items = [])
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                switch ($rule) {
                    case 'required':
                        if( trim(Input::get($item)) == false){
                            $this->addError("$item wajib diisi gan!");
                        }
                        break;
                    case 'min':
                        if (strlen(Input::get($item)) < $rule_value) {
                            $this->addError("$item minimal $rule_value gan!");
                        }
                        break;
                    case 'max':
                        if (strlen(Input::get($item)) > $rule_value) {
                            $this->addError("$item maximal $rule_value gan!");
                        }
                        break;
                    default:
                        break;
                }
            }
        }

        if (empty($this->_errors)) {
            $this->_passed = true;
        }

        return $this;
    }

    public function addError($error)
    {
        $this->_errors[] = $error;
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function passed()
    {
        return $this->_passed;
    }
}
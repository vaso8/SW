<?php

namespace App\Core\Traits;

trait ValidateTrait
{
    protected function setError($inputValue, $inputName, $rule, $rule_value = null)
    {
        $msg = $this->rules[$rule]['error_message'];
        $message = $rule_value !== null ? $msg . ' ' . $rule_value : $msg;
        $_SESSION['error'][$inputName][$rule] = [];
        array_unshift($_SESSION['error'][$inputName][$rule], ['value' => $inputValue, 'message' => $message]);
        //return 'Requierd rule was called!ssss' . $inputValue . '<br>';
    }

    protected function unsetError($inputName, $rule)
    {
        if(isset($_SESSION['error'][$inputName][$rule])) {
            unset($_SESSION['error'][$inputName][$rule]);
        }
    }

    public function required($inputValue, $inputName, $rule)
    {
        if($inputValue == '') {
            $this->setError($inputValue, $inputName, $rule);
        } else {
            $this->unsetError($inputName, $rule);
        }
    }

    public function string_function($inputValue, $inputName, $rule)
    {
        if(!is_string($inputValue)) {
            $this->setError($inputValue, $inputName, $rule);
        } else {
            $this->unsetError($inputName, $rule);
        }
    }

    public function number_function($inputValue, $inputName, $rule)
    {
        if(!is_numeric($inputValue)) {
            $this->setError($inputValue, $inputName, $rule);
        } else {
            $this->unsetError($inputName, $rule);
        }
    }

    public function min($inputValue, $inputName, $rule, $rule_value)
    {
        if($rule_value > $inputValue) {
            $this->setError($inputValue, $inputName, $rule, $rule_value);
        } else {
            $this->unsetError($inputName, $rule);
        }
    }

    public function max($inputValue, $inputName, $rule, $rule_value)
    {
        if($rule_value < $inputValue) {
            $this->setError($inputValue, $inputName, $rule, $rule_value);
        } else {
            $this->unsetError($inputName, $rule);
        }
    }
}
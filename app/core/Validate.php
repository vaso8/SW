<?php

namespace App\Core;

use App\Core\Contract\RequestInterface;
use App\core\Contract\ValidateInterface;
use App\Core\Traits\ValidateTrait;

class Validate extends Services implements ValidateInterface
{
    use ValidateTrait;
    protected $rules;

    public function __construct($app)
    {
        $this->app = $app;
        $this->rules = require "app/core/files/validateRules.php";
    }

    public function validate($inputNameRules): bool
    {
        //$method = $this->rules['required']['method'];

        //$result = $this->$method();
        
        [
            'name' => 'required|min:4|range:5-9',
            'lastname' => 'required|min:4|range:5-9',
        ];
        $inputs = array_keys($inputNameRules);
        $result = false;

        foreach($inputNameRules as $inputName => $inputRules)
        {   $inputValue = $this->app->request->input($inputName);
            $rules = explode('|', $inputRules);
            foreach($rules as $rule)
            {
                if(strpos($rule, ':') !== false)
                {
                    $rule = explode(':',$rule);
                    $method = $this->rules[$rule[0]]['method'];
                    //$error_msg = $this->rules[$rule[0]]['method'];
                    $this->$method($inputValue, $inputName, $rule[0], $rule[1]);
                }
                $method = $this->rules[$rule]['method'];
                $this->$method($inputValue, $inputName, $rule);
            }    
        }
        $result = empty($_SESSION['error']);
        //var_dump($result);
        return $result;
    }
}
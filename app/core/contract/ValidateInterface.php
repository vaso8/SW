<?php

namespace App\core\Contract;

use App\Core\Contract\RequestInterface;

interface ValidateInterface
{
    /**
     * Validate POST Values
     * 
     * @param object $request \App\Core\Contract\RequestIterface
     * @param array $inputNameRules
     */
    public function validate($inputNameRules) : bool;
}
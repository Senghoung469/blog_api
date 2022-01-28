<?php

namespace App\Exceptions;
use App\ApiHelper\ApiHelper;
use Exception;

class RestValidationErrorException extends Exception
{
    private $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    public function render()
    {
        return ApiHelper::responseJsonValidationError("The given data was invalid", $this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}

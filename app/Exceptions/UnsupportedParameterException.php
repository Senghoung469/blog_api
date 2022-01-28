<?php
namespace App\Exceptions;
use App\ApiHelper\ApiHelper;
use Exception;
class UnsupportedParameterException extends Exception
{
    private $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof CustomException) {
            return response()->view('errors.custom', [], 500);
        }

        return parent::render($request, $exception);
    }
    public function getErrors()
    {
        return $this->errors;
    }
}

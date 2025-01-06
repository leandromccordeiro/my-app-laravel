<?php

namespace App\Exceptions;

use Exception;

class InvalidOrderException extends Exception
{
    public function render($request)
    {
        return response()->view('errors.invalid-order', [], 500);
    }

    public function report()
    {
        dd('Invalid Order Exception');
    }
}

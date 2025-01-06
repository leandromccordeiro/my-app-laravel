<?php

namespace App\Exceptions;

use Exception;

class ProductNotFoundException extends Exception
{
    public function render($request)
    {
        return response()->json(['message' => 'Product not found'], 404);
    }
    
    public function report()
    {
        dd('Product not found');
    }
}

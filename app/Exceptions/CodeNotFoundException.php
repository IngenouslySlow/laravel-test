<?php

namespace App\Exceptions;

use Exception;

class CodeNotFoundException extends Exception
{
    function report(){
        //
    }

    function render(){
        return view('errors.404');
    }
}

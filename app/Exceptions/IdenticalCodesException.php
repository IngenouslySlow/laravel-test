<?php

namespace App\Exceptions;

use Exception;

class IdenticalCodesException extends Exception
{
    function report(){
        //
    }

    function render(){
        return view('errors.422');
    }
}

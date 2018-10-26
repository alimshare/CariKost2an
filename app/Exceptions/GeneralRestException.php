<?php

namespace App\Exceptions;

use Exception;

class GeneralRestException extends Exception
{
    protected $code;
    protected $message;
    protected $status;

    function __construct($code, $message, $status){
        $this->code = $code;
        $this->message = $message;
        $this->status = $status;
    }

     /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }
    
   /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        $json = [
            'code' => $this->code,
            'message' => $this->message
        ];
        return response()->json($json, $this->status);
    }
}

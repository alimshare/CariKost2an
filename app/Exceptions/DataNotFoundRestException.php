<?php

namespace App\Exceptions;

use Exception;

class DataNotFoundRestException extends Exception
{

    protected $message;
    protected $status;

    function __construct($message, $status = 404){
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
            'code' => 'DATA_NOT_FOUND',
            'message' => $this->message
        ];
        return response()->json($json, $this->status);
    }
}

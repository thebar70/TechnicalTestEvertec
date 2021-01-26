<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;
use Exception;

class MyStoreBaseException extends Exception
{

    protected $reason;
    protected $data;
    
    public function __construct($reason, $data)
    {
        $this->reason = $reason;
        $this->data = $data;
    }

    /**
     * Specify in the log what has happened
     */
    public  function action($exception)
    {
        Log::debug($exception, [
            'reason' => $this->reason,
            'data' => $this->data,
        ]);
    }
}

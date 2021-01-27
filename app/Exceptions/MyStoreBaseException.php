<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;
use Exception;

class MyStoreBaseException extends Exception
{
    /**
     * Reason exception
     * @var string
     */
    protected $reason;

    /**
     * Data exception
     * @var array
     */
    protected $data;

    public function __construct($reason, $data)
    {
        $this->reason = $reason;
        $this->data = $data;
    }

    /**
     * Specify in the log what has happened
     * 
     * @param string $exception
     */
    public  function action($exception)
    {
        Log::debug($exception, [
            'reason' => $this->reason,
            'data' => $this->data,
        ]);
    }
}

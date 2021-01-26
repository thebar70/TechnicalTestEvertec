<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;
use Exception;

class CallPlacetopayException extends Exception
{
    protected $reason;
    protected $data;

    public function __construct($reason, $data)
    {
        $this->reason = $reason;
        $this->data = $data;
        $this->action();
    }
    /**
     * Specify in the log what has happened
     */
    public function action()
    {
        Log::debug('CallPlacetopayException', [
            'reason' => $this->reason,
            'data' => $this->data,
        ]);
    }
}

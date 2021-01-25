<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class RedirectPlacetopayException extends Exception
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
        Log::debug('RedirectPlacetopayException', [
            'reason' => $this->reason,
            'data' => $this->data,
        ]);
    }
}

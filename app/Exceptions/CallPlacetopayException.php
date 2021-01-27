<?php

namespace App\Exceptions;

class CallPlacetopayException extends MyStoreBaseException
{
    /**
     * @param string $reason
     * @param array $data
     */
    public function __construct($reason, $data)
    {
        parent::__construct($reason, $data);
        parent::action(get_class($this));
    }
}

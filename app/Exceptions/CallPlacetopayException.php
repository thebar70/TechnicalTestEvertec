<?php

namespace App\Exceptions;

class CallPlacetopayException extends MyStoreBaseException
{
    public function __construct($reason, $data)
    {
        parent::__construct($reason, $data);
        parent::action(get_class($this));
    }
}

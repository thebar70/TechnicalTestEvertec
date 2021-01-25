<?php

namespace App\Interfaces\Api;

use Illuminate\Support\Collection;

interface IPlacetopay
{
    public function paymentCallback(): Collection;
}

<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface IProduct
{
    public function listProducts(): Collection;
}

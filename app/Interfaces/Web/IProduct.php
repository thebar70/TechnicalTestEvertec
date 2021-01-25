<?php

namespace App\Interfaces\Web;

use Illuminate\Support\Collection;

interface IProduct
{
    public function listProducts(): Collection;
}

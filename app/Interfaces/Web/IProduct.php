<?php

namespace App\Interfaces\Web;

use Illuminate\Support\Collection;

interface IProduct
{
    /**
     * @return Illuminate\Support\Collection
     */
    public function listProducts(): Collection;
}

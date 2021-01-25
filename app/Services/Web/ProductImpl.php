<?php

namespace App\Services\Web;

use Illuminate\Support\Collection;
use App\Interfaces\Web\IProduct;
use App\Models\Product;


class ProductImpl implements IProduct
{
    /**
     * Returns a list of products
     * @return Illuminate\Support\Collection
     */
    public function listProducts(): Collection
    {
        $products = Product::select('id', 'name', 'price', 'image_path')->get();
        return $products;
    }
}

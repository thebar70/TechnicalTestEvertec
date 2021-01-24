<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct(Product $product)
    {
        return view('product.show')->with(compact('product'));
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Interfaces\Web\IProduct;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{

    /**
     * Service handler for the product
     * 
     * @var App\Interfaces\Web\IProduct $product_manager
     */
    protected $product_maganer;

    /**
     * Service controller for the product
     * 
     * @param App\Interfaces\Web\IOrder $product_manager
     */
    public function __construct(IProduct $product_maganer)
    {
        $this->product_maganer = $product_maganer;
    }

    /**
     *  finds a product and returns it with a view
     *
     *  @param App\Model\Product
     *  @throw ModelNotFoundException
     */
    public function showProduct(Product $product)
    {
        return view('product.show')->with(compact('product'));
    }

    /**
     *  returns a view with the list of products
     */
    public function listProducts()
    {
        $products = $this->product_maganer->listProducts();
        return view('product.list')->with(compact('products'));
    }
}

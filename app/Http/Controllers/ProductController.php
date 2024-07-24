<?php
namespace App\Http\Controllers;
use App\Models\Product;

class ProductController extends Controller
{

    protected $page_title = 'Products';


    public function index()
    {
        $hot_products = Product::getHot(null);
        return view('products.view_hot')->with([
            // just choose the recipes by randomly determining an author id
            "products"  => $hot_products,
            "title"     => $this->page_title

        ]);
    }

    public function view(Product $product)
    {
        return view('products.view')->with([

            "product"    => $product,
            "title"     => $this->page_title
        ]);
    }
}

<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Product\CreateHotProductRequest;
use App\Http\Requests\Dashboard\Admin\Product\EditHotProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class HotProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products_all = Product::all();
        $hot_products = $products_all->where("hot_product", true);
        $products = $products_all->where("hot_product", false);
        return View('dashboard.admin.products.hot_list')->with([
            // use the logged in user id to choose the users own authored recipes
            "title"     => "Toggle Hot Products",
            "hot_products" => $hot_products,
            "products" => $products->paginate(9),

        ]);
    }

    /**
     * Add the hot_product flag from the product record.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toggle_on($id)
    {
        $product = Product::find($id);
        $product->hot_product = true;
        $product->save();
        return redirect()->back()->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;"">Product marked as Hot</div>');
    }

    /**
     * Remove the hot_product flag from the product record.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toggle_off($id)
    {
        $product = Product::find($id);
        $product->hot_product = false;
        $product->save();
        return redirect()->back()->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Product no longer marked as Hot</div>');
    }
}

<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Products\CreateProductRequest;
use App\Http\Requests\Dashboard\Admin\Products\EditProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Services\ImageUpload;

class ProductController extends Controller
{
    /**
     * Display a list of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return View('dashboard.admin.products.list')->with([
            "term" => "",
            "title"     => "Manage Products",
            "products" => $products->paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add New Product';
        return view('dashboard.admin.products.create')->with([
            "title" => $title,
            "suppliers" => Supplier::all()
        ]);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $image_name = ImageUpload::handle($request, "artwork", "artwork");
        Product::create([
            "product_name" => $request->validated("product_name"),
            "artist_name" => $request->validated("artist_name"),
            "artwork" => $image_name,
            "genre" => $request->validated("genre"),
            "medium" => $request->validated("medium"),
            "publication_date" => $request->validated("publication_date"),
            "stock" => $request->validated("stock"),
            "retail_price" => $request->validated("retail_price"),
            "trade_price" => $request->validated("trade_price"),
            "hot_product" => $request->validated("hot_product"),
            "supplier_id" => $request->validated("supplier_id"),
        ]);
        return redirect()->route("dashboard.admin.products")->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Product Added</div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $title = 'Edit Product';
        return view('dashboard.admin.products.edit')->with([
            "title" => $title,
            "product" => $product,
            "suppliers" => Supplier::all(),
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request)
    {
        $product = Product::where("id", $request->validated('id'))->first();

        // Update the product
        $product->product_name = ucwords($request->validated('product_name'));
        $product->artist_name = ucfirst($request->validated('artist_name'));
        $product->genre = ucfirst($request->validated('genre'));
        $product->medium = ucfirst($request->validated('medium'));
        $product->publication_date = $request->validated('publication_date');
        $product->stock = $request->validated('stock');
        $product->retail_price = $request->validated('retail_price');
        $product->trade_price = $request->validated('trade_price');
        $product->hot_product = $request->validated('hot_product');
        $product->supplier_id = $request->validated('supplier_id');
        $product->save();

        // Redirect the user to the product index page
        return redirect()->route("dashboard.admin.products")->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Product Updated</div>');

    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Product Deleted</div>');
    }
}

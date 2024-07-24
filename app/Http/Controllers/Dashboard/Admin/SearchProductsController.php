<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchProductsController extends Controller
{
    public function products(Request $request, $_term=null){
        $term = is_null($_term)
            ? $request->get("term")
            : $_term;
        $query = \App\Models\Product::search($term);
        $title = 'Manage Products';
        $page = \App\Models\Page::where("title", $title)
                                ->first();
        return view('dashboard.admin.products.list')
            ->with([
                "title"     => "Manage Products",
                "term" => $term,
                "page" => $page,
                "products" => $query->paginate(10)
            ]);
    }

}

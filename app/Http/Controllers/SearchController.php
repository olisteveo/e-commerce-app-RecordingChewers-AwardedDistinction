<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function products(Request $request, $_term=null){
        $term = is_null($_term)
            ? $request->get("term")
            : $_term;
        $query = \App\Models\Product::search($term);
        $title = 'Products';
        $page = \App\Models\Page::where("title", $title)
                                ->first();
        return view('search.products_results')
            ->with([
                "term" => $term,
                "page" => $page,
                "results" => $query->paginate(15)
            ]);
    }

    public function artists(Request $request, $_term=null){
        $term = is_null($_term)
            ? $request->get("term")
            : $_term;
        $query = \App\Models\Artistprofile::search($term);
        $title = 'Artists';
        $page = \App\Models\Page::where("title", $title)
                                ->first();
        return view('search.artists_results')
            ->with([
                "term" => $term,
                "page" => $page,
                "results" => $query->paginate(5)
            ]);
    }
}

<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchOrdersController extends Controller
{
    public function orders(Request $request, $_term=null){
        $term = is_null($_term)
            ? $request->get("term")
            : $_term;
        $query = \App\Models\Order::search($term);
        $title = 'Orders';
        $page = \App\Models\Page::where("title", $title)
                                ->first();
        return view('dashboard.orders.list')
            ->with([
                "term" => $term,
                "page" => $page,
                "results" => $query->paginate(5)
            ]);
    }

}

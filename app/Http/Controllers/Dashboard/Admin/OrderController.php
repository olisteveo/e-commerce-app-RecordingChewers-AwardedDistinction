<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a list of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $_term=null)
    {
        $term = is_null($_term)
            ? $request->get("term")
            : $_term;
        $query = \App\Models\Order::search($term);
        return View('dashboard.admin.orders.list')->with([
            "term" => $term,
            "title"     => "Manage Orders",
            "orders" => $query->paginate(5)
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->load(["product.supplier", "user"]);
        return View('dashboard.admin.orders.view')->with([
            "title" => "Order View",
            "user"      => $order->user,
            "order" => $order
        ]);
    }
}

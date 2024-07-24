<?php
namespace App\Http\Controllers;
use App\Models\Order;

class OrderController extends Controller
{

    protected $page_title = 'Orders';


    public function index()
    {
        $orders = Order::query()
        ->with("product.supplier")
        ->where("user_id", auth()->user()->id)
        ->orderBy("created_at", "desc")
        ->paginate(4);
        // determine which view based on orders or not
        $view = $orders->count() ? 'orders.history_list' : 'orders.no_history';
        return view($view)->with([
            "title"  => $this->page_title,
            "orders" => $orders
        ]);
    }

    public function view(Order $order)
    {
        $order->load("product.supplier");
        return view('orders.view')->with([

            "order"    => $order,
            "user"      => auth()->user(),
            "title"     => $this->page_title
        ]);
    }
}

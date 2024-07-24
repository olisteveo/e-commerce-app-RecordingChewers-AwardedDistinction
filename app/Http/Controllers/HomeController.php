<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = User::where('id', Auth::user()->id)
        //             ->with("orders")->first();
        //             dump(Auth::user());
        //             dump($user);
        //             //->firstOrFail();
        // dump($user->orders);
        // $order = new Order;
        // $order->DateTime = now();
        // $user->orders()->save($order);
        return view('home');
    }
}

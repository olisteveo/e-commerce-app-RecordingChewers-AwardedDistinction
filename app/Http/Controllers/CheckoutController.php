<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class CheckoutController extends Controller
{
    protected $qty = 1;
    public function stripeCheckout(Product $product){
        $item_price_pence = (int) ($product->retail_price * 100);
        $sub_total_amount = $item_price_pence * $this->qty;
        Stripe::setApiKey(env("STRIPE_SECRET"));
        $checkout_session = Session::create([
            'line_items' => [[
                "price_data"    => [
                    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                        'unit_amount' => $sub_total_amount,
                        "currency"  => env("CASHIER_CURRENCY"),
                        "product_data"  => [
                            "name"  => "{$product->artist_name} - {$product->product_name}"
                        ]
                ],
                'quantity' => $this->qty,
            ]],
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'success_url' => env("APP_URL") . 'checkout/' . $product->id . '/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => env("APP_URL") . 'checkout/' . $product->id . '/cancel',
            "payment_intent_data"   => [
                "setup_future_usage"    => "off_session",
                "capture_method"    => "automatic"
            ]
          ]);
          return redirect($checkout_session->url, 303);
    }

    public function success(Product $product, Request $request){
        if(!$request->has("session_id")) {
            return abort(404);
        }
        Stripe::setApiKey(env("STRIPE_SECRET"));
        $stripe_session = Session::retrieve($request->get("session_id"));
        $order = Order::firstOrCreate([
            "transaction_id" => $stripe_session->payment_intent,
        ], [
            "user_id"   => auth()->user()->id,
            "transaction_id" => $stripe_session->payment_intent,
            "product_id"    => $product->id,
            "quantity"  => $this->qty,
            "subtotal"  => floatval($stripe_session->amount_subtotal / 100)
        ]);
        $order->save();
        $product->stock--;
        $product->save();
        return view("checkout.success")->with([
            "order" => $order,
            "product" => $product
        ]);
    }

    public function cancel(Product $product){
        return redirect(route("product.view", $product))->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Transaction Cancelled</div>');
    }
}

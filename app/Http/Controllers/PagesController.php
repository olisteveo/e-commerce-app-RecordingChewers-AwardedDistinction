<?php

// -------------- command to create controller: php artisan make:controller name/controller ------------

// First step in creating Laravel App
// Create controller or model/ order doesnt matter
// The controller gives behaviour to the app

namespace App\Http\Controllers;

//bring in the request library to handle requests
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Page;

class PagesController extends Controller
{
    // inside the controller we define functions
    public function index(){
        $title = 'Welcome to ' . config('app.name');
        $blade = 'pages.index';
        $hot_products = Product::getHot(5);
        $you_better_fix_this = function ($product, $key) {
            // dump(count($product['orders']) * $product->orders->sum('quantity'));
            return count($product['orders']) * $product->orders->sum('quantity');
        };
        return $this->getPageContent($title, $blade)->with(["hot_products" => $hot_products, "hot_prod_sort" => $you_better_fix_this]);
    }

    /**
     * This private function gets the page content from the database based on the page title.
     * The blade is the view/layout template to use to generate the page response
     *
     * @param string $title The page title to get the page conetnt for.
     * @param string $blade The blade view template to use to generate the response.
     * @return View
     */
    private function getPageContent($title, $blade)
    {
        return view($blade)->with(["page" => Page::where("title", $title)->first()]);
    }

    public function about(){
        return view('pages.about')->with(["page" => Page::contentFromName("about-us")]);
    }

    public function register(){
        $title = 'Register';
        return view('pages.register', compact('title'));
    }

    public function login(){
        $title = 'Login';
        return view('pages.login', compact('title'));
    }


    public function contact(){
        return view('pages.contact')->with(["page" => Page::contentFromName("contact-us")]);
    }


    public function upload(){
        return view('pages.upload')->with([
            "page" => Page::contentFromName("sample-upload"),
            "user" => auth()->user()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{

    protected $page_title = 'Upload';

    public function artist_upload()
    {
        dump(auth()->user());
        return view('pages.upload')->with([
            "title"     => $this->page_title
        ]);
    }
}


//     public function index()
//     {
//         // just choose the recipes by randomly determining an author id
//         return view('pages.recipes')->with([
//             "author"    => \App\Models\Author::getAuthor4User(rand(1, 20)),
//             "title"     => $this->page_title
//         ]);
//     }
// }

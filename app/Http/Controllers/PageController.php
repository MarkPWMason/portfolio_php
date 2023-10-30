<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homePage()
    {
        $posts = post::all();
        //foreach post
        //$post->skills and foreach through and $post->images and foreach through

        return view('home')->with('posts', $posts);
    }

    public function adminPage()
    {
        return view('admin');
    }

    public function createPost()
    {
        return view('create-post');
    }

    public function contactMe()
    {
        return view('contact-me');
    }
}

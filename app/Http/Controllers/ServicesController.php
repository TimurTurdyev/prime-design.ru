<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Post;

class ServicesController extends Controller
{
    public function index()
    {
        $category = Category::where('type', '=', 'services')->where('slug', '=', 'services')->orderBy('sort_order', 'asc')->firstOrFail();

        return view('services.index', compact('category'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();

        if (!$post || !$post->category) {
            return redirect()->route('services');
        }

        $previous = Post::where('category_id', '=', $post->category_id)->where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $next = Post::where('category_id', '=', $post->category_id)->where('id', '>', $post->id)->orderBy('id')->first();

        return view('services.post', compact('post', 'previous', 'next'));
    }
}

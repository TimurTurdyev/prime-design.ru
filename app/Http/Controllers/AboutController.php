<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Post;

class AboutController extends Controller
{
    public function index()
    {
        $category = Category::where('type', '=', 'about')->where('slug', '=', 'about')->firstOrFail();
        return view('about.index', compact('category'));
    }

    public function show($slug)
    {

        $category = Category::where('type', '=', 'about')->where('slug', $slug)->first();
        if (!$category) {
            return redirect()->route('about');
        }
        $parent = Category::where('type', '=', 'about')->where('slug', '=', 'about')->firstOrFail();

        return view('about.category', compact('category', 'parent'));
    }

    public function product($slug, $child_slug)
    {
        $post = Post::where('slug', '=', $child_slug)->first();

        if (!$post || !$post->category) {
            return redirect()->route('about');
        }

        $previous = Post::where('category_id', '=', $post->category_id)->where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $next = Post::where('category_id', '=', $post->category_id)->where('id', '>', $post->id)->orderBy('id')->first();

        return view('about.post', compact('post', 'previous', 'next'));
    }
}

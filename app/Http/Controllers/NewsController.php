<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Post;

class NewsController extends Controller
{
    public function index()
    {
        $category = Category::where('type', '=', 'blog')->where('slug', 'blog')->firstOrFail();
        return view('blog.index', compact('category'));
    }

    public function show($slug)
    {
        $category = Category::where('type', 'blog')->where('slug', $slug)->first();
        if (!$category) {
            return redirect()->route('blog');
        }

        return view('blog.index', compact('category'));
    }

    public function post($child_slug)
    {
        $post = Post::where('slug', $child_slug)->first();

        if (!$post || !$post->category) {
            return redirect()->route('blog');
        }
        $previous = Post::where('category_id', '=', $post->category_id)->where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $next = Post::where('category_id', '=', $post->category_id)->where('id', '>', $post->id)->orderBy('id')->first();

        return view('blog.post', compact('post', 'previous', 'next'));
    }
}

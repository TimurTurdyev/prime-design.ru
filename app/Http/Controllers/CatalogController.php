<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Post;

class CatalogController extends Controller
{
    public function index()
    {
        $category = Category::where('type', 'catalog')->where('slug', 'catalog')->firstOrFail();
        $categories = Category::where('type', 'catalog')->where('slug', '!=', 'catalog')->orderBy('sort_order', 'asc')->get();
        return view('catalog.index', compact('category', 'categories'));
    }

    public function show($slug)
    {

        $category = Category::where('type', 'catalog')->where('slug', $slug)->first();

        if (!$category) {
            return redirect()->route('catalog');
        }
        //dd($category);
        return view('catalog.category', compact('category'));
    }

    public function product($slug, $child_slug)
    {
        $post = Post::where('slug', $child_slug)->first();

        if (!$post || !$post->category) {
            return redirect()->route('catalog');
        }

        $previous = Post::where('category_id', '=', $post->category_id)->where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $next = Post::where('category_id', '=', $post->category_id)->where('id', '>', $post->id)->orderBy('id')->first();

        return view('catalog.product', compact('post', 'previous', 'next'));
    }
}

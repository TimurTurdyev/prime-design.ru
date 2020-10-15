<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Post;
use App\Model\PostImage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::orderBy('category_id', 'asc')->orderBy('sort_order', 'asc')->paginate(30);
        $categories = Category::all();

        return view('auth.post.list', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::all();

        return view('auth.post.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = [
            'name' => 'required|max:128',
            'title' => 'required|max:255',
            'h1' => 'nullable|string',
            'sub_h1' => 'nullable|string',
            'description' => 'required|max:255',
            'body' => 'required',
            'slug' => 'required|max:255|unique:posts',
            'category_id' => 'nullable|numeric',
            'sort_order' => 'integer|min:0|max:999',
        ];

        $data = $request->validate($validatedData);

        if ($request->image) {
            $image_path = $request->image->getClientOriginalName();
            $request->image->move(public_path('images/post/'), $image_path);
            $data['image'] = 'images/post/' . $image_path;
        }

        if ($request->icons) {
            foreach ($request->icons as $key => $icon) {
                $icon_path = $icon->getClientOriginalName();
                $icon->move(public_path('images/post/icons/'), $icon_path);
                $data['icons'][$key] = 'images/post/icons/' . $icon_path;
            }
        }

        $post = Post::create($data);

        if ($request->images) {
            foreach ($request->images as $image) {
                $image_path = $image->getClientOriginalName();
                $image->move(public_path('images/post/'), $image_path);
                PostImage::create([
                    'post_id' => $post->id,
                    'image' => 'images/post/' . $image_path
                ]);
            }
        }
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('auth.post.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validatedData = [
            'category_id' => 'nullable|numeric',
            'name' => 'required|max:128',
            'title' => 'required|max:255',
            'h1' => 'nullable|string',
            'sub_h1' => 'nullable|string',
            'description' => 'required|max:255',
            'body' => 'required',
            'slug' => 'required|max:255|unique:posts,id,' . $id,
            'sort_order' => 'integer|min:0|max:999',
        ];

        $data = $request->validate($validatedData);

        $files = $request->allFiles();

        if (!empty($files['image'])) {
            $image_path = $files['image']->getClientOriginalName();
            $files['image']->move(public_path('images/post/'), $image_path);
            $data['image'] = 'images/post/' . $image_path;
        } else if ($request->image) {
            $data['image'] = $request->image;
        } else {
            $data['image'] = '';
        }

        PostImage::where('post_id', $id)->delete();

        if (!empty($files['images'])) {
            foreach ($files['images'] as $image) {
                $image_path = $image->getClientOriginalName();
                $image->move(public_path('images/post/'), $image_path);
                PostImage::create([
                    'post_id' => $id,
                    'image' => 'images/post/' . $image_path
                ]);
            }
        } else if ($request->images) {
            foreach ($request->images as $image) {
                PostImage::create([
                    'post_id' => $id,
                    'image' => $image
                ]);
            }
        }

        $data['icons'] = array();

        if (!empty($files['icons'])) {
            foreach ($files['icons'] as $key => $icon) {
                $icon_path = $icon->getClientOriginalName();
                $icon->move(public_path('images/post/icons/'), $icon_path);
                $data['icons'][$key] = 'images/post/icons/' . $icon_path;
            }
        } else if ($request->icons) {
            foreach ($request->icons as $key => $icon) {
                $data['icons'][$key] = $icon;
            }
        }

        Post::where('id', $id)->update($data);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Post::destroy($id);
        PostImage::where('post_id', $id)->delete();

        return redirect()->route('post.index');
    }
}

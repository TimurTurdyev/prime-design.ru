<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class CategoryController extends Controller
{
    private $category_type = ['about', 'catalog', 'services', 'portfolio', 'blog', ];

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::orderBy('type', 'asc')->orderBy('sort_order', 'asc')->paginate(30);

        return view('auth.category.list', [
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
        return view('auth.category.create', [
            'category_type' => $this->category_type,
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
            'type' => 'required|max:64',
            'name' => 'required|max:128',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'body' => 'string|nullable',
            'slug' => 'required|max:255|unique:categories',
            'sort_order' => 'integer|min:0|max:999',
        ];

        $data = $request->validate($validatedData);

        if ($request->image) {
            $image_path = $request->image->getClientOriginalName();
            $request->image->move(public_path('images/category/'), $image_path);
            $data['image'] = 'images/category/' . $image_path;
        }

        Category::create($data);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return void
     */
    public function show($id)
    {
        dd($id);
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
        $category = Category::find($id);

        return view('auth.category.edit', [
            'category_type' => $this->category_type,
            'category' => $category,
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
            'type' => 'string|max:64|nullable',
            'name' => 'required|max:128',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'body' => 'string|nullable',
            'slug' => 'required|max:255|unique:categories,id,' . $id,
            'sort_order' => 'integer|min:0|max:999',
        ];

        $data = $request->validate($validatedData);

        if ($request->image) {
            $image_path = $request->image->getClientOriginalName();
            $request->image->move(public_path('images/category/'), $image_path);
            $data['image'] = 'images/category/' . $image_path;
        }

        Category::where('id', $id)->update($data);

        return redirect()->route('category.index');
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
        Category::destroy($id);

        return redirect()->route('category.index');
    }
}

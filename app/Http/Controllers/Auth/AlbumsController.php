<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Album;
use App\Model\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AlbumsController extends Controller
{

    public function index()
    {
        $albums = Album::with('Photos')->get();
        return view('auth.album.index', compact('albums'));
    }

    public function edit($id)
    {
        $album = Album::with('Photos')->find($id);
        return view('auth.album.edit', compact('album'));
    }

    public function show($id)
    {
        $album = Album::with('Photos')->find($id);
        return view('auth.album.album', compact('album'));
    }

    public function create()
    {
        return view('auth.album.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'required|image'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('album.create')
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('cover_image');
        $random_name = str_random(8);

        $extension = $file->getClientOriginalExtension();
        $filename = $random_name . '_cover.' . $extension;

        $album = Album::create(array(
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $filename,
        ));


        $uploadSuccess = $request->file('cover_image')
            ->move(public_path('images/albums/' . $album->id . '/'), $filename);

        return Redirect::route('album.show', $album->id);
    }

    public function update($id, Request $request)
    {
        Album::where('id', $id)->update(array(
            'name' => $request->name,
            'description' => $request->description
        ));

        return Redirect::route('album.show', $id);
    }


    public function destroy($id)
    {
        Album::destroy($id);
        return Redirect::route('album.index');
    }

    public function addImageForm($id)
    {
        $album = Album::find($id);
        return view('auth.album.add_images', compact('album'));
    }

    public function addImageToAlbum($id, Request $request)
    {
        $album = Album::find($id);

        $rules = array(
            'description' => 'required',
            'image' => 'required|image'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('album.show', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('image');
        $random_name = str_random(8);

        $extension = $file->getClientOriginalExtension();
        $filename = $random_name . '_photo.' . $extension;

        $uploadSuccess = $request->file('image')
            ->move(public_path('images/albums/' . $id . '/'), $filename);

        $image = Images::create(array(
            'album_id' => $id,
            'description' => $request->description,
            'image' => $filename,
        ));
        return Redirect::route('album.show', $id);
    }

    public function deleteImageToAlbum($id, Request $request)
    {
        $image = Images::find($id);
        $image->delete();
        return Redirect::route('album.show', $request->album_id);
    }
}

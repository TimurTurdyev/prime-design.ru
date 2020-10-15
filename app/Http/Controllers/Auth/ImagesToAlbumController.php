<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Album;
use App\Model\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ImagesToAlbumController extends Controller
{

    public function index()
    {
        $albums = Album::with('Photos')->get();
        return view('auth.album.index', compact('albums'));
    }

    public function edit($id)
    {
        $album = Album::with('Photos')->find($id);
        return view('auth.album.album', compact('album'));
    }

    public function show()
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
            return Redirect::route('album_form')
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

        return Redirect::route('show_album', array('id' => $album->id));
    }

    public function update(Request $request)
    {
        $album = Album::find($request->id);
        $album->name = $request->name;
        $album->description = $request->description;
        $album->save();

        return Redirect::route('show_album', array('id' => $request->id));
    }


    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();
        return Redirect::route('album_index');
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
            return Redirect::route('album_image_form', ['id' => $id])
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
        return Redirect::route('show_album', array('id' => $id));
    }

    public function deleteImageToAlbum($id, Request $request)
    {
        $image = Images::find($id);
        $image->delete();
        return Redirect::route('show_album', array('id' => $request->album_id));
    }
}

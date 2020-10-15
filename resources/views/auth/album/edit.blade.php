@extends('layouts.admin_app')

@section('content')
    <div class="container" style="text-align: center;">
        <div class="span4" style="display: inline-block;margin-top:100px;">
            <form name="createnewalbum" method="POST" action="{{route('album.update', $album->id)}}"
                  enctype="multipart/form-data">
                @method('PUT')
                @CSRF
                <fieldset>
                    <legend>Update an Album</legend>
                    <div class="form-group">
                        <label for="name">Album Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Album Name"
                               value="{{$album->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="description">Album Description</label>
                        <textarea name="description" type="text" class="form-control"
                                  placeholder="Albumdescription">{{$album->description}}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                    <hr>
                    <img class="img-thumbnail" alt="{{$album->name}}"
                         src="/images/albums/{{$album->id}}/{{$album->cover_image}}" width="350px">
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="cover_image">Select a Cover Image</label>
                        {{Form::file('cover_image')}}
                    </div>
                    @error('cover_image')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                    <button type="submit" class="btn btn-success">Update!</button>
                </fieldset>
            </form>
        </div>
    </div> <!-- /container -->
@endsection

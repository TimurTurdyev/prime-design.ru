@extends('layouts.admin_app')

@section('content')
    <div class="container" style="text-align: center;">
        <div class="span4" style="display: inline-block;margin-top:100px;">
            <form method="POST" action="{{route('add_image_to_album', ['id'=> $album->id])}}"
                  enctype="multipart/form-data">
                @csrf
                <h5>{{$album->name}}</h5>
                <fieldset>
                    <div class="form-group">
                        <label for="description">Imag Description</label>
                        <textarea name="description" type="text" class="form-control"
                                  placeholder="Image Description">{{old('description')}}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="cover_image">Select a Cover Image</label>
                        {{Form::file('image')}}
                    </div>
                    @error('image')
                    <div class="alert alert-danger mt-1">{{$message}}</div>
                    @enderror
                    <button type="submit" class="btn btn-success">Add!</button>
                </fieldset>
            </form>
        </div>
    </div> <!-- /container -->
@endsection

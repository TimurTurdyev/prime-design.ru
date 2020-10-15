@extends('layouts.admin_app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="starter-template">
                    <div class="media">
                        <img class="align-self-start mr-3 img-thumbnail" alt="{{$album->name}}"
                             src="/images/albums/{{$album->id}}/{{$album->cover_image}}" width="350px">
                        <div class="media-body">
                            <h5>{{$album->name}}</h5>
                            <div style="height:8rem; overflow-y: auto;">
                                {{$album->description}}
                            </div>
                            <hr>
                            <p>
                                <a href="{{route('album_image_form', ['id'=> $album->id ])}}"
                                   class="btn btn-primary btn-large">
                                    Add New Image to Album
                                </a>
                                <a href="{{route('album.edit', $album->id)}}" class="btn btn-success btn-large">
                                    Edit Album
                                </a>
                                <a href="{{route('album.destroy', $album->id)}}"
                                   onclick="return confirm('Are yousure?')">
                                    <button type="button" class="btn btn-danger btn-large">Delete Album</button>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach($album->Photos as $photo)
                        <div class="col-lg-3">
                            <div class="thumbnail" style="max-height: 350px;min-height: 350px;">
                                <img alt="{{$album->name}}" src="/images/albums/{{$album->id}}/{{$photo->image}}"
                                     class="img-thumbnail">
                                <div class="caption">
                                    <p>{{$photo->description}}</p>
                                    <p>
                                    <p>Created date: {{ date("d F Y",strtotime($photo->created_at)) }}
                                        at {{ date("g:ha",strtotime($photo->created_at)) }}</p></p>
                                    <a href="{{ route('delete_image_to_album', ['id'=>$photo->id, 'album_id' => $album->id]) }}"
                                       onclick="return confirm('Are you sure?')">
                                        <button type="button" class="btn btn-danger btn-sm">Delete Image</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

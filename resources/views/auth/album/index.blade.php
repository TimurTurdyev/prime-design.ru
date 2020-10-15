@extends('layouts.admin_app')

@section('content')
    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Создать альбом</h4>
                </div>
                <div class="card-body">
                    <a href="{{route('album.create')}}" class="btn btn-lg btn-block btn-outline-primary">Add +</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($albums as $album)
                <div class="col-lg-3">
                    <div class="card mb-4">
                        <img src="/images/albums/{{$album->id}}/{{$album->cover_image}}" class="card-img-top"
                             alt="{{$album->name}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$album->name}}</h5>
                            <p class="card-text">
                                {!! str_limit(strip_tags($album->description), $limit = 50, $end = '...') !!}
                            </p>
                            <p class="card-text">
                                {{count($album->Photos)}} image(s). /
                                Created date: {{ date("d F Y",strtotime($album->created_at)) }}
                                at {{date("g:ha",strtotime($album->created_at)) }}
                            </p>
                            <a href="{{route('album.show', $album->id)}}" class="btn btn-primary">Edit /
                                Show</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

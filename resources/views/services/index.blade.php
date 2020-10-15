@extends('layouts.catalog')
@section('title', 'Архитектурное проектирование и дизайн интерьера')
@section('styles')
    <link rel="stylesheet" href="{{asset('custom_catalog')}}/css/services.css" data-inprogress="">
@endsection
@section('content')
    <div class="bread-crumbs">
        <ul>
            <li><a href="/">Главная</a></li>
            <li>|</li>
            <li><span>{{$category->name}}</span></li>
        </ul>
    </div>
    <section class="section section-services">
        <div class="section-body">
            <div class="heading">
                <h2>{{$category->name}}</h2>
            </div>
            <div class="list">
                @foreach($category->posts()->get() as $post)
                    <div class="list-item">
                        <a href="{{url($post->category->slug, $post->slug)}}" class="page-link"></a>
                        @foreach($post->icons as $attr_class => $icon)
                            <img src="{{asset($icon)}}" class="{{$attr_class}}">
                        @endforeach
                        <span class="title">
                               {{$post->name}}
                            </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
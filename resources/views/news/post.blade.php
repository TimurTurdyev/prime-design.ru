@extends('layouts.catalog')
@section('title', 'Prime Wood: эргономичная мебель для современного офиса')
@section('styles')
    <link rel="stylesheet" href="{{asset('custom_catalog')}}/css/news-page.css" data-inprogress="">
@endsection
@section('content')
    <div class="container">
        <div class="bread-crumbs">
            <ul>
                <li><a href="{{url('/')}}">Главная</a></li>
                <li>|</li>
                <li><a href="{{url('news', $post->category->slug)}}">{{$post->category->name}}</a></li>
                <li>|</li>
                <li>
                    <span>{{$post->name}}</span>
                </li>
            </ul>
        </div>
    </div>

    <section class="section section-news">
        <div class="container">
            <article>
                @if($post->created_at)
                    <span class="date">{{$post->created_at->format('d.m.Y')}}</span>
                @endif
                @if($post->image)
                    <img src="{{asset($post->image)}}" class="image" alt="{{$post->name}}">
                @endif
                <h4>{{$post->name}}</h4>
                <p class="description">
                    {{ $post->description }}
                </p>
                <p>
                    {!! $post->body !!}
                </p>
                <img src="{{asset('custom_catalog')}}/img/news-2.jpg" class="image-bottom" alt="">
                <img src="{{asset('custom_catalog')}}/img/news-3.jpg" class="image-small" alt="">
                @if($next)
                    <div class="action">
                        <span>следующая новость</span>
                        <a href="{{url('news', [$post->category->slug, $next->slug])}}"
                           class="arrow icon-right-open"></a>
                    </div>
                @endif
            </article>
        </div>
    </section>
@endsection

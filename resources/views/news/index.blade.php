@extends('layouts.catalog')
@section('title', 'Новости')
@section('styles')
    <link rel="stylesheet" href="{{asset('custom_catalog')}}/css/news.css" data-inprogress="">
@endsection
@section('script')
    <script src="{{asset('custom_catalog')}}/js/jquery.matchHeight.js"></script>
    <script src="{{asset('custom_catalog')}}/js/news.min.js"></script>
@endsection
@section('content')
    <div class="bread-crumbs">
        <ul>
            <li><a href="/">Главная</a></li>
            <li>|</li>
            <li>
                <span>{{$category->name}}</span>
            </li>
        </ul>
    </div>
    <section class="section section-news">
        <div class="section-body">
            <div class="heading">
                <h2>{{$category->name}}</h2>
                {!! $category->body !!}
            </div>
            <div class="list slider">
                @foreach($category->posts()->get() as $post)
                    <div class="list-item">
                        @if($post->created_at)
                            <span class="date">{{$post->created_at->format('d.m.Y')}}</span>
                        @endif
                        @if($post->image)
                            <div class="item-image">
                                <a href="{{url('news', [$post->category->slug, $post->slug])}}" class="page-link"></a>
                                <img src="{{asset($post->image)}}" alt="{{$post->name}}">
                            </div>
                        @endif
                        <div class="item-content">
                            <h4>{{$post->name}}
                                <a href="{{url('news', [$post->category->slug, $post->slug])}}" class="page-link"></a>
                            </h4>
                            <p>
                                {{Str::limit($post->description, 120)}}...
                            </p>
                        </div>
                        <div class="action">
                            <a href="{{url('news', [$post->category->slug, $post->slug])}}" class="btn">Читать
                                <i class="icon-left-arrow"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="holder-btn"></div>
        </div>
    </section>
@endsection



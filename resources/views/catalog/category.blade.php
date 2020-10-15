@extends('layouts.catalog')
@section('title', $category->title)
@section('description', $category->description)
@section('styles')
    <link rel="stylesheet" href="{{asset('custom_catalog')}}/css/catalog.css">
@endsection
@section('script')
    <script src="{{asset('custom_catalog')}}/js/catalog.min.js"></script>
@endsection
@section('content')
    <div class="bread-crumbs">
        <ul>
            <li><a href="/">Главная</a></li>
            <li>|</li>
            <li><a href="{{route('catalog')}}">Продукты</a></li>
            <li>|</li>
            <li><span>{{$category->name}}</span></li>
        </ul>
    </div>

    <section class="section section-catalog">
        <div class="section-body">
            <div class="heading">
                <h2>{{$category->name}}</h2>
                {!! $category->body !!}
            </div>

            <div class="list slider-catalog">
                @foreach($category->posts()->get() as $post)
                    <div class="list-item">
                        <div class="item-image">
                            <img src="{{asset($post->image)}}" alt="{{$post->name}}">
                            <a href="{{url('catalog', [$post->category->slug, $post->slug])}}" class="page-link"></a>
                        </div>
                        <div class="item-title">
                            <span>{{$post->name}}<a href="{{url('catalog', [$post->category->slug, $post->slug])}}" class="page-link"></a></span>
                            <a href="{{url('catalog', [$post->category->slug, $post->slug])}}">Подробнее</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="holder-btn"></div>
    </section>

@endsection

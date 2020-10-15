@extends('layouts.catalog')
@section('title', 'Архитектурное проектирование и дизайн интерьера')
@section('styles')
    <link rel="stylesheet" href="{{asset('custom_catalog')}}/css/service-page.css" data-inprogress="">
@endsection
@section('script')
    <script src="{{asset('custom_catalog')}}/js/jquery.matchHeight.js"></script>
    <script src="{{asset('custom_catalog')}}/js/service-page.min.js"></script>
@endsection
@section('content')
    <div class="bread-crumbs">
        <ul>
            <li><a href="/">Главная</a></li>
            <li>|</li>
            <li><a href="{{url($post->category->slug)}}">{{$post->category->name}}</a></li>
            <li>|</li>
            <li><span>{{$post->name}}</span></li>
        </ul>
    </div>

    <section class="section section-services">
        <div class="section-body">
            <div class="heading">
                <h2>{{$post->name}}</h2>
            </div>
            <div class="holder-btn" id="holder-btn"></div>
            <div class="list slider-nav">
                <div class="list-item">
                    @foreach($post->icons as $attr_class => $icon)
                        <img src="{{asset($icon)}}" class="{{$attr_class}}">
                    @endforeach
                    <span class="title">{{$post->name}}</span>
                </div>
                    @foreach($post->category->posts as $item)
                        @continue($post->id === $item->id)
                        <div class="list-item">
                            @foreach($item->icons as $attr_class => $icon)
                                <img src="{{asset($icon)}}" class="{{$attr_class}}">
                            @endforeach
                            <span class="title">{{$item->name}}</span>
                        </div>
                    @endforeach
            </div>
            <div class="slider-for">
                <div class="item">
                    <div class="image">
                        <img src="{{asset($post->image)}}" alt="{{$post->name}}">
                    </div>
                    <div class="content">
                        {!! $post->body !!}
                        <div class="action">
                            <a href="#" class="btn request">Оставить заявку<i class="icon-left-arrow"></i></a>
                        </div>
                    </div>
                </div>
                    @foreach($post->category->posts as $item)
                        @continue($post->id === $item->id)
                        <div class="item">
                            <div class="image">
                                <img src="{{asset($item->image)}}">
                            </div>
                            <div class="content">
                                {!! $item->body !!}
                                <div class="action">
                                    <a href="#" class="btn request">Оставить заявку<i class="icon-left-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

            </div>
        </div>
    </section>
@endsection

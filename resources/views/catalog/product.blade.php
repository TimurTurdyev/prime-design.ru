@extends('layouts.catalog')
@section('title', $post->title)
@section('description', $post->description)
@section('styles')
    <link rel="stylesheet" href="{{asset('custom_catalog')}}/css/catalog-category.css">
@endsection
@section('script')
    <script src="{{asset('custom_catalog')}}/js/catalog-category.min.js"></script>
@endsection
@section('content')
    <div class="bread-crumbs">
        <ul>
            <li><a href="index.html">Главная</a></li>
            <li>|</li>
            <li><a href="{{url('catalog')}}">Продукты</a></li>
            <li>|</li>
            <li><a href="{{url('catalog', $post->category->slug)}}">{{$post->category->name}}</a></li>
            <li>|</li>
            <li><span>{{$post->name}}</span></li>
        </ul>
    </div>

    <section class="section section-catalog">
        <div class="section-body">
            @if($previous or $next)
                <div class="holder-btn" id="holder-btn">
                    @if($previous)
                        <a href="{{url('catalog', [$post->category->slug, $previous->slug])}}"
                           id="prev-01" class="btn-arrow prev slick-arrow" style="display: flex;">
                            <i class="icon-up-open-1" aria-hidden="true"></i>
                        </a>
                    @endif
                    @if($next)
                        <a href="{{url('catalog', [$post->category->slug, $next->slug])}}"
                           id="next-01" class="btn-arrow next slick-arrow" style="display: flex;">
                            <i class="icon-down-open-1" aria-hidden="true"></i>
                        </a>
                    @endif
                </div>
            @endif
            <div class="heading">
                <h2><span>1.</span> {{$post->name}}</h2>
            </div>
            <div class="list slider-catalog" id="slider-catalog">
                <div class="list-item">
                    <div class="item-content">
                        <!--<span>
                            этот первый текст должен быть обернут тегом span / потом удалить
                        </span> -->
                        {!! $post->body !!}
                    </div>
                    <div class="item-image">
                        <div class="slider-for">
                            @forelse($post->images as $image)
                                <img src="{{asset($image->image)}}" alt="">
                            @empty
                                <img src="{{asset($post->image)}}" alt="">
                            @endforelse
                        </div>
                        <div class="slider-nav">
                            @forelse($post->images as $image)
                                <img src="{{asset($image->image)}}" alt="">
                            @empty
                                <img src="{{asset($post->image)}}" alt="">
                            @endforelse
                        </div>
                        <div class="holder" id="holder"></div>
                    </div>
                    <div class="action">
                        <a href="#" class="btn request">Оставить заявку <i class="icon-left-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

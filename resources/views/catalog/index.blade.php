@extends('layouts.catalog')
@section('title', 'Продукты')
@section('description', 'Мета описание категории продуктов!')
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
                @foreach($categories as $category)
                    <div class="list-item">
                        <div class="item-image">
                            <img src="{{asset($category->image)}}" alt="{{$category->name}}">
                            <a href="{{url('catalog', [$category->slug])}}" class="page-link"></a>
                        </div>
                        <div class="item-title">
                            <span>{{$category->name}}<a href="{{url('catalog', [$category->slug])}}" class="page-link"></a></span>
                            <a href="{{url('catalog', [$category->slug])}}">Подробнее</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="holder-btn"></div>
    </section>

@endsection

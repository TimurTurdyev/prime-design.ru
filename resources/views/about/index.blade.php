@extends('layouts.catalog')
@section('title', $category->title)
@section('description', $category->description)
@section('styles')
    <link rel="stylesheet" href="{{asset('custom_catalog')}}/css/about.css">
@endsection
@section('content')
    <div class="container">
        <div class="bread-crumbs">
            <ul>
                <li><a href="/">Главная</a></li>
                <li>|</li>
                <li><span>{{$category->name}}</span></li>
            </ul>
        </div>
    </div>

    <section class="section section-about">
        <div class="container">
            <article>
                <img src="{{asset('custom_catalog')}}/img/about.jpg" class="image" alt="">
                {!! $category->body !!}
                <div class="about-image">
                    <img src="{{asset('custom_catalog')}}/img/about-3.jpg" class="image-small" alt="">
                    <img src="{{asset('custom_catalog')}}/img/about-2.jpg" class="image-bottom" alt="">
                </div>
            </article>
            <form class="form">
                <div class="form-row">
                    <div class="form-column">
                        <span class="eror">!</span>
                        <!-- за включение текста ошибки отвечает класс .active -->
                        <input required type="text" placeholder="Имя">
                    </div>
                    <div class="form-column">
                        <span class="eror">!</span>
                        <!-- за включение текста ошибки отвечает класс .active -->
                        <input required type="tel" class="only_number phone_mask" pattern="^[0-9-+s()]*$" name="tel"
                               placeholder="Телефон">
                    </div>
                </div>
                <div class="form-action">
                    <button class="btn reply">Оставить заявку <i class="icon-left-arrow"></i></button>
                </div>
            </form>
        </div>
    </section>

@endsection

@extends('layouts.catalog')
@section('title', $category->title)
@section('description', $category->description)
@section('styles')
    <link rel="stylesheet" href="{{asset('custom_catalog')}}/css/team.css">
@endsection
@section('script')
    <script src="{{asset('custom_catalog')}}/js/team.min.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="bread-crumbs">
            <ul>
                <li><a href="/">Главная</a></li>
                <li>|</li>
                <li><a href="{{url($parent->slug)}}">{{$parent->name}}</a></li>
                <li>|</li>
                <li><span>{{$category->name}}</span></li>
            </ul>
        </div>
    </div>

    <section class="section section-team">
        <div class="container">
            <img src="{{asset('custom_catalog')}}/img/team-bg.png" class="team-bg" alt="">
            <img src="{{asset('custom_catalog')}}/img/team-bg-dark.png" class="team-bg-dark" alt="">
            <img src="{{asset('custom_catalog')}}/img/team-mobile.png" class="team-mob" alt="">
            <img src="{{asset('custom_catalog')}}/img/team-mobile-dark.png" class="team-mobile-dark" alt="">
            <div class="heading">
                <h2>{{$category->name}}</h2>
                {!! $category->body !!}
            </div>
        </div>
        <div class="section-body">
            <div class="holder-btn"></div>
            <div class="list slider">
                <div class="list-item">
                    <span class="count">01</span>
                    <img src="{{asset('custom_catalog')}}/img/team/1leader.svg" class="white" alt="">
                    <img src="{{asset('custom_catalog')}}/img/team/1leaderdark.svg" class="black" alt="">
                    <span class="title">Технический директор</span>
                    <a href="javascript:void(0);" class="overlay">
                        <span class="count">01</span>
                        <div class="avatar">
                            <img src="{{asset('custom_catalog')}}/img/avatar.jpg" alt="">
                        </div>
                        <span class="title-hover">Технический директор</span>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        </p>
                    </a>
                </div>
                <div class="list-item">
                    <span class="count">02</span>
                    <img src="{{asset('custom_catalog')}}/img/team/2architect.svg" class="white" alt="">
                    <img src="{{asset('custom_catalog')}}/img/team/2architectdark.svg" class="black" alt="">
                    <span class="title">Архитектор</span>
                    <a href="javascript:void(0);" class="overlay">
                        <span class="count">02</span>
                        <div class="avatar">
                            <img src="{{asset('custom_catalog')}}/img/avatar.jpg" alt="">
                        </div>
                        <span class="title-hover">Архитектор</span>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        </p>
                    </a>
                </div>
                <div class="list-item">
                    <span class="count">03</span>
                    <img src="{{asset('custom_catalog')}}/img/team/3designer.svg" class="white" alt="">
                    <img src="{{asset('custom_catalog')}}/img/team/3designerdark.svg" class="black" alt="">
                    <span class="title">Дизайнер</span>
                    <a href="javascript:void(0);" class="overlay">
                        <span class="count">02</span>
                        <div class="avatar">
                            <img src="{{asset('custom_catalog')}}/img/avatar.jpg" alt="">
                        </div>
                        <span class="title-hover">Дизайнер</span>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        </p>
                    </a>
                </div>
                <div class="list-item">
                    <span class="count">04</span>
                    <img src="{{asset('custom_catalog')}}/img/team/4head-electician.svg" class="white" alt="">
                    <img src="{{asset('custom_catalog')}}/img/team/4head-electiciandark.svg" class="black" alt="">
                    <span class="title">Главный энергетик</span>
                    <a href="javascript:void(0);" class="overlay">
                        <span class="count">04</span>
                        <div class="avatar">
                            <img src="{{asset('custom_catalog')}}/img/avatar.jpg" alt="">
                        </div>
                        <span class="title-hover">Главный энергетик</span>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        </p>
                    </a>
                </div>
                <div class="list-item">
                    <span class="count">05</span>
                    <img src="{{asset('custom_catalog')}}/img/team/5design-engineer.svg" class="white" alt="">
                    <img src="{{asset('custom_catalog')}}/img/team/5design-engineerdark.svg" class="black" alt="">
                    <span class="title">Инженер проектировщик</span>
                    <a href="javascript:void(0);" class="overlay">
                        <span class="count">05</span>
                        <div class="avatar">
                            <img src="{{asset('custom_catalog')}}/img/avatar.jpg" alt="">
                        </div>
                        <span class="title-hover">Инженер проектировщик</span>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        </p>
                    </a>
                </div>
                <div class="list-item">
                    <span class="count">06</span>
                    <img src="{{asset('custom_catalog')}}/img/team/6foreman.svg" class="white" alt="">
                    <img src="{{asset('custom_catalog')}}/img/team/6foremandark.svg" class="black" alt="">
                    <span class="title">Архитектор</span>
                    <a href="javascript:void(0);" class="overlay">
                        <span class="count">06</span>
                        <div class="avatar">
                            <img src="{{asset('custom_catalog')}}/img/avatar.jpg" alt="">
                        </div>
                        <span class="title-hover">Архитектор</span>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        </p>
                    </a>
                </div>
                <div class="list-item">
                    <span class="count">07</span>
                    <img src="{{asset('custom_catalog')}}/img/team/7director.svg" class="white" alt="">
                    <img src="{{asset('custom_catalog')}}/img/team/7directordark.svg" class="black" alt="">
                    <span class="title">Архитектор</span>
                    <a href="javascript:void(0);" class="overlay">
                        <span class="count">07</span>
                        <div class="avatar">
                            <img src="{{asset('custom_catalog')}}/img/avatar.jpg" alt="">
                        </div>
                        <span class="title-hover">Архитектор</span>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        </p>
                    </a>
                </div>
                <div class="list-item">
                    <span class="count">08</span>
                    <img src="{{asset('custom_catalog')}}/img/team/8electrician.svg" class="white" alt="">
                    <img src="{{asset('custom_catalog')}}/img/team/8electriciandark.svg" class="black" alt="">
                    <span class="title">Архитектор</span>
                    <a href="javascript:void(0);" class="overlay">
                        <span class="count">08</span>
                        <div class="avatar">
                            <img src="{{asset('custom_catalog')}}/img/avatar.jpg" alt="">
                        </div>
                        <span class="title-hover">Архитектор</span>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        </p>
                    </a>
                </div>
                <div class="list-item">
                    <span class="count">09</span>
                    <img src="{{asset('custom_catalog')}}/img/team/9carpenter.svg" class="white" alt="">
                    <img src="{{asset('custom_catalog')}}/img/team/9carpenterdark.svg" class="black" alt="">
                    <span class="title">Архитектор</span>
                    <a href="javascript:void(0);" class="overlay">
                        <span class="count">09</span>
                        <div class="avatar">
                            <img src="{{asset('custom_catalog')}}/img/avatar.jpg" alt="">
                        </div>
                        <span class="title-hover">Архитектор</span>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        </p>
                    </a>
                </div>
            </div>
            <div class="action">
                <a class="btn request">Оставить заявку <i class="icon-left-arrow"></i></a>
            </div>
        </div>
    </section>

@endsection

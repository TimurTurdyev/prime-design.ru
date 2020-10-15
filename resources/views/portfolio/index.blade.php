@extends('layouts.catalog')
@section('title', 'Раздел портфолио')
@section('styles')
    <link rel="stylesheet" href="{{asset('custom_catalog')}}/css/portfolio.css" data-inprogress="">
@endsection
@section('script')
    <script src="{{asset('custom_catalog')}}/js/portfolio.min.js"></script>
@endsection
@section('content')
    <div class="bread-crumbs">
        <ul>
            <li><a href="/">Главная</a></li>
            <li>|</li>
            <li><span>Портфолио</span></li>
        </ul>
    </div>

    <section class="section section-portfolio">
        <div class="section-body">
            <div class="heading">
                <h2>Портфолио</h2>
            </div>
            <div class="list slider" id="portfolio-wrap">
                @foreach($albums as $album)
                    <div class="list-item">
                        <img src="{{asset('images/albums/' . $album->id . '/' . $album->cover_image)}}"
                             alt="{{$album->name}}">
                        <a href="javascript:void(0);" class="overlay popup-card popup-card" data-json='@json($album)'>
                            <span>{{$album->name}}</span>
                            <span class="arrow  icon-right-open"></span>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="holder-btn"></div>
        </div>
    </section>
    <div class="modall modall-card">
        <div class="modall-body">
            <div class="content">
                <span class="close"></span>
                <div id="modal-content"></div>
                <div class="action">
                    <a href="#" class="btn request">Оставить заявку <i class="icon-left-arrow"></i></a>
                </div>
            </div>
        </div>
    </div>
    <script type="modal/view" id="modal-view">

        <img src="{{asset('images/albums')}}/%id%/%cover_image%" alt="%name%">
        <div class="section-content">
            <div class="title">
                <h2>%name%</h2>
            </div>
            <div class="item-details">
                %description%
            </div>
        </div>

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function findReplace(template, data) {
                for (const key in data) {
                    const reg = new RegExp('%' + key + '%', 'gi');
                    if (data.hasOwnProperty(key)) {
                        template = template.replace(reg, data[key])
                    }
                }
                return template;
            }

            $('#portfolio-wrap').on('click', '.popup-card', function () {
                $('#modal-content').html($(findReplace($('#modal-view').text(), $(this).data('json'))));
            });
        });
    </script>
@endsection

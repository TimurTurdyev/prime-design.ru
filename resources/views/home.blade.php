@extends('layouts.catalog')
@section('title', 'Prime design - организация офисного пространства под ключ')
@section('styles')
    <link rel="stylesheet" href="{{asset('custom_catalog')}}/css/home.css" data-inprogress="">
@endsection
@section('script')
    <script src="{{asset('custom_catalog')}}/js/home.min.js"></script>
@endsection
@section('content')
    <section class="section section-hero">
        <div class="section-body">
            <div class="list-hero" id="carousel">
                <div class="item first-slide" data-materials="Prime design">
                    <img src="{{asset('custom_catalog')}}/img/img-3.jpg" class="descktop">
                    <img src="{{asset('custom_catalog')}}/img/img-mob-2.jpg" class="mobile">
                    <div class="item-content">
                        <div class="heading">
                            <h2>Prime Design - </h2>
                            <span>организация офисного пространства под ключ</span>
                            <p>
                                Избавьтесь от лишних хлопот по поискам подрядчиков, доверив офис Prime Design. Бесплатно
                                разработаем дизайн-проект и воплотим в ваши сроки с гарантией на 5 лет. Приступайте к
                                работе на следующий день после сдачи помещения.
                            </p>
                        </div>
                    </div>
                    <img src="{{asset('custom_catalog')}}/img/img-4.jpg" class="image-bg">
                    <form class="form">
                        @CSRF
                        <h3>Получить
                            <span>бесплатный</span>
                            <span>дизайн проект</span>
                        </h3>
                        <div class="form-row">
                            <div class="form-column">
                                <span class="eror">!</span>
                                <!-- за включение текста ошибки отвечает класс .active -->
                                <input required type="text" name="name" placeholder="Имя">
                            </div>
                            <div class="form-column">
                                <span class="eror">!</span>
                                <!-- за включение текста ошибки отвечает класс .active -->
                                <input required type="email" name="email" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="form-action">
                            <button class="btn reply">Получить <i class="icon-left-arrow"></i></button>
                        </div>
                    </form>
                </div>
                <div class="item last-slide" data-materials="наши преимущества">
                    <img src="{{asset('custom_catalog')}}/img/img-5.jpg" class="descktop">
                    <img src="{{asset('custom_catalog')}}/img/img-mob-4.jpg" class="mobile">
                    <div class="item-content">
                        <div class="heading">
                            <h2>Преимущества:</h2>
                        </div>
                        <div class="list">
                            <span>
                                <p>работаем</p>
                                24\7
                            </span>
                            <span>5 лет
                                <p>гарантии</p>
                            </span>
                            <span>250+
                                <p>клиентов</p>
                            </span>
                            <span>12 578
                                <p>суммарный метраж объектов </p>
                            </span>
                        </div>
                    </div>
                    <p class="text">
                        Лицензии и сертификаты СРО, МЧС, Минобороны, ФСБ Уникальное приложение (заказчик полностью
                        контролирует процесс стройки). Веб камеры, чат с рук-ем проекта, этапы стройки, бухгалтерские и
                        учетные документы, ветка обсуждения, связь с руководством.
                    </p>
                    <img src="{{asset('custom_catalog')}}/img/img-mob-5.jpg" class="image-bg-mob">
                    <img src="{{asset('custom_catalog')}}/img/img-6.png" class="image-bg">
                    <form class="form">
                        @CSRF
                        <div class="form-row">
                            <div class="form-column">
                                <span class="eror">!</span>
                                <!-- за включение текста ошибки отвечает класс .active -->
                                <input required type="text" name="name" placeholder="Имя">
                            </div>
                            <div class="form-column">
                                <span class="eror">!</span>
                                <!-- за включение текста ошибки отвечает класс .active -->
                                <input required type="tel" class="only_number phone_mask" name="phone"
                                       placeholder="Телефон">
                            </div>
                        </div>
                        <div class="form-action">
                            <button class="btn reply">Оставить заявку <i class="icon-left-arrow"></i></button>
                        </div>
                    </form>
                </div>
                <div class="item slide-three" data-materials="Команда проекта">
                    <img src="{{asset('custom_catalog')}}/img/img-2.jpg" class="descktop">
                    <img src="{{asset('custom_catalog')}}/img/img-mob.jpg" class="mobile">
                    <div class="item-content">
                        <div class="heading">
                            <h2>Команда проекта
                            </h2>
                            <span>Над каждым проектом работают:</span>
                        </div>
                        <ul>
                            <li>
                                <img src="{{asset('custom_catalog')}}/img/avatar.png">
                                <span>Технический директор</span>
                            </li>
                            <li>
                                <img src="{{asset('custom_catalog')}}/img/avatar.png">
                                <span>Проектировщик</span>
                            </li>
                            <li>
                                <img src="{{asset('custom_catalog')}}/img/avatar.png">
                                <span>Архитектор</span>
                            </li>
                            <li>
                                <img src="{{asset('custom_catalog')}}/img/avatar.png">
                                <span>Руководитель проекта</span>
                            </li>
                            <li>
                                <img src="{{asset('custom_catalog')}}/img/avatar.png">
                                <span>Дизайнер</span>
                            </li>
                            <li>
                                <img src="{{asset('custom_catalog')}}/img/avatar.png">
                                <span>Бригадир электромонтажников</span>
                            </li>
                            <li>
                                <img src="{{asset('custom_catalog')}}/img/avatar.png">
                                <span>Главный энергетик</span>
                            </li>
                            <li>
                                <img src="{{asset('custom_catalog')}}/img/avatar.png">
                                <span>Производитель работ</span>
                            </li>
                            <li>
                                <img src="{{asset('custom_catalog')}}/img/avatar.png">
                                <span>Инженер проектировщик</span>
                            </li>
                        </ul>
                    </div>
                    <img src="{{asset('custom_catalog')}}/img/img-1.jpg" class="image-bg">
                    <form class="form">
                        @CSRF
                        <div class="form-row">
                            <div class="form-column">
                                <span class="eror">!</span>
                                <!-- за включение текста ошибки отвечает класс .active -->
                                <input required name="name" type="text" placeholder="Имя">
                            </div>
                            <div class="form-column">
                                <span class="eror">!</span>
                                <!-- за включение текста ошибки отвечает класс .active -->
                                <input required type="tel" class="only_number phone_mask" name="phone"
                                       placeholder="Телефон">
                            </div>
                        </div>
                        <div class="form-action">
                            <button type="button" class="btn reply">Оставить заявку <i class="icon-left-arrow"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="slide-nav">
                <div class="pagingInfo">
                    <span>1</span>
                    <span>/</span>
                    <span>3</span>
                    <p class="slide-title">Prime design</p>
                </div>
                <div class="holder-btn"></div>
            </div>
        </div>
    </section>
@endsection

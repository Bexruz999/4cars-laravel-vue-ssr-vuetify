@extends('layouts.app')

{{--@section('metas')
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">
@endsection--}}

@section('content')
    <div class="container" style="margin-top: 45px;">

        <style>
            .sitemap-list {
                list-style: none;
                font-size: 22px;
            }
            .sitemap-list a{
                color: #000;
            }

            .sitemap-list a:hover{
                color: #0c63e4;
            }
        </style>

        <div class="row">
            <div class="col-3">
                <ul class="sitemap-list">
                    <h4>о компании</h4>
                    <li><a href="/">- Главная</a></li>
                    <li><a href="/contact-page">- Контакты</a></li>
                    <li><a href="/review-page">- Отзывы</a></li>
                    <li><a href="/news-page">- Статьи</a></li>
                    <li><a href="/about">- О нас</a></li>
                </ul>
            </div>
            <div class="col-3">
                <ul class="sitemap-list">
                    <h4>Трубный</h4>
                    <li><a href="/besshovnye-truby">- Бесшовные</a></li>
                    <li><a href="/elektrosvarnye-truby">- Электросварные</a></li>
                    <li><a href="/ocinkovannye-truby">- Оцинкованные</a></li>
                    <li><a href="/profilnye-truby">- Профильные</a></li>
                </ul>
            </div>
            <div class="col-3">
                <ul class="sitemap-list">
                    <h4>Листовые</h4>
                    <li><a href="/test">- Нержавеющие листы</a></li>
                    <li><a href="/test">- просечно-вытяжной</a></li>
                    <li><a href="/test">- Листы металлические</a></li>
                    <li><a href="/test">- Рифленые</a></li>
                </ul>
            </div>
            <div class="col-3">
                <ul class="sitemap-list">
                    <h4>Металлопрокат</h4>
                    <li><a href="/test">- Стальная катанка</a></li>
                    <li><a href="/test">- Стальные уголки</a></li>
                    <li><a href="/test">- Двутавр</a></li>
                    <li><a href="/test">- Арматура</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

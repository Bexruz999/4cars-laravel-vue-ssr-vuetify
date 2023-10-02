@extends('layouts.app2')

@section('metas')
    {{--<title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">--}}
@endsection

@section('content')

    {{--@include('homepage.banner')--}}

    <br>
    <br>
    <br>
    <br>
    <img style="margin: auto; display: block" width="500px" src="{{ asset('/assets/images/404.png') }}" alt="404">
    <br>
    <div class="container">
        <div class="mf-section-title text-center dark large-size margbtm50">
            <h2 style="text-align: center">Запрошенная Вами страница не найдена. Нас уведомили о проблеме, и мы сделаем все возможное, чтобы исправить ее как можно скорее. Пожалуйста, вернитесь на нашу домашнюю страницу.</h2>
            <br>
            <br>
            <button type="button" class="btn btn-secondary"><a style="color: white" href="/">Домашная страница</a></button>
            <br>
        </div>

    </div>

    <br>
    <br>

    {{--<x-similars :similars="$similars"></x-similars>--}}


    <div class="banner">
        <div class="container">
            <a class="banner__link" href="#">
                {{--<img width="100%" src="/storage/{{ $map->image }}" alt="">--}}
            </a>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('metas')
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">
@endsection

@section('header')
    <div class="intro-content">
        <h1 class="intro-content__title">Металлопрокат
            <br>
            <span class="intro-content__subtitle">
                <p class="mb-md-5 mb-sm-5">для строительства и промышленности</p>
            </span>
        </h1>
        <collback btn_class="intro-content__btn collback2" title="Оставить заявку"></collback>
    </div>
@endsection

@section('styles')
    <style>
        .partners {
            background-image: url({{ asset(Voyager::image($partners_page->image)) }});
            margin-bottom: 350px;
            margin-top: 50px;
            position: relative;
        }

        .partners-row {
            background: #fff;
            box-shadow: 1px 2px 3px -1px #000000
        }

        .partners-div {
            position: relative;
            top: 190px;
        }

        .block-title__text {
            margin: auto;
            border-bottom: 6px solid #0a53be
        }

        #modal-close {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <x-sections.about :about="$about"></x-sections.about>
    <x-sections.service :services="$services"></x-sections.service>
    <x-sections.production :productions="$productions"></x-sections.production>
    <x-sections.partners :partners="$partners"></x-sections.partners>
    <x-sections.news :news="$news"></x-sections.news>
    <x-sections.callback :callback="$callback"></x-sections.callback>

    @if(session()->get('modal'))
    @else
        {{ session()->put('modal', true) }}
        <div class="modal-mask">
            <div id="modal-close"></div>
            <div class="modal-container2">
                <div class="modal-header"><h3>Обратный звонок</h3></div>
                <div class="modal-body">
                    <form action="/collback" method="post"
                          class="d-flex flex-column justify-content-between align-items-center"><input type="hidden"
                                                                                                       name="_token"
                                                                                                       value="2FkGFpilMEKsXII06E4hdOufsfufmWhfell786Wc"><input
                            type="text" name="name" class="callback-form__input" placeholder="Имя" required=""><input
                            name="tel" class="callback-form__input" placeholder="Телефон"><input type="submit"
                                                                                                 class="callback-form__btn"
                                                                                                 placeholder="Телефон"
                                                                                                 value="Отправить">
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    @endif
@endsection

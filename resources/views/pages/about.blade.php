@extends('layouts.app')

@section('metas')
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">
@endsection

@section('content')
    <div class="about-page">
        <div class="container">
            <div class="row">
                <h2 class="col-12 page-title">{{ $about->title }}</h2>
            </div>

            <div class="row about-page__content">
                <img src="{{ asset(Voyager::image($about->image)) }}" class="col-12 col-lg-5 about-page__content-img"></img>
                <span class="col-12 col-lg-7 about-page__content-text">{!! $about->text !!}</span>
            </div>
        </div>
    </div>

    <div class="why">
        <div class="container">
            <div class="row">
                <h2 class="col-12 page-title">{{ $about->option }}</h2>
            </div>
            @foreach($abouts as $item)
                <div class="why-item {{ ($loop->iteration % 2 === 0) ? 'flex-row-reverse' : '' }}">
                    <div class="why-item__img">
                        <img src="{{ asset(Voyager::image($item->image)) }}" alt="{{ $item->name }}">
                    </div>
                    <div class="why-item__decor"></div>
                    <div class="why-item__text">{{ $item->title }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-lg-6 contacts-page__form m-auto" style="margin-top: 47px;">
                <form action="/collback" method="post" id="forma" class="d-flex flex-column justify-content-between align-items-center" style="border: 4px solid #223e58; border-radius: 15px; padding: 30px 15px; background-color: #fff">
                    <h4 class="callback-form__title" style="text-align: center">
                        {!! $callback->text !!}
                    </h4>
                    @csrf
                    <input name="first" type="text" class="callback-form__input" placeholder="Имя" required/>
                    <!--                        <input type="tel" class="callback-form__input" placeholder="Телефон" required/>-->
                    <formmask></formmask>
                    <input type="submit" value="Отправить" class="callback-form__btn" placeholder="Телефон"/>
                </form>
            </div>
        </div>
    </div>
@endsection

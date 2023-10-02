@extends('layouts.app')

@section('metas')
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">
@endsection

@section('styles')
    <style>
        .contacts-page__form {
            margin-top: 47px;
        }
        .callback-form__title {
            text-align: center;
        }

        #forma {
            border: 4px solid #223e58;
            border-radius: 15px;
            padding: 30px 15px;
            background-color: #fff;
        }
        img{
            max-height: inherit;
        }
        table {
            border-spacing: 0;
            border-collapse: separate !important;
            border-radius: 15px !important;
            border: 4px solid #223e58 !important;
            background-color: #fff;
        }
        .contacts-page__table td{
            border-width: 0;
        }
    </style>
@endsection
@section('content')

    <div class="contacts-page">
        <div class="container">
            <div class="row">
                <h2 class="col-12 page-title">{{ $callback->title }}</h2>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 contacts-page__form">
                    <form action="/collback" method="post" id="forma" class="d-flex flex-column justify-content-between align-items-center">
                        <h4 class="callback-form__title">{!! $callback->text !!}</h4>
                        @csrf
                        <input name="first" type="text" class="callback-form__input" placeholder="Имя" required/>
                        <formmask></formmask>
                        <input type="submit" value="Отправить" class="callback-form__btn" placeholder="Телефон"/>
                    </form>
                </div>

                <div class="col-12 col-lg-6 contacts-page__table">
                    <h4>{{ $contact_table->title }}</h4>
                    {!! $contact_table->text !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ mix('/js/mask.js') }}"></script>
@endsection

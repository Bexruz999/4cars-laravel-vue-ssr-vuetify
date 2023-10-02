@extends('layouts.app')

@section('metas')
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">
@endsection

@section('content')
    <div class="news-page">
        <div class="container">
            <style>
                .news-page__desc a {
                    color: #0a53be;
                }
                .news-page__desc p{
                    font-size: 18px;
                }
            </style>
            <div class="row news-page__desc align-items-start">
                <h1 style="text-align: center;margin-bottom: 50px">{{ $new->title }}</h1>
<!--                <img src="{{ asset(Voyager::image($new->image)) }}" alt="{{ $new->title }}">-->
                <div class="col-12">
                    <br>
                    <br>
                    <div class="row flex-column align-content-between">
                        {!! $new->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

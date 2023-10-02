@extends('layouts.app')

@section('metas')
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">
@endsection

@section('content')
    <div class="news-page">
        <div class="container">
            <div class="row">
            <h2 class="col-12 page-title">Статьи</h2>
        </div>
        <h1>{{ $data['h1'] }}</h1>
        <br><br><br>
        <div class="row d-flex justify-content-evenly news-container">
            @foreach($news as $new)
                @if(($loop->iteration % 2) === 0)
                    <div class="col-lg-{{ ($loop->iteration%4===0) ? '5' : '6' }} news-container__item"
                         style="background-image: url('{{ asset(Voyager::image($new->image)) }}');">
                        <a class="" href="news/{{$new->id}}"><h4>{{ $new->title }}</h4>
                            <p>{{ $new->short_desc }}</p></a>
                    </div>
                @endif

                @if(($loop->iteration % 2) === 1)
                    <div class="col-lg-{{ ($loop->iteration%4===1) ? '5' : '6' }} news-container__item"
                         style="background-image: url('{{ asset(Voyager::image($new->image)) }}')">
                        <a href="news/{{$new->id}}"><h4>{{ $new->title }}</h4>
                            <p>{{ $new->short_desc }}</p></a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    </div>
@endsection

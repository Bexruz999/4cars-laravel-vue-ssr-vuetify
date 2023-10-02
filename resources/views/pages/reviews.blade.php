@extends('layouts.app')

@section('metas')
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">
@endsection

@section('content')
    @if (session('status'))
        <div id="status" onclick="deleteAllert()" class="alert alert-success" style="cursor: pointer">
            {{ session('status') }}
        </div>
    @endif
    <div class="review">
        <div class="container">
            <div class="row review-content">
                <div class="col-12 col-lg-6 ">
                    <div class="review-content__text">
                        <h2>{{ $review_page->title }}</h2>
                        <p>{!! $review_page->text !!}</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 review-content__img">
                    @foreach($review_img as $img)
                        <img src="{{ asset(Voyager::image($img->image)) }}" alt="{{ $img->name }}">
                    @endforeach
                </div>
            </div>
            <div class="row d-flex review-slider align-items-center">
                <div class="container-slicksl">
                    @foreach($reviews as $review)
                        <div class="col-lg-10 review-slider__container mb-2">
                            <div class="review-slider__container-item">
                                <div class="review-slider__container-item__img">
                                    <img src="{{ asset(Voyager::image($review->image)) }}" alt="{{ $review->name }}">
                                    <span>{{ $review->name }}</span>
                                </div>
                                <div class="review-slider__container-item__text">
                                    {{ $review->review }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="review-form">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <h2 class="col-12 review-form__title align-items-center">
                    {{ $review_page->option }}
                </h2>
                <style>
                </style>

                <div class="m-1">
                    <div class="col-lg-12 review-form__inputs" style="border: 4px solid #223e58; border-radius: 15px;">
                        <form action="/review-add" method="post" class="d-flex align-items-center justify-content-around flex-md-row flex-column" style="margin: 10px; margin-top: 15px;">
                            <div class="d-flex flex-column col-12 col-md-8 col-sm-12">
                                @csrf
                                <input name="name" type="text" placeholder="Имя">
                                <textarea name="review" id="review" cols="" rows="2" placeholder="Отзыв"></textarea>
                            </div>
                            <button type="submit" class="col-lg-4 review-form__btn body-btn align-items-center d-flex justify-content-center">
                                Отправить
                            </button>
                        </form>
                    </div>
                </div>

                {{--{!! $review_page->code !!}--}}
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}"/>
@endsection

@section('scripts')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script>
        $('.container-slicksl').not('.slick-initialized').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            adaptiveHeight: true,
        });

        function deleteAllert() {$('#status').remove();}
    </script>
@endsection

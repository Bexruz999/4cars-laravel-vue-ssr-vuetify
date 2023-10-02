@extends('layouts.app')

@section('metas')
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">
@endsection

@section('content')<b></b>
    <div class="product">
        <div class="container">
            <div class="row" style="margin-bottom: 40px;">
                <img src="{{ json_decode($product->image_link)[0] }}" class="col-lg-6 product-img"></img>
                <div class="col-lg-7 col-xl-6 product-text">
                    <h1>{{ $product->position_name }}</h1>
<!--                    <h3 class="product-info__title">
                        Информация
                    </h3>-->
                    @foreach($product->fields as $field)
                        <div class="product-info__item d-flex justify-content-between">
                            <span class="product-info__item-name">{{ $field->field->name }}</span>
                            <span class="product-info__item-text">{{ $field->value }}</span>
                        </div>
                    @endforeach
                    <br>
                    <style>
                        .green-btn {
                            background-color: green;
                        }
                        .green-btn:hover {
                            background-color: darkgreen;
                        }
                    </style>
                    <div class="product-text__btns">
                        <div class="dropdown" style="display: contents;">
                            <button class="btn btn-primary dropdown-toggle product-text__btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Позвонить
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="tel:77003317744">+7 (700) 331-77-44</a></li>
                                <li><a class="dropdown-item" href="tel:77003317745">+7 (700) 331-77-45</a></li>
                                <li><a class="dropdown-item" href="tel:77003317746">+7 (700) 331-77-46</a></li>
                            </ul>
                        </div>
<!--                        <a class="product-text__btn" href="tel:+77003317745 ">Позвонить</a>-->
                        <a class="btn btn-primary product-text__btn" href="https://t.me/metalon2017">Telegram</a>
                        <a class="btn btn-primary product-text__btn green-btn" href="https://api.whatsapp.com/send/?phone={{ setting('admin.whatsapp') }}&text={{ setting('admin.whatsapp-text') }}{{ $product->position_name }}">Whatsapp</a>
                    </div>
                </div>
            </div>

            <div class="row m-2">
                {!! $product->description !!}
            </div>

            <div class="row">
                <div class="product-info mt-5 col-xl-6 col-lg-8 col-md-12">

                </div>
            </div>
        </div>

    </div>

@endsection

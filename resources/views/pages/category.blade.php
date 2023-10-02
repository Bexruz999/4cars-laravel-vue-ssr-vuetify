@extends('layouts.app')

@section('metas')
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">
@endsection

@section('content')

    <div class="product">
        <div class="container">
            <h1>{{ $category->name }}</h1>
            <div class="row">
                <img src="{{ asset(Voyager::image($category->img)) }}" class="col-md-6 product-img"></img>
                <div class="col-md-6 mt-md-5">
                    <div class="mt-md-5">
                        <h2 style="font-size: 25px">{{ $category->short_desc }}</h2>
                        <div class="product-text">
                            <p>{{ $category->description }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                 {!! $product->description !!}
             </div>--}}

            <div class="row">
                <style>
                    .vnalichi{
                        font-size: 16px;
                    }
                </style>
                @foreach($products as $product)
                    {{--{{ dd($product) }}--}}
                    <div class="catalog-products__item col-lg-4  col-md-6 d-flex flex-column justify-content-between">
                        <a style="height: 100%;"
                           href="/store/{{ str_replace('https://satu.kz/', '', $product->group->link_group) }}/{{ $product->id }}"
                           class="catalog-products__item-img">
                            <img src="{{ json_decode($product->image_link)[0] }}" alt="{{ $product->position_name }}"/>
                        </a>
                        <div class="catalog-products__item-info">
                            <a href="/store/{{ str_replace('https://satu.kz/', '', $product->group->link_group) }}/{{ $product->id }}"
                               class="product-name">{{ $product->position_name }}</a>
                            <p class="vnalichi"><span>В наличии</span> | Оптом и в розницу</p>
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Цену уточняйте
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="tel:77003317744">+7 (700) 331-77-44</a></li>
                                    <li><a class="dropdown-item" href="tel:77003317745">+7 (700) 331-77-45</a></li>
                                    <li><a class="dropdown-item" href="tel:77003317746">+7 (700) 331-77-46</a></li>
                                    <li><a class="dropdown-item" href="https://t.me/metalon2017">Telegram</a></li>
                                    <li><a class="dropdown-item" href="https://api.whatsapp.com/send/?phone={{ setting('admin.whatsapp') }}&text={{ setting('admin.whatsapp-text') }}">Whatsapp</a></li>
                                </ul>
                            </div>
<!--                            <div class="product-cart">
                                <a style="font-size: 20px;"
                                   href="https://api.whatsapp.com/send/?phone={{ setting('admin.whatsapp') }}&text={{ setting('admin.whatsapp-text') }}">
                                    Цену уточняйте
                                </a>
                            </div>-->
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $products->onEachSide(1)->links('vendor.pagination.custom') }}
        </div>

    </div>

@endsection

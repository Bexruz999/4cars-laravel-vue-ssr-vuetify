@extends('layouts.app')

@section('metas')
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">
@endsection

@section('content')

    <div class="product">
        <div class="container">
            {{-- <div class="row">
                 {!! $product->description !!}
             </div>--}}

            <div class="row">
                @foreach($products as $product)
                        <div class="catalog-products__item col-lg-4 col-md-6 d-flex flex-column justify-content-between">
                            <a style="height: 100%;" href="/store/{{ str_replace('https://satu.kz/', '', $product->group->link_group) }}/{{ $product->id }}" class="catalog-products__item-img">
                                <img src="{{ json_decode($product->image_link)[0] }}" alt="{{ $product->position_name }}"/>
                            </a>
                            <div class="catalog-products__item-info">
                                <a href="#" class="product-name">{{ $product->position_name }}</a>
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
                            </div>
                        </div>
                @endforeach
            </div>
            {{ $products->onEachSide(1)->links('vendor.pagination.custom') }}
        </div>

    </div>

@endsection




@extends('layouts.app')

@section('metas')
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">
@endsection

@section('content')
    <div class="catalog">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 catalog-params">
                    <h3 class="catalog-params__title">Каталог</h3>

                    <form action="/catalog?filtr=1" method="post">
                        @csrf
                    <div class="catalog-params__item">
                        <h6 class="catalog-params__item-title">Категория</h6>
                        <div class="catalog-params__item-checkboxes">

                                @foreach($groups as $group)
                                    <label for="group{{ $group->id }}"><input style="z-index: -1" type="checkbox" name="group{{ $group->id }}" id="group{{ $group->id }}" {{in_array($group->id, $checked) ? 'checked' : ''}}/>{{ $group->name }}</label>
                                @endforeach

                        </div>
                    </div>
                    <div class="catalog-params__btn">
                        <a href="/catalog?filtr=0">Сбросить</a>
                        <button type="submit" href="/catalog">Применить</button>
                    </div>
                    </form>
                </div>
                <!-- /catalog-params -->

                <div class="col-md-6 col-lg-8 catalog-products">
                    @foreach($products as $product)
                        <div class="catalog-products__item col-lg-6">
                            <div class="m-1">
                                <a href="/store/{{ str_replace('https://satu.kz/', '', $product->group->link_group) }}/{{ $product->id }}" class="catalog-products__item-img">
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
<!--                                    <div class="product-cart">
                                        <a href="https://api.whatsapp.com/send/?phone={{ setting('admin.whatsapp') }}&text={{ setting('admin.whatsapp-text') }}">
                                            Ценууточняйте
                                        </a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{ $products->onEachSide(1)->links('vendor.pagination.custom') }}

                </div>
                <!-- /catalog-products -->
            </div>
            <!-- /row -->
            <div class="catalog-content">
            </div>
        </div>
    </div>

@endsection

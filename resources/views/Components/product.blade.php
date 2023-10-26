<div class="products-item">
    <div class="products-item__img">
        <img src="{{ asset('assets/images/product-img.png') }}" alt="">
    </div>
    <div class="products-item__content">
        <div class="products-item__content-title">{{ $product->Name }}</div>
        {{-- <div class="products-item__content-text">155/70 R12 73T</div>--}}
        <div class="products-item__content-price">{{ $product->Price }} тг</div>
        <div>
            <a href="#" class="products-item__content-buy mr-1">Купить</a>
            <button onclick="addToBasket({{ $product->Id }})" class="products-item__content-korzina">В корзину</button>
        </div>

        <a href="#" class="products-item__content-rasrochka">Купить в рассрочку</a>
    </div>
</div>

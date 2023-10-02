<div class="introHit">
    <div class="container-lg">
        <h2 class="black-title">Хиты продаж</h2>
        <div class="row">
            <div class="products-container mb-lg-5 mb-3 d-flex justify-content-lg-center justify-content-around align-items-center flex-wrap">
                @foreach($hits as $product)
                    <x-product :product="$product"/>
                @endforeach
            </div>
            <a href="#" class="selection-cart__all">Все хиты</a>
        </div>
    </div>
</div>

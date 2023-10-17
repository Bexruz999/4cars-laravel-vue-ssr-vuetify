<div class="selection">
    <div class="container-lg">
        <div class="row">
            <div class="products-container mb-lg-5 mb-3 d-flex justify-content-lg-center justify-content-around align-items-center flex-wrap">
                @foreach($products as $product)
                    <x-product :product="$product"/>
                @endforeach
            </div>
        </div>
    </div>
</div>

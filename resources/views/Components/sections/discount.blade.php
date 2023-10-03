@foreach($discounts as $discount)
    <div class="col-lg-6 col-12 mb-lg-5 mb-4 discount-item">
        <h3 class="discount-title  mb-lg-4 mb-2">
            {{ $discount->Title }}
        </h3>
        <h5 class="discount-subtitle  mb-lg-4 mb-2">
            {{ $discount->Short }}
        </h5>
        <img src="/assets/images/discount.jpg" alt="" class="discount-img  mb-lg-4 mb-2">
    </div>
@endforeach

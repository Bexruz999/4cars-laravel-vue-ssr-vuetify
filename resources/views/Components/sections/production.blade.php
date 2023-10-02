<div class="production">
    <div class="container">
        <div class="block-title">
            <div class="block-title__line"></div>
            <div class="block-title__text">Наша <b>продукция</b></div>
        </div>
        <div class="row d-flex justify-content-between align-items-center production-items">

            @foreach($productions as $production)
                <a href="/category/{{ $production->slug }}" class="col-12 col-lg-2 production-item">
                    <img src="{{ asset(Voyager::image($production->img)) }}" alt="{{ $production->name }}"/>
                    <span>{{ $production->name }}</span>
                </a>
            @endforeach

        </div>
        <!-- /row -->
        <a href="/categories" class="body-btn"> Подробнее </a>
    </div>
    <!-- /container -->
</div>
